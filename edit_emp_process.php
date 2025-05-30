<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $empID = isset($_POST['empID']) ? (int)$_POST['empID']: 0;
    $fullname = htmlspecialchars(trim($_POST["fullname"]));
    $dept = htmlspecialchars(trim($_POST["department"]));
    $salary =htmlspecialchars($_POST["salary"]);

    //validate input
    if (empty($fullname) || empty($dept) || empty($salary)){
         $_SESSION['error_message'] = "All fields are required.";
        header("location: edit_emp.php");
        exit();
    }

    if(!is_numeric($salary) || (float)$salary <= 0){
        $_SESSION['error_message'] = "Salary must be a positive number.";
        header("location: edit_emp.php?id=" . $empID);
        exit();
    }

//prepare SQL statement
$stmt = $conn->prepare('UPDATE employees SET fullname = ?, department = ?, salary = ? where empID = ?');

if($stmt === false){
    $_SESSION['error_message'] = "Database prepare error: " . $conn->error;
    header("location: edit_emp.php?id=" . $empID);
    exit();
}

//bind parameter
$stmt->bind_param("sssi", $fullname, $dept, $salary, $empID);

if ($stmt->execute()){
    if($stmt->affected_rows > 0){
        $_SESSION['success_message'] = "Employee details updated successfully!";
        } else {
            $_SESSION['warning_message'] = "No changes were made to the employee details (or employee not found).";
        }
        header("location: manageEmployee.php"); // Redirect to the employee list page after update
        exit();
}  else {
        $_SESSION['error_message'] = "Error updating employee: " . $stmt->error;
        header("location: edit_emp.php?id=" . $empID); // Redirect back to edit page with error
        exit();
    }

//close statement and connection
$stmt -> close();
$conn -> close();
}
?>
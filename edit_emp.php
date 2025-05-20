
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="edit_emp.css">

<?php
    include 'db_connection.php';
    $id = intval($_GET['id']);
   
    // Fetch employee data securely
    $sql = "SELECT * FROM employee WHERE empID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = $res->fetch_assoc();

    if (!$data) {
        die("Employee not found.");
    }

    if(isset($_POST["submit"])){
        $empID = intval($_POST['empID']);
        $fullName = trim($_POST['fullname']);
        $dept = trim($_POST['department']);
        $salary = intval($_POST['salary']);
    
        // Secure update query using prepared statements
        $sql2 = "UPDATE employee SET empID = ?, empName = ?, department = ?, salary = ? WHERE empID = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("isssi", $empID, $fullName, $dept, $salary, $id);
        $stmt2->execute();

        if ($stmt2->affected_rows === 1) {
            echo "<script>
                    alert('Salary record deleted successfully.');
                    </script>";
            header("Location: manageEmployee.php");
            exit();
        } else {
            echo "<script>
                    alert('Update failed.');
                    window.location.href = 'manageEmployee.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    min-height: 100vh;
}

.container {
    width: 60%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
}

form input[type="text"],
form input[type="number"],
form input[type="password"] {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

form input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Styling for Labels */
label {
    font-size: 14px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .container {
        width: 90%;
    }
    
    form {
        padding: 10px;
    }

    h2 {
        font-size: 24px;
    }
}


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    Emp ID: <input type="text" name="empID" value="<?php echo $data['empID'] ?>"> <br>
    Full Name: <input type="text" name="fullname" value="<?php echo $data['empName'] ?>"> <br>
    Department: <input type="text" name="department" value="<?php echo $data['department'] ?>"> <br>
    Salary: <input type="number" name="salary" value="<?php echo $data['salary'] ?>"> <br> <br>
    <input type="submit" name="submit" value="Save Changes">
</form>
</body>
</html>

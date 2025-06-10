<?php
    session_start();
    include 'db_connection.php';
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM employee 
                WHERE empID = $id");

    if($stmt->execute()){
        header("location: manageEmployee.php");
        echo "<script>alert('Deleted successfully')</script>";
    }
    $conn->close();
?>
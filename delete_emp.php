<?php
    session_start();
    include 'db_connection.php';
    $id = $_GET['id'];
    
    $sql = "DELETE FROM employee 
                WHERE empID = $id";

    if($conn->query($sql)){
        header("location: manageEmployee.php");
        echo "<script>alert('Deleted successfully')</script>";
    }
    $conn->close();
?>
<?php
    $host ='localhost';
    $user = 'root';
    $pwd = '';
    $db = 'summerproject';
    
    $conn = new mysqli($host, $user, $pwd, $db);
    if($conn -> connect_error){
       echo "<script>alert('Connection failed: '.$conn->connect_error)</script>";
        // die("Connection failed: ". $conn->connect_error);
    }
    //echo "Connection Successfull";
?>
<?php
session_start();
include_once 'db_connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT userId, passwordHash, userRole FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

            if ($password == $row['passwordHash']) {

                if ($row['userRole']=='Admin'){
                     header("Location: admin_panel.php");
                exit();
                } else{
                    header("Location: manager_panel.php");
                }
               
            } else {
                echo "<script>alert('Invalid email or password.')</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password.')</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.')</script>";
    }

    header("Location: login.php");
    exit();

?>

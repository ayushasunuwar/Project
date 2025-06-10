<?php
    include 'db_connection.php';

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $role = $_POST["role"];

        //validate
        if(empty($username) || empty($email) || empty($role)){
            $_SESSION["error_message"] = "All the fields are required";
            header("location: edit_user.php");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error_message'] = "Invalid email format.";
        header("location: admin_add_new_user.php");
        exit();
    }

    //check if email or username alreafy exists
    $check_stmt = $conn->prepare('SELECT COUNT(*) FROM users WHERE username = ?');
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if($count > 0){
        $_SESSION['error_message'] = "Username {$username} is already taken. Please choose a different one";
        header("location: admin_add_new_user.php");
        exit();
    }

    $check_stmt1 = $conn->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
    $check_stmt1->bind_param("s", $email);
    $check_stmt1->execute();
    $check_stmt1->bind_result($count);
    $check_stmt1->fetch();
    $check_stmt1->close();

    if($count > 0){
        $_SESSION['error_message'] = "The email address {$email} is already taken. Please choose a different one";
        header("location: admin_add_new_user.php");
        exit();
    }


    //hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //prepare SQL statement
    $stmt = $conn->prepare('UPDATE users SET username = ?, email = ?, password = ?, role =? ');
    if($stmt === false){
        $SESSION_ERROR['error_message'] = "Database error: ".$conn->error;
        header("location: edit_usser.php");
        exit();
    }

    //bind parameters
    $stmt->bind_param('ssss', $username, $email, $hashed_password, $role);

    //execute the statement
    if($stmt->execute()){
        $_SESSION['success_message'] = "New user created successfully.";
        header("location: admin_users.php");
        exit();
    } else{
        $SSESSION['error_message'] = "Error during registration: ".$stmt->error;
        header("location: edit_user.php");
        exit();
    }

    //close statement and connection
    $stmt->close();
    $conn->close();

    }
?>
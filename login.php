<?php 
session_start();
$title = 'Login';
$page = 'Login';
include 'db_connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
        }

        /* Header Styling */
        .header {
            color: white;
            padding: 0; /* Set padding to 0 */
            margin: 0;  /* Set margin to 0 */
            text-align: center;
        }

        /* Main Content Styling */
        .login-container {
            background: white;
            max-width: 380px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        p {
            font-size: 14px;
            color: #888;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4A90E2;
            outline: none;
        }

        .forgot a {
            font-size: 14px;
            color: #4A90E2;
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
        }

        .forgot a:hover {
            text-decoration: underline;
        }

        button[type="submit"] {
            background-color: #4A90E2;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #357ABD;
        }

        /* Footer Styling */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header">
        <?php include 'header.php'; ?>
    </div>

    <!-- Login Form -->
    <div class="login-container">
        <h2>Login</h2>
        <p>Welcome back. Please enter your details.</p>

        <form action="login_process.php" method="POST">
            <label for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="password"><i class="fa-solid fa-unlock"></i></label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        <br>
            <div class="forgot">
               <p>Forgot password?  <a href="forgot_password.php">Click here</a></p>
            </div>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>

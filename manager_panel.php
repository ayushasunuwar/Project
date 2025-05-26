<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">

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
.sidebar { 
    width: 250px; 
    height: 100vh; 
    background: #343a40; 
    color: white; 
    position: fixed; 
    padding-top: 20px; 
}
.sidebar a { 
    color: white; 
    text-decoration: none; 
    padding: 10px 15px; 
    display: block; 
}
.sidebar a:hover { 
    background: #495057; 
}
.content { 
    margin-left: 260px; 
    padding: 20px; 
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="empdashboard.css">

    <script defer src="./js/bootstrap.bundle.min.js"></script>

    <title>User</title>
    
</head>
<?php
    include 'db_connection.php';
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
        exit();
    }
?>
<body>

</body>
</html>
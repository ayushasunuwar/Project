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
<div class="sidebar">
        <h4 class="text-center">Welcome <?php echo $_SESSION["username"]; ?></h4>
        <a href="view_payslip.php">View Payslip</a>
        <a href="#">Payment History</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-light bg-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand"><?php echo 'Welcome'?></span>
                <input class="form-control w-25" type="search" placeholder="Search" aria-label="Search">
            </div>
        </nav>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Current Salary</h5>
                        <p class="card-text"><?php?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Last Payment</h5>
                        <p class="card-text"><?php?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Next Payment</h5>
                        <p class="card-text"><?php?></p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Payment History</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
</html>
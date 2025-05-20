<?php
// Include necessary files
include 'admin_nav.php';

// Sample employee data (this would typically come from a database based on the user session or ID)
$employee = [
    'id' => 1,
    'username' => 'JohnDoe',
    'email' => 'john@example.com',
    'role' => 'Manager'
];

// If the form is submitted, handle the profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // You can now update the database with the new information
    // Here, for simplicity, we'll just display the updated data
    echo "<div class='alert alert-success'>Profile updated successfully!</div>";
    echo "Updated Profile: <br>";
    echo "Username: $username <br>";
    echo "Email: $email <br>";
    echo "Role: $role <br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            background-color: #f4f7fc; 
            margin: 0;
            padding: 0;
        }

        .content { 
            margin-top: 120px;
            margin-left: 260px; 
            padding: 20px; 
            width: 100%; 
        }

        h3 {
            margin-bottom: 30px;
            font-size: 1.8rem;
            color: #333;
        }

        .form-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<div class="content">
    <h3>Edit Profile</h3>
    <div class="form-container">
        <form method="POST" action="edit_profile.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= $employee['username'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= $employee['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter new password (optional)">
            </div>
            <div class="form-group">
        
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>
</div>
</body>
</html>

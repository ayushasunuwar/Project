<?php
include 'admin_nav.php';

// If the form is submitted, handle the user creation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Database connection (replace with your own credentials)
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // SQL query to insert the user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);  // "ssss" for string data types

    // Execute the query
    if ($stmt->execute()) {
        "<script>alert('New user added successfully');</script>";
    } else {
         "<script>alert('Error: ' . $stmt->error);</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form to Add User -->
<div class="content">
    <h2>Add New User</h2>
    <form method="POST" action="add_uer_process.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <button type="submit">Add User</button>
    </form>
</div>

<!-- You can also include your CSS here or in an external file -->
<style>
    .content {
        margin-top: 100px;
        margin-left: 250px; /* Adjust for sidebar width */
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input, .form-group select {
        padding: 10px;
        width: 100%;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

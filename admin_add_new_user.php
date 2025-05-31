<?php
include 'admin_nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    .content {
        margin-top: 100px;
        margin-left: 250px; /* Adjust for sidebar width */
        padding: 20px;
        width: 500px;
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

</head>
<body>
    <!-- HTML Form to Add User -->
<div class="dashbord-container">
    <h2>Add New User</h2>
    <form method="POST" action="add_user_process.php" name="userForm" id="userForm">
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
                <option value="user">Manager</option>
            </select>
        </div>
        <button type="submit">Add User</button>
    </form>
</div>
</body>

<script>
    const form = document.getElementById("userForm");

    form.addEventListener('submit', function(event){
        const username = document.getElementById("username").value.trim();
    })
</script>
</html>
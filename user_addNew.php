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
.dashbord-container{
    width: 500px;
    margin: 100px auto 50px auto;
}

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

    .Error-class {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

</style>

</head>
<body>
    <!-- HTML Form to Add User -->
<div class="dashbord-container">
    <h2>Add New User</h2>
    <form method="POST" action="user_add_process.php" name="userForm" id="userForm">
        <!-- <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" >
            <p id="usernameError" class="Error-class" style="display: none;"></p>
        </div> -->

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" >
            <p id="emailError" class="Error-class" style="display: none;"></p>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" >
            <p id="passwordError" class="Error-class" style="display: none;"></p>
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" >
                <option value="">Select a role</option>
                <option value="admin">Admin</option>
                <option value="user">Manager</option>
            </select>
            <p id="roleError" class="Error-class" style="display: none;"></p>
        </div>
        <button type="submit" name="submit" id="submit">Add User</button>
    </form>
</div>
</body>

<script>
    // Client-side validation
    const form = document.getElementById("userForm");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const roleInput = document.getElementById("role");

    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const roleError = document.getElementById("roleError");

    // Function to validate email format
    function isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    // Live input clearing
    emailInput.addEventListener("input", () => {
        emailError.style.display = "none";
        emailInput.style.borderColor = "#ddd";
    });

    passwordInput.addEventListener("input", () => {
        passwordError.style.display = "none";
        passwordInput.style.borderColor = "#ddd";
    });

    roleInput.addEventListener("change", () => {
        roleError.style.display = "none";
        roleInput.style.borderColor = "#ddd";
    });

    form.addEventListener("submit", function (event) {
        let valid = true;

        // Reset errors
        emailError.textContent = "";
        emailError.style.display = "none";
        emailInput.style.borderColor = "#ddd";

        passwordError.textContent = "";
        passwordError.style.display = "none";
        passwordInput.style.borderColor = "#ddd";

        roleError.textContent = "";
        roleError.style.display = "none";
        roleInput.style.borderColor = "#ddd";

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const role = roleInput.value.trim();

        // Email Validation
        if (email === "") {
            emailError.textContent = "Email cannot be empty.";
            emailError.style.display = "block";
            emailInput.style.borderColor = "red";
            valid = false;
        } else if (!isValidEmail(email)) {
            emailError.textContent = "Please enter a valid email address.";
            emailError.style.display = "block";
            emailInput.style.borderColor = "red";
            valid = false;
        }

        // Password Validation
        if (password === "") {
            passwordError.textContent = "Password cannot be empty.";
            passwordError.style.display = "block";
            passwordInput.style.borderColor = "red";
            valid = false;
        } else if (password.length < 6) {
            passwordError.textContent = "Password must be at least 6 characters long!";
            passwordError.style.display = "block";
            passwordInput.style.borderColor = "red";
            valid = false;
        }

        // Role Validation
        if (role === "") {
            roleError.textContent = "Please select a role.";
            roleError.style.display = "block";
            roleInput.style.borderColor = "red";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
</script>

</html>
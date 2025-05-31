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
            <input type="text" name="username" id="username" >
            <p id="usernameError" class="Error-class" style="display: none;"></p>
        </div>
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
                <option value="admin">Admin</option>
                <option value="user">Manager</option>
            </select>
            <p id="roleError" class="Error-class" style="display: none;"></p>
        </div>
        <button type="submit">Add User</button>
    </form>
</div>
</body>

<script>
    const form = document.getElementById('employeeForm');

        form.addEventListener('submit', function(event){
            //clear all errors on each submit attempt

            let nameError = document.getElementById('name_error');
            let deptError = document.getElementById('dept_error');
            let salaryError = document.getElementById('salary_error');
             
            nameError.textContent = '';
            nameError.style.display = 'none';
            fullnameInput.style.borderColor = '#ddd';

            deptError.textContent = '';
            deptError.style.display = 'none';
            fullnameInput.style.borderColor = '#ddd';

            salaryError.textContent = '';
            salaryError.style.display = 'none';
            fullnameInput.style.borderColor = '#ddd';

            let hasError = false;

            const name = document.getElementById('fullname').value.trim();
            const dept = document.getElementById('department').value.trim();
            const salary = document.getElementById('salary').value.trim();

            //validate full name
            if(name === ''){
                nameError.style.display = 'block';
                nameError.textContent = "Name cannot be blank";
                hasError = true;
            }

            //validate department
            if(dept === ''){
                deptError.style.display = 'inline-block';
                deptError.textContent = "Department cannot be blank";
                hasError = true;
            }

            //validate salary
            if(salary === ''){
                salaryError.style.display = 'inline-block';
                salaryError.textContent = "Salary cannot be blank";
                hasError = true;
            } else  if (isNaN(salary) || Number(salary) <= 0) {
                salaryError.style.display = 'inline-block';
                salaryError.textContent = "Salary must be a positive number";
                hasError = true;
            }

            
        if (hasError) {
            event.preventDefault(); // Stop form submission if errors exist
        }
        });
</script>
</html>
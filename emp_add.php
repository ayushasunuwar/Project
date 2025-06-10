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
</style>
</head>

<body>
   <!-- HTML Form to Add User -->
<div class="dashbord-container">
    <h2>Add New User</h2>
    <form method="POST" action="add_emp_process.php" name="empForm" id="empForm">
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" id="usefullname" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" name="department" id="department" required>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary" id="salary" required>
        </div>
        <button type="submit" name="submit" id="submit">Add Employee</button>
    </form>
</div> 

<script>
    //client side validation
    const form = document.getElementById("empForm");
        const fullnameInput = document.getElementById("fullname");
        const departmentInput = document.getElementById("department");
        const salaryInput = document.getElementById("salary");

        const nameError = document.getElementById("nameError");
        const departmentError = document.getElementById("deptError");
        const salaryError = document.getElementById("salaryError");

        form.addEventListener('submit', function(event){
            let valid = true;

            // Clear previous error messages and styles
            nameError.textContent = '';
            nameError.style.display = 'none';
            fullnameInput.style.borderColor = '#ddd';

            departmentError.textContent = '';
            departmentError.style.display = 'none';
            departmentInput.style.borderColor = '#ddd';

            departmentError.textContent = '';
            departmentError.style.display = 'none';
            departmentInput.style.borderColor = '#ddd';
            
            //validate fullname
            if()

            if (!valid) {
                event.preventDefault(); // Stop form submission if validation fails
            }
        });
</script>
</body>
</html>

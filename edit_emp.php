
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
    include 'admin_nav.php';
    include 'db_connection.php';
?>
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

        .dashboard-container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form > * {
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        form input[type="text"],
        form input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Styling for Labels */
        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 10px;
            margin-bottom: px;
            text-align: left;
            width: 100%;
        }


        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
            }
            
            form {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }
        }


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id = $_GET["id"];
?>
    <div class="dashboard-container">
        <form action="edit_emp_process.php" method="post" id="employeeForm">

            <label for="fullname">Full name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo htmlspecialchars($_GET['empName']); ?>">
            <p class="error-message" id="name_error" style="color:red; display:none;"></p>

            <label for="department">Department:</label>
            <input type="text" name="department" id="department" value="<?php echo htmlspecialchars($_GET['department']); ?>">
            <p class="error-message" id="dept_error" style="color:red; display:none;"></p>

            <label for="salary">Salary:</label>
            <input type="text" name="salary" id="salary" value="<?php echo htmlspecialchars($_GET['salary']); ?>">
            <p class="error-message" id="salary_error" style="color:red; display:none;"></p>

            <label for="role">Role:</label>
            <select name="role" id="role" value="<?php echo htmlspecialchars($_GET['role']) ?>">
                <option value="admin">Admin</option>
                <option value="user">Manager</option>
            </select>

            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>

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
        })
    </script>

</body>
</html>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
    include 'db_connection.php';

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
   
        // Fetch employee data securely
        $sql = "SELECT * FROM employee WHERE empID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_assoc();

        if (!$data) {
            echo "<script>alert('Employee not found'); window.location.href = 'admin_employees.php';</script>";
            exit();
        }

        if(isset($_POST["submit"])){
            $fullName = trim($_POST['fullname']);
            $dept = trim($_POST['department']);
            $salary = intval($_POST['salary']);
        
            // Secure update query using prepared statements
            $sql2 = "UPDATE employee SET empName = ?, department = ?, salary = ? WHERE empID = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sssi", $fullName, $dept, $salary, $id);
            $stmt2->execute();

            if ($stmt2->affected_rows === 1) {
                echo json_encode(['status' => 'success', 'message' => 'Updated successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Update failed']);
            }
            exit();
        }
    } else{
        echo "<script>alert('Invalid ID'); window.location.href = 'admin_employees.php';</script>";
        exit();
    }
    
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

    <div class="dashboard-container">
        <form action="" method="post" id="employeeForm">

            <label for="fullname">Full name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo htmlspecialchars($data['empName']); ?>">
            <span><p id="name_error" style="color:red; display:none;"></p></span>

            <label for="department">Department:</label>
            <input type="text" name="department" id="department" value="<?php echo htmlspecialchars($data['department']); ?>">
            <span><p id="dept_error" style="color:red; display:none;"></p></span>

            <label for="salary">Salary:</label>
            <input type="text" name="salary" id="salary" value="<?php echo htmlspecialchars($data['salary']); ?>">
            <span><p id="salary_error" style="color:red; display:none;"></p></span>

            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>

    <script>
        const form = document.getElementById('employeeForm');

        form.addEventListener('submit', function(event){
            //clear all errors on each submit attempt
            document.getElementById('name_error').style.display = 'none';
            document.getElementById('dept_error').style.display = 'none';
            document.getElementById('salary_error').style.display = 'none';

            let hasError = false;

            const name = document.getElementById('fullname').value.trim();
            const dept = document.getElementById('department').value.trim();
            const salary = document.getElementById('salary').value.trim();

            //validate full name
            if(name === ''){
                const nameError = document.getElementById('name_error');
                nameError.style.display = 'block';
                nameError.textContent = "Name cannot be blank";
                hasError = true;
            }

            //validate department
            if(dept === ''){
                const deptError = document.getElementById('dept_error');
                deptError.style.display = 'block';
                deptError.textContent = "Department cannot be blank";
                hasError = true;
            }

            //validate salary
            if(salary === ''){
                const salaryError = document.getElementById('salary_error');
                salaryError.style.display = 'block';
                salaryError.textContent = "Salary cannot be blank";
                hasError = true;
            } else  if (isNaN(salary) || Number(salary) <= 0) {
                const salaryError = document.getElementById('salary_error');
                salaryError.style.display = 'block';
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

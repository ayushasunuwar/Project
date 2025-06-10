<?php
session_start();
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

    .add-emp {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-emp:hover {
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
    <h2>Add New Employee</h2>
    <form method="POST" action="add_emp_process.php" name="empForm" id="empForm">
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" id="fullname" >
            <p id="nameError" class="Error-class" style="display: none;"></p>
        </div>

          <div class="form-group">
            <label for="fullname">Email:</label>
            <input type="text" name="email" id="email" >
            <p id="emailError" class="Error-class" style="display: none;"></p>
        </div>

          <div class="form-group">
            <label for="fullname">Phone:</label>
            <input type="text" name="phone" id="phone" >
            <p id="phoneError" class="Error-class" style="display: none;"></p>
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <select name="department" id="department">
                <option value="">Select a department</option>
                <option value="HR">HR</option>
                <option value="finance">Finance</option>
                <option value="eng">Engineering</option>
                <option value="IT">IT</option>
                <option value="r&d">Research and Development</option>
            </select>
            <p id="deptError" class="Error-class" style="display: none;"></p>
        </div>

          <div class="form-group">
            <label for="fullname">Position:</label>
            <select name="position" id="position">
                <option value="">Select a position</option>
                <option value="manager">Manager</option>
                <option value="employee">Employee</option>
            </select>
            <p id="positionError" class="Error-class" style="display: none;"></p>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" name="salary" id="salary" >
            <p id="salaryError" class="Error-class" style="display: none;"></p>
        </div>
        <button class="add-emp" type="submit" name="submit" id="submit">Add Employee</button>
    </form>
</div> 

<script>
    const form = document.getElementById("empForm");
    const fullnameInput = document.getElementById("fullname");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const deptInput = document.getElementById("department");
    const positionInput = document.getElementById("position");
    const salaryInput = document.getElementById("salary");

    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const phoneError = document.getElementById("phoneError");
    const deptError = document.getElementById("deptError");
    const positionError = document.getElementById("positionError");
    const salaryError = document.getElementById("salaryError");

    function isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    // Live input clearing
    fullnameInput.addEventListener("input", () => {
        nameError.style.display = "none";
        fullnameInput.style.borderColor = "#ddd";
    });

    emailInput.addEventListener("input", () => {
        emailError.style.display = "none";
        emailInput.style.borderColor = "#ddd";
    });

    phoneInput.addEventListener("input", () => {
        phoneError.style.display = "none";
        phoneInput.style.borderColor = "#ddd";
    });

    deptInput.addEventListener("change", () => {
        deptError.style.display = "none";
        deptInput.style.borderColor = "#ddd";
    });

    positionInput.addEventListener("change", () => {
        positionError.style.display = "none";
        positionInput.style.borderColor = "#ddd";
    });

    salaryInput.addEventListener("input", () => {
        salaryError.style.display = "none";
        salaryInput.style.borderColor = "#ddd";
    });

    form.addEventListener("submit", function (event) {
        let valid = true;

        // Reset errors
        [nameError, emailError, phoneError, deptError, positionError, salaryError].forEach(error => {
            error.textContent = "";
            error.style.display = "none";
        });

        [fullnameInput, emailInput, phoneInput, deptInput, positionInput, salaryInput].forEach(input => {
            input.style.borderColor = "#ddd";
        });

        const name = fullnameInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();
        const dept = deptInput.value;
        const position = positionInput.value;
        const salary = salaryInput.value;

        if(name === ''){
            nameError.textContent = "Name cannot be empty.";
            nameError.style.display = "block";
            fullnameInput.style.borderColor = "red";
            valid = false;
        }

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

        if(phone === ''){
            phoneError.textContent = "Phone cannot be empty.";
            phoneError.style.display = "block";
            phoneInput.style.borderColor = "red";
            valid = false;
        } else if (!/^\d{10}$/.test(phone)) {
            phoneError.textContent = "Phone number must be 10 digits.";
            phoneError.style.display = "block";
            phoneInput.style.borderColor = "red";
            valid = false;
        }

        if(dept === ''){
            deptError.textContent = "Department cannot be empty.";
            deptError.style.display = "block";
            deptInput.style.borderColor = "red";
            valid = false;
        }

        if(position === ''){
            positionError.textContent = "Position cannot be empty.";
            positionError.style.display = "block";
            positionInput.style.borderColor = "red";
            valid = false;
        }

        if(salary === ''){
            salaryError.textContent = "Salary cannot be empty.";
            salaryError.style.display = "block";
            salaryInput.style.borderColor = "red";
            valid = false;
        } else if (isNaN(salary) || Number(salary) <= 0) {
            salaryError.textContent = "Salary must be a positive number.";
            salaryError.style.display = "block";
            salaryInput.style.borderColor = "red";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>

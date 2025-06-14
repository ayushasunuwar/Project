
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
        $stmt = $conn->prepare("SELECT * FROM users")
    ?>

    <div class="dashboard-container">
        <p class="Error-message" id="edit-error" style="display:none;">There was an error.</p>
        <form action="edit_user_process.php" method="post" id="userForm">

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($data['email']); ?>">
            <span><p id="name_error" style="color:red; display:none;"></p></span>

            <label for="department">Password:</label>
            <input type="text" name="password" id="pwd" value="<?php echo htmlspecialchars($data['passwordHash']); ?>">
            <span><p id="dept_error" style="color:red; display:none;"></p></span>

            <label for="salary">Role:</label>
            <input type="text" name="salary" id="salary" value="<?php echo htmlspecialchars($data['useerRole']); ?>">
            <span><p id="salary_error" style="color:red; display:none;"></p></span>

            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>

    <script>
        const editError = docoument.getElementById("edit-errror");
        if(isset($_SERVER['error_message'])){
            editError.style.display = "inline-block";
        }
    </script>
</body>
</html>

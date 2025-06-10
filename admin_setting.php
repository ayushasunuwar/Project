<?php
session_start();

$title = 'Settings';
$page = 'settings';
include_once 'db_connection.php';

// Fetch current admin data from database
$adminData = [];
if (isset($_SESSION['admin_id'])) {
    $stmt = $conn->prepare("SELECT username, email FROM admins WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['admin_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $adminData = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'">
    <title>Settings - Admin Dashboard</title>
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
            width: calc(100% - 260px);
            transition: width 0.3s ease, margin-left 0.3s ease;
        }

        h4 {
            margin-bottom: 30px;
            font-size: 1.8rem;
            color: #333;
            text-align: center;
        }

        .settings-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 700px;
            margin: 0 auto;              /* Center horizontally */
    margin-top: 40px;  
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .btn-save {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
        }

        .btn-save:hover {
            background-color: #218838;
        }

        .form-group label {
            font-size: 1rem;
            color: #333;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            background: #eee;
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            background: transparent;
            transition: width 0.3s, background 0.3s;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        @media (max-width: 992px) {
            .content {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .settings-form {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <?php include 'admin_nav.php'; ?>
    
    <div class="content">
        <div class="settings-form">
            <form action="settings_process.php" method="post" id="settingsForm">
                
                <!-- Edit Profile Section -->
                <h4>Edit Profile</h4>
                <div class="form-group">
                    <label for="adminUsername">Admin Username</label>
                    <input type="text" id="adminUsername" class="form-control" name="adminUsername" 
                           value="<?php echo htmlspecialchars($adminData['username'] ?? 'Admin123'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="adminEmail">Admin Email</label>
                    <input type="email" id="adminEmail" class="form-control" name="adminEmail" 
                           value="<?php echo htmlspecialchars($adminData['email'] ?? 'admin@example.com'); ?>" required>
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="adminPassword">New Password</label>
                    <input type="password" id="adminPassword" class="form-control" 
                           name="adminPassword" placeholder="Enter new password" 
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                    <div class="password-strength">
                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                    </div>
                    <div id="passwordError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="adminPasswordConfirm">Confirm New Password</label>
                    <input type="password" id="adminPasswordConfirm" class="form-control" 
                           placeholder="Confirm new password">
                    <div id="passwordMatchError" class="error-message"></div>
                </div>

                <!-- Save Button -->
                <button type="submit" class="btn-save" id="submitButton">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('adminPassword');
    const confirmInput = document.getElementById('adminPasswordConfirm');
    const strengthBar = document.getElementById('passwordStrengthBar');
    const passwordError = document.getElementById('passwordError');
    const matchError = document.getElementById('passwordMatchError');
    const form = document.getElementById('settingsForm');
    const submitButton = document.getElementById('submitButton');

    // Password strength indicator
    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        // Check length
        if (password.length >= 8) strength += 1;
        if (password.length >= 12) strength += 1;
        
        // Check for mixed case
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
        
        // Check for numbers
        if (password.match(/([0-9])/)) strength += 1;
        
        // Check for special chars
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        
        // Update strength bar
        switch(strength) {
            case 0:
                strengthBar.style.width = '0%';
                strengthBar.style.backgroundColor = 'transparent';
                break;
            case 1:
                strengthBar.style.width = '25%';
                strengthBar.style.backgroundColor = '#dc3545';
                break;
            case 2:
                strengthBar.style.width = '50%';
                strengthBar.style.backgroundColor = '#fd7e14';
                break;
            case 3:
                strengthBar.style.width = '75%';
                strengthBar.style.backgroundColor = '#ffc107';
                break;
            case 4:
                strengthBar.style.width = '100%';
                strengthBar.style.backgroundColor = '#28a745';
                break;
        }
    });

    // Password match validation
    confirmInput.addEventListener('input', function() {
        if (passwordInput.value !== this.value) {
            matchError.textContent = 'Passwords do not match';
            submitButton.disabled = true;
        } else {
            matchError.textContent = '';
            submitButton.disabled = false;
        }
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        if (passwordInput.value && passwordInput.value !== confirmInput.value) {
            e.preventDefault();
            matchError.textContent = 'Passwords do not match';
        }
        
        if (passwordInput.value && !passwordInput.checkValidity()) {
            e.preventDefault();
            passwordError.textContent = 'Password must contain at least one number, one uppercase and lowercase letter, and be at least 8 characters long';
        }
    });
});
</script>

</body>
</html>
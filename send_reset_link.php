<?php
include 'db_connect.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

    // Check if user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";

        // Simulated email (you'd use PHPMailer or similar in real use)
        echo "Password reset link: <a href='$resetLink'>$resetLink</a>";
    } else {
        echo "Email not found.";
    }
}
?>
 
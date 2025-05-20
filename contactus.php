<?php
    session_start();
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome.min.css">
    <style>
        /* General page styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    color: #333;
}
.header{
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Header */
.c-header {
    background-color: #fff;
    color: #007BFF;
    padding: 50px 20px;
    text-align: center;
}

.c-header h1 {
    margin: 0;
    font-size: 2.5rem;
}

/* Intro paragraph */
.container {
    max-width: 900px;
    margin: 30px auto;
    padding: 0 20px;
    font-size: 1.1rem;
    line-height: 1.6;
    text-align: center;
}

/* Contact section */
.contact-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    gap: 20px;
}

/* Contact details */
.contact-details {
    flex: 1;
    min-width: 280px;
    padding: 20px;
}

.contact-details h2 {
    margin-bottom: 20px;
    color: #007BFF;
}

.contact-details p {
    margin-bottom: 10px;
    font-size: 1rem;
}

/* Form styles */
.form {
    flex: 1;
    min-width: 280px;
    padding: 20px;
}

.form h2 {
    margin-bottom: 20px;
    color: #007BFF;
}

form input,
form textarea {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    box-sizing: border-box;
}

form button {
    background-color: #007BFF;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

/* Responsive behavior */
@media (max-width: 768px) {
    .contact-section {
        flex-direction: column;
        align-items: center;
    }
}

    </style>
    <script>
        async function submitForm(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const response = await fetch("submit_contact.php", {
                method: "POST",
                body: formData
            });
            const result = await response.json();
            alert(result.message);
        }
    </script>
</head>
<body>
<div class="header">
    <?php include_once 'header.php';?>
</div>
    <div class="c-header">
            <h1>Contact Us</h1>
        </div>
        <div class="container">
            <p><strong>RecordKeeping System</strong> is an <strong>ISO 9001:2015 Certified Company</strong> based in Nepal.
        <br>
        Since <strong>2025</strong>, we’ve been committed to delivering end-to-end 
        <span class="highlight">HR</span> and <span class="highlight">Business Consulting Services</span> 
        that empower organizations to thrive.</p>
        </div>
        <div class="contact-section">
            <div class="contact-details">
                <h2>Contact Us</h2>
                <p>📍 Gaushala, Kathmandu, Nepal</p>
                <p>📞 +977 9869244352</p>
                <p>📧 info@recordkeepingsystem.com.np</p>
            </div>
            <div class="form"  onsubmit="submitForm(event)">
                <h2>We would love to hear from you.</h2>
                <form>
                    <input type="text" name="name" placeholder="Enter your full name" required>
                    <input type="text" name="phone" placeholder="Enter your phone number" required>
                    <input type="email" name="email" placeholder="Enter your email" required>
                    <textarea name="message" rows="4" placeholder="Your message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
<div class="footer">
    <?php include_once 'footer.php';?>
</div>
</body>
</html>
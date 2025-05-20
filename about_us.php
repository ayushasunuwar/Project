<?php
session_start();
$title = 'About us';
$page = 'About us';
include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* General page styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

/* Headings */
h1, h2, h4 {
    color: #2c3e50;
}

/* Section spacing */
.container {
    padding-bottom: 50px;
    padding-top: 30px;
}

/* Images */
img.rounded, img.rounded-circle {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

img.rounded:hover, img.rounded-circle:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Text center on smaller screens */
@media (max-width: 767px) {
    .row > div {
        text-align: center;
    }
}

/* Team section background enhancement */
.team-section-wrapper {
    background-color: #f0f0f5;
    padding: 50px 30px;
    border-radius: 16px;
    margin-top: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
}

.team-section-wrapper:hover {
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

/* Button or link styles can go here if needed */

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <?php include_once 'header.php';?>
    </div>

<div class="container">
    <h1 class="text-center">About Us</h1>
    <p class="text-center">Learn more about our vision, mission, and the team behind our success.</p>
        
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="images/mission.jpg" class="img-fluid rounded" alt="Our Mission">
        </div>
        <div class="col-md-6">
            <h2>Our Mission</h2>
            <p>We aim to provide high-quality services to our clients with a focus on excellence, integrity, and innovation. Our mission is to empower businesses and individuals through effective solutions.</p>
        </div>
    </div>
        
    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Our Vision</h2>
            <p>Our vision is to be a leader in the industry by delivering outstanding services and fostering a culture of continuous improvement.</p>
        </div>
        <div class="col-md-6">
            <img src="images/vision.jpg" class="img-fluid rounded" alt="Our Vision">
        </div>
    </div>
</div>  
        
    <!-- Team Section -->
<div class="mt-5 text-center">
    <h2>Meet Our Team</h2>
</div>

<!-- Enhanced background wrapper -->
<div class="team-section-wrapper mt-4">
    <div class="row text-center">
        <div class="col-md-4">
            <img src="images/p1.jpg" class="img-fluid rounded-circle" alt="Photo of John Doe, CEO and Founder">
            <h4>John Doe</h4>
            <p>CEO & Founder</p>
        </div>
        <div class="col-md-4">
            <img src="images/p2.jpg" class="img-fluid rounded-circle" alt="Photo of Jane Smith, Head of Operations">
            <h4>Jane Smith</h4>
            <p>Head of Operations</p>
        </div>
        <div class="col-md-4">
            <img src="images/p3.jpg" class="img-fluid rounded-circle" alt="Photo of Michael Brown, Lead Developer">
            <h4>Michael Brown</h4>
            <p>Lead Developer</p>
        </div>
    </div>
</div>

<div class="footer">
    <?php include_once 'footer.php';?>
</div>

</body>
</html>

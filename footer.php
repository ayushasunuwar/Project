<style>

/* Footer Styling */
footer {
    background-color: #333;
    color: white;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.footer-content p {
    font-size: 16px;
    margin-bottom: 10px;
}

/* Social Media Icons */
.social-media a {
    color: white;
    font-size: 24px;
    margin: 0 15px;
    transition: color 0.3s;
}

.social-media a:hover {
    color: #ff9900; /* or any brand color */
}


/* Terms and Conditions Link */
.terms-conditions {
    margin-top: 10px;
}

.terms-conditions a {
    color: #f4f4f4;
    font-size: 16px;
    text-decoration: none;
    transition: color 0.3s;
}

.terms-conditions a:hover {
    color: #ff9900;
}

/* Responsive Layout for Footer */
@media (max-width: 768px) {
    .footer-content {
        text-align: center;
    }

    .social-media {
        margin-top: 10px;
    }

    .social-media a {
        font-size: 20px;
        margin: 0 10px;
    }

    .terms-conditions a {
        font-size: 14px;
    }
}

</style>
<footer>
    <div class="footer-container">
        <div class="footer-content">
            <div class="social-media">
                <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <div class="terms-conditions">
                <a href="terms_conditions.php" target="_blank">Terms and Conditions</a>
                    <p>&copy; 2025 Record Keeping System. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

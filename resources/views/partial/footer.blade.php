<!-- resources/views/components/footer.blade.php -->
<footer class="footer">
    <div class="container">
        <div class="footer-about">
            <h3>MyWebsite</h3>
            <p>Your trusted source for services and information. We deliver quality and professionalism in every step.</p>
        </div>
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Service</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Other</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p>Email: info@mywebsite.com</p>
            <p>Phone: +855 123 456 789</p>
            <p>Address: Phnom Penh, Cambodia</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 MyWebsite. All Rights Reserved.</p>
    </div>
</footer>

<style>
/* Footer styling */
.footer {
    background-color: #2c3e50;
    color: white;
    font-family: Arial, sans-serif;
    padding: 40px 0 20px;
}

.footer .container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

/* About section */
.footer-about h3 {
    font-size: 24px;
    margin-bottom: 10px;
}

.footer-about p {
    line-height: 1.5;
    font-size: 16px;
}

/* Quick links */
.footer-links h4 {
    font-size: 20px;
    margin-bottom: 10px;
}

.footer-links ul {
    list-style: none;
}

.footer-links ul li {
    margin-bottom: 8px;
}

.footer-links ul li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links ul li a:hover {
    color: #f39c12;
}

/* Contact section */
.footer-contact h4 {
    font-size: 20px;
    margin-bottom: 10px;
}

.footer-contact p {
    margin-bottom: 8px;
}

/* Footer bottom */
.footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid #444;
    font-size: 14px;
}

/* Responsive */
@media (max-width: 768px) {
    .footer .container {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
}
</style>

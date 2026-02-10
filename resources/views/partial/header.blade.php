<style>
    /* ===== RESET (safe for Blade) ===== */
    body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    /* ===== NAVBAR ===== */
    .navbar {
        background-color: #2c3e50;
        color: white;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .navbar .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
    }

    /* ===== LOGO ===== */
    .navbar .logo {
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-decoration: none;
    }

    /* ===== NAV LINKS ===== */
    .navbar .nav-links {
        list-style: none;
        display: flex;
        gap: 25px;
        margin: 0;
        padding: 0;
    }

    .navbar .nav-links li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        transition: color 0.3s;
    }

    .navbar .nav-links li a:hover {
        color: #f39c12;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .navbar .nav-links {
            flex-direction: column;
            gap: 10px;
            background-color: #34495e;
            position: absolute;
            top: 60px;
            right: 0;
            width: 200px;
            padding: 10px;
            display: none;
        }
    }
</style>

<nav class="navbar">
    <div class="container">
        <a href="{{ url('/') }}" class="logo">MyWebsite</a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/service') }}">Service</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ url('/other') }}">Other</a></li>
        </ul>
    </div>
</nav>

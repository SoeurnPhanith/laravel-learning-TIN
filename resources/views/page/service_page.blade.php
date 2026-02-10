<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        /* navbar */
        nav{
            width:100%;
            background:#020617;
            box-shadow:0 6px 20px rgba(0,0,0,.4);
        }

        /* center content area */
        .content{
            height: calc(100vh - 64px); /* navbar height */
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .nav-container{
            max-width:1100px;
            margin:auto;
            padding:14px 20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        /* logo */
        .logo{
            color:#fff;
            font-size:22px;
            font-weight:bold;
            letter-spacing:1px;
            text-decoration:none;
        }

        /* menu */
        .menu{
            list-style:none;
            display:flex;
            gap:25px;
        }

        .menu li a{
            text-decoration:none;
            color:#cbd5f5;
            font-size:15px;
            font-weight:500;
            padding:8px 14px;
            border-radius:8px;
            transition:.25s ease;
        }

        .menu li a:hover{
            background:#6366f1;
            color:#fff;
        }

        /* responsive */
        @media(max-width:600px){
            .menu{
                gap:10px;
            }
        }
        
    </style>
</head>
<body>

    <!-- NAVBAR ONLY -->
    <nav>
        <div class="nav-container">
            <a href="" class="logo">MyWebsite</a>

            <ul class="menu">
                <li><a href={{url('/')}}>Home</a></li>
                <li><a href={{url('/about')}}>About</a></li>
                <li><a href={{url('/service')}}>Service</a></li>
                <li><a href={{url('/contact')}}>Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <h1>This is Service Page</h1>
    </div>

</body>
</html>

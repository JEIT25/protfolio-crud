<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('../styles/fonts.php') ?>
    <style>
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background-color: #1a114e;
            width: 100%;
            font-family: "Outfit", Arial, Helvetica, sans-serif;
        }

        nav .hero {
            font-size: 1.3rem;
            color: white;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .nav-links ul {
            display: flex;
            list-style-type: none;
            justify-content: space-around;
            background-color: #1a114e;
            margin: 0;
            padding: 0;
        }

        .nav-links ul li {
            padding-right: 2.7rem;
            padding-left: 2.7rem;
            font-size: 1.0625rem;
        }

        .nav-links ul li:hover {
            text-decoration: underline;
        }

        .hire-me-btn button {
            background-color: white;
            text-align: center;
            font-size: 1.063rem;
            font-weight: 600;
            color: #352886;
            padding: 0.5rem 2.5rem;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .hire-me-btn button:hover {
            background-color: #352886;
            color: #F86F03;
        }

        .IT {
            color: #F86F03;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: center;
                padding: 1rem;
            }

            .nav-links {
                display: none;
                width: 100%;
            }

            .nav-links.active {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .nav-links ul {
                flex-direction: column;
                width: 100%;
                padding: 1rem 0;
            }

            .nav-links ul li {
                padding: 1rem 0;
                text-align: center;
                width: 100%;
            }

            .menu-toggle {
                display: block;
                background-color: transparent;
                border: none;
                font-size: 1.5rem;
                padding: 0.5rem;
                cursor: pointer;
                margin-left: auto;
                color: white;
            }

            .hire-me-btn {
                margin-top: 1rem;
                width: 100%;
                text-align: center;
            }
        }

        /* Desktop Styles */
        @media (min-width: 769px) {
            .menu-toggle {
                display: none;
            }
        }
    </style>
    <title>Responsive Navbar</title>
</head>
<body>
    <nav>
        <section class="hero">
            <h1>JE<span class="IT">IT</span> DEV</h1>
        </section>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <section class="nav-links">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About Me</a></li>
                <li><a href="./services.php">Services</a></li>
                <li><a href="./skills.php">Skills</a></li>
                <li><a href="./portfolio.php">Portfolio</a></li>
            </ul>
        </section>
                    <section class="hire-me-btn">
                <button onclick="window.location.href = 'login.php'">HIRE ME</button>
            </section>
    </nav>

    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>
</body>
</html>

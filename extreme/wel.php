<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Training Platform</title>
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: #194759;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 2.5em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Navigation */
        nav {
            background-color: #333;
            padding: 15px 0;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            margin: 0 15px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Main Content Area */
        .main-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Text Content Section */
        .content {
            width: 50%;
            padding: 20px;
        }

        .content h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1.2em;
            margin-bottom: 40px;
            color: #555;
        }

        .btn {
            display: inline-block;
            background-color: #194759;
            color: white;
            padding: 15px 30px;
            margin: 10px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Image Section */
        .image-container {
            width: 50%;
            padding: 20px;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background-color: #194759;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 1em;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
                padding: 20px;
            }

            .content, .image-container {
                width: 100%;
            }

            .image-container {
                margin-top: 20px;
            }

            nav {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        Welcome to Our Web Training Platform
    </header>

    <!-- Navigation Bar -->
    <nav>
        <a href="#">Home</a>
        <a href="#">Courses</a>
        <a href="#">About Us</a>
        <a href="#">Contact</a>
        <a href="logout.php">Logout</a>
    </nav>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Text Content Section -->
        <div class="content">
            <h1>Learn Web Development with Us!</h1>
            <p>Master web development skills with courses in HTML, CSS, PHP, and more. Start your learning journey today!</p>
            <a href="login.php" class="btn">Log In</a>
            <a href="usereg.php" class="btn">Sign Up</a>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <img src="images.jpg" alt="Web Development Image">
        </div>
    </div>

    <footer>
        &copy; 2024 Web Training Platform. All Rights Reserved.
    </footer>

</body>
</html>

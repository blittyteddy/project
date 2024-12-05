<?php
include "examconnect.php";
session_start();

try {
    $pdo = new PDO($dbcon, $dbname, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<p style='color:blue;'>Database connection failed: " . $e->getMessage() . "</p>");
}

// Initialize error message
$error_message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']); // Sanitize input

    if($username == 'admin'){
        header("Location: admindash.php");
    }

    // Check if username is empty
    if (empty($username)) {
        $error_message = "Please enter your username.";
    } else {
        // Check the database for the user
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Valid username, create session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: userdashboard.php");
            exit; // Stop further script execution
        } else { 
            $error_message = "Invalid username. Please try again or <br></br> <a href='usereg.php'>Sign Up</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            background-color: white; /* Light background */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Header */
        header {
            background-color: #194759;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-bottom: 40px;
        }

        /* Login Container */
        .login-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
        }

        /* Form Styles */
        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 40%;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #194759;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }

        /* Image Styling */
        .image-container {
            width: 45%;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .form-container {
                width: 80%;
                margin-bottom: 20px;
            }

            .image-container {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header> Admin/User Login</header>

    <!-- Login Form -->
    <div class="login-container">
        <!-- Form Section -->
        <div class="form-container">
            <h1>Welcome Back!</h1>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Enter your username" required>
                <button type="submit">Login</button>
                <?php if (!empty($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <img src="web2.jpg" alt="Training Platform Image">
        </div>
    </div>

    <footer>
        &copy; 2024 Web Training Platform. All Rights Reserved.
    </footer>
</body>
</html>

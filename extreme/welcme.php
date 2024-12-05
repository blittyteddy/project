<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #9a9a9a;
            /* background: linear-gradient(135deg, #4facfe, #00f2fe); */
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }
        
        .welcome-container {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }
        .welcome-container h1 {
            font-size: 3em;
            margin: 0;
        }
        .welcome-container p {
            margin: 10px 0 30px;
            font-size: 1.2em;
            color: #f1f1f1;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .button {
            padding: 15px 30px;
            font-size: 1em;
            font-weight: bold;
            color: white;
            background: #007bff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .button:hover {
            background: #0056b3;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #f1f1f1;
        }
    </style>
</head>
<body>
    
    <div class="welcome-container">
        <h1>Welcome to Our System!</h1>
        <p>Your one-stop platform for managing and exploring.</p>
        <div class="button-container">
            <a href="usereg.php" class="button">Register</a>
            <a href="login.php" class="button">Login</a>
        </div>
    </div>
    <footer>&copy; 2024 Teddy's Project. All Rights Reserved.</footer>
</body>
</html>

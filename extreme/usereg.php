<?php
include "examconnect.php";
try {
    $pdo = new PDO($dbcon, $dbname, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $role = $_POST['role']; // Get the selected role (admin/student)

    // Insert user into the database with role
    $sql = "INSERT INTO users (name, phone_number, email, address, username, role) 
            VALUES (:name, :phone, :email, :address, :username, :role)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':address' => $address,
            ':username' => $username,
            ':role' => $role, 
        ]);
        header("Location: userdashboard.php");
        // echo "<p>Registration successful!</p>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "<p>Error: The email or username is already in use.</p>";
        } else {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Training Hub</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #c8d8e4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #0077b6;
            font-size: 2.5rem;
        }

        .form-container {
            max-width: 300px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #0077b6;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #005f8a;
        }

        .form-container p {
            margin-top: 20px;
            font-size: 1rem;
            color: #666;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #194759;
            color: white;
            font-size: 1rem;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Welcome to our Training Hub</h1>
    <div class="form-container">
        <h2>Register to Start Your Journey</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Full Name" required><br><br>
            <input type="text" name="phone" placeholder="Phone Number" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="text" name="address" placeholder="Address"><br><br>
            <input type="text" name="username" placeholder="Username" required><br><br>

            <!-- Role Selection Dropdown -->
            <label for="role">Select Role:</label>
            <select name="role" id="role" required>
                <option value="student" name="student">Student</option>
                <option value="admin">Admin</option>
            </select><br><br>

            <button type="submit">Register</button>
        </form>
    </div>

    <footer>
        <p>Already have an account? <a href="login.php"> Admin Login here</a></p>
    </footer>
</body>
</html>

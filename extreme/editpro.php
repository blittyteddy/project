<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
require_once 'examconnect.php';

// Fetch user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details from the database
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
            background: #f3f4f7;
            color: #333;
        }

        /* Sidebar styles */
        .sidebar {
            width: 220px;
            background: #333;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 1.5em;
            border-bottom: 1px solid #4facfe;
            padding-bottom: 10px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .sidebar ul li a i {
            margin-right: 10px;
            font-size: 1.2em;
        }

        .sidebar ul li a:hover {
            background: #4facfe;
        }

        /* Main content styles */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
        }

        .user-header {
            background: #333;
            padding: 20px;
            color: white;
            text-align: left;
        }

        .user-header h1 {
            margin: 0;
        }

        .edit-profile-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .edit-profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .edit-profile-container form {
            display: flex;
            flex-direction: column;
        }

        .edit-profile-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .edit-profile-container input[type="text"],
        .edit-profile-container input[type="email"],
        .edit-profile-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .edit-profile-container button {
            padding: 10px 15px;
            background: #4facfe;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-profile-container button:hover {
            background: #00aaff;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>User Panel</h2>
        <ul>
            <li><a href="pro.php"><i class="fas fa-user"></i>View Profile</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i>View Cart</a></li>
            <li><a href="#"><i class="fas fa-box"></i>Orders</a></li>
            <li><a href="#"><i class="fas fa-users"></i>Manage Users</a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i>Reports</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i>Site Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="user-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="edit-profile-container">
            <h2>Edit your details</h2>
            <form action="update.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

                <label for="password">New Password (Leave blank to keep current)</label>
                <input type="password" id="password" name="password">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

</body>
</html>

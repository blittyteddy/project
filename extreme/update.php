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

// Initialize variables for form data
$username = $name = $email = $password = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $username = trim($_POST['username']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    // Prepare SQL query for updating user details
    $query = "UPDATE users SET username = :username, name = :name, email = :email";
    
    // If password is provided, hash it and update the password as well
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password = :password";
    }

    $query .= " WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($query);

        // Bind the parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);

        // Bind password if provided
        if (!empty($password)) {
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        }

        // Execute the update query
        $stmt->execute();

        // Redirect to profile page with success message
        header("Location: pro.php?success=Profile updated successfully.");
        exit();
    } catch (PDOException $e) {
        // Handle errors and display message
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>

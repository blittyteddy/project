<?php
// Database connection (adjust with your own credentials)
$host = "localhost";
$dbname = "prep";  // Your database name
$username = "root";     // Your database username
$password = "";         // Your database password

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Capture the search query (if any)
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Fetch books based on the search term
    $stmt = $pdo->prepare("SELECT * FROM books WHERE title LIKE :search OR author LIKE :search");
    $stmt->execute(['search' => "%$search%"]);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if books were fetched
    if (empty($books)) {
        // echo "No books found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: white;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #194759;
            color: white;
            height: calc(100vh - 60px);
            position: fixed;
            top: 130px;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #333;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1em;
        }

        .sidebar ul li:hover {
            background-color: #007bff;
        }

        .sidebar ul li a:hover {
            color: #fff;
        }

        /* Top Bar */
        .top-bar {
            background-color: #c8d8e4;
            color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar .social-icons a {
            margin-left: 10px;
            color: #333;
            text-decoration: none;
            font-size: 1.2em;
        }

        .top-bar .social-icons a:hover {
            color: #007bff;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #194759;
            color: white;
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 10;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo img {
            height: 50px;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links li a {
            text-decoration: none;
            color: white;
            font-size: 1em;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .nav-links li a:hover {
            color: #ff0000;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 270px;
            margin-top: 20px;
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #194759;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .edit-btn, .delete-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .edit-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .save-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="contact-info">
            <span>(+256) 782420308</span> | 
            <span>teddy.sun.ac.ug</span>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Academia</a></li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
    
    <ul>
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="#"><i class="fas fa-book"></i> Books</a></li>
        <li><a href="#"><i class="fas fa-user"></i> Authors</a></li>
        <li><a href="#"><i class="fas fa-cogs"></i> Settings</a></li>
    </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <p>Stocked books</p>
        
        <!-- Search Form -->
        <form method="get" action="">
            <input type="text" name="search" placeholder="Search by title or author" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Table -->
        <table id="book-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book['id']; ?></td>
                        <td><?= $book['title']; ?></td>
                        <td><?= $book['author']; ?></td>
                        <td><?= $book['price']; ?></td>
                        <td>
                            <button class="edit-btn" onclick="editRow(this)">Edit</button>
                            <button class="delete-btn" onclick="deleteRow(this)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
    function editRow(button) {
        const row = button.closest('tr');
        const cells = row.querySelectorAll('td:not(:last-child)'); // Exclude the action cell

        if (button.textContent === 'Edit') {
            // Change button text to "Save"
            button.textContent = 'Save';

            // Convert table cells to input fields
            cells.forEach((cell, index) => {
                const originalText = cell.textContent;
                if (index !== 0) { // Skip the ID column
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = originalText.trim();
                    cell.textContent = ''; // Clear the cell
                    cell.appendChild(input);
                }
            });
        } else {
            // Change button text back to "Edit"
            button.textContent = 'Edit';

            // Collect updated data and replace input fields with text
            const updatedData = {};
            cells.forEach((cell, index) => {
                if (index !== 0) { // Skip the ID column
                    const input = cell.querySelector('input');
                    const updatedValue = input.value.trim();
                    updatedData[index] = updatedValue;
                    cell.textContent = updatedValue; // Replace input with text
                }
            });

            // Send updated data to the server (using AJAX or form submission)
            const bookId = cells[0].textContent.trim(); // Assuming the first cell contains the book ID
            console.log(`Updated data for book ID ${bookId}:`, updatedData);
            
            // Optionally, send the data to the server
            fetch('update_book.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: bookId, updatedData }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Update response:', data);
            })
            .catch(error => console.error('Error updating book:', error));
        }
    }

    function deleteRow(button) {
        const row = button.closest('tr');
        const bookId = row.querySelector('td').textContent.trim(); // Assuming first cell is the ID

        // Remove row from the table
        row.remove();

        // Optionally, delete the row from the database
        fetch('delete_book.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: bookId }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Delete response:', data);
        })
        .catch(error => console.error('Error deleting book:', error));
    }
</script>

</body>
</html>

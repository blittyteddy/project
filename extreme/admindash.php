<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
            padding: 0px;
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

        .user-dashboard {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        .card h2 {
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
        }

        .card button {
            padding: 10px 15px;
            border: none;
            background: #00f2fe;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .card button:hover {
            background: #4facfe;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>User Panel</h2>
        <ul>
            <li><a href="#"><i class="fas fa-user"></i>View Profile</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i>View Cart</a></li>
            <li><a href="#"><i class="fas fa-box"></i>Orders</a></li>
            <li><a href="#"><i class="fas fa-users"></i>Manage Users</a></li>
            <li><a href="#"><i class="fas fa-chart-line"></i>Reports</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i>Site Settings</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="user-header">
            <h1>Dashboard Overview</h1>
        </div>
        <div class="user-dashboard">
            <!-- Original Cards -->
            <div class="card">
                <h2>View Profile</h2>
                <p>Update your personal information.</p>
                <a href="pro.php">
        <button>Go</button>
    </a>
            </div>
            <div class="card">
                <h2>View Cart</h2>
                <p>See the books you’ve added.</p>
                <button>Go</button>
            </div>
            <div class="card">
                <h2>Orders</h2>
                <p>Check your previous orders.</p>
                <button>Go</button>
            </div>

            <!-- New Cards -->
            <div class="card">
                <h2>Total Users</h2>
                <p>1200 registered users</p>
            </div>
            <div class="card">
                <h2>Pending Orders</h2>
                <p>45 orders waiting</p>
            </div>
            <div class="card">
                <h2>Recent Activities</h2>
                <p>3 new orders placed today.</p>
            </div>
            <div class="card">
                <h2>System Alerts</h2>
                <p>No issues detected.</p>
            </div>
        </div>
    </div>
</body>
</html>

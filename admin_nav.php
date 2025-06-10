<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.bundle.min.js"></script>

    <style>
        /* Admin Navigation Bar Styling */
        .admin-nav {
            width: calc(100% - 250px);
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .1);
            color: black;
            position: fixed;
            top: 0;
            left: 250px;
            padding: 15px;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-nav h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .toggle-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 10px;
            display: none;
        }

        .search-box {
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 4px;
        }

        .search-box .search-btn {
            background-color: transparent;
            border: none;
            color: #555;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 5px;
            margin-right: 10px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .search-box .search-btn:hover {
            color: #007bff;
            transform: scale(1.1);
        }

        .search-box input {
            padding: 8px;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            outline: none;
            width: 250px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid white;
            transition: transform 0.3s ease;
        }

        .profile img:hover {
            transform: scale(1.1);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: #1e1e1e;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 4px 0px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .sidebar h4 {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 1.2rem;
            margin-bottom: 15px;
            border-radius: 8px;
            transition: background 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a:hover {
            background: #007bff;
            padding-left: 25px;
        }

        .sidebar a.active {
            background: #0056b3;
            padding-left: 25px;
        }

        .sidebar a.logout {
            position: absolute;
            bottom: 20px;
            right: 0.2rem;
            width: 100%;
            padding: 12px 20px;
            text-align: center;
            border-radius: 8px;
            background: #cc0000;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .sidebar a.logout:hover {
            background: #990000;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .admin-nav {
                left: 0;
                width: 100%;
            }

            .admin-nav h2 {
                font-size: 1rem;
            }

            .toggle-btn {
                display: block;
            }

            .search-box input {
                width: 200px;
            }

            .sidebar {
                width: 200px;
                position: absolute;
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }

        @media (max-width: 480px) {
            .admin-nav h2 {
                font-size: 1rem;
            }

            .search-box input {
                width: 150px;
            }

            .toggle-btn {
                display: block;
            }

            .profile img {
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>
<body>

<!-- Admin Navigation Bar -->
<nav class="admin-nav">
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
    <h2>Welcome, Admin</h2>
    <div class="search-box">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input type="text" placeholder="Search...">
    </div>
    <div class="profile" onclick="window.location.href='admin_setting.php'">
        <img src="images/p3.jpg" alt="Profile Picture">
    </div>
</nav>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <h4 class="text-center">Admin Panel</h4>
    <a href="admin_panel.php">Dashboard</a>
    <a href="user_admin.php">Users</a>
    <a href="emp_admin.php">Employees</a>
    <a href="admin_setting.php">Settings</a>
    <a href="logout.php" class="logout">Logout</a>
</aside>

<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPage = window.location.pathname.split("/").pop();
        let links = document.querySelectorAll(".sidebar a");

        links.forEach(link => {
            let linkPage = link.getAttribute("href");
            if (currentPage === linkPage) {
                link.classList.add("active");
            }
        });
    });

    function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const adminNav = document.querySelector(".admin-nav");

    // Toggle the sidebar visibility
    sidebar.classList.toggle("active");

    // Adjust the width of the admin navigation bar based on sidebar visibility
    if (sidebar.classList.contains("active")) {
        adminNav.style.width = "calc(100% - 200px)"; // Shrink navbar when sidebar is open
        adminNav.style.transform = "translateX(200px)"; // Move navbar to the right
        adminNav.style.paddingLeft = "20px"; // Add left spacing to the navbar
    } else {
        adminNav.style.width = "100%"; // Restore navbar width when sidebar is closed
        adminNav.style.transform = "translateX(0)"; // Restore navbar position
        adminNav.style.paddingLeft = "0"; // Remove left padding when sidebar is closed
    }
}
</script>

</body>
</html>

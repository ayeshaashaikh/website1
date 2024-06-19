<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    include "header.php";
}

// Check if user is logged in
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$isLoggedIn = !empty($username);

// Check if user is admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>

<header>
    <div class="container">
        <div class="logo"></div>
        <nav>
            <ul>
                <?php if ($isAdmin): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php">Home</a></li>
                <?php if ($isLoggedIn): ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="logout"><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<style>
header .container {
    display: flex;
    color: white;
    justify-content: space-between;
    align-items: center; /* Align items vertically */
    padding-top: 20px; /* Adjusted padding for better spacing */
    padding-bottom: 15px;
  
    background-color: rgba(4,36,61,255);


    margin-left: 600px;
}

nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-right: 20px; /* Add space between menu items */
}

nav ul li.logout {
    margin-left: auto; /* Push the logout link to the right */
    margin-right:50px;
}

nav ul li a {
    text-decoration: none;
    color: #ffffff;
    transition: color 0.3s;
}

header {
    background-color:rgba(4,36,61,255);
    margin-right:700px;
}
</style>

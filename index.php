<?php
include "db.php";
session_start(); // Start the session

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch profile picture URL from the database
    $stmt = $conn->prepare("SELECT profile_picture FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($profilePicture);
    $stmt->fetch();
    $stmt->close();
    
    // Use default profile picture if not set
    if (empty($profilePicture)) {
        $profilePicture = 'image/default-profile.png'; // Adjust path as per your directory structure
    } else {
        $profilePicture = 'image/' . $profilePicture; // Adjust path as per your directory structure
    }
} else {
    $profilePicture = 'image/default-profile.png'; // Default profile picture path
}
?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>

<section class="hero">
    <div class="container">
        <div class="content-wrapper">
            <div class="hero-content">
                <div class="text">
                    <?php if (isset($_SESSION['username'])): ?>
                        <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                    <?php else: ?>
                        <h1>Welcome to ERP!</h1>
                    <?php endif; ?>
                    <h1 id="middle">A website to manage <br> records, fees, and <br> schedule.</h1>
                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="#" id="get-started-btn" class="btn">Get Started</a>
                    <?php else: ?>
                        <a href="register.php" class="btn">Get Started</a>
                    <?php endif; ?>
                </div>
                <!--- <img src="image/home.jpg" alt=""> -->
            </div>
            <?php if (isset($_SESSION['username'])): ?>
                <button id="menu-toggle" class="menu-toggle">☰</button>
                <aside id="menu" class="menu">
                    <div class="profile-section">
                        <img src="<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Picture" class="profile-picture">
                        <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                    </div>
                    <ul>
                        <li><a href="fees.php">Fees</a></li>
                        <li><a href="schedule.php">Schedule</a></li>
                        <li><a href="learning_material.php">Learning Material</a></li>
                        <li><a href="learning_material.php">PYQ's</a></li>
                    </ul>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="about" class="about">
    <div class="container">
        <div class="about-content">
            <h2>About this Website</h2>
            <p>Welcome to my Educational Resource Platform (ERP), which empowers students and educators alike through seamless access to educational materials, records management, and essential administrative tools. This website strives to streamline the learning process and administrative tasks, ensuring a smooth and efficient educational experience for all users.</p>
            <div class="features">
                <h3>What We Offer</h3>
                <ul>
                    <li><strong>Student Records Management:</strong> Easily access and manage student profiles.</li>
                    <li><strong>Learning Materials:</strong> Explore a vast library of learning resources, including notes, textbooks, and PYQs.</li>
                    <li><strong>Administrative Tools:</strong> Simplify administrative tasks with tools designed to streamline fee management, schedules, and communication.</li>
                </ul>
            </div>
            <p class="contact-info">Contact: 7387220667</p>
            <p class="contact-info">Email: shaikhaayesha26@gmail.com</p>

        </div>
    </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var menu = document.getElementById('menu');
    var getStartedBtn = document.getElementById('get-started-btn');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('open');
    });

    if (getStartedBtn) {
        getStartedBtn.addEventListener('click', function(e) {
            e.preventDefault();
            menu.classList.add('open');
        });
    }
});
</script>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background-color: rgba(4, 36, 61, 255);
}
.btn {
    display: inline-block;
    padding: 12px 24px;
    background: #00c5c9;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.header {
    padding: 1rem;
}

.header nav ul {
    list-style-type: none;
    display: flex;
    justify-content: flex-end;
    margin: 0;
    padding: 0;
}

.header nav ul li {
    margin-left: 1rem;
}

.header nav ul li a {
    text-decoration: none;
    color: #000;
}

.hero {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    background-color: rgba(4, 36, 61, 255);
    color: white;
}

.hero-content {
    text-align: center;
    color: white;
}

.get-started {
    background: #00c5c9;
    border: none;
    padding: 1rem 2rem;
    color: white;
    cursor: pointer;
}

.menu-toggle {
    position: fixed;
    top: 1rem;
    right: 1rem;
    background-color: rgba(4, 36, 61, 255);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    font-size: 1.5rem;
    z-index: 1000;
}

.menu {
    position: fixed;
    top: 0;
    right: -300px; /* Initially hidden off-screen */
    width: 300px;
    height: 100%;
    background: white;
    padding: 2rem;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: right 0.3s ease;
    z-index: 999;
}

.menu h2 {
    margin-top: 0;
}

.menu ul li {
    margin-bottom: 1rem;
}

.menu ul li a:hover {
    opacity: 0.8;
}

.menu.open {
    right: 0; /* When open, the menu will slide in */
}

.about {
    padding: 2rem;
    background: #f9f9f9;
    text-align: center;
    background-color: rgba(4, 36, 61, 255);
}

.about h2 {
    margin-top: 0;
    color: white;
}

.about p {
    max-width: 600px;
    margin: 0 auto;
    color: white;
}

.profile-section {
    text-align: center;
    margin-bottom: 1rem;
}

.profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-left:80px;
}

.profile-section h2 {
    margin-top: 0.5rem;
    color: black;
}

.about {
    padding: 5rem 10rem; /* Adjusted padding */
    margin:250px;
    
    background: #f9f9f9;
    text-align: center;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.8);
    border-radius:30px;
}

.about .about-box {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px; /* Adjusted max-width */
    margin: 0 auto;
    
}

.about h2 {
    font-size: 2.5rem;
    color: #333333;
    margin-bottom: 1.5rem;
    font-weight:bold;
   
}

.about p {
    font-size: 1.4rem;
    line-height: 1.6;
    color: black;
}

.features {
   
    text-align: left;
    
}

.features h3 {
    font-size: 2.5rem;
    color: #333333;
    margin-bottom: 1.5rem;
    text-align:center;
    font-weight:bold;
}

.features ul {
    list-style-type: none;
    padding-left: 0;
   
}

.features ul li {
    font-size: 1.4rem;
    color: black;
    margin-bottom: 1rem;
    
}

.features ul li strong {
    font-weight: bold;
    justify-content:space-between;
}
.contact-info {
    font-size: 1.2rem;
    color: #333333;
    margin-top: 2rem;
}
</style>

<?php include "footer.php"; ?>

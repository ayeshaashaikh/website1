<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "db.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<?php include "header.php" ?>
<?php include "navigation.php" ?>

<section class="profile">
    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-card">
            <div class="profile-picture">
            <img src="image/<?php echo $user['profile_picture']; ?>" alt="Profile Picture">

                <p>JPG or PNG no larger than 5 MB</p>
                <form action="upload_profile_picture.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="profile_picture" id="profile_picture">
                    <button type="submit" class="btn">Upload new image</button>
                </form>
            </div>
            <div class="profile-info">
                <form action="update_profile.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="tel" id="phone_no" name="phone_no" value="<?php echo $user['phone_no']; ?>">
                    </div>
                    <button type="submit" class="btn">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .profile {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .profile .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-card {
        display: flex;
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        width: 80%;
        max-width: 900px;
        margin-top: 20px;
    }

    .profile-picture, .profile-info {
        padding: 20px;
        width: 50%;
    }

    .profile-picture {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-right: 1px solid #ddd;
    }

    .profile-picture img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
    }

    .profile-picture p {
        margin: 10px 0;
    }

    .profile-info form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .btn {
        background: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background: #0056b3;
    }
</style>

</body>
</html>

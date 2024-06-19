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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the directory where uploaded files will be stored
    $targetDirectory = "image/";

    // Get the filename and temporary filepath of the uploaded file
    $targetFile = $targetDirectory . basename($_FILES["profile_picture"]["name"]);
    $tempFilePath = $_FILES["profile_picture"]["tmp_name"];

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        exit();
    }

    // Check file size (adjust the limit as needed)
    if ($_FILES["profile_picture"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        exit();
    }

    // Allow only specific file formats (you can customize this)
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    $fileFormat = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileFormat, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($tempFilePath, $targetFile)) {
        // File uploaded successfully
        // Update the profile picture path in the database
        $username = $_SESSION['username'];
        $profilePicturePath = basename($targetFile);
        $sql = "UPDATE users SET profile_picture = '$profilePicturePath' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
            // Profile picture updated successfully
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating profile picture: " . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<?php include "db.php"; ?>

<?php
// Step 1: Form Data Handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "student";
    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $phone_no = $_POST["phone_no"];
    $year_of_study = $_POST["year_of_study"]; // Set the default role to 'student'

    // Step 2: Form Validation
    $errors = array();
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check if username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Username already exists.";
    }

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Email already exists.";
    }

    // If there are no validation errors, proceed with database interaction
    if (empty($errors)) {
        // Prepare and execute SQL INSERT statement
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password, role, first_name, last_name, phone_no, year_of_study) VALUES ('$username', '$email', '$hashed_password', '$role', '$firstname', '$lastname', '$phone_no', '$year_of_study')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);

            // Step 4: Redirect
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// If there are validation errors or form not submitted via POST method, display errors and redirect back to registration page
if (!empty($errors)) {
    // Redirect back to registration page with error messages in query parameters
    $error_messages = implode("<br>", $errors);
    header("Location: register.php?error=" . urlencode($error_messages));
    exit();
}
?>

<?php
include "db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $error = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Generate reset token
        $token = bin2hex(random_bytes(50));

        // Store token in the database (assuming you have a `password_resets` table)
        $sql = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
        if (mysqli_query($conn, $sql)) {
            // Send the email
            $resetLink = "http://localhost/tuition/reset_password.php?token=$token";


            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'shaikhaayesha26@gmail.com';
                $mail->Password = 'yamn rnoj moof jggh'; // Use your app password here
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('shaikhaayesha26@gmail.com', 'Your Name');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = "Click <a href='$resetLink'>here</a> to reset your password.";
                $mail->AltBody = "Click the following link to reset your password: $resetLink";

                $mail->send();
                echo 'Password reset link has been sent to your email.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error = "Failed to initiate password reset. Please try again.";
        }
    }

    if (!empty($error)) {
        header("Location: forgot_password.php?error=" . urlencode($error));
        exit();
    }
}
?>

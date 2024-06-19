<?php include "db.php"; ?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>

<style>
    .forgot-password-form {
        max-width: 500px;
        margin: auto;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #5c43e7;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    
    .btn:hover {
        background-color: #3b32b3;
    }
</style>

<section class="forgot-password">
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="post" action="forgot_password_process.php" class="forgot-password-form">
            <div class="form-group">
                <label for="email">Enter your email address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</section>

</body>
</html>

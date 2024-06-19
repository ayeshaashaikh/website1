<?php include "db.php"; ?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>
<style>
    .login{
        background-color: rgba(4, 36, 61, 255);
    }
    .login .container {
    max-width: 600px; /* Adjust the width of the container */
    padding: 20px;
    background-color: #f9f9f9;
    border-radius:30px;

    box-shadow: 0 0 20px rgba(0, 255, 255, 0.8);

}
    .login-link {
        margin-top: 20px;
        text-align: center;
        
    }
    
    .login-link a {
        color: #5c43e7;
        text-decoration: none;
    }
    
    .login-link a:hover {
        text-decoration: underline;
    }

    .forgot-password {
        margin-top: 10px;
        text-align: right;
    }

    .forgot-password a {
        color: #5c43e7;
        text-decoration: none;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }
</style>
<section class="login">
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="login_process.php" class="registration-form">
            <div class="form-group">
                <label for="username">Username or email:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <div class="forgot-password">
                    <a href="forgot_password.php">Forgot password?</a>
                </div>
            </div>
            <div class="form-group">
                <label for="year_of_study">Year of Study:</label>
                <select id="year_of_study" name="year_of_study">
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                </select>
            </div>
           
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="login-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</section>

</body>
</html>

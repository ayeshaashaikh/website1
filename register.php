<?php include "db.php" ?>
<?php include "header.php" ?>
<?php include "navigation.php" ?>

<style>
    .registration {
    padding: 50px 0;
    background-color: rgba(4, 36, 61, 255);
}
.registration .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 30px;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.8);

}

    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
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
</style>

<section class="registration">
    <div class="container">
        <h2>Registration</h2>
        <form method="post" action="register_process.php" class="registration-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Username is required') !== false) { ?>
                    <div class="error">Username is required.</div>
                <?php } ?>
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Username already exists') !== false) { ?>
                    <div class="error">Username already exists.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Password is required') !== false) { ?>
                    <div class="error">Password is required.</div>
                <?php } ?>
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'password should be between 8-20 characters') !== false) { ?>
                    <div class="error">Password should be between 8-20 characters.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Email is required') !== false) { ?>
                    <div class="error">Email is required.</div>
                <?php } ?>
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Invalid email format') !== false) { ?>
                    <div class="error">Invalid email format.</div>
                <?php } ?>
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Email already exists') !== false) { ?>
                    <div class="error">Email already exists.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'First name is required') !== false) { ?>
                    <div class="error">First name is required.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Last name is required') !== false) { ?>
                    <div class="error">Last name is required.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="phone">Phone No.:</label>
                <input type="tel" id="phone" name="phone">
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Phone number is required') !== false) { ?>
                    <div class="error">Phone number is required.</div>
                <?php } ?>
                <?php if (isset($_GET['error']) && strpos($_GET['error'], 'Invalid phone number format') !== false) { ?>
                    <div class="error">Invalid phone number format.</div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="year_of_study">Year of Study:</label>
                <select id="year_of_study" name="year_of_study">
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                </select>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </div>
</section>

<?php include "footer.php" ?>

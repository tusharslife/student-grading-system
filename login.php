

<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="css/login-style.css">  
    </head>
    <body>
        <div class="center">
            <h1>Login</h1>
            <center>
            <h4>
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];

                ?>
            </h4>
            </center>
            <form method="POST" action="login_check.php">
                <div class="txt_field">
                    <input type="text" name="username" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="pass"><a href="forget.php">Forgot Password?</a></div>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>
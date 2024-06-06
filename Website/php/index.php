<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <title> Login </title>
    </head>
    
    <body>
        
        <div class = "navbar">
        <img src="../images/NottsLogo.png" class = "logo">
            <ul>
                <li><a href="../php/signup.php"> Signup </a></li>
            </ul>
        </div>
        
        <div class = "login">
            <div class="signup_link"></div>
            <h1>Login</h1>
            <div class="signup_link">
                <?php
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == 'InvalidUsername') {
                            echo "<center><p>Username does not exist</p></center>";
                        } else if ($_GET["error"] == 'IncorrectPassword') { 
                            echo "<center><p>Incorrect Password</p></center>";
                        }
                    }
                ?>
            </div>
            <form action="../php/loginCheck.php" method="post">
                <div class = "text_field">
                    <input type="text" required name="username">
                    <span></span>
                    <label>Username</label>
                </div>
            
            <div class = "text_field">
                <input type="password" required name="password">
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value = "Login" name="Login">
            <div class="signup_link">
                Not Registered? <a href="../php/signup.php"> Signup </a>
            </div>
        </form>
        </div>
        
    </body>

</html>
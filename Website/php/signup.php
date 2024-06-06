<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
        <link rel="stylesheet" href="../css/style.css">
        <title> Signup </title>
    </head>

    <body>

        <div class = "navbar">
            <img src="../images/NottsLogo.png" class = "logo">
            <ul>
                <li><a href="../php/index.php"> Login </a></li>
            </ul>
        </div>

        <div class = "login">
            <div class="signup_link"></div>

            <h1>Sign up</h1>

            <div class="signup_link">
                <?php
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "usernametaken") {
                            echo "<center><p>This Username is Taken</p><center>";
                        }
                    }
                ?>
            </div>

            <form action="../php/signupCheck.php" method="post">

                <div class = "text_field">
                    <input type="text" required name = "username">
                    <span></span>
                    <label>Username</label>
                </div>
            
            <div class = "text_field">
                <input type="password" required name = "password">
                <span></span>
                <label>Password</label>
            </div>

            <div class = "text_field">
                <input type="text" required name = "firstname">
                <span></span>
                <label>First Name</label>
            </div>

            <div class = "text_field">
                <input type="text" required name = "lastname">
                <span></span>
                <label>Last Name</label>
            </div>

            <input type="submit" value = "Submit" name = "Signup">
            <div class="signup_link">
                Already Registered? <a href="../php/index.php"> Login </a>
            </div>
        </form>

        </div>

    </body>

</html>
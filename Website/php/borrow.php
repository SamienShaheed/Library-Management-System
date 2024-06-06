<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "library";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $bookID = $_GET['bid']; // Get Book ID from URL

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Library Search </title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class = "navbar">
            <img src="../images/NottsLogo.png" class = "logo">
            <ul>
                <li><a href="../html/homepage.html">Home</a></li>
            </ul>
        </div>

        <div class="login">

            <div class="signup_link"></div>

            <center><h1> Borrow </h1></center>

            <form <?php echo "action='../php/borrowDetails.php?bid=$bookID'"?> method="post">  
                <div class="text_field">
                    <input type="text" name="memberID" required placeholder="Please Enter Your Member ID:  ">
                </div>

                <input type="submit" value="Submit" name="Borrow">
                <div class="signup_link"></div>
            </form>
        </div>        
    </body>
</html>
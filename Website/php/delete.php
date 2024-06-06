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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf=8">
        <link rel="stylesheet" href="../css/style.css">
        <title> Record Deleted </title>
    </head>

    <body>
        <div class = "navbar">
            <img src="../images/NottsLogo.png" class = "logo">
            <ul>
                <li><a href="../html/homepage.html"> Home </a></li>
            </ul>
        </div>

        <div class="login">
            <div class="signup_link">            
                    <?php
                        if(isset($_GET['bid'])) {
                            $bookID = $_GET['bid'];
                            $sql = "DELETE borrow, book FROM borrow
                            INNER JOIN book ON borrow.book_id = book.book_id
                            WHERE borrow.book_id = '$bookID'";
                            $result = $conn->query($sql);
                            if ($result) {
                                ?>
                                    Deleted Book successfully <br>
                                    <a href="../php/librarySearch.php">  Back to Search </a>
                                <?php    
                            }

                        } else if (isset($_GET['mid'])) {
                            $memberID = $_GET['mid'];
                            $sql = "DELETE FROM member WHERE member_id='$memberID'";
                            $result = $conn->query($sql);
                            if ($result) {
                                ?>
                                    Deleted Member successfully <br>
                                    <a href="../php/memberSearch.php">  Back to Search </a>
                                <?php    
                            }
                        }


                    ?>
            </div>
        </div>

    </body>
</html>


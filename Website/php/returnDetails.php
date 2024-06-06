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
        <title> Return Receipt </title>
    </head>

    <body>
        <div class = "navbar">
            <img src="../images/NottsLogo.png" class = "logo">
            <ul>
                <li><a href="../html/homepage.html"> Home </a></li>
            </ul>
        </div>

        <div class="login">

            <div class="signup_link"></div>
            <h1> Return Receipt </h1>

            <div class="signup_link" style="color:black">
                <?php
                    if(isset($_POST['Return'])) {
                        $borrowerID = $_POST['borrowid'];
                        $memberID = $_POST['memberid'];
                        $bookID = $_POST['bookid'];
                        $currentDateTime = date('Y-m-d H:i:s');
                        
                        $sql = "SELECT * FROM borrow WHERE borrow_id='$borrowerID'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            $sql = "UPDATE borrow 
                            SET borrow_status = 'returned',
                            date_return = '$currentDateTime'
                            WHERE borrow_id = '$borrowerID'";
                            $result = $conn->query($sql);
                            
                            if($result) {
                                $sql = "SELECT * FROM borrow 
                                INNER JOIN book ON borrow.book_id = book.book_id
                                WHERE borrow.book_id = '$bookID'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $borrowID = $row['borrow_id'];
                                $bookTitle = $row['book_title'];
                                $author = $row['author'];
                                $publisher = $row['publisher_name'];
                                ?>
                                    <strong> Borrow ID: </strong> <?php echo $borrowID ?> <br>
                                    <strong> Member ID: </strong> <?php echo $memberID ?> <br>
                                    <strong> Book Title: </strong> <?php echo $bookTitle ?> <br>
                                    <strong> Author: </strong> <?php echo $author ?> <br>
                                    <strong> Publisher: </strong> <?php echo $publisher ?> <br>
                                <?php
                            } else {
                                header("location: ../php/returnbook.php");
                                exit();
                            }
                        } else {
                            header("location: ../php/returnbook.php");
                            exit();
                        }


                        
                    }
                ?>
            </div>
        </div>
    </body>

</html>
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
        <meta charset="utf=8">
        <link rel="stylesheet" href="../css/style.css">
        <title> Borrow Receipt </title>
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
            <h1> Borrow Receipt </h1>

            <div class="signup_link" style="color:black">
                <?php
                    if(isset($_POST['Borrow'])) {
                        $memberID = $_POST['memberID'];
                        $currentDateTime = date('Y-m-d H:i:s'); // Local time of computer
                        $dueDate = date('Y/m/d', strtotime('+1 week', (int)$currentDateTime)); // 1 week after the local time

                        $sql = "INSERT INTO borrow(member_id, date_borrow, due_date, book_id, borrow_status, date_return)
                        VALUES('$memberID', '$currentDateTime', '$dueDate', '$bookID', 'pending', '0000-00-00 00:00:00')";
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
                            header("location: ../php/borrow.php");
                            exit();
                        }
                    }

                ?>
            </div>
        </div>
    </body>

</html>

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
            <title> Add Book </title>
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

    if(isset($_POST['AddBook'])) {
        // Store data from form into variables
        $bookTitle = $_POST['bookTitle'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $book_pub = $_POST['book_pub'];
        $publisher_name = $_POST['publisher_name'];
        $isbn = $_POST['isbn'];
        $copyright_year = $_POST['copyright_year'];
        $status = $_POST['status'];
        $currentDateTime = date('Y-m-d H:i:s');

        // Run sql code to search if book exists
        $sql = "SELECT * from book
        WHERE book_title = '$bookTitle' AND
        category_id = '$category' AND
        author = '$author' AND
        book_pub = '$book_pub' AND
        publisher_name = '$publisher_name' AND
        isbn = '$isbn' AND
        copyright_year = '$copyright_year' AND
        status = '$status'";

        $result = $conn->query($sql);
        if($result->num_rows > 0) { // If the book exists
            $row = mysqli_fetch_assoc($result);
            $bookID = $row['book_id'];
            // Increment book_copies field by 1
            $sql = "UPDATE book SET book_copies = book_copies + 1";

            $result = $conn->query($sql);
            if($result) { // if sql code successfully runs
                ?>
                   Book already exists in the library. Number of copies have been updated. <br>
                   <a href="../html/homepage.html">  Back to Home </a>
                <?php
            } else { // Otherwise
                header("location: ../php/addBookForm.php");
                exit();
            }
        } else { // If book does not exist
            // Run sql code to insert a new record
            $sql = "INSERT INTO book(book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status)
            VALUES ('$bookTitle', 
            '$category', 
            '$author', 
            1, 
            '$book_pub', 
            '$publisher_name', 
            '$isbn', 
            '$copyright_year', 
            '$currentDateTime', 
            '$status')";
            $result = $conn->query($sql);
            if($result) { // If add book was successful
                ?>
                    Book has been successfully added to the library <br>
                   <a href="../html/homepage.html">  Back to Home </a>
                <?php
            } else { // Otherwise
                header("location: ../php/addBookForm.php");
                exit();
            }
        }
    }
?>  
            </div>
        </div>
    </body>

</html>

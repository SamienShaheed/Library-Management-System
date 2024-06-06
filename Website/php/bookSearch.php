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
        <title> Library Search </title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class="banner">
            
            <div class = "navbar">
                <img src="../images/NottsLogo.png" class = "logo">
                <ul>
                    <li><a href="../html/homepage.html">Home</a></li>
                    <li><a href="../php/librarySearch.php">Search Library</a></li>
                    <li><a href="../php/memberSearch.php">Search Members</a></li>
                </ul>
            </div>
    
            <div class="search">
            <center>    
            <table class="searchTable"> 
                    <thead>
                        <tr>
                            <th> Book ID </th>
                            <th> Book Title </th>
                            <th> Category </th>
                            <th> Author </th>
                            <th> Book Copies </th>
                            <th> Publisher Name </th>
                            <th> ISBN </th>
                            <th> Copyright Year </th>
                            <th> Status </th>
                            <th> Borrow Status </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <!-- Search by book title -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM book 
                            INNER JOIN category ON book.category_id = category.category_id
                            WHERE book.book_title = '$search'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                <td> <?php echo $row['book_id'];?> </td>
                                <td> <?php echo $row['book_title'];?> </td>
                                <td> <?php echo $row['classname'];?> </td>
                                <td> <?php echo $row['author'];?> </td>
                                <td> <?php echo $row['book_copies'];?> </td>
                                <td> <?php echo $row['publisher_name'];?> </td>
                                <td> <?php echo $row['isbn'];?> </td>
                                <td> <?php echo $row['copyright_year'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                </tr>
                            <?php
                                }
                            }
                        } else {
                            header("location: ../php/librarySearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by book author -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM book 
                            INNER JOIN category ON book.category_id = category.category_id
                            WHERE book.author = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row['book_id'];?> </td>
                                <td> <?php echo $row['book_title'];?> </td>
                                <td> <?php echo $row['classname'];?> </td>
                                <td> <?php echo $row['author'];?> </td>
                                <td> <?php echo $row['book_copies'];?> </td>
                                <td> <?php echo $row['publisher_name'];?> </td>
                                <td> <?php echo $row['isbn'];?> </td>
                                <td> <?php echo $row['copyright_year'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        } else {
                            header("location: ../php/librarySearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by book ISBN -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM book 
                            INNER JOIN category ON book.category_id = category.category_id
                            WHERE book.isbn = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row['book_id'];?> </td>
                                <td> <?php echo $row['book_title'];?> </td>
                                <td> <?php echo $row['classname'];?> </td>
                                <td> <?php echo $row['author'];?> </td>
                                <td> <?php echo $row['book_copies'];?> </td>
                                <td> <?php echo $row['publisher_name'];?> </td>
                                <td> <?php echo $row['isbn'];?> </td>
                                <td> <?php echo $row['copyright_year'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        } else {
                            header("location: ../php/librarySearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by Publisher Name -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM book 
                            INNER JOIN category ON book.category_id = category.category_id
                            WHERE book.publisher_name = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row['book_id'];?> </td>
                                <td> <?php echo $row['book_title'];?> </td>
                                <td> <?php echo $row['classname'];?> </td>
                                <td> <?php echo $row['author'];?> </td>
                                <td> <?php echo $row['book_copies'];?> </td>
                                <td> <?php echo $row['publisher_name'];?> </td>
                                <td> <?php echo $row['isbn'];?> </td>
                                <td> <?php echo $row['copyright_year'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        } else {
                            header("location: ../php/librarySearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by Category -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];

                            if($status == 'None') {

                                $sql = "SELECT * FROM book 
                                INNER JOIN category ON book.category_id = category.category_id
                                WHERE book.category_id='$category'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row['book_id'];?> </td>
                                    <td> <?php echo $row['book_title'];?> </td>
                                    <td> <?php echo $row['classname'];?> </td>
                                    <td> <?php echo $row['author'];?> </td>
                                    <td> <?php echo $row['book_copies'];?> </td>
                                    <td> <?php echo $row['publisher_name'];?> </td>
                                    <td> <?php echo $row['isbn'];?> </td>
                                    <td> <?php echo $row['copyright_year'];?> </td>
                                    <td> <?php echo $row['status'];?> </td>
                                    <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            } else {
                                $sql = "SELECT * FROM book 
                                INNER JOIN category ON book.category_id = category.category_id
                                WHERE book.category_id='$category' AND book.status='$status'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row['book_id'];?> </td>
                                    <td> <?php echo $row['book_title'];?> </td>
                                    <td> <?php echo $row['classname'];?> </td>
                                    <td> <?php echo $row['author'];?> </td>
                                    <td> <?php echo $row['book_copies'];?> </td>
                                    <td> <?php echo $row['publisher_name'];?> </td>
                                    <td> <?php echo $row['isbn'];?> </td>
                                    <td> <?php echo $row['copyright_year'];?> </td>
                                    <td> <?php echo $row['status'];?> </td>
                                    <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            }
                            
                        } else {
                            header("location: ../php/librarySearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by Status -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $category = $_POST['Category'];
                            $status = $_POST['Status'];

                            if($category == '0') {

                                $sql = "SELECT * FROM book 
                                INNER JOIN category ON book.category_id = category.category_id
                                WHERE book.status = '$status'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row['book_id'];?> </td>
                                    <td> <?php echo $row['book_title'];?> </td>
                                    <td> <?php echo $row['classname'];?> </td>
                                    <td> <?php echo $row['author'];?> </td>
                                    <td> <?php echo $row['book_copies'];?> </td>
                                    <td> <?php echo $row['publisher_name'];?> </td>
                                    <td> <?php echo $row['isbn'];?> </td>
                                    <td> <?php echo $row['copyright_year'];?> </td>
                                    <td> <?php echo $row['status'];?> </td>
                                    <td> <?php 
                                        $bookID = $row['book_id'];
                                        $status = $row['status'];

                                        if($status == 'Damage' || $status == 'Lost'){
                                            ?>
                                                Not Available
                                            <?php
                                        } else {
                                            $query = "SELECT * FROM borrow WHERE book_id = '$bookID'";
                                            $search = $conn->query($query);
                                            $borrowedFlag = 0;

                                            if($search->num_rows > 0) {
                                                while($record = $search->fetch_assoc()) {
                                                    if($record['borrow_status'] === 'pending') {
                                                        $borrowedFlag = 1;
                                                    }
                                                }

                                                if($borrowedFlag == 0) {
    
                                                    ?>
                                                        <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        Not Available
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <a class="signup_link" <?php echo "href='../php/borrow.php?bid=$bookID'"?>> Available </a>
                                                <?php
                                            }
                                        }
                                    ?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?bid=$row[book_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            
                        } 
                            }  else {
                                header("location: ../php/librarySearch.php?error=NoRecords");
                                exit();
                            }
                        ?>
                </table> </center>
            </div>

        </div>    

    </body>
        
</html>
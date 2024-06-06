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
                            <th> Member ID </th>
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Gender </th>
                            <th> Address </th>
                            <th> Contact </th>
                            <th> Type </th>
                            <th> Year Level </th>
                            <th> Status </th>
                            <th> Update </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <!-- Search by member first name -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE firstname = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                            <?php
                                }
                            }
                        } else {
                            header("location: ../php/memberSearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by member last name -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE member.lastname = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        } else {
                            header("location: ../php/memberSearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by member address -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];
                            
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE address = '$search' ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        } else {
                            header("location: ../php/memberSearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                   
                    <!-- Search by Gender -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];
                            $type = $_POST['Type'];

                            if($status == 'None' && $yearLevel == 'None' && $type == '0') {

                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE gender='$gender'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?> > Update </a></td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            } else if($status != 'None' && $yearLevel== 'None' && $type == '0'){

                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE gender='$gender' AND status='$status'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            } else if($status == 'None' && $yearLevel != 'None' && $type == '0'){
                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE gender='$gender' AND year_level='$yearLevel'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            
                        } else if($status == 'None' && $yearLevel == 'None' && $type != '0'){
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE gender='$gender' AND member.type_id='$type'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        
                        } else if($status != 'None' && $yearLevel != 'None' && $type == '0'){
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE gender='$gender' AND year_level='$yearLevel' AND status='$status'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        
                        } else if($status == 'None' && $yearLevel != 'None' && $type != '0'){
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE gender='$gender' AND year_level='$yearLevel' AND member.type_id='$type'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        
                        }  else if($status != 'None' && $yearLevel == 'None' && $type != '0'){
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE gender='$gender' AND status='$status' AND member.type_id='$type'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                    ?>
                                <tr>
                                <td> <?php echo $row["member_id"];?> </td>
                                <td> <?php echo $row["firstname"];?> </td>
                                <td> <?php echo $row["lastname"];?> </td>
                                <td> <?php echo $row["gender"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td> <?php echo $row["contact"];?> </td>
                                <td> <?php echo $row["borrowertype"];?> </td>
                                <td> <?php echo $row["year_level"];?> </td>
                                <td> <?php echo $row["status"];?> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                </tr>
                    <?php
                                }
                            }
                        
                        } else {
                            $sql = "SELECT * FROM member 
                            INNER JOIN `type` ON member.type_id = type.type_id
                            WHERE gender='$gender' AND year_level='$yearLevel' AND status='$status' AND member.type_id='$type'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            } 
                        } else {
                            header("location: ../php/memberSearch.php?error=NoRecords");
                            exit();
                        }
                    ?>
                    <!-- Search by Status -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];

                            if($yearLevel == 'None' && $gender == 'None') {

                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE status = '$status'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            
                        } 
                            }  else {
                                header("location: ../php/memberSearch.php?error=NoRecords");
                                exit();
                            }
                        ?>
                    <!-- Search by Year Level -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];

                            if($status == 'None' && $gender == 'None' && $type == '0') {

                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE year_level = '$yearLevel'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            
                        } 
                            }  else {
                                header("location: ../php/memberSearch.php?error=NoRecords");
                                exit();
                            }
                        ?>
                    <!-- Search by Type -->
                    <?php
                        if(isset($_POST['Submit_Search'])) {
                            $search = $_POST['Search'];
                            $gender = $_POST['Gender'];
                            $yearLevel = $_POST['Year_Level'];
                            $status = $_POST['Status'];

                            if($status == 'None' && $gender == 'None' && $yearLevel == 'None') {

                                $sql = "SELECT * FROM member 
                                INNER JOIN `type` ON member.type_id = type.type_id
                                WHERE member.type_id = '$type'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                    <td> <?php echo $row["member_id"];?> </td>
                                    <td> <?php echo $row["firstname"];?> </td>
                                    <td> <?php echo $row["lastname"];?> </td>
                                    <td> <?php echo $row["gender"];?> </td>
                                    <td> <?php echo $row["address"];?> </td>
                                    <td> <?php echo $row["contact"];?> </td>
                                    <td> <?php echo $row["borrowertype"];?> </td>
                                    <td> <?php echo $row["year_level"];?> </td>
                                    <td> <?php echo $row["status"];?> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/updateForm.php?mid=$row[member_id]'"?>> Update </a> </td>
                                    <td> <a class="signup_link" <?php echo "href='../php/delete.php?mid=$row[member_id]'"?> > Delete </a></td>
                                    </tr>
                        <?php
                                    }
                                }
                            
                        } 
                            }  else {
                                header("location: ../php/memberSearch.php?error=NoRecords");
                                exit();
                            }
                        ?>
                </table> </center>
            </div>

        </div>    

    </body>
        
</html>
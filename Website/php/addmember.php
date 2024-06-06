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
            <title> Add Member </title>
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

    if(isset($_POST['AddMember'])) {
        // Store data from form into variables
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $type = $_POST['type'];
        $year_level = $_POST['year_level'];
        $status = $_POST['status'];

        // Run sql code to search if member exists
        $sql = "SELECT * from member
        WHERE firstname = '$firstname' AND
        lastname = '$lastname' AND
        gender = '$gender' AND
        address = '$address' AND
        contact = '$contact' AND
        type_id = '$type' AND
        year_level = '$year_level' AND
        status = '$status'";

        $result = $conn->query($sql);
        if($result->num_rows > 0) { // If the member exists
                ?>
                   This Member already exists. <br>
                   <a href="../html/homepage.html">  Back to Home </a>
                <?php
        } else { // If member does not exist
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $type = $_POST['type'];
            $year_level = $_POST['year_level'];
            $status = $_POST['status'];
            
            // Run sql code to insert a new record
            $sql = "INSERT INTO member(firstname, lastname, gender, address, contact, type_id, year_level, status)
            VALUES ('$firstname', 
            '$lastname', 
            '$gender', 
            '$address', 
            '$contact', 
            '$type', 
            '$year_level', 
            '$status')";

            $result = $conn->query($sql);
            if($result) { // If add member was successful
                ?>
                    Member has been successfully added <br>
                   <a href="../html/homepage.html">  Back to Home </a>
                <?php
            } else { // Otherwise
                echo "Error";
                //header("location: ../php/addMemberForm.php");
                exit();
            }
        }
    }
?>  
            </div>
        </div>
    </body>

</html>
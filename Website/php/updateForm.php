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

    $memberID = $_GET['mid']; // Get member ID from URL and store into variable

    $sql = "SELECT * FROM member WHERE member_id = '$memberID'; ";
    $result = $conn->query($sql);
    // Fetch corresponding data for given record and store into variables
    $row = $result->fetch_assoc();

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $gender = $row["gender"];
    $address = $row["address"];
    $contact = $row["contact"];
    $type = $row["type_id"];
    $yearLevel = $row["year_level"];
    $status = $row["status"];
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf=8">
        <link rel="stylesheet" href="../css/style.css">
        <title> Update Member </title>
    </head>

    <body>
            <div class = "navbar">
                <img src="../images/NottsLogo.png" class = "logo">
                <ul>
                    <li><a href="../html/homepage.html">Home</a></li>
                    <li><a href="../php/librarySearch.php">Search Library</a></li>
                </ul>
            </div>

        
            <div class = "login">
                
                <div class="signup_link"></div>
                
                    <center><h2> Update Member </h2></center>
        
                    <form <?php echo "action='../php/update.php?mid=$row[member_id]'"?> method="post">
        
                    <center><div class = "text_field">
                        <input type="text" name = "firstname" placeholder="First Name" <?php echo "value='$row[firstname]'"?>>
                    </div></center>
        
                    <center><div class = "text_field">
                        <input type="text" name = "lastname" placeholder="Last Name" <?php echo "value='$row[lastname]'"?>>
                    </div></center>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Gender </strong></p>
                        <select name="gender" class="field_dropdown" required>
                            <option value="Male" <?php if($gender == 'Male') {echo "selected";}?>> Male </option>
                            <option value="Female" <?php if($gender == 'Female') {echo "selected";}?>> Female </option>
                        </select>
                    </center>

                    <br>
                    <br>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Year Level </strong></p>
                        <select name="year_level" class="field_dropdown" required>
                            <option value="First Year" <?php if($yearLevel == 'First Year') {echo "selected";}?>> First Year </option>
                            <option value="Second Year" <?php if($yearLevel == 'Second Year') {echo "selected";}?>> Second Year </option>
                            <option value="Third Year" <?php if($yearLevel == 'Third Year') {echo "selected";}?>> Third Year </option>
                            <option value="Fourth Year" <?php if($yearLevel == 'Fourth Year') {echo "selected";}?>> Fourth Year </option>
                            <option value="Faculty" <?php if($yearLevel == 'Faculty') {echo "selected";}?>> Faculty </option>
                        </select>
                    </center>
                    
                    <br>
                    <br>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Type </strong></p>
                        <select name="type" class="field_dropdown" required>
                            <option value="1" <?php if($type == '1') {echo "selected";}?>> Teacher </option>
                            <option value="2" <?php if($type == '2') {echo "selected";}?>> Employee </option>
                            <option value="3" <?php if($type == '3') {echo "selected";}?>> Non-Teaching </option>
                            <option value="4" <?php if($type == '4') {echo "selected";}?>> Student </option>
                        </select>
                    </center>

                    <center><div class = "text_field">
                    <input type="text" name = "address" placeholder="Address" <?php echo "value='$row[address]'"?>>
                    </div></center>
                
                    <center><div class = "text_field">
                        <input type="text" name = "contact" placeholder="Contact" <?php echo "value='$row[contact]'"?>>
                    </div></center>
                
                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong>Status</strong></p>
                        <select name="status" class="field_dropdown" required>
                            <option value="Active" <?php if($status == 'Active') {echo "selected";}?>> Active </option>
                            <option value="Banned" <?php if($status == 'Banned') {echo "selected";}?>> Banned </option>
                        </select>
                        <br>
                    </center>

                <input type="submit" value = "Submit" name = "Update">
                <div class="signup_link"></div>
                
            </form>
    
            </div>
        
    </body>

</html>

<?php 
    if(isset($_POST['Update'])) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gender = $row["gender"];
        $address = $row["address"];
        $contact = $row["contact"];
        $type = $row["type"];
        $yearLevel = $row["year_level"];
        $status = $row["status"];

        $sql = "UPDATE member 
        SET firstname='$firstname', 
        lastname='$lastname', 
        gender='$gender', 
        address='$address', 
        contact='$contact', 
        type_id='$type', 
        year_level='$yearLevel', 
        status='$status' 
        WHERE member_id = '$row[member_id]';";

        if($conn->query($sql) === TRUE) { // If update successful send to success html 
            echo "Done";
            //header("location: ../html/successfulUpdate.html");
            exit();
        } else { // If update unsuccessful send user back to update form
            echo "Error";
            //header("location: ../php/updateForm.php?mid=$row[member_id]");
            exit();
        }
    }
?>
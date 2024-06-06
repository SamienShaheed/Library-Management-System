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
    
    if(isset($_POST['Update'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $type = $_POST["type"];
        $yearLevel = $_POST["year_level"];
        $status = $_POST["status"];
        $memberID = $_GET['mid'];

        $sql = "UPDATE member 
        SET firstname='$firstname', 
        lastname='$lastname', 
        gender='$gender', 
        address='$address', 
        contact='$contact', 
        type_id='$type', 
        year_level='$yearLevel', 
        status='$status' 
        WHERE member_id = '$memberID';";

        $result = $conn->query($sql);        

        if($result) { // If update successful send to success html 
            header("location: ../html/successfulUpdate.html");
            exit();
        } else { // If update unsuccessful send user back to update form
            header("location: ../php/updateForm.php?mid=$row[member_id]");
            exit();
        }
    }
?>
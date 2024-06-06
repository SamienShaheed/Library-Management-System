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

    // Check if user pressed Submit
    if(isset($_POST['Login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        require '../php/errorCheck.php'; // Access errorCheck php file

        connectUser($conn, $username, $password); // Call connectUser function

    } else {
        header("location: ../php/index.php");
        exit();
    }
?>
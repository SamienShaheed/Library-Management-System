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
    if(isset($_POST['Signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        require '../php/errorCheck.php'; // Access errorCheck php file

        // Call usernameExists function and check if username is taken
        if(usernameExists($conn, $username) !== false) {
            // Display error message is username is already taken
            header("location: ../php/signup.php?error=usernametaken");
            exit();
        }

        // SQL statement to insert entered values into database
        $sql = "INSERT INTO users(username, password, firstname, lastname) VALUES('$username', '$password', '$firstname', '$lastname')";
        if($conn->query($sql) === TRUE) { // If insertion successful then proceed
            header("location: ../html/backtologin.html");
        } else { // Else display error message
            echo "Error Logging in: " . $sql. $conn->error;
        }
    } else {
        header("location: ../php/signup.php"); // Send user back to signup page if error occurs
        exit();
    }

    $conn->close() // Close connection to database
?>
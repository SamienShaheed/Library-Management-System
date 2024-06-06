<?php
    // Function to check if username entered exists in database
    function usernameExists($conn, $username) {
        // SQL Query to search for entered username in the database
        $sql = "SELECT * FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        // Execute the sql statement
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        // Store the result
        $data = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($data)) { // If records are found
            return $row;
        } else { // If no records found
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    // Function to check if login credentials are valid
    function connectUser($conn, $username, $password) {
        // Call function to check if username exists in database
        $usernameExists = usernameExists($conn, $username);

        if($usernameExists === false) { // If username does not exist
            header("location: ../php/index.php?error=InvalidUsername"); // Send user back to login page
            exit();
        }

        // Find the password associated to the entered username from database
        $passwordCheck = $usernameExists["password"];
 
        // SQL statement
        $sql = "SELECT * FROM users WHERE password = '$passwordCheck' ";
        $result = $conn->query($sql);

        if($passwordCheck == $password) { // Check if entered password is correct
            if($result->num_rows > 0) { // If data exists 
                header("location: ../html/homepage.html"); // Proceed to homepage
                exit();
            } else { // If password doesn't match
                header("location: ../php/index.php?error=IncorrectPassword"); // Send user back to login page
                exit();
            }
        } else { // If password is incorrect
            header("location: ../php/index.php?error=IncorrectPassword"); // Send user back to login page
            exit();
        }
    }
?>
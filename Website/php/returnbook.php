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
        <div class="signup_link"></div>
        <h1> Return Book </h1>

        <form action="../php/returnDetails.php" method="post">
        <div class="text_field">
            <input type="text" name="borrowid" placeholder="Enter Borrower ID: ">
        </div>    

        <div class="text_field">
            <input type="text" name="memberid" placeholder="Enter Member ID: ">
        </div>

        <div class="text_field">
            <input type="text" name="bookid" placeholder="Enter Book ID: ">
        </div>

        <input type="submit" name="Return"> <br>
        <div class="signup_link"></div>
        </form>
    </div>
        
    </body>

</html>



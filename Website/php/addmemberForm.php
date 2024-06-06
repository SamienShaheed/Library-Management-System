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

        
            <div class = "login">
                
                <div class="signup_link"></div>
                
                    <center><h2> Add Member </h2></center>
        
                    <form action="../php/addmember.php" method="post">
        
                    <center><div class = "text_field">
                        <input type="text" name = "firstname" placeholder="First Name" required>
                    </div></center>
        
                    <center><div class = "text_field">
                        <input type="text" name = "lastname" placeholder="Last Name" required>
                    </div></center>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Gender </strong></p>
                        <select name="gender" class="field_dropdown" required>
                            <option value="Male" selected> Male </option>
                            <option value="Female"> Female </option>
                        </select>
                    </center>

                    <center><div class = "text_field">
                    <input type="text" name = "address" placeholder="Address" required>
                    </div></center>
                
                    <center><div class = "text_field">
                        <input type="text" name = "contact" placeholder="Contact" required>
                    </div></center>
                    
                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Type </strong></p>
                        <select name="type" class="field_dropdown" required>
                            <option value="0" selected>  </option>
                            <option value="1"> Teacher </option>
                            <option value="2"> Employee </option>
                            <option value="3"> Non-Teaching </option>
                            <option value="4"> Student </option>
                        </select>
                    </center>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Year Level </strong></p>
                        <select name="year_level" class="field_dropdown" required>
                            <option value="First Year" selected> First Year </option>
                            <option value="Second Year"> Second Year </option>
                            <option value="Third Year"> Third Year </option>
                            <option value="Fourth Year"> Fourth Year </option>
                            <option value="Faculty"> Faculty </option>
                        </select>
                    </center>
                
                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong>Status</strong></p>
                        <select name="status" class="field_dropdown" required>
                            <option value="Active" selected> Active </option>
                            <option value="Banned"> Banned </option>
                        </select>
                        <br>
                    </center>
                    <br>

                <input type="submit" value = "Submit" name = "AddMember">
                <div class="signup_link"></div>
                
            </form>
    
            </div>
        
    </body>

</html>
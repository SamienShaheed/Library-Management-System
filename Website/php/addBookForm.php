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

        
            <div class = "login">
                
                <div class="signup_link"></div>
                
                    <center><h2> Add Book </h2></center>
        
                    <form action="../php/addbook.php" method="post">
        
                    <center><div class = "text_field">
                        <input type="text" name = "bookTitle" placeholder="Book Title" required>
                    </div></center>
        
                    <center><div class = "text_field">
                        <input type="text" name = "author" placeholder="Author" required>
                    </div></center>

                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong> Category </strong></p>
                        <select name="category" class="field_dropdown" required>
                            <option value="0" selected>  </option>
                            <option value="1"> Periodical </option>
                            <option value="2"> English </option>
                            <option value="3"> Math </option>
                            <option value="4"> Science </option>
                            <option value="5"> Encylopedia </option>
                            <option value="6"> Filipiniana </option>
                            <option value="7"> Newspaper </option>
                            <option value="8"> General </option>
                            <option value="9"> References </option>
                        </select>
                    </center>

                    <center><div class = "text_field">
                    <input type="text" name = "book_pub" placeholder="Book Publisher" required>
                    </div></center>
                
                    <center><div class = "text_field">
                        <input type="text" name = "publisher_name" placeholder="Publisher Name" required>
                    </div></center>
                    
                    <center><div class = "text_field">
                        <input type="text" name = "isbn" placeholder="ISBN" required>
                    </div></center>
                    
                    <center><div class = "text_field">
                        <input type="text" name = "copyright_year" placeholder="Copyright Year" maxlength="4" required>
                    </div></center>
                
                    <center>
                        <p style="color:rgb(82, 79, 79);"> <strong>Status</strong></p>
                        <select name="status" class="field_dropdown" required>
                            <option value="0" selected>  </option>
                            <option value="New"> New </option>
                            <option value="Old"> Old </option>
                            <option value="Lost"> Lost </option>
                            <option value="Archive"> Archive </option>
                            <option value="Damaged"> Damaged </option>
                        </select>
                        <br>
                    </center>
                    <br>

                <input type="submit" value = "Submit" name = "AddBook">
                <div class="signup_link"></div>
                
            </form>
    
            </div>
        
    </body>

</html>
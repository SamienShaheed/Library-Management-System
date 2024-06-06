<!DOCTYPE html>
<html>
    <head>
        <title> Member Search </title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        
        <div class="banner">
            <div class = "navbar">
                <img src="../images/NottsLogo.png" class = "logo">
                <ul>
                    <li><a href="../html/homepage.html">Home</a></li>
                    <li><a href="../php/librarySearch.php">Search Library</a></li>
                </ul>
            </div>
    
            <form action="../php/memberSearchResults.php" value="Submit" id="SearchMember" method="post">
                <div class="search">
                    <div class="searchBar">
                        <input type="text" placeholder="Search by First Name, Last Name or Address" name="Search">
                            <button type="submit" name="Submit_Search"><img src="../images/search.png"></button>
                    </div>    
                </div>
    
                <div class="category">
                    <select id="SearchMember" name="Gender" class="dropdown">
                        <option value="None" selected> Select Gender </option>
                        <option value="Male"> Male </option>
                        <option value="Female"> Female </option>
                    </select>

                    <select id="SearchMember" name="Year_Level" class="dropdown">
                        <option value="None" selected> Select Year Level </option>
                        <option value="First Year"> First Year </option>
                        <option value="Second Year"> Second Year </option>
                        <option value="Third Year"> Third Year </option>
                        <option value="Fourth Year"> Fourth Year </option>
                        <option value="Faculty"> Faculty </option>
                    </select>
                </div>

                <div class="category">
                    <select id="SearchMember" name="Status" class="dropdown">
                        <option value="None" selected> Select Status </option>
                        <option value="Active"> Active </option>
                        <option value="Banned"> Banned </option>
                    </select>
                    <select id="SearchMember" name="Type" class="dropdown">
                        <option value="0" selected> Select Type </option>
                        <option value="1"> Teacher </option>
                        <option value="2"> Employee </option>
                        <option value="3"> Non-Teaching </option>
                        <option value="4"> Student </option>
                    </select>
                </div>
            </form>
        </div>

    </body>
</html>
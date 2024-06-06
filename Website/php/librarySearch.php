<!DOCTYPE html>
<html>
    <head>
        <title> Library Search </title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        
        <div class="banner">
            <div class = "navbar">
                <img src="../images/NottsLogo.png" class = "logo">
                <ul>
                    <li><a href="../html/homepage.html">Home</a></li>
                    <li><a href="../php/memberSearch.php">Search Members</a></li>
                </ul>
            </div>
    
            <form action="../php/bookSearch.php" value="Submit" id="SearchBook" method="post">
                <div class="search">
                    <div class="searchBar">
                        <input type="text" placeholder="Search by Title,  Author,  ISBN or Publisher" name="Search">
                            <button type="submit" name="Submit_Search"><img src="../images/search.png"></button>
                    </div>    
                </div>

                <div class="category">
                    <select id="SearchBook" name="Category" class="dropdown">
                        <option value="0" selected> Select Category </option>
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

                    <select id="SearchBook" name="Status" class="dropdown">
                        <option value="None" selected> Select Status </option>
                        <option value="New"> New </option>
                        <option value="Archive"> Archive </option>
                        <option value="Damage"> Damage </option>
                        <option value="Lost"> Lost </option>
                        <option value="Old"> Old </option>
                    </select>
                </div>
            </form>

            
            
        </div>

    </body>
</html>
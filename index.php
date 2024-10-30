<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
    require("menu.php");
    ?>
    <div class='main' id='mody'>
        <form id='search'>
            <input type='text' name='search' placeholder="fraza">
            <input type='text' name='author' placeholder="author">
            <input type='submit' value='wyszukaj'><br>
            
            <?php
                echo "<select name='gameID'><option value=''>Jaka gra?</option>";
                $sql = "SELECT * from gry ORDER BY nazwa";
                $result=$conn->query($sql);
                while($row=$result->fetch_row()){
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
                echo "</select>";
            ?>
        </form>
        <div id='modlist'>
            <?php
                $sql = "SELECT m.id,m.nazwa,m.obrazek,u.login FROM mody AS m JOIN uzytkownicy AS u WHERE m.userID = u.ID AND verified=1";
                if(isset($_GET['fav'])){
                    $sql = "SELECT m.id,m.nazwa,m.obrazek,u.login FROM mody AS m 
                    JOIN uzytkownicy AS u ON m.userID = u.id
                    JOIN polubienia AS p ON p.modID=m.id
                    WHERE p.userID=$_SESSION[id];
                    ";
                }
                if(isset($_GET['search'])) {
                    $sql = $sql . " AND m.nazwa LIKE '%$_GET[search]%'";
                }
                if(isset($_GET["gameID"])){
                    if($_GET["gameID"]==""){} else
                    $sql = $sql . " AND m.graID = $_GET[gameID]";
                }
                if(isset($_GET["author"])){
                    if($_GET["author"]==""){}else
                    $sql = $sql . " AND u.login = '$_GET[author]'";
                }
                $result = $conn->query($sql);
                while($row=$result->fetch_row()){
                    echo "<div data='$row[0]' class='modCard'>
                    $row[1]<br>
                    <img src='img/$row[2]'><br>
                    by: <a href='mody.php?author=$row[3]'>$row[3]</a>
                    </div>";
                }
            ?>
        </div>
    </div>
    <?php
    require("stopper.php");
    ?>
</body>
</html>
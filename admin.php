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
    <div class="main" id='adminPanel'>
        <?php
            $sql = "SELECT m.id,m.nazwa,m.obrazek,u.login FROM mody AS m JOIN uzytkownicy AS u WHERE m.userID = u.ID AND verified=0";
            $result = $conn->query($sql);
            echo "<div id='verifyScroll'>";

            while ($row=$result->fetch_row()) {
                echo "<div data='$row[0]' class='modCard'>
                    $row[1]<br>
                    <img src='img/$row[2]'><br>
                    by: $row[3]
                    </div>";
            }

            echo "</div>";
            echo "<div id='controlUsers'>";

            $sql = "SELECT id,login,admin from uzytkownicy";
            $result = $conn->query($sql);
            echo "<hr><table><tr><th>ID</th><th>Nazwa</th><th>Opcje</th></tr>";
            while($row=$result->fetch_row()){
                echo "<tr><td>$row[0]</td>";
                if($row[2]){
                echo "<td><a class='red' href='mody.php?author=$row[1]'>$row[1]</a></td>";
                } else
                echo "<td><a href='mody.php?author=$row[1]'>$row[1]</a></td>";
                echo "<td><input type='button' value='Usun' data='$row[0]' class='deleteUser'></td>";
            }
            echo "</table></div>";
        ?>
    </div>
    <?php
    require("stopper.php");
    ?>
</body>
</html>

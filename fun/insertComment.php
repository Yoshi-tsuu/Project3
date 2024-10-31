<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
 $autor = $_SESSION["id"];
 $modID = $_POST['modID'];
 $tresc = $_POST['tresc'];
 $sql = "INSERT INTO komentarze VALUES (NULL,$autor,$modID,'$tresc')";
 $conn->query($sql);
 echo "<div class='commentBox'>
    $_SESSION[login]
    <br>
    $tresc
 </div>";
?>
<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
 $userID = $_POST["userID"];
 $modID = $_POST["modID"];
 $sql = "INSERT INTO polubienia VALUES ($modID,$userID)";
 $conn->query($sql);
 echo $sql;

?>
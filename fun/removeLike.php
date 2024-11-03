<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
 $userID = $_POST["userID"];
 $modID = $_POST["modID"];
 $sql = "DELETE FROM polubienia WHERE modID = $modID AND userID = $userID";
 $conn->query($sql);
 echo $sql;
?>

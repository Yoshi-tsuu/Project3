<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
  $modID = $_POST["modID"];
  $sql = "UPDATE mody SET verified=1 WHERE id=$modID";
  $conn->query($sql);
  echo $sql;
?>
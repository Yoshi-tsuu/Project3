<?php require("../db.php")?>
<?php require("../session.php")?><?php
 $id = $_POST['id'];
 $sql = "DELETE FROM polubienia WHERE userID = $id";
 $conn->query($sql);
 $sql = "DELETE FROM komentarze WHERE userID = $id";
 $conn->query($sql);
 $sql = "SELECT id FROM mody WHERE userID = $id";
 $result=$conn->query($sql);
 while($row=$result->fetch_row()){
  $modID=$row[0];
  $sql = "DELETE FROM komentarze WHERE modID = $modID";
  $conn->query($sql);
  $sql = "DELETE FROM polubienia WHERE modID = $modID";
  $conn->query($sql);
  $sql = "DELETE FROM mody WHERE id = $modID";
  $conn->query($sql);
 }
 $sql = "DELETE FROM uzytkownicy WHERE id = $id";
 $conn->query($sql);
 ?>
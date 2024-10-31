<?php require("../db.php")?>
<?php require("../session.php")?><?php
 $modID = $_POST['modID'];
 $sql = "DELETE FROM komentarze WHERE modID = $modID";
 $conn->query($sql);
 $sql = "DELETE FROM polubienia WHERE modID = $modID";
 $conn->query($sql);
 $sql = "DELETE FROM mody WHERE id = $modID";
 echo $sql;
 $conn->query($sql);
 ?>
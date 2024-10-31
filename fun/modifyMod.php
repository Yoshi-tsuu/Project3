<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
 $id = $_POST["id"];
 $nazwa = $_POST["nazwa"];
 $opis = $_POST["opis"];
 $repo = $_POST["repo"];
 if(isset($_FILES["obrazek"]) && basename($_FILES["obrazek"]["name"]!="")){
  $obrazek = basename($_FILES["obrazek"]["name"]);
  $obrazek = str_replace(" ","",$obrazek);
  move_uploaded_file($_FILES["obrazek"]["tmp_name"], "../img/$obrazek");
  $sql = "UPDATE mody SET nazwa='$nazwa',opis='$opis',obrazek='$obrazek',repo='$repo' WHERE id = $id";
 }else $sql = "UPDATE mody SET nazwa='$nazwa',opis='$opis',repo='$repo' WHERE id = $id";
 echo $sql;
 $conn->query($sql);

 header("location: ../details.php?id=".$id);
?>
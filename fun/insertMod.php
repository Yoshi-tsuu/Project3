<?php require("../db.php")?>
<?php require("../session.php")?>
<?php
 $autor = $_SESSION["id"];
 $nazwa = $_POST["nazwa"];
 $opis = $_POST["opis"];
 $repo = $_POST["repo"];
 $graID = $_POST["gra"];
 if(isset($_FILES["obrazek"])){
  $obrazek = basename($_FILES["obrazek"]["name"]);
  $obrazek = str_replace(" ","",$obrazek);
  move_uploaded_file($_FILES["obrazek"]["tmp_name"], "../img/$obrazek");
  $sql = "INSERT INTO mody(ID,graID,nazwa,opis,obrazek,repo,userID) VALUES (NULL,$graID,'$nazwa','$opis','$obrazek','$repo',$autor)";
 }else $sql = "INSERT INTO mody(ID,graID,nazwa,opis,obrazek,repo,userID) VALUES (NULL,$graID,'$nazwa','$opis',NULL,'$repo',$autor)";
 $conn->query($sql);

 header("location: ../mody.php");
?>
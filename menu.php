<?php
require ("session.php");
require("db.php");
?>

<nav>
<a href="index.php">Strona główna</a>
<a href="mody.php?fav=">Ulubione</a>
<a href="mody.php">Lista modów</a>
<a href="create.php">Dodaj mod</a>
  
<?php 
if($_SESSION["admin"]){
  echo "<a class='red'>Witaj $_SESSION[login]</a>";
} else echo "<a>Witaj $_SESSION[login]</a>";
?>

<a href="logout.php">Wyloguj</a>
  
<?php
if($_SESSION["admin"])
echo '<a href="admin.php">AdminPanel</a>';
?>
  
</nav>

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
    $sql = "SELECT m.id,nazwa,opis,obrazek,u.login,repo,u.id,m.verified FROM mody AS m 
        JOIN uzytkownicy AS u ON u.id = m.userID WHERE m.id = $_GET[id]";
        $result = $conn->query($sql);
        $result = $result->fetch_row();
        $modID = $result[0];
        $currentUser = $_SESSION["id"];
    ?>
    <?php 
    if($_SESSION["admin"] || $result[6]==$_SESSION["id"]){
      echo "
      <nav id='adminBar'>
        <input type='button' value='Delete mod' id='deleteButton' data='$result[3]'>
      ";
    }
    if($result[6]==$_SESSION["id"]){
      echo "<input type='button' value='Edit mod' id='editButton'>";
    }
    if($_SESSION["admin"] && !$result[7]){
      echo "<input type='button' value='Verify' id='verifyButton'>";
    }
    echo "</nav>";
    ?>
    <div id="modDetails" class="main">
      <?php
        echo "
          <h1>$result[1]</h1>
          <div id='modImg' style='background-image: url(img/$result[3])'>
            $result[2]<br>
            Author: $result[4] <br>
            GitRepo: $result[5]
          </div>
        ";
        $sqlPolubienia = "SELECT COUNT(*) FROM polubienia WHERE modID = $result[0]";
        $sqlKomentarze = "SELECT u.login,tresc,komentarze.id FROM komentarze JOIN
        uzytkownicy AS u ON u.id = userID
        WHERE modID = $result[0]
        ORDER BY komentarze.id DESC";

        $likesCount = $conn->query($sqlPolubienia)->fetch_row();
        $likesCount = $result[0];
        $result = $conn->query("SELECT * FROM polubienia WHERE modID = $result[0] AND userID = $_SESSION[id]");
        if(mysqli_num_rows($result)==0){
          echo "<img id='like' src='img/site/likeEmpty.png' data='$currentUser'>";
        } else {
          echo "<img id='like' src='img/site/likeFilled.png' data='$currentUser'>";
        }

        $result = $conn->query($sqlKomentarze);
        echo "<hr>
        <div id='modComments'>
        <h2>Komentarze</h2>
        <textarea id='commentField'></textarea>
        <input type='button' data='$modID' value='Zamieść komentarz' id='sendComment'>
        ";
        $i = 0;
        while($komentarz = $result->fetch_row()){
          echo "<div class='commentBox' id='comment$i'>
            $komentarz[0]
            <br>
            $komentarz[1]
          </div>";
          $i++;
        }
        echo "</div>";
        
      ?>
    </div>
    <?php
    require("stopper.php");
    ?>
</body>
</html>

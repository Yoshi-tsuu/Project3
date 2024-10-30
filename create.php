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
    ?>
    <div class="main" id='createBox'>
      <form method="POST" action="fun/insertMod.php" enctype="multipart/form-data">
        <input type="text" name="nazwa" placeholder="nazwa" required>
        <input type="text" name="opis" placeholder="opis" required>
        <input type="text" name="repo" placeholder="github.com/<repo>" required>
        <input type="file" name="obrazek"> Do jakiej gry?
        <div>
          <?php
          $sql = "SELECT * from gry";
          $result=$conn->query($sql);
          while($row=$result->fetch_row()){
            echo "<input type='radio' name='gra' value='$row[0]'>$row[1]";
          }
          ?>
        <div>
        <input type="submit" value="Przeslij do sprawdzenia">
      </form>
    </div>
    <?php
    require("stopper.php");
    ?>
</body>
</html>
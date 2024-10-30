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
    $modID = $_GET["id"];
    $sql = "SELECT * FROM mody WHERE id = $modID";
    $result = $conn->query($sql)->fetch_row();
    ?>
    <div class="main" id='createBox'>
      <form method="POST" action="fun/modifyMod.php" enctype="multipart/form-data">
        <input type="number" name="id" value="<?=$result[0]?>" hidden>
        <input type="text" name="nazwa" placeholder="nazwa" value="<?=$result[1]?>"required>
        <input type="text" name="opis" placeholder="opis" value="<?=$result[2]?>"required>
        <input type="text" name="repo" placeholder="github.com/<repo>" value="<?=$result[6]?>"required>
        <input type="file" name="obrazek">
        <input type="submit" value="Aktualizuj">
      </form>
    </div>
    <?php
    require("stopper.php");
    ?>
</body>
</html>
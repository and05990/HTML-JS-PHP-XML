<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poligono</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //include("Rettangolo.php");
        //require("Rettangolo.php");
        //include_once("Rettangolo.php"); //_once NON riperte se gia importato
        require_once("Rettangolo.php");

        $r = new Rettangolo(10, 2);
        echo "<p>".$r -> print("RUS")."</p>";

        $q = new Quadrato(5);
        echo "<p>".$q -> print("ARM")."</p>";
    ?>
</body>
</html>
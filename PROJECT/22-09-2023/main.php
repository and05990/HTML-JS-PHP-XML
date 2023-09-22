<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poligono</title>
    
</head>
<body>
    <?php
        //include("Rettangolo.php");
        //require("Rettangolo.php");
        //include_once("Rettangolo.php"); //_once NON riperte se gia importato
        require_once("Rettangolo.php");

        $r = new Rettangolo(10, 2);
        echo "<p>".$r -> stampa("RUS")."</p>";

        $q = new Quadrato(5);
        echo "<p> L'area del quadrato è: ".$q -> getArea()."</p>";
        echo "<p> Il lato del quadrato è: ".$q -> getLato()."</p>";
    ?>
</body>
</html>
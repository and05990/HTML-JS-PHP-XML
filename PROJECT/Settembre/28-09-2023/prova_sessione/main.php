<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION["nome"]))
        {
            echo "<p>Ciao ".$_SESSION["nome"]."</p>";
            unset($_SESSION["nome"]);
        } else {
            ?>
            <form action="index.php" method="post">
                <input type="text" name="nome" placeholder="Nome">
                <input type="submit" value="invia">
            </form>
            <?php
        }
        print_r($_SESSION);
    ?>
</body>
</html>
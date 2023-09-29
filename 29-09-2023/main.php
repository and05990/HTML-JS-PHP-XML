<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <?php
        require_once("Domanda.php");
        $quest = new Domanda();
    ?>
    <form action="quest1.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="submit" value="invia">
    </form>
</body>
</html>


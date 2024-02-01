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
    <form action="portafolio.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="citta" placeholder="Città">
        <input type="image" name="fotoProfilo" placeholder="Immagine profilo">
        <button type="submit">Vedi Ora</button>
    </form>
</body>
</html>
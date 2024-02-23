<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Creator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="portafolio.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="citta" placeholder="Città">
        <input type="text" name="descrizione" placeholder="Descrizione">
        <input type="text" name="link" placeholder="Link">
        <button type="submit">Vedi Ora</button>
    </form>
</body>
</html>
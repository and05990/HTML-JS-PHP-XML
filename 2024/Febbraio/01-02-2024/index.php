<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Creator</title>
</head>
<body>
    <form action="portafolio.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="citta" placeholder="Città">
        <input type="text" name="descrizione" placeholder="Descrizione">
        <div class="testi">
            <input type="text" class="t1" name="t1" placeholder="Testo">
                <select name="type1" class="t1">
                    <option value="<h1>">Titolo</option>
                    <option value="<h2>">Sottotitolo</option>
                    <option value="<p>">Testo</option>
                </select>

            <button name="addT">+</button>
        </div>
        <input type="image" name="fotoProfilo" placeholder="Immagine profilo">
        <button type="submit">Vedi Ora</button>
    </form>

    <script src="index.js"></script>
</body>
</html>
<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerti</title>
</head>
<body>
    <h1>Elimina genere</h1>
    <form action="index.php" method="post">
        <input type="text" name="genere">
        <button type="submit">Invia</button>
    </form>

    <?php
        require_once("config.php");
        $mydb = new mysqli(SERVER,UTENTE,PASSWORD,DATABASE);
        if($mydb->connect_errno){
            echo "Errore di connessione al DB: ".$mydb->connect_error;
            exit();
        }

        if(isset($_POST["genere"]) && !empty($_POST["genere"]))
        {
            $genere = $_POST["genere"];
        }

        $stmt = $mydb -> prepare('
            DELETE FROM partecipa WHERE fkArtista IN (SELECT artista.id FROM artista WHERE artista.genere = ?);
        ');

        $stmt -> bind_param('s', $genere);
        
        $stmt -> execute();

        $stmt = $mydb -> prepare('DELETE FROM artista WHERE genere = ?');

        $stmt -> bind_param('s', $genere);
        
        $stmt -> execute();

        $result = $stmt -> get_result();

        echo "Finito";
    ?>
</body>
</html>
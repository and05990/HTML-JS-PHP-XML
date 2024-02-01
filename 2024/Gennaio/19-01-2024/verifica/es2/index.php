<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerti</title>
</head>
<body>
    <h1>Concerti belli</h1>
    <form action="index.php" method="post">
        <select name="artista">
            <option value="skerdi">Skerdi</option>
            <option value="tafa">Tafa</option>
            <option value="quagliotti">Quagliotti</option>
        </select>
        <button type="submit">Invia</button>
    </form>

    <?php
        require_once("config.php");
        $mydb = new mysqli(SERVER,UTENTE,PASSWORD,DATABASE);
        if($mydb->connect_errno){
            echo "Errore di connessione al DB: ".$mydb->connect_error;
            exit();
        }

        if(isset($_POST["artista"]))
        {
            $artista = $_POST["artista"];
        } else {
            echo 'Errore';
        }

        $stmt = $mydb -> prepare('
            SELECT concerto.nome, concerto.dataOra
            FROM concerto
            INNER JOIN partecipa ON concerto.id = partecipa.fkConcerto
            INNER JOIN artista ON partecipa.fkArtista = artista.id
            WHERE artista.nome = ?
        ');

        $stmt -> bind_param('s', $artista);
        
        $stmt -> execute();

        $result = $stmt -> get_result();

        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                echo $row['nome'].' '.$row['dataOra'];
            }   
        } else {
            echo 'non trovato';
        }
    ?>
</body>
</html>
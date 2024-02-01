<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILM</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="nome">
        <button type="submit">Invia</button>
    </form>

    <?php
        require_once("config.php");
        $mydb = new mysqli(SERVER,UTENTE,PASSWORD,DATABASE);
        if($mydb->connect_errno){
            echo "Errore di connessione al DB: ".$mydb->connect_error;
            exit();
        }

        if(isset($_POST['nome']) && !empty($_POST['nome'])) 
        {
            $nome = $_POST['nome'];
        } else {
            echo 'errore';
            return;
        }

        $nome = '%'.$nome.'%';

        $stmt = $mydb -> prepare('
            SELECT film.titolo
            FROM film
            INNER JOIN recita ON film.id = recita.fkFilm
            INNER JOIN attore ON recita.fkAttore = attore.id
            WHERE attore.nome LIKE ?
        ');

        $stmt -> bind_param('s', $nome);

        $stmt -> execute();

        $results = $stmt -> get_result();
        if($results -> num_rows > 0)
        {
            while($row = $results -> fetch_assoc())
            {
                echo $row['titolo'];
            }   
        } else {
            echo 'non trovato';
        }
        
    ?>
</body>
</html>
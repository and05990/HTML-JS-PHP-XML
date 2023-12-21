<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantaLucia</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Nome" name="nome">
        <p>Giocattoli desiderati:</p>
        <input type="text" placeholder="giocattolo1" name="giocattolo1">
        <input type="text" placeholder="giocattolo2" name="giocattolo2">
        <input type="text" placeholder="giocattolo3" name="giocattolo3">
        <br>
        <input type="submit" value="Invia" name="invia">
    </form>
    <?php

        if(isset($_POST["invia"]))
        {
            require("config.php");
            $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
            if ($mydb->connect_errno) {
                echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
                exit();
            }

            $query = 'INSERT INTO bambini (nome) VALUES ('.$_POST['nome'].')';

            $mydb -> query($query);
            $id_bambino = $mydb -> insert_id;

            $query = 'INSERT INTO giocattoli (nome, fkBambino) VALUES ('.$_POST['giocattolo1'];

        }

        
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio Auto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cerca Auto per ID</h1>
    <form method="get">
        <label for="auto_id">Inserisci l'ID dell'auto:</label>
        <input type="text" id="auto_id" name="id">
        <input type="submit" value="Cerca">
    </form>

    <?php
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
        if ($mydb -> connect_error) {
            die("Connessione al database fallita: " . $mydb -> connect_error);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM auto WHERE id = ?";
            $stmt = $mydb -> prepare($query);
            $stmt->bind_param("i", $id);

            if ($stmt -> execute()) {
                $result = $stmt -> get_result();
                if ($result -> num_rows > 0) {
                    $row = $result -> fetch_assoc();
                    echo "<h2>Dettagli dell'auto</h2>";
                    echo "<p>ID: " . $row['id'] . "</p>";
                    echo "<p>Marca: " . $row['marca'] . "</p>";
                    echo "<p>Modello: " . $row['modello'] . "</p>";
                    echo "<p>Allestimento: " . $row['allestimento'] . "</p>";
                    echo "<p>Anno: " . $row['anno'] . "</p>";
                    echo "<p>Chilometri: " . $row['chilometri'] . "</p>";
                    echo "<p>Alimentazione: " . $row['alimentazione'] . "</p>";
                    echo "<p>Cambio: " . $row['cambio'] . "</p>";
                    echo "<p>KW: " . $row['kw'] . "</p>";
                    echo "<p>Prezzo: " . $row['prezzo'] . "</p>";
                } else {
                    echo "<p>Nessun risultato trovato per l'ID specificato.</p>";
                }
            } else {
                echo "<p>Errore nella query: " . $stmt->error . "</p>";
            }

            $stmt -> close();
        } else {
            echo "<p>Inserire ID</p>";
        }

        $mydb -> close();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokimane</title>
</head>
<body>
    <h1>POKIMANE</h1>
    <?php
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
        if ($mydb -> connect_errno) 
        {
            echo "Errore nella connessione a MySQL: (" . $mysqli -> connect_errno . ") " . $mysqli -> connect_error;
            exit();
        }

        $query1 = "SELECT * FROM italia";
        $risultato1 = $mydb -> query($query1);
        if($risultato1->num_rows > 0)
        {  
            echo "<table>";
            echo "<tr><td>Comune</td><td>Città</td><td>Regione</td></tr>";
            while($pokimane = $risultato1 -> fetch_assoc())
            {
                echo "<tr>";
                echo "<td>".$pokimane["nome"]."</td>";
                echo "<td>".$pokimane["tipo"]."</td>";
                echo "<td>".$pokimane["tipo2"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            echo "<p>Non ci sono mamme nel database.</p>";
        }
    ?>

</body>
</html>
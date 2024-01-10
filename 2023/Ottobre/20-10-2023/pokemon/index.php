<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokimane</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ff6600;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #ff6600;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }
    </style>
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

        $query1 = "SELECT id, nome, tipo, tipo2 FROM pokemon";
        $risultato1 = $mydb -> query($query1);
        if($risultato1->num_rows > 0)
        {  
            echo "<table>";
            echo "<tr><td>Nome</td><td>Tipo</td><td>Tipo2</td></tr>";
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
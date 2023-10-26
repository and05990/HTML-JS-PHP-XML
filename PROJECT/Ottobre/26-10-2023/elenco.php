<!DOCTYPE html>
<html>
<head>
    <title>Tabella Auto</title>
    <!-- <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require("config.php");
    $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
    if ($mydb -> connect_error) {
        echo "Errore nella connessione a MySQL: (" . $mysqli -> connect_errno . ") " . $mysqli -> connect_error;
        exit();
    }

    $query = "SELECT * FROM auto";
    $result = $mydb -> query($query);

    if ($result) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Marca</th><th>Modello</th><th>Allestimento</th><th>Anno</th><th>Chilometri</th><th>Alimentazione</th><th>Cambio</th><th>KW</th><th>Prezzo</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['modello'] . "</td>";
            echo "<td>" . $row['allestimento'] . "</td>";
            echo "<td>" . $row['anno'] . "</td>";
            echo "<td>" . $row['chilometri'] . "</td>";
            echo "<td>" . $row['alimentazione'] . "</td>";
            echo "<td>" . $row['cambio'] . "</td>";
            echo "<td>" . $row['kw'] . "</td>";
            echo "<td>" . $row['prezzo'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $result -> free();
    } else {
        echo "Errore nella query: " . $mydb -> error;
    }

    $mydb->close();
?>
</body>
</html>

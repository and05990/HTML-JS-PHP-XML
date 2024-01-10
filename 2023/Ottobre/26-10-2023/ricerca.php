<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cerca auto</h1>
    <form method="get">
        <input type="text" name="search" placeholder="Cerca">
        <input type="submit" value="Cerca">
    </form>

    <?php
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);

        if ($mydb->connect_error) {
            die("Errore nella connessione a MySQL: " . $mydb->connect_error);
        }

        if (isset($_GET["search"])) {
            $search = $mydb->real_escape_string($_GET["search"]);
            $sql = "SELECT * 
                FROM auto
                WHERE marca LIKE ? OR modello LIKE ? OR anno LIKE ? OR alimentazione LIKE ? OR cambio LIKE ? OR kw LIKE ? OR prezzo LIKE ?";
            
            $stmt = $mydb -> prepare($sql);
            if (!$stmt) {
                die("Errore nella preparazione della query: " . $mydb->error);
            }

            $param = '%' . $search . '%';
            $stmt -> bind_param("sssssss", $param, $param, $param, $param, $param, $param, $param);
            $stmt -> execute();
            
            $result = $stmt -> get_result();
            
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Marca</th>";
                echo "<th>Modello</th>";
                echo "<th>Allestimento</th>";
                echo "<th>Anno</th>";
                echo "<th>Chilometri</th>";
                echo "<th>Alimentazione</th>";
                echo "<th>Cambio</th>";
                echo "<th>KW</th>";
                echo "<th>Prezzo</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["marca"] . "</td>";
                    echo "<td>" . $row["modello"] . "</td>";
                    echo "<td>" . $row["allestimento"] . "</td>";
                    echo "<td>" . $row["anno"] . "</td>";
                    echo "<td>" . $row["chilometri"] . "</td>";
                    echo "<td>" . $row["alimentazione"] . "</td>";
                    echo "<td>" . $row["cambio"] . "</td>";
                    echo "<td>" . $row["kw"] . "</td>";
                    echo "<td>" . $row["prezzo"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results for " . htmlspecialchars($search);
            }

            $stmt->close();
        }

        $mydb->close();
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
        if ($mydb->connect_errno) {
            echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
            exit();
        }

        $query1 = 'SELECT p.nome, p.cognome, COUNT(*) as vittorie
                    FROM pilota p
                    JOIN partecipa pa ON p.id = pa.fkPilota
                    WHERE pa.posizione = 1
                    GROUP BY p.nome, p.cognome
                    ORDER BY vittorie DESC;';

        $result = $mydb->query($query1);

        if ($result) {
            echo "<h1>Winning Pilots</h1>";
            echo "<table border='1'>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Victories</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row["nome"] . "</td><td>" . $row["cognome"] . "</td><td>" . $row["vittorie"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Query failed: " . $mydb->error;
        }

        $query2 = 'SELECT s.nome, COUNT(partecipa.fkPilota) AS vittorie
                    FROM scuderia s
                    INNER JOIN pilota ON s.id = pilota.fkScuderia
                    INNER JOIN partecipa ON pilota.id = partecipa.fkPilota
                    WHERE partecipa.posizione = 1
                    GROUP BY s.id
                    HAVING vittorie > 0
                    ORDER BY vittorie DESC';

        $result2 = $mydb->query($query2);

        if ($result2) {
            echo "<h1>Team Victories</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Victories</th></tr>";

            while ($row = $result2->fetch_assoc()) {
                echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["vittorie"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Second query failed: " . $mydb->error;
        }
        
        $query3 = 'SELECT p.id, p.nome, p.cognome, COUNT(*) AS vittorie
                    FROM pilota p
                    JOIN partecipa pa ON p.id = pa.fkPilota
                    WHERE pa.posizione = 1
                    GROUP BY p.id, p.nome, p.cognome
                    HAVING vittorie >= 3
                    ORDER BY p.cognome, p.nome;';

        $result3 = $mydb->query($query3);

        if ($result3) {
            echo "<h1>Pilots with at least 3 Victories</h1>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Victories</th></tr>";

            while ($row = $result3->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["cognome"] . "</td><td>" . $row["vittorie"] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Third query failed: " . $mydb->error;
        }

        $query4 = 'SELECT s.nome AS team_name, SUM(sp.importo) AS total_income
        FROM scuderia s
        LEFT JOIN sponsorizza sp ON s.id = sp.fkScuderia
        GROUP BY s.nome
        ORDER BY total_income DESC;';

        $result4 = $mydb->query($query4);

        if ($result4) {
            echo "<h1>Teams by Total Sponsor Income</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Team Name</th><th>Total Income</th></tr>";

            while ($row = $result4->fetch_assoc()) {
                echo "<tr><td>" . $row["team_name"] . "</td><td>" . $row["total_income"] . "</td></tr>";
            }

            echo "</table>";
        } else {
        echo "Fourth query failed: " . $mydb->error;
        }

        $mydb->close();
        ?>
</body>
</html>
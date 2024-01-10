<!DOCTYPE html>
<html>
<head>
    <title>Таблица Автомобилей</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require("config.php"); // Assicurati che config.php sia presente e contenga le costanti di connessione.

    $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);

    if ($mydb->connect_error) {
        echo "Ошибка при подключении к MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
        exit();
    }
    $mydb->set_charset("utf8");
    $query = "SELECT * FROM `авто`";
    $result = $mydb -> query($query);

    if ($result) {
        echo "<table>";
        echo "<tr><th>ИД</th><th>Марка</th><th>Модель</th><th>Комплектация</th><th>Год</th><th>Пробег</th><th>Топливо</th><th>Трансмиссия</th><th>kW</th><th>Цена</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['идентификатор'] . "</td>";
            echo "<td>" . $row['марка'] . "</td>";
            echo "<td>" . $row['модель'] . "</td>";
            echo "<td>" . $row['комплектация'] . "</td>";
            echo "<td>" . $row['год'] . "</td>";
            echo "<td>" . $row['пробег'] . "</td>";
            echo "<td>" . $row['топливо'] . "</td>";
            echo "<td>" . $row['трансмиссия'] . "</td>";
            echo "<td>" . $row['кВт'] . "</td>";
            echo "<td>" . $row['цена'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $result -> free();
    } else {
        echo "Грешка в заявката: " . $mydb -> error;
    }

    $mydb->close();
?>
</body>
</html>

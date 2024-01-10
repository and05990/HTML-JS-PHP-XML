<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детали Автомобиля</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Поиск Автомобиля по ID</h1>
    <form method="get">
        <label for="auto_id">Введите ID автомобиля:</label>
        <input type="text" id="auto_id" name="id">
        <input type="submit" value="Поиск">
    </form>

    <?php
        require("config.php");
        $mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
        if ($mydb -> connect_error) {
            die("Ошибка подключения к базе данных: " . $mydb -> connect_error);
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
                    echo "<h2>Детали автомобиля</h2>";
                    echo "<p>ID: " . $row['id'] . "</p>";
                    echo "<p>Марка: " . $row['marca'] . "</p>";
                    echo "<p>Модель: " . $row['modello'] . "</p>";
                    echo "<p>Комплектация: " . $row['allestimento'] . "</p>";
                    echo "<p>Год: " . $row['anno'] . "</p>";
                    echo "<p>Пробег: " . $row['chilometri'] . "</p>";
                    echo "<p>Топливо: " . $row['alimentazione'] . "</p>";
                    echo "<p>Трансмиссия: " . $row['cambio'] . "</p>";
                    echo "<p>кВт: " . $row['kw'] . "</p>";
                    echo "<p>Цена: " . $row['prezzo'] . "</p>";
                } else {
                    echo "<p>Результаты по введенному ID не найдены.</p>";
                }
            } else {
                echo "<p>Ошибка запроса: " . $stmt->error . "</p>";
            }

            $stmt -> close();
        } else {
            echo "<p>Введите ID</p>";
        }

        $mydb -> close();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Componi il tuo panino</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <ul>
            <li><input type="checkbox" name="carne" checked>Carne</li>
            <li><input type="checkbox" name="salsa" checked>Salsa</li>
            <li><input type="checkbox" name="cetriolini" checked>Cetriolini</li>
            <li><input type="checkbox" name="cipolla" checked>Cipolla</li>
            <li><input type="checkbox" name="insalata" checked>Insalata</li>
            <li><input type="checkbox" name="formaggio" checked>Formaggio</li>
            <li><input type="checkbox" name="pomodori" checked>Pomodori</li>
            <input type="submit" value="invia">
        </ul>
        
    </form>
</body>
</html>
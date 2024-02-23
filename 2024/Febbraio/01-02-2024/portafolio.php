<?php
    session_start();

    echo '<link rel="stylesheet" href="style.css">';

    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["citta"]) && isset($_POST["descrizione"]) && isset($_POST["link"])) 
    {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $citta = $_POST["citta"];
        $descrizione = $_POST["descrizione"];
        $link = $_POST["link"];

        if(!empty($nome) && !empty($cognome) && !empty($citta) && !empty($descrizione) && !empty($link))
        {
            $portNome = $nome;
            $portCognome = $cognome;
            $portCitta = $citta;
            $portDescrizione = $descrizione;
            $portLink = $link;

            echo "<h1>$portNome $portCognome</h1>";
            echo "Città: $portCitta<br>";
            echo "Descrizione: $portDescrizione<br>";
            echo "Link: $portLink<br>";

            require_once("config.php");
            $mydb = new mysqli(SERVER,UTENTE,PASSWORD,DATABASE);
            if($mydb->connect_errno){
                echo "Errore di connessione al DB: ".$mydb->connect_error;
                exit();
            }
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Portfolio</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <img id='fotoProfilo'>
                <input id="imgInput" accept="image/*" type="file">
            </body>
            <script>
                const inputImg = document.getElementById('imgInput')
                const img = document.getElementById('fotoProfilo')

                function getImg(event){
                    const file = event.target.files[0];
                    let url = window.URL.createObjectURL(file);
                    img.src = url
                }
                inputImg?.addEventListener('change', getImg)
            </script>
            </html>
            <?php
        }
    } else {
        header("Location: index.php");
    }
?>

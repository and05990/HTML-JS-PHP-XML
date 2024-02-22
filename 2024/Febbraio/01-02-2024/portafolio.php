<?php
    session_start();

    $fotoProfilo = "";

    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["citta"]) && isset($_FILES["fotoProfilo"]) && isset($_POST["descrizione"]) && isset($_POST["link"])) 
    {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $citta = $_POST["citta"];
        $descrizione = $_POST["descrizione"];
        $link = $_POST["link"];

        if (isset($_FILES["fotoProfilo"]) && isset($_FILES["fotoProfilo"]["error"]) == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($_FILES["fotoProfilo"]["name"]);
        
            if (move_uploaded_file($_FILES["fotoProfilo"]["tmp_name"], $uploadFile)) {
                $fotoProfilo = $uploadFile;
            } else {
                header("Location: index.php");
                exit;  
            }
        }

        if(!empty($nome) && !empty($cognome) && !empty($citta) && !empty($descrizione) && !empty($link))
        {
            $portNome = $nome;
            $portCognome = $cognome;
            $portCitta = $citta;
            $portFotoProfilo = $fotoProfilo;
            $portDescrizione = $descrizione;
            $portLink = $link;

            echo "Nome: $portNome<br>";
            echo "Cognome: $portCognome<br>";
            echo "Città: $portCitta<br>";
            echo "Descrizione: $portDescrizione<br>";
            echo "Link: $portLink<br>";
            echo '<img src="'.htmlspecialchars($portFotoProfilo).'" alt="Profilo Image"><br>';
        }
    } else {
        header("Location: index.php");
    }
?>

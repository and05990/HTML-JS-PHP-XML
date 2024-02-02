<?php
    session_start();

    if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["citta"]) && isset($_POST["fotoProfilo"]) && isset($_POST["descrizione"]))
    {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $citta = $_POST["citta"];
        $fotoProfilo = $_POST["fotoProfilo"];
        $descrizione = $_POST["descrizione"];

        if(empty($nome) || empty($cognome) || empty($citta) || empty($fotoProfilo) || empty($descrizione))
        {
            header("Location: index.php");
        } else {
            $portNome = $nome;
            $portCognome = $cognome;
            $portCitta = $citta;
            $portFotoProfilo = $fotoProfilo;
            $portDescrizione = $descrizione;

            
        }
    } else {
        header("Location: index.php");
    }
?>



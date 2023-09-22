<?php
    if (isset($_POST["nome"]) && isset($_POST["cognome"]))
    {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        echo "Ciao ".$nome." ".$cognome;
    } else {
        header("Location: index.php");
        exit;
    }
?>
<?php
    session_start();
    if(isset($_POST["nome"]) && isset($_POST["cognome"]))
    {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        
        echo "<h1>".$nome."</h1>";
    }
?>
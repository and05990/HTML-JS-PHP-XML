<?php
    session_start();

    if(isset($_POST["nome"]))
    {
        $_SESSION["nome"] = $_POST["nome"];
    }

    header("Location: main.php");
?>
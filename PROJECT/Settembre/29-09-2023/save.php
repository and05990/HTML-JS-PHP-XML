<?php
    session_start();
    if(isset($_POST["nome"]))
    {
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["score"] = 0;
        $_SESSION["nQuest"] = 0;
    }

    header("Location: main.php")
?>
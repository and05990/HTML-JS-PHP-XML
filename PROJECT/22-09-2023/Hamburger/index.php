<?php
    if (isset($_POST["carne"]) || isset($_POST["salsa"]) || isset($_POST["cetriolini"]) || isset($_POST["cipolla"]) || isset($_POST["insalata"]) || isset($_POST["formaggio"]) || isset($_POST["pomodori"]))
    {
        echo "Ordine effettuato";
    } else {
        header("Location: main.php");
        exit;
    }
?>
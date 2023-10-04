<?php
    session_start();

    /* if(isset($_SESSION["nome"]) && isset($_SESSION["quest"]))
    {
        $quest = $_SESSION["quest"];
        echo "<p>".$quest -> getQuest(0)."</p>";
    }  */
    $quest = $_SESSION["quest"];
    echo "<p>".$quest -> getQuest(0)."</p>";
?>
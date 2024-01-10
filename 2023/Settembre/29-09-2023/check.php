<?php
    session_start();
    require("domanda.php");
    if(isset($_POST["risp"]))
    {
        if($quest[$_SESSION["nQuest"]] -> isCrrct($_POST["risp"]))
        {
            $_SESSION["score"] += 10;
        }
        $_SESSION["nQuest"]++;
    }

    header("Location: main.php");
    exit();
?>
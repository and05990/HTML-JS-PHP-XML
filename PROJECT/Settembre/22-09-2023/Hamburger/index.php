<?php
    if (isset($_POST["carne"]) || isset($_POST["salsa"]) || isset($_POST["cetriolini"]) || isset($_POST["cipolla"]) || isset($_POST["insalata"]) || isset($_POST["formaggio"]) || isset($_POST["pomodori"]))
    {
        echo "<h1>Il tuo panino è composto da:</h1>";
        if (isset($_POST["carne"]))
        {
            echo "Carne<br>";
        }

        if (isset($_POST["salsa"])) 
        {
            echo "Salsa<br>";
        }

        if (isset($_POST["cetriolini"])) 
        {
            echo "Cetriolini<br>";
        }

        if (isset($_POST["cipolla"]))
        {
            echo "Cipolla<br>";
        }

        if (isset($_POST["insalata"])) 
        {
            echo "Insalata<br>";
        }

        if (isset($_POST["formaggio"])) 
        {
            echo "Formaggio<br>";
        }

        if (isset($_POST["pomodori"])) 
        {
            echo "Pomodori<br>";
        }
        
    } else {
        header("Location: main.php");
        exit;
    }
?>

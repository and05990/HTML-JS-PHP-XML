<?php
    setcookie("prova", "prova", strtotime("+30 days"));
    if(isset($_COOKIE["prova"]))
    {
        echo $_COOKIE["prova"];
    } else {
        echo "<p>Non trovato</p>";
    }
?>
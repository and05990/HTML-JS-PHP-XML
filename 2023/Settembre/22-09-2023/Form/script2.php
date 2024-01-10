<!-- access from link aad add ?saluto="ciao" 
http://localhost/example/22-09-2023/Form/script2.php?saluto=ciao&nome=Skedri
-->

<?php
    if (isset($_GET["saluto"]) && $_GET["nome"])
    {
        echo $_GET["saluto"]." ache a te ".$_GET["nome"];
    } else {
        echo "Non mi hai salutato :(";
    }
?>
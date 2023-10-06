<?php
    session_start();
    include("domanda.php");
    if(!isset($_COOKIE["record"]))
    {
        setcookie("record", 0, strtotime("+30 days"));
    }

    if(!isset($_SESSION["nome"]))
    {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <form action="save.php" method="post">
                    <input type="text" name="nome" placeholder="Nome">
                    <input type="submit" name="Send" value="send">
                </form>
            </body>
            </html>
        <?php
    } else {
        if($_SESSION["nQuest"] < count($quest))
        {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <div class="container">
                    <form action="check.php" method="post">
                        <?php
                            echo $quest[$_SESSION["nQuest"]] -> getQuest()."<br>";
                            foreach($quest[$_SESSION["nQuest"]] -> getAnswr() as $answer)
                            {
                                echo '<p><input name="risp" type="radio" value="'.$answer.'">'.$answer.'</p>';
                            }
                        ?>
                        <input type="submit" value="Send" name="send">
                    </form>
                </div>
                
            </body>
            </html>
            <?php
        } else {
            if($_SESSION["score"] > $_COOKIE["record"])
            {
                setcookie("record", $_SESSION["score"], strtotime("+30 days"));
            }
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Score</title>
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <div class="container"><p>
                    <?php 
                        echo '<link rel="stylesheet" href="style.css">';
                        echo "Il punteggio è: ".$_SESSION["score"]."</br>";
                        echo "Il tuo record è: ".$_COOKIE["record"];
                    ?>
                </p> 
            </div>
            </body>
            </html>
            <?php
        }
        
    }
?>


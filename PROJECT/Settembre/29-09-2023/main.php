<?php
    session_start();
    if(!isset($_COOKIE["record"]))
    {
        setcookie("record", 0, strtotime("+30 days"));
    }

    if(!isset($_SESSION["player"]))
    {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz</title>
            </head>
            <body>
                <form action="save.php" method="post">
                    <input type="text" name="nome" placeholder="Nome">
                    <input type="submit" name="semd" value="send">
                </form>
            </body>
            </html>
        <?php
    } else {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Quiz</title>
            </head>
            <body>
                <form action="check.php" method="post">
                    <?php
                        echo $quest[$_SESSION["nQuest"]] -> getQuest."<br>";
                        foreach($quest[$_SESSION["nQuest"]] -> getAnswr() as $answer)
                        {
                            echo '<p><input name="answer type="radio" value="'.$answer.'>"'.$answer.'</p>';
                        }
                    ?>
                    <input type="submit" value="send" name="send">
                </form>
            </body>
            </html>
        <?php
    }
?>


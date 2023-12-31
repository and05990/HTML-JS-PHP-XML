<?php
    session_start();
    $banco = 0;
    $score = 0;

    if (!isset($_SESSION['mano']))
    {
        $_SESSION['mano'] = [];
    }

    if (!isset($_SESSION['punteggio'])) 
    {
        $_SESSION['punteggio'] = 0;
    }

    if (!isset($_SESSION['banco'])) 
    {
        $_SESSION['banco'] = 0;
    }

    function calcolaValoreMano($mano) 
    {
        $valore = 0;
        $carteSetteMezzo = ['1', '2', '3', '4', '5', '6', '7', 'fante', 'cavallo', 're'];

        foreach ($mano as $carta)
        {
            $cartaValore = explode('_', $carta)[0];

            if (in_array($cartaValore, $carteSetteMezzo)) 
            {
                if ($cartaValore == 'fante' || $cartaValore == 'cavallo' || $cartaValore == 're') 
                {
                    $valore += 0.5;
                } else {
                    $valore += floatval($cartaValore);
                }
            }
        }

        return $valore;
    }

    if (isset($_POST['nuova_carta'])) 
    {
        $carteSetteMezzo = ['1', '2', '3', '4', '5', '6', '7', 'fante', 'cavallo', 're'];
        $mazzo = [];
        foreach ($carteSetteMezzo as $carta) 
        {
            $mazzo[] = $carta . '_di_denari';
            $mazzo[] = $carta . '_di_spade';
            $mazzo[] = $carta . '_di_coppe';
            $mazzo[] = $carta . '_di_bastoni';
        }

        shuffle($mazzo);

        $cartaPescata = array_shift($mazzo);
        $_SESSION['mano'][] = $cartaPescata;
        $_SESSION['punteggio'] = calcolaValoreMano($_SESSION['mano']);
        $score = $_SESSION['punteggio'];

        $cartaPescata = array_shift($mazzo);
        $_SESSION['mano'][] = $cartaPescata;
        $_SESSION['banco'] += calcolaValoreMano($_SESSION['mano']);
        $banco = $_SESSION['banco'];

        if ($banco >= 7.5 || $score >= 7.5) 
        {
            if ($banco == 7.5 && $score == 7.5) 
            {
                echo "Pareggio";
            } else if ($banco == 7.5 && $score < 7.5) {
                echo "Hai perso";
            } else if ($banco < 7.5 && $score == 7.5) {
                echo "Hai vinto";
            } else if ($banco > 7.5 && $score < 7.5) {
                echo "Hai vinto";
            } else if ($banco < 7.5 && $score > 7.5) {
                echo "Hai perso";
            } else if ($banco > 7.5 && $score > $banco) {
                echo "Hai perso";
            } else if ($banco > 7.5 && $score < $banco) {
                echo "Hai vinto";
            }
            echo "<script>document.getElementsByName('nuova_carta')[0].disabled = true;</script>";
            session_unset();
            session_destroy();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sette e Mezzo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sette e Mezzo</h1>
    <p>Il tuo punteggio: <?php echo $score; ?></p>
    <p>Il banco sta a: <?php echo $banco; ?></p>
    <form method="post">
        <input type="submit" name="nuova_carta" value="Pesca una nuova carta">
        <input type="submit" name="ferma" value="Reset">
    </form>
</body>
</html>

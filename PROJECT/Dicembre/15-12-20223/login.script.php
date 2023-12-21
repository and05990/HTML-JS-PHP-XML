<?php
	session_start();
	$_SESSION["errore_login"]=true;

	if(isset($_POST["submit"])){
		require("config.php");
		$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
		if ($mydb->connect_errno) {
			echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
			exit();
		}

		$stmt = $mydb->prepare("SELECT id, nome, hash FROM utenti WHERE nome = (?)");
		$stmt->bind_param("s", $_POST["usr"]);
		$stmt->execute();
		$stmt->bind_result($id, $nome, $hash);
		while ($stmt->fetch())
		{
			if(password_verify($_POST["pwd"], $hash))
			{
				unset($_SESSION["errore_login"]);
				$_SESSION["nome"] = $nome;
				$_SESSION["id"] = $id;
			}
		}
		$stmt->close();
	}

	header("Location: login.php");
	exit();
?>

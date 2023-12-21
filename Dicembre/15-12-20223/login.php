<?php
	session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Login</title>
</head>
<body>
	<?php
		if(isset($_SESSION["id"])){
			?>
				<h1>ESCI <?php echo $_SESSION["nome"]; ?></h1>
				<a href="logout.script.php">Clicca per il logout</a>
			<?php
		} else {
			?>
			<form id="login" name="login" method="post" action="login.script.php">
				<input type="text" placeholder="Inserisci username" name="usr" required>
				<input type="password" placeholder="Inserisci password" name="pwd" required>
				<input type="submit" name="submit" value="Login">
			</form>

			<?php
			if(isset($_SESSION["errore_login"]) && $_SESSION["errore_login"]==true)
			{
				echo "<p>Riprova!</p>";
				unset($_SESSION["errore_login"]);
			}
		}
	?>
</body>
</html>
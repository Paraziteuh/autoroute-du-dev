<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Créer votre compte</title>
</head>
<body>
	<h1>Créer votre compte</h1>
	<form action="ajouter_compte.php" method="POST">
		<label for="login">Login:</label>
		<input type="text" id="login" name="login" required>
		<br>
		<label for="password">Mot de passe:</label>
		<input type="password" id="password" name="password" required>
		<br><br>
		<input type="submit" value="Créer le compte">
	</form>
</body>
<style>
    /* Mise en forme générale */
    body {
      font-family: Arial, sans-serif;
      background-color: #778899;
	  text-align: center;
    }

    /* Mise en forme du titre */
    h1 {
      text-align: center;
      margin-top: 50px;
    }
    </style>
</html>

<?php
// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=account;charset=utf8';
$username = 'root';
$password = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$bdd = new PDO($dsn, $username, $password, $options);

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Récupération des valeurs des champs login et mot de passe
	$login = $_POST['login'];
	$password = $_POST['password'];

	// Vérification que le login n'existe pas déjà dans la base de données
	$stmt = $bdd->prepare('SELECT COUNT(*) FROM comptes WHERE login = :login');
	$stmt->bindParam(':login', $login);
	$stmt->execute();
	if ($stmt->fetchColumn() > 0) {
		echo "Ce login est déjà utilisé.";
		exit;
	}

	// Hashage du mot de passe
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// Insertion du compte dans la base de données
	$stmt = $bdd->prepare('INSERT INTO comptes (login, password_hash) VALUES (:login, :password_hash)');
	$stmt->bindParam(':login', $login);
	$stmt->bindParam(':password_hash', $password_hash);
	$stmt->execute();

	echo "Le compte a été créé avec succès.";
}
?>

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
	$stmt = $bdd->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
	$stmt->bindParam(':login', $login);
	$stmt->execute();
	if ($stmt->fetchColumn() > 0) {
		echo "Ce login est déjà utilisé.";
		exit;
	}

	// Hashage du mot de passe
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	// Insertion du compte dans la base de données
	$stmt = $bdd->prepare('INSERT INTO account (login, password_hash) VALUES (:login, :password_hash)');
	$stmt->bindParam(':login', $login);
	$stmt->bindParam(':password_hash', $password_hash);
	$stmt->execute();

	echo "Le compte a été créé avec succès.";
}
?>

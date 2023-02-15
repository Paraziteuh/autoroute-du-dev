<?php

if(isset($_POST['submit'])) {
  // Récupération des données du formulaire
  $login = $_POST['login'];
  $pw = $_POST['pw'];

  // Connexion à la base de données
  $conn = new PDO("mysql:host=localhost;dbname=compte", "root", "");

  // Préparation de la requête pour enregistrer les informations de connexion
  $stmt = $conn->prepare("INSERT INTO compte (login, password) VALUES (?, ?)");
  $stmt->bindValue(1, $login);
  $stmt->bindValue(2, $pw);

  // Exécution de la requête
  $stmt->execute();

  // Redirection vers la page d'accueil
  header("Location: accueil.php");
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Créer un compte</title>
</head>
<body>
  <h1>Créer un compte</h1>
  <form action="" method="post">
    <label for="login"> &ensp;Login &ensp;&ensp;:</label>
    <input type="text" id="login" name="login" required>
    <br>
    <br>
    <label for="pw">Password :</label>
    <input type="password" id="pw" name="pw" required>
    <br>
    <br>
    <input type="submit" value="Créer le compte" name="submit">
  </form>
</body>
</html>

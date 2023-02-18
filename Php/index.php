<?php
session_start();

$error = isset($_GET['error']) ? $_GET['error'] : null;

if ($error) {
    echo "Login ou mot de passe incorrects. Veuillez réessayer ou créer un compte.";
}

?>

<form action="verif.php" method="post">
  <label for="login">Login:</label>
  <input type="text" id="login" name="login">
  <br><br>
  <label for="pw">Mot de passe:</label>
  <input type="password" id="pw" name="pw">
  <br><br>
  <input type="submit" value="Se connecter">
  <br><br>
  <a href="inscription.php">Créer un compte</a>
</form>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Lexend Deca', sans-serif;
            color: #778899;
            background-color: #778899;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 640px;
            padding: 50px;
            background-color: #FFFAF0;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        form label, form input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #FFFAFA;
            color: #000000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

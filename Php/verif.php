<?php

session_start();
require_once 'compte.php';
require_once 'compteDAO.php';

$login = $_POST['login'];
$pw = $_POST['pw'];
/* $pw = password_hash($pw, PASSWORD_DEFAULT); */

$compte = new Compte($login, $pw);
$compteDAO = new CompteDAO($compte);
 


if($compteDAO->verifCompte()){
  $_SESSION['login'] = $login;
  header('Location:accueil.php');
  exit();
} else {
  $php_errormsg = "Login ou mot de passe incorrects. Veuillez réessayer ou créer un compte.";
}

?>



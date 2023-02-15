<?php

session_start();
require_once 'compte.php';
require_once 'compteDAO.php';

$login = $_POST['login'];
$pw = $_POST['pw'];

$compte = new Compte($login, $pw);
$compteDAO = new CompteDAO($compte);
 


if($compteDAO->verifCompte()){
  $_SESSION['login'] = $login;
  header('Location:accueil.php');
  exit();
} else {


  header('Location:index.php');

  $php_errormsg = "Login ou mot de passe incorrects. Veuillez réessayer ou créer un compte.";
}

?>


z
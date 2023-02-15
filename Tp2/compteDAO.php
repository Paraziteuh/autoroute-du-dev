<?php

#require_once 'account.php';

class CompteDAO {
  private $lecompte;
  private $db;

  // Définissez un constructeur pour initialiser l'objet CompteDAO
  public function __construct($lecompte) {
    $this->lecompte = $lecompte;

    // Connectez-vous à la base de données SQLite
    $this->db = new PDO("mysql:host=localhost;dbname=account", "root", "");
  }

  public function verifCompte() {
    // Récupérez les informations du compte depuis la base de données
    try {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
        $stmt -> bindValue (1, $this->lecompte->getLogin());
        $stmt -> bindValue (2, $this->lecompte->getPw());
        $stmt->execute();
        $result = $stmt->rowCount();

    /* Vérifiez si les informations du compte sont correctes*/

    if ($result >=1) {
      return true;
    } else {
      return false;
    }
    }
    catch(PDOException $e){
      die('Erreur : '.$e->getMessage());
    }
  }
}
?>
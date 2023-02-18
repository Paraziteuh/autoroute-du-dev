<?php

class Compte {
  private $login;
  private $pw;

  public function __construct($login, $pw){
    $this->login = $login;
    $this->pw = $pw;
  }

  public function getLogin(){
    return $this->login;
  }

  public function getPw(){
    return $this->pw;
  }
}

?>

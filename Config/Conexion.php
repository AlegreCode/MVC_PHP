<?php

class Conexion
{
  private $cnx;

  public function __construct() {
    $this->cnx = new PDO("mysql:host=localhost;dbname=login_php","root","");
  }
  public function conectar()
  {
    return $this->cnx;
  }
}

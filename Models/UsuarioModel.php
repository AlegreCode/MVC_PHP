<?php

require_once APP_PATH['config'] . "Conexion.php";

class UsuarioModel
{
  private $id;
  private $nombre;
  private $usuario;
  private $password;
  private $privilegio;
  private $fecha_registro;

  private $cnx;

  public function __construct() {
    $conexion = new Conexion();
    $this->cnx = $conexion->conectar();
  }

  public function set($att, $cont)
  {
    $this->$att = $cont;
  }

  public function get($att)
  {
    return $this->$att;
  }

  public function registrar($tabla, $datos)
  {
    $stmt = $this->cnx->prepare("INSERT INTO $tabla SET nombre=:nombre, username=:username, email=:email, password=:password, privilegio=2");
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":username", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

    $respuesta = $stmt->execute() ? true : false;

    return $respuesta;
    $stmt->close();
  }

  public function iniciarSesion($tabla, $datos)
  {
    $stmt = $this->cnx->prepare("SELECT * FROM $tabla WHERE username=:username AND password=:password");
    $stmt->bindParam(":username", $datos['usuario'], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  public function editarPerfil($tabla, $datos)
  {
    $stmt = $this->cnx->prepare("UPDATE $tabla SET nombre=:nombre, username=:username, email=:email, password=:password WHERE id=:id");
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":username", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

    $resultado = $stmt->execute() ? true : false;

    return $resultado;

    $stmt->close();
  }

  public function listar($tabla)
  {
    $stmt = $this->cnx->prepare("SELECT * FROM $tabla");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  public function getUser($tabla, $datos)
  {
    $stmt = $this->cnx->prepare("SELECT * FROM $tabla WHERE id=:id");
    $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }

  public function actualizarUsuario($datos, $tabla)
  {
    $stmt = $this->cnx->prepare("UPDATE $tabla SET nombre=:nombre, username=:username, email=:email, privilegio=:privilegio WHERE id=:id");
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt->bindParam(":privilegio", $datos["privilegio"], PDO::PARAM_INT);

    $resultado = $stmt->execute() ? true : false;
    return $resultado;
    $stmt->close();
  }

  public function deleteUsuario($datos, $tabla)
  {
    $stmt = $this->cnx->prepare("DELETE FROM $tabla WHERE id=:id");
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
    $resultado = $stmt->execute() ? true : false;
    return $resultado;
    $stmt->close();
  }

}

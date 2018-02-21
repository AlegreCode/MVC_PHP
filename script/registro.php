<?php
define("APP_PATH",[
  "controllers" => "../Controllers/",
  "models" => "../Models/",
  "views" => "../Views/",
  "config" => "../Config/"
]);

define("ROOT", "http://localhost/Proyectos/PHP/MVC_4/");

require_once  APP_PATH['controllers'] . 'usuarioController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['email'])){
    $data = [
      'nombre' => $_POST['nombre'],
      'usuario' => $_POST['usuario'],
      'password' => $_POST['password'],
      'email' => $_POST['email'],
    ];

    $usuarioController = new UsuarioController();

    $resultado = $usuarioController->actionRegistrarse("usuarios", $data);
    echo $resultado;
  }
}

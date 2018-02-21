<?php

define("APP_PATH",[
  "controllers" => "../Controllers/",
  "models" => "../Models/",
  "views" => "../Views/",
  "config" => "../Config/"
]);

define("ROOT", "http://localhost/Proyectos/PHP/MVC_4/");

require_once  APP_PATH['controllers'] . 'usuarioController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
  if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["privilegio"]) && isset($_POST["email"])) {

    $datos = [
      "id" => $_POST["id"],
      "nombre" => $_POST["nombre"],
      "username" => $_POST["username"],
      "password" => $_POST["password"],
      "email" => $_POST["email"],
      "privilegio" => $_POST["privilegio"]
    ];

    $usearioController = new UsuarioController();

    $respuesta = $usearioController->actionActualizarUser($datos);

    $resultado = [];

    if ($respuesta) {
      $resultado = ["estado" => true];
    } else {
      $resultado = ["estado" => false];
    }

    echo json_encode($resultado);
  }
}

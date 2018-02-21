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
  if (isset($_POST["id"])) {

    $datos = [
      "id" => $_POST["id"]
    ];

    $usearioController = new UsuarioController();

    $respuesta = $usearioController->actionDelete($datos);

    $resultado = [];

    if ($respuesta) {
      $resultado = ["estado" => true];
    } else {
      $resultado = ["estado" => false];
    }

    echo json_encode($resultado);
  }
}

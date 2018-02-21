<?php

define("APP_PATH",[
  "controllers" => "../Controllers/",
  "models" => "../Models/",
  "views" => "../Views/",
  "config" => "../Config/"
]);

define("ROOT", "http://localhost/Proyectos/PHP/MVC_4/");

require_once  APP_PATH['controllers'] . 'usuarioController.php';

session_start();

if($_SERVER['REQUEST_METHOD'] === "POST") {
  if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['password'])) {

    $datos = array(
      "id" => $_POST["id"],
      "nombre" => $_POST["nombre"],
      "usuario" => $_POST["usuario"],
      "email" => $_POST["email"],
      "password" => $_POST["password"],
    );

    $usuarioController = new UsuarioController();
    $respuesta = $usuarioController->actionEditarPerfil("usuarios", $datos);

    foreach ($respuesta as $item => $value) {
      $resultado[$item] = $value;
    }

    if ($resultado["estado"]) {
      $_SESSION['usuario']['nombre'] = $datos["nombre"];
      $_SESSION['usuario']['usuario'] = $datos["usuario"];
      $_SESSION['usuario']['email'] = $datos["email"];
    }
    echo json_encode($respuesta);
  }
}

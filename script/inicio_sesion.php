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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['usuario']) && isset($_POST['password'])){
    $data = [
      'usuario' => $_POST['usuario'],
      'password' => $_POST['password']
    ];

    $usuarioController = new UsuarioController();

    $resultado = $usuarioController->actionInicioSesion("usuarios", $data);

    foreach ($resultado as $key => $value) {
      $datos[$key] = $value;
    }

    if ($datos["estado"]) {
      $_SESSION['usuario'] = array(
        "id" => $datos["id"],
        "nombre" => $datos["nombre"],
        "usuario" => $datos["username"],
        "email" => $datos["email"],
        "privilegio" => $datos["privilegio"]
      );
    }

    echo json_encode($resultado);
  }
}

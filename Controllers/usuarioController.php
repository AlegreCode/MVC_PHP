<?php

require_once APP_PATH['config'] . "Render.php";
require_once APP_PATH['models'] . "UsuarioModel.php";

class UsuarioController
{
  private $userModel;

  public function __construct() {
    $this->userModel = new UsuarioModel();
  }
  public function actionIndex()
  {
    header('Location: /error');
  }

  public function actionError()
  {
    header('Location: /usuario/panel');
  }

  public function actionRegistro()
  {
    Render::render("registro");
  }

  public function actionInicioSesion($tabla, $datos)
  {
    $data = [];

    $respuesta = $this->userModel->iniciarSesion($tabla, $datos);

    if(Count($respuesta) > 0){
      foreach ($respuesta as $item) {
        $data = [
          "id"=>$item["id"],
          "nombre"=> $item["nombre"],
          "email"=> $item["email"],
          "username"=> $item["username"],
          "privilegio" => $item["privilegio"],
          "estado" => true
        ];
      }
    }else {
      $data = ["estado" => false];
    }
    return $data;
  }

  public function actionRegistrarse($tabla, $datos)
  {
    $respuesta = $this->userModel->registrar($tabla, $datos);
    return $respuesta;
  }

  public function actionPanel()
  {
    Render::render("panel");
  }

  public function actionLogout()
  {
    if (isset($_GET['user'])) {
      session_start();
      session_destroy();
      $datos = ["estado" => true];
      sleep(3);
      echo json_encode($datos);
    } else {
      header('Location: /');
      exit();
    }

  }

  public function actionEditar()
  {
    Render::render("editar_perfil");
  }

  public function actionEditarPerfil($tabla, $datos)
  {
    $respuesta = $this->userModel->editarPerfil($tabla, $datos);
    if($respuesta){
      $resultado = array("estado" => true);
    }else{
      $resultado = array("estado" => false);
    }
    return $resultado;
  }

  public function actionListar()
  {
    $respuesta = $this->userModel->listar("usuarios");
    Render::render("listar", ["datos" => $respuesta]);
  }

  public function actionActualizar($dato)
  {
    $respuesta = $this->userModel->getUser("usuarios",$dato);

    Render::render("editar_user",["datos" => $respuesta]);
  }

  public function actionActualizarUser($datos)
  {
    $respuesta = $this->userModel->actualizarUsuario($datos, "usuarios");
    return $respuesta;
  }

  public function actionDelete($datos)
  {
    $respuesta = $this->userModel->deleteUsuario($datos, "usuarios");
    return $respuesta;
  }
}

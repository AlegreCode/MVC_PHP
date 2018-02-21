<?php

class Enrutador
{
  protected $controller = "AppController";
  protected $method = "actionIndex";
  protected $params = [];

  public function __construct() {
    $this->getController();
  }

  public function getController()
  {
    if (isset($_GET['url'])) {
      $url = $this->getUrl();

      $controllerName = ucfirst(strtolower($url[0])) . "Controller";
      unset($url[0]);
      $ruta = APP_PATH["controllers"] . $controllerName . ".php";

      if (is_readable($ruta)) {

        include_once $ruta;

        $this->controller = new $controllerName;

        if (isset($url[1])) {

          $methodName = "action" . ucfirst(strtolower($url[1]));
          unset($url[1]);

          if(method_exists($this->controller, $methodName)){
            $this->method = $methodName;
          }else {
            $this->method = "actionError";
          }
        }

        $this->params = $url ? array_values($url) : $this->params;

      } else {
        header('Location: error');
      }

    } else {
      include_once APP_PATH["controllers"] . $this->controller . ".php";
      $this->controller = new $this->controller;
    }
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function getUrl()
  {
    return explode("/", filter_var(rtrim($_GET['url']), FILTER_SANITIZE_URL));
  }
}



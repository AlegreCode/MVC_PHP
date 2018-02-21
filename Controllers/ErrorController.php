<?php
require_once APP_PATH['config'] . "Render.php";

class ErrorController
{
  public function actionIndex()
  {
    Render::render("error");
  }
}

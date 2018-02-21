<?php
require_once(APP_PATH["config"] . "Render.php");

class AppController
{
  public function actionIndex()
  {
    Render::render("home");
  }
}

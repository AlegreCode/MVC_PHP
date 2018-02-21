<?php

class Render
{
  public function __construct() {
  }
  public static function render($view, $datos = [])
  {
    foreach ($datos as $key => $value) {
      $$key = $value;
    }

    include_once APP_PATH["views"] . $view . ".php";
  }
}

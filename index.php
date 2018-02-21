<?php

define("APP_PATH",[
  "controllers" => "Controllers/",
  "models" => "Models/",
  "views" => "Views/",
  "config" => "Config/"
]);

define("ROOT", "http://localhost/Proyectos/PHP/MVC_4/");

require_once(APP_PATH["config"] . "Enrutador.php");

$enrutador = new Enrutador();

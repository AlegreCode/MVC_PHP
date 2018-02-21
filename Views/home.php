<?php
  include_once "templates/head.php";
?>
<main class="container">
  <section class="form__cont">
      <form id="form_sesion" class="formulario" action="" method="POST" role="form">
        <legend>Iniciar Sesión</legend>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </div>
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario...">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña...">
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Acceder</button>
        <a href="usuario/registro" class="btn btn-link">Registrarse</a>
      </form>
  </section>
</main>
<?php
  include_once "templates/footer.php";
?>



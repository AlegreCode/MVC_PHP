<?php
  include_once "templates/head.php";
?>
<main class="container">
<section class="form__cont">
    <form class="formulario" id="form_registro" method="POST" role="form">
      <legend>Registrarse</legend>

      <div class="form-group">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre...">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="username" name="usuario" placeholder="Usuario...">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña...">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email...">
      </div>

      <button type="submit" class="btn btn-primary">Registrarse</button>
      <a href="/" class="btn btn-danger">Cancelar</a>
    </form>
</section>
</main>
<?php
  include_once "templates/footer.php";
?>

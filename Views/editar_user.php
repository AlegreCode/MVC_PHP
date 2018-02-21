<?php
  include_once "templates/head.php";
  $data = [];
  foreach ($datos as $item) {
    $data = [
      "id" => $item["id"],
      "nombre" => $item["nombre"],
      "username" => $item["username"],
      "password" => $item["password"],
      "email" => $item["email"],
      "privilegio" => $item["privilegio"]
    ];
  }
?>
<main class="container">
<section class="form__cont">
    <form class="formulario" id="form_actualizar" method="POST" role="form">
      <legend>Editar Usuario: <?php echo $data["nombre"];?></legend>
        <input type="hidden" name="id" value="<?php echo $data['id'];?>">
      <div class="form-group">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php echo $data["nombre"];?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario..." value="<?php echo $data["username"];?>">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña..." value="<?php echo $data["password"];?>">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." value="<?php echo $data["email"];?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="privilegio" name="privilegio" placeholder="Privilegio..." value="<?php echo $data["privilegio"];?>">
      </div>

      <button type="submit" class="btn btn-success btn-block">Actualizar</button>
      <a href="usuario/listar" class="btn btn-danger btn-block">Cancelar</a>
    </form>
</section>
</main>
<?php
  include_once "templates/footer.php";
?>

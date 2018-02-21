<?php
  include_once "templates/head.php";

  if (isset($_SESSION['usuario'])) {
    $id = $_SESSION['usuario']['id'];
    $usuario = $_SESSION['usuario']['usuario'];
    $nombre = $_SESSION['usuario']['nombre'];
    $email = $_SESSION['usuario']['email'];
    $privilegio = $_SESSION['usuario']['privilegio'];
  }else {
    header('Location: /');
  }
?>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <?php
      include_once "templates/menu.php";
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3 well" id="content">
                    <form id="form_editarPerfil" method="POST" role="form">
                      <legend>Editar Perfil</legend>
                      <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                      <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre?>" required>
                      </div>
                      <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $usuario?>" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email?>" required
                      </div>
                      <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Contraseña" required>
                      </div>



                      <button type="submit" class="btn btn-primary">Editar</button>
                      <a href="usuario/panel" class="btn btn-danger">Cancelar</a>
                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php
  include_once "templates/footer.php";
?>

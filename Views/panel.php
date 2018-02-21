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
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Bienvenido <?php echo $nombre;?>!</h1>
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

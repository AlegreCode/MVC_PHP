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
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Nombre</th>
                          <th>Usuario</th>
                          <th>Email</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            foreach ($datos as $item) {
                              echo "<tr>";
                              echo "<td>" . $item['id']. "</td>";
                              echo "<td>" . $item['nombre']. "</td>";
                              echo "<td>" . $item['username']. "</td>";
                              echo "<td>" . $item['email']. "</td>";
                              echo '<td>
                              <a href="usuario/actualizar/'.$item["id"].'" class="btn btn-success">
                              <i class="fa fa-edit" aria-hidden="true"></i>
                              </a>
                              <button type="button" class="btn btn-danger user_delete" data-userid="'.$item["id"].'">
                              <i class="fa fa-times" aria-hidden="true"></i>
                              </button>
                              </td>';
                              echo "</tr>";
                            }
                            ?>
                      </tbody>
                    </table>

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

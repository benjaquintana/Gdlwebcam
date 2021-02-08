<?php
    // Sesiones
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    // Header
    require_once 'templates/header.php';
    // Barra
    require_once 'templates/barra.php';
    // Sidebar
    require_once 'templates/navegacion.php';
?>


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Administradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los usuarios en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="registro" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Usuario</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              try {
                                  $sql = "SELECT id_admin, usuario, nombre, apellido FROM administradores";
                                  $resultado = $conn->query($sql);
                              } catch (\Exception $e) {
                                  $error = $e->getMessage();
                                  echo "$error";
                              }
                              while($admin = $resultado->fetch_assoc() ) { ?>
                                  <tr>
                                    <td><?php echo $admin['usuario'];?></td>
                                    <td><?php echo $admin['nombre'];?></td>
                                    <td><?php echo $admin['apellido'];?></td>
                                    <td>
                                        <a href="editar_admin.php?id=<?php echo $admin['id_admin']?>" class="btn bg-orange btn-flat margin editar_registro">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $admin['id_admin'];?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                  </tr>
                              <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Usuario</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
    // Footer
    require_once 'templates/footer.php';
?>

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
            <h1>Listado de Registrados</h1>
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
                <h3 class="card-title">Maneja los usuarios registrados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="registro" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Fecha</th>
                              <th>Articulos</th>
                              <th>Talleres</th>
                              <th>Regalo</th>
                              <th>Compra</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              try {
                                  $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                                  $sql .= " JOIN regalos ";
                                  $sql .= " ON registrados.regalo = regalos.id_regalo ";
                                  //echo $sql;
                                  $resultado = $conn->query($sql);
                              } catch (\Exception $e) {
                                  $error = $e->getMessage();
                                  echo "$error";
                              }
                              while($registrados = $resultado->fetch_assoc() ) { ?>
                                  <tr>
                                    <td>
                                        <?php echo $registrados['nombre_registrado'];
                                        $pagado = $registrados['pagado'];
                                        if($pagado > 0){
                                            echo '<span class="badge bg-green">Pagado</span>';
                                        }else{
                                            echo '<span class="badge bg-red">No Pagado</span>';
                                        }
                                    ?></td>
                                    <td><?php echo $registrados['apellido_registrado'];?></td>
                                    <td><?php echo $registrados['email_registrado'];?></td>
                                    <td><?php echo $registrados['fecha_registro'];?></td>
                                    <td>
                                        <?php
                                            $articulos = json_decode($registrados['pases_articulos'], true);
                                            $arreglo_articulos = array(
                                                'un_dia' => 'Pase 1 día',
                                                'pase_2dias' => 'Pase 2 días',
                                                'pase_completo' => 'Pase Completo',
                                                'camisas' => 'Camisas',
                                                'etiquetas' => 'Etiquetas',
                                            );
                                            foreach($articulos as $llave => $articulo) {
                                                echo $articulo . " " . $arreglo_articulos[$llave] . "<br>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $eventos_resultados = $registrados['talleres_registrados'];
                                            $talleres = json_decode($eventos_resultados, true);
                                            $talleres = implode("', '", $talleres['eventos']);
                                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') ";
                                            $resultados_talleres = $conn->query($sql_talleres);

                                            while($eventos = $resultados_talleres->fetch_assoc()) {
                                                echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<hr>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $registrados['nombre_regalo'];?></td>
                                    <td>$<?php echo $registrados['total_pagado'];?></td>
                                    <td>
                                        <a href="editar_registro.php?id=<?php echo $registrados['id_registrado']?>" class="btn bg-orange btn-flat margin editar_registro">
                                            <i class="fa fa-pencil blanco"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $registrados['id_registrado'];?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                  </tr>
                              <?php } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Email</th>
                              <th>Fecha</th>
                              <th>Articulos</th>
                              <th>Talleres</th>
                              <th>Regalo</th>
                              <th>Compra</th>
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

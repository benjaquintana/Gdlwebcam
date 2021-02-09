<?php
    // Sesión
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
                    <h1>Crear Evento</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear Evento</h3>
            </div>

            <div class="card-body">
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo_evento.php">
                <div class="card-body has-validation">

                    <!-- Nombre Evento -->
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento</label>
                        <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Crea tu Evento">
                    </div>

                    <!-- Fecha -->
                    <div class="form-group">
                      <label>Fecha del Evento</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" name="fecha_evento" data-target="#reservationdate" data-toggle="datetimepicker">
                        </div>
                    </div>

                    <!-- Hora -->
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Hora del Evento</label>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker">
                            </div>
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="form-group">
                        <label>Categoría del Evento</label>
                        <select required name="categoria" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Seleccione una Categoría --</option>
                            <?php
                                try {
                                    $sql = "SELECT * FROM categoria_evento ";
                                    $resultado = $conn->query($sql);
                                    while($cat_evento = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                            <?php echo $cat_evento['cat_evento'] ?>
                                        </option>
                                    <?php }
                                } catch (Exception $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Nombre Invitado -->
                    <div class="form-group">
                        <label>Nombre del Invitado</label>
                        <select required name="categoria" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Seleccione un Invitado --</option>
                            <?php
                                try {
                                    $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados ";
                                    $resultado = $conn->query($sql);
                                    while($invitados = $resultado->fetch_assoc()) { ?>
                                        <option value="<?php echo $cat_evento['id_invitado']; ?>">
                                            <?php echo $cat_evento['cat_evento'] ?>
                                        </option>
                                    <?php }
                                } catch (Exception $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            ?>
                        </select>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>
        </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

<?php
    // Footer
    require_once 'templates/footer.php';
?>

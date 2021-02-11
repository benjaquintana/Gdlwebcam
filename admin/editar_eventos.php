<?php
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)):
        die("Error!");
    else:
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
                    <h1>Editar Evento</h1>
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
                <h3 class="card-title">Editar Evento</h3>
            </div>

            <div class="card-body">
                <?php
                    $sql = "SELECT * FROM eventos WHERE id_evento = $id ";
                    $resultado = $conn->query($sql);
                    $evento = $resultado->fetch_assoc();
                ?>
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo_evento.php">
                <div class="card-body has-validation">

                    <!-- Nombre Evento -->
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento</label>
                        <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Crea tu Evento" value="<?php echo $evento['nombre_evento']; ?>">
                    </div>

                    <!-- Categoría -->
                    <div class="form-group">
                        <label>Categoría del Evento</label>
                        <select required name="categoria" class="form-control select2" style="width: 100%;">
                            <option value="<?php echo $evento['usuario']; ?>" selected="selected">-- Seleccione una Categoría --</option>
                            <?php
                                try {
                                    $categoria_actual = $evento['id_cat_evento'];
                                    $sql = "SELECT * FROM categoria_evento ";
                                    $resultado = $conn->query($sql);
                                    while($cat_evento = $resultado->fetch_assoc()) {
                                        if($cat_evento['id_categoria'] == $categoria_actual) { ?>
                                            <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                                                <?php echo $cat_evento['cat_evento'] ?>
                                            </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                                <?php echo $cat_evento['cat_evento'] ?>
                                            </option>
                                        <?php }
                                    }
                                } catch (Exception $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Invitado -->
                    <div class="form-group">
                        <label>Nombre del Invitado</label>
                        <select required name="invitado" class="form-control select2" style="width: 100%;">
                            <option value="<?php echo $evento['usuario']; ?>"  selected="selected">-- Seleccione un Invitado --</option>
                            <?php
                                try {
                                    $invitado_actual = $evento['id_inv'];
                                    $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados ";
                                    $resultado = $conn->query($sql);
                                    while($invitados = $resultado->fetch_assoc()) {
                                        if($invitados['id_invitado'] == $invitado_actual) { ?>
                                        <option value="<?php echo $invitados['id_invitado']; ?>" selected>
                                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                        </option>
                                        <?php } else { ?>
                                            <option value="<?php echo $invitados['id_invitado']; ?>">
                                            <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                        </option>
                                        <?php }
                                    }
                                } catch (Exception $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Fecha -->
                    <div class="form-group">
                        <label>Fecha del Evento</label>
                        <?php
                            $fecha = $evento['fecha_evento'];
                            $fecha_formateada = date('m/d/Y', strtotime($fecha));
                        ?>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" name="fecha_evento" data-target="#reservationdate" data-toggle="datetimepicker" value="<?php echo $fecha_formateada; ?>">
                        </div>
                    </div>

                    <!-- Hora -->
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Hora del Evento</label>
                            <?php
                                $hora = $evento['hora_evento'];
                                $hora_formateada = date('H:i a', strtotime($hora));
                            ?>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" name="hora_evento" data-target="#timepicker" data-toggle="datetimepicker" value="<?php echo $hora_formateada; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="actualizar">
                        <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
    endif;
?>

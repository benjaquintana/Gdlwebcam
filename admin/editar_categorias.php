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
                    <h1>Editar Categorías </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Categorías</h3>
                </div>

                <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                        $resultado = $conn->query($sql);
                        $categoria = $resultado->fetch_assoc();
                    ?>
                    <!-- form start -->
                    <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo_categoria.php">
                    <div class="card-body has-validation">
                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa la Categoría" value="<?php echo $categoria['cat_evento']; ?>">
                        </div>

                        <!-- Icono -->
                        <div class="form-group">
                            <label for="apellido">Icono</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip">
                                        <i id="IconPreview" class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control pull-right" id="IconInput" name="icono" placeholder="fa-icon" value="<?php echo $categoria['icono']; ?>">
                                <button class="boton_iconos" type="button" id="GetIconPicker" data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">Seleccione icono</button>
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

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
            <h1>Editar Registros</h1>
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
                <h3 class="card-title">Editar Nuevo Registro</h3>
            </div>

            <div class="card-body">
                <?php
                    $sql = "SELECT * FROM registrados WHERE id_registrado = $id ";
                    $resultado = $conn->query($sql);
                    $registrado = $resultado->fetch_assoc();
                ?>
                <!-- Form -->
                <form class="editar_registrado" role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo_registrados.php">
                <div class="card-body has-validation">

                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu Nombre Completo" value="<?php echo $registrado['nombre_registrado']; ?>">
                    </div>

                    <!-- Apellido -->
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu Apellido" value="<?php echo $registrado['apellido_registrado']; ?>">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu Email" value="<?php echo $registrado['email_registrado']; ?>">
                    </div>

                    <?php
                        $pedido = $registrado['pases_articulos'];
                        $boletos = json_decode($pedido, true);
                    ?>

                    <!-- Boletos -->
                    <div class="form-group">
                        <div id="paquetes" class="paquetes">
                            <div class="card-header with-border">
                                <h3 class="card-title">Elije el Número de Boletos</h3>
                            </div>
                            <ul class="lista_precios clearfix row">
                                <li class="col-md-4">
                                    <div class="tabla_precio text-center">
                                        <h3>Pase por un día (Viernes)</h3>
                                        <p class="numero">$30</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dia">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0" value="<?php echo $boletos['pase_dia']['cantidad']; ?>">
                                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla_precio text-center">
                                        <h3>Pase todos los días (Completo)</h3>
                                        <p class="numero">$50</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_completo">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0" value="<?php echo $boletos['pase_completo']['cantidad']; ?>">
                                            <input type="hidden" value="50" name="boletos[completo][precio]">
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="tabla_precio text-center">
                                        <h3>Pase por dos días (Viernes y Sábado)</h3>
                                        <p class="numero">$45</p>
                                        <ul>
                                            <li>Bocadillos Gratis</li>
                                            <li>Todas las conferencias</li>
                                            <li>Todos los talleres</li>
                                        </ul>
                                        <div class="orden">
                                            <label for="pase_dosdias">Boletos deseados:</label>
                                            <input type="number" class="form-control" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0" value="<?php echo $boletos['pase_2dias']['cantidad']; ?>">
                                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!--Paquetes-->
                    </div>

                    <div class="form-group">
                        <div class="card-header with-border">
                            <h3 class="card-title">Elije tus Talleres</h3>
                        </div>
                        <div id="eventos" class="eventos clearfix">
                            <div class="caja">
                                <?php
                                $eventos = $registrado['talleres_registrados'];
                                $id_eventos_registrados = json_decode($eventos, true);
                                try {
                                  $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                  $sql .= " FROM eventos ";
                                  $sql .= " JOIN categoria_evento ";
                                  $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                  $sql .= " JOIN invitados ";
                                  $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                                  $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
                                  //echo $sql;
                                  $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    echo $e->getMessage();
                                }
                                $eventos_dias = array();
                                while($eventos = $resultado->fetch_assoc()) {
                                    $fecha = $eventos['fecha_evento'];

                                    //Formateando dias de la semana
                                    setlocale(LC_TIME,'es_ES');
                                    $dia_sem = strftime('%A',strtotime($fecha));
                                    $english = array ("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday", "Sunday");
                                    $espanol  = array ("lunes","martes","miércoles","jueves","viernes","sábado", "domingo");
                                    $dia_semana = str_replace($english, $espanol, $dia_sem);

                                    $categoria = $eventos['cat_evento'];
                                    $dia = array(
                                        'nombre_evento' => $eventos['nombre_evento'],
                                        'hora' => $eventos['hora_evento'],
                                        'id' => $eventos['id_evento'],
                                        'nombre_invitado' => $eventos['nombre_invitado'],
                                        'apellido_invitado' => $eventos['apellido_invitado']
                                    );
                                    $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                                }?>
                                <?php foreach($eventos_dias as $dia => $eventos) { ?>
                                    <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido_dia clearfix">
                                        <h4 class="text-center nombre_dia"><?php echo $dia; ?></h4>
                                        <div class="row">
                                            <?php foreach($eventos['eventos'] as $tipo => $evento_dias): ?>
                                                <div class="col-md-4">
                                                    <p><?php echo $tipo; ?></p>
                                                    <?php foreach($evento_dias as $evento) { ?>
                                                        <label>
                                                            <input <?php echo (in_array($evento['id'], $id_eventos_registrados['eventos']) ? 'checked' : '' ); ?> type="checkbox" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                                            <time><?php echo $evento['hora']; ?></time>
                                                            <?php echo $evento['nombre_evento']; ?>
                                                            <br>
                                                            <span class="autor"><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></span>
                                                        </label>
                                                    <?php } ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div> <!-- Contenido Dia -->
                                <?php } ?>
                            </div><!--.caja-->
                        </div> <!--#eventos-->
                    </div>

                    <div id="resumen" class="resumen">
                        <div class="card-header with-border">
                            <h3 class="card-title">Pagos y Extras</h3>
                        </div>
                        <div class="caja clearfix row">
                            <div class="extras col-md-6">
                                <div class="orden">
                                    <label for="camisa_evento">Camisa del Evento $10 <small>(Promoción 7% Dto.)</small> </label>
                                    <input value="<?php echo $boletos['camisas']; ?>" type="number" class="form-control" min="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]" placeholder="0">
                                    <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                </div><!--Orden-->
                                <div class="orden">
                                    <label for="etiquetas">Paquete de 10 Etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small> </label>
                                    <input value="<?php echo $boletos['etiquetas']; ?>" type="number" class="form-control" min="0" id="etiquetas" size="3" name="pedido_extra[etiquetas][cantidad]" placeholder="0">
                                    <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                </div><!--Orden-->
                                <div class="orden">
                                    <label for="regalo">Seleccione un regalo</label><br>
                                    <select id="regalo" class="form-control select2" name="regalo" required>
                                        <option value="">-- Seleccione un regalo --</option>
                                        <option value="2" <?php echo ($registrado['regalo'] == 2 ) ? 'selected' : '' ?>>Etiquetas</option>
                                        <option value="1" <?php echo ($registrado['regalo'] == 1 ) ? 'selected' : '' ?>>Pulsera</option>
                                        <option value="3" <?php echo ($registrado['regalo'] == 3 ) ? 'selected' : '' ?>>Plumas</option>
                                    </select>
                                </div><!--Orden-->
                                <br>
                                <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                            </div><!--Extras-->
                            <div class="total col-md-6">
                                <p>Resumen:</p>
                                <div id="lista_productos"></div>
                                <p>Total ya pagado: $<?php echo $registrado['total_pagado']; ?> </p>
                                <p>Total:</p>
                                <div id="suma_total">

                                </div>

                            </div><!--Total-->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="hidden" name="total_pedido" id="total_pedido" value="total_pedido">
                    <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $registrado['id_registrado']; ?>">
                    <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro']; ?>">
                    <button type="submit" class="btn btn-primary" id="btnRegistro">Guardar</button>
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

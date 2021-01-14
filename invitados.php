<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->

  <section class="seccion contenedor">
    <h2>Invitados</h2>
        <?php
            try {
                require_once('includes/funciones/db_conexion.php');
                $sql = " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                $sql .= " ORDER BY id_evento ";
                $resultado = $conn->query($sql);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        ?>

        <div class="calendario">
            <?php
                $calendario = array();
                while( $eventos = $resultado->fetch_assoc() ) {

                };
            ?>
        <?php
            $conn->close();
        ?>

  </section>

<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->

<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->

  <section class="seccion contenedor">
    <h2>Invitados</h2>
      <?php
          try {
              require_once('includes/funciones/db_conexion.php');
              $sql = " SELECT * FROM invitados ";
              $resultado = $conn->query($sql);
          } catch (\Exception $e) {
              echo $e->getMessage();
          }
      ?>

      <section class="invitados contenedor seccion">
        <ul class="lista_invitados clearfix">
          <?php while($invitados = $resultado->fetch_assoc() ) { ?>
            <li>
              <div class="invitado">
                <img src="img/<?php echo $invitados['url_imagen'] ?>" alt="imagen_invitado">
                <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></p>
              </div>
            </li>
          <?php } ?>
        </ul>
      </section>
      <?php
          $conn->close();
      ?>

  </section>

<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->

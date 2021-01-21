<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->

    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, laborum ipsam nesciunt nobis laboriosam itaque alias iure odio vel impedit recusandae debitis voluptatem veritatis pariatur eos distinctio consectetur quae harum.</p>
    </section>
    <section class="programa">
        <div class="contenedor_video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogv">
            </video>
        </div> <!--Contenedor Video-->
        <div class="contenido_programa">
            <div class="contenedor">
                <div class="programa_evento">
                    <h2>Programa del Evento</h2>

                    <?php
                        try {
                            require_once('includes/funciones/db_conexion.php');
                            $sql = " SELECT * FROM categoria_evento ";
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                        }
                    ?>

                    <nav class="menu_programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                            <a href="#<?php echo strtolower($categoria) ?>">
                                <i class="fas <?php echo $cat['icono']; ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                            </a>
                        <?php } ?>
                    </nav>

                    <?php
                        try {
                            require_once('includes/funciones/db_conexion.php');
                            $sql = " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                            $sql .= " AND eventos.id_cat_evento = 1 ";
                            $sql .= " ORDER BY id_evento LIMIT 2;";
                            $sql .= " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                            $sql .= " AND eventos.id_cat_evento = 2 ";
                            $sql .= " ORDER BY `id_evento` LIMIT 2;";
                            $sql .= " SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                            $sql .= " AND eventos.id_cat_evento = 3 ";
                            $sql .= " ORDER BY id_evento LIMIT 2;";
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <?php $conn->multi_query($sql) ?>
                    <?php
                        do {
                        $resultado = $conn->store_result();
                        $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                        <?php $i = 0; ?>
                        <?php foreach($row as $evento): ?>

                            <?php if($i % 2 == 0) { ?>
                                <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info_curso ocultar clearfix">
                            <?php } ?>

                                <div class="detalle_evento">
                                    <h3><?php echo $evento['nombre_evento']; ?></h3>
                                    <p><i class="fas fa-clock"></i> <?php echo $evento['hora_evento']; ?></p>
                                    <p><i class="fas fa-calendar"></i> <?php echo $evento['fecha_evento']; ?></p>
                                    <p><i class="fas fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                                </div>

                            <?php if($i % 2 == 1): ?>
                                <a href="calendario.php" class="boton float-right">Ver Todos</a>
                            </div><!--Talleres-->
                            <?php endif; ?>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <?php $resultado->free(); ?>

                        <?php } while ($conn->more_results() && $conn->next_result());?>
                </div>
            </div>
        </div>
    </section>

<!--Invitados-->
<?php include_once 'includes/templates/invitados.php'?>
<!--Fin Invtados-->

  <div class="contador parallax">
    <div class="contador">
      <ul class="resumen_evento clearfix">
        <li><p class="numero"></p>Invitados</li>
        <li><p class="numero"></p>Talleres</li>
        <li><p class="numero"></p>Días</li>
        <li><p class="numero"></p>Conferencias</li>
      </ul>
    </div>
  </div>
  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista_precios clearfix">
        <li>
          <div class="tabla_precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla_precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="boton">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla_precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="boton hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <div id="map" class="mapa"></div>
  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita explicabo a deserunt eos maxime earum maiores enim architecto. Voluptatem nam neque reiciendis illum itaque repudiandae odit, voluptatum accusamus obcaecati.</p>
          <footer class="info_testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen_testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita explicabo a deserunt eos maxime earum maiores enim architecto. Voluptatem nam neque reiciendis illum itaque repudiandae odit, voluptatum accusamus obcaecati.</p>
          <footer class="info_testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen_testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit expedita explicabo a deserunt eos maxime earum maiores enim architecto. Voluptatem nam neque reiciendis illum itaque repudiandae odit, voluptatum accusamus obcaecati.</p>
          <footer class="info_testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen_testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
    </div>
  </section>
  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Regístrate al newsletter:</p>
      <h3>gdlwebcamp</h3>
      <a href="#mc_embed_signup" class="boton_newsletter boton transparente">Registro</a>
    </div>
  </div>

  <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div style="display: none;">
  <div id="mc_embed_signup">
    <form action="https://gmail.us7.list-manage.com/subscribe/post?u=dff349140b9f4c3e957852510&amp;id=ccd0d61bf2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
        <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
        <div class="indicates-required"><span class="asterisk">*</span> es obligtorio</div>
        <div class="mc-field-group">
          <label for="mce-EMAIL">Correo Electronico  <span class="asterisk">*</span></label>
          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_dff349140b9f4c3e957852510_ccd0d61bf2" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </div>
    </form>
  </div>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->


  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta_regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p>días</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
      </ul>
    </div>
</section>

<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->

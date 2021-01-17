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
                $sql = " SELECT * FROM `categoria_evento` ";
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

          <nav class="menu_programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {?>
              <a href="#talleres"><i class="fas fa-code"></i> Talleres</a>
            <?php } ?>
          </nav>
          <div id="talleres" class="info_curso ocultar clearfix">
            <div class="detalle_evento">
              <h3>HTML5, CSS3 y JavaScript</h3>
              <p><i class="fas fa-clock"></i> 16:00hrs</p>
              <p><i class="fas fa-calendar"></i> 10 de Dic</p>
              <p><i class="fas fa-user"></i> Arturo Benjamin Quintana</p>
            </div>
            <div class="detalle_evento">
              <h3>Responsive Web Design</h3>
              <p><i class="fas fa-clock"></i> 20:00hrs</p>
              <p><i class="fas fa-calendar"></i> 10 de Dic</p>
              <p><i class="fas fa-user"></i> Sherilynn Aguilar</p>
            </div>
            <a href="#" class="boton float-right">Ver Todos</a>
          </div><!--Talleres-->

          <div id="conferencias" class="info_curso ocultar clearfix">
            <div class="detalle_evento">
              <h3>Como ser un Freelancer</h3>
              <p><i class="fas fa-clock"></i> 10:00hrs</p>
              <p><i class="fas fa-calendar"></i> 10 de Dic</p>
              <p><i class="fas fa-user"></i> Sherilynn Aguilar</p>
            </div>
            <div class="detalle_evento">
              <h3>Tecnologías del Futuro</h3>
              <p><i class="fas fa-clock"></i> 17:00hrs</p>
              <p><i class="fas fa-calendar"></i> 10 de Dic</p>
              <p><i class="fas fa-user"></i> Arturo Benjamin Quintana</p>
            </div>
            <a href="#" class="boton float-right">Ver Todos</a>
          </div><!--Conferencias-->

          <div id="seminarios" class="info_curso ocultar clearfix">
            <div class="detalle_evento">
              <h3>Diseño UI/UX para móviles</h3>
              <p><i class="fas fa-clock"></i> 17:00hrs</p>
              <p><i class="fas fa-calendar"></i> 11 de Dic</p>
              <p><i class="fas fa-user"></i> Sherilynn Aguilar</p>
            </div>
            <div class="detalle_evento">
              <h3>Aprende a programar en una mañana</h3>
              <p><i class="fas fa-clock"></i> 10:00hrs</p>
              <p><i class="fas fa-calendar"></i> 11 de Dic</p>
              <p><i class="fas fa-user"></i> Arturo Benjamin Quintana</p>
            </div>
            <a href="#" class="boton float-right">Ver Todos</a>
          </div><!--Seminarios-->

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
      <a href="#" class="boton transparente">Registro</a>
    </div>
  </div>
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

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
          <nav class="menu_programa">
            <a href="#talleres"><i class="fas fa-code"></i> Talleres</a>
            <a href="#conferencias"><i class="fas fa-comment"></i> Conferencias</a>
            <a href="#seminarios"><i class="fas fa-university"></i> Seminarios</a>
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
  <section class="invitados contenedor seccion">
    <h2>Nuestros Invitados</h2>
    <ul class="lista_invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="imagen_invitado">
          <p>Rafael Bautista</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="imagen_invitado">
          <p>Shari Herrera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="imagen_invitado">
          <p>Gregorio Sanches</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="imagen_invitado">
          <p>Susana Rivera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="imagen_invitado">
          <p>Harol García</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="imagen_invitado">
          <p>Susan Sanches</p>
        </div>
      </li>
    </ul>
  </section>
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

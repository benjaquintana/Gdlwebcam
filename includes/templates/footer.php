 <footer class="site_footer">
    <div class="contenedor clearfix">
      <div class="footer_informacion">
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nam quisquam optio numquam expedita eius nisi voluptate veniam dolores deleniti architecto eligendi laboriosam at non, dolorum quam omnis ipsam neque.</p>
      </div>
      <div class="ultimos_tweets">
        <h3>Últimos <span>tweets</span></h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non ut quasi est error ex doloribus animi temporibus dolorem rem dolor, voluptas quos ab suscipit nihil voluptatum. Sit quis aperiam ad.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non ut quasi est error ex doloribus animi temporibus dolorem rem dolor, voluptas quos ab suscipit nihil voluptatum. Sit quis aperiam ad.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non ut quasi est error ex doloribus animi temporibus dolorem rem dolor, voluptas quos ab suscipit nihil voluptatum. Sit quis aperiam ad.</p>
      </div>
      <div class="menu">
        <h3>redes <span>sociales</span></h3>
        <nav class="redes_sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos Reservados GDLWEBCAMP 2016.</p>
  </footer>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    }else if($pagina == 'conferencia'){
      echo ' <script src="js/lightbox.js"></script>';
    }
  ?>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>

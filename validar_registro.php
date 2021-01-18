<!--Header-->
<?php include_once 'includes/templates/header.php'?>
<!--Fin Header-->
<section class="seccion contenedor">
    <h2>Resumen Registro</h2>

    <?php if(isset($_POST['submit'])):
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $fecha = date('Y-m-d H:i:s');
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];

    //Pedidos
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    echo productos_json($boletos, $camisas, $etiquetas);

    ?>

    <pre><?php var_dump($_POST) ?></pre>

    <?php endif; ?>
  </section>
<!--Footer-->
<?php include_once 'includes/templates/footer.php'?>
<!--Fin Footer-->

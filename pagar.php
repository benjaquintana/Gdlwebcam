<?php

 if(!isset($_POST['submit'])) {
   exit("hubo un error");
 }

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


require 'includes/paypal.php';

if(isset($_POST['submit'])):
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $fecha = date('Y-m-d H:i:s');
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];

  //Pedidos
  $boletos = $_POST['boletos'];
  $numero_boletos = $boletos;

  //Pedidos Extras
  $pedidoExtras = $_POST['pedido_extras'];
  $camisas = $_POST['pedido_extra'] ['camisas'] ['cantidad'];
  $precioCamisas = $_POST['pedido_extra'] ['camisas'] ['cantidad'];
  $etiquetas = $_POST['pedido_extra'] ['etiquetas'] ['cantidad'];
  $precioEtiquetas = $_POST['pedido_extra'] ['etiquetas'] ['precio'];
  include_once 'includes/funciones/funciones.php';
  $pedido = productos_json($boletos, $camisas, $etiquetas);

  //Eventos
  $eventos = $_POST['registro'];
  $registro = eventos_json($eventos);

  try {
    require_once('includes/funciones/db_conexion.php');
    $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    //header('Location: validar_registro.php?exitoso=1');
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
endif;

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
      ->setCurrency('MXN')
      ->setQuantity(1)
      ->setPrice($precio);

$i = 0;
foreach($numero_boletos as $key => $value) {
  if( (int) $value['cantidad'] > 0){

    ${"articulo$i"} = new Item();
    ${"articulo$i"}->setName('Pase:' . $key)
                   ->setCurrency('USD')
                   ->setQuantity( (int) $value['cantidad'] )
                   ->setPrice( (int) $value['precio'] );
    $i++;
  }
}

foreach($numero_boletos as $key => $value) {
  if( (int) $value['cantidad'] > 0){

    ${"articulo$i"} = new Item();
    ${"articulo$i"}->setName('Pase:' . $key)
                   ->setCurrency('USD')
                   ->setQuantity( (int) $value['cantidad'] )
                   ->setPrice( (int) $value['precio'] );
    $i++;
  }
}

echo $articulo0->getName();

/*
$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
          ->setSubtotal($precio);


$cantidad = new Amount();
$cantidad->setCurrency('MXN')
          ->setTotal($total)
          ->setDetails($detalles);

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago ')
               ->setInvoiceNumber(uniqid());


$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");


$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       // Don't spit out errors or use "exit" like this in production code
       echo '<pre>';print_r(json_decode($pce->getData()));exit;
   }

$aprobado = $pago->getApprovalLink();


header("Location: {$aprobado}");
*/

<?php
  // Funciones
  require_once 'funciones/funciones.php';

  if (isset($_POST['agregar_admin'])) {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];

    $opciones = array(
      'cost' => 12
    );
    $passowrd_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
      include_once 'funciones/funciones.php';
      $stmt = $conn->prepare("INSERT INTO administradores (usuario, nombre, apellido, password) VALUES (?,?,?,?)");
      $stmt->bind_param("ssss", $usuario, $nombre, $apellido, $passowrd_hashed);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
?>

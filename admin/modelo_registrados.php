<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    //Boletos
    $boletos_adquiridos = $_POST['boletos'];
    //Camisas y Etiquetas
    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $camisas = $_POST['pedido_extra']['etiquetas']['cantidad'];

    $pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

    $total = $_POST['total_pedido'];
    $regalos = $_POST['regalo'];
    $eventos = $_POST['registro_evento'];
    $registro_eventos = eventos_json($eventos);

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        try {
            $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,NOW(),?,?,?,?,1) ");
            $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalos, $total);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Editar Usuario
    if ($_POST['registro'] == 'actualizar'){
        try {
            if(empty($_POST['password'])) {
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, editado = NOW(), nivel = ? WHERE id_admin = ? ');
                $stmt->bind_param("sssii", $usuario, $nombre, $apellido, $nivel, $id_registro);
            } else {
                $opciones = array(
                'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, password = ?, editado = NOW(), nivel = ? WHERE id_admin = ? ');
                $stmt->bind_param("ssssii", $usuario, $nombre, $apellido, $hash_password, $nivel, $id_registro);
            }
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $stmt->insert_id
                );
            } else {
              $respuesta = array(
                'respuesta' => 'error'
              );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $respuesta = array(
              'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));
    }

    //Eliminar Usuario
    if ($_POST['registro'] == 'eliminar'){
        $id_borrar = $_POST['id'];
        try {
            $stmt = $conn->prepare('DELETE FROM administradores WHERE id_admin = ? ');
            $stmt->bind_param('i', $id_borrar);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } catch (Exception $e) {
            $respuesta = array(
              'respuesta' => $e->getMessage()
            );
        }
        die(json_encode($respuesta));

    }
?>

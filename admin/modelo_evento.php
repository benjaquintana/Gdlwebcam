<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $id_registro = $_POST['id_registro'];
    $nombre = $_POST['nombre_evento'];
    $categoria = $_POST['categoria'];
    $invitado = $_POST['invitado'];
    $fecha = $_POST['fecha_evento'];
    $fecha_formateada = date('Y-m-d', strtotime($fecha));
    $hora = $_POST['hora_evento'];
    $hora_formateada = date('H:i:s', strtotime($hora));
    $clave = "error";

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        try {
            $stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv, clave, editado) VALUES (?,?,?,?,?,?,NOW()) ");
            $stmt->bind_param("sssiis", $nombre, $fecha_formateada, $hora_formateada, $categoria, $invitado, $clave);
            $stmt->execute();
            $id_evento = $stmt->insert_id;
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_evento' => $id_evento
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
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

    //Editar Usuario
    if ($_POST['registro'] == 'actualizar'){
        try {
            $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, clave = ?, editado = NOW() WHERE id_evento = ? ");
            $stmt->bind_param("sssiisi", $nombre, $fecha_formateada, $hora_formateada, $categoria, $invitado, $clave, $id_registro);
            $stmt->execute();
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_actualizado' => $id_registro
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
            $stmt = $conn->prepare('DELETE FROM eventos WHERE id_evento = ? ');
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

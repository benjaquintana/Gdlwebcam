<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $icono = $_POST['icono'];
    $nombre = $_POST['nombre'];
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        try {
            $stmt = $conn->prepare('INSERT INTO categoria_evento (cat_evento, icono, editado) VALUES (?,?,NOW()) ');
            $stmt->bind_param('ss', $nombre, $icono);
            $stmt->execute();
            $id_insertado = $stmt->insert_id;
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_evento' => $id_insertado
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
            $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ");
            $stmt->bind_param("ssi", $nombre, $icono, $id_registro);
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
            $stmt = $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria = ? ');
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

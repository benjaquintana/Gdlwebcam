<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $biografia = $_POST['biografia'];
    $id_registro = $_POST['id_registro'];

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        /*
        $respuesta = array(
            'post' => $_POST,
            'file' => $_FILES
        );
        die(json_encode($respuesta));
        */

        //Cargar Archivo
        $directorio = "../img/invitados/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'])){
            $url_imagen = $_FILES['imagen']['name'];
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        try {
            $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $url_imagen);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_invitado' => $id_registro,
                    'resultado_imagen' => $imagen_resultado
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
        //Cargar Archivo
        $directorio = "../img/invitados/";
        if(!is_dir($directorio)){
            mkdir($directorio, 0775, true);
        }

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_FILES['imagen']['name'])){
            $url_imagen = $_FILES['imagen']['name'];
            $imagen_resultado = "Se subio correctmente";
        }else{
            $respuesta = array(
                'respuesta' => error_get_last()
            );
        }

        try {
            if($_FILES['imagen']['size'] > 0 ) {
                $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW() WHERE id_invitado = ? ');
                $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $url_imagen, $id_registro);
            } else {
                $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE id_invitado = ? ');
                $stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
            }
            $estado = $stmt->execute();

            if($estado == true) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_invitado' => $id_registro
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
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
            $stmt = $conn->prepare('DELETE FROM invitados WHERE id_invitado = ? ');
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

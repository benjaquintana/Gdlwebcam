<?php
    // Funciones
    require_once 'funciones/funciones.php';
    //Datos Comunes
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $password = $_POST['password'];
    $id_registro = $_POST['id_registro'];
    $fecha = date('Y-m-d H:i:s');

    //Login
    if (isset($_POST['login_admin'])) {
        try {
            include_once 'funciones/funciones.php';
            $stmt = $conn->prepare("SELECT * FROM administradores WHERE usuario = ? ");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();
            $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $apellido_admin, $password_admin, $editado);
            if($stmt->affected_rows) {
                $existe = $stmt->fetch();
                if($existe) {
                    if(password_verify($password, $password_admin)) {
                        session_start();
                        $_SESSION['usuario'] = $usuario_admin;
                        $_SESSION['nombre'] = $nombre_admin;
                        $respuesta = array(
                            'respuesta' => 'exitoso',
                            'usuario' => $nombre_admin . " " . $apellido_admin
                        );
                    } else {
                      $respuesta = array(
                        'respuesta' => 'error'
                      );
                    }
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            }
            $stmt->close;
            $conn->close;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
    }

    //Nuevo Usuario
    if ($_POST['registro'] == 'nuevo'){
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

        try {
            $stmt = $conn->prepare("INSERT INTO administradores (usuario, nombre, apellido, password, editado) VALUES (?,?,?,?,NOW()) ");
            $stmt->bind_param("ssss", $usuario, $nombre, $apellido, $password_hashed);
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
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, editado = NOW() WHERE id_admin = ? ');
                $stmt->bind_param("sssi", $usuario, $nombre, $apellido, $id_registro);
            } else {
                $opciones = array(
                'cost' => 12
                );
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conn->prepare('UPDATE administradores SET usuario = ?, nombre = ?, apellido = ?, password = ?, editado = NOW() WHERE id_admin = ? ');
                $stmt->bind_param("ssssi", $usuario, $nombre, $apellido, $hash_password, $id_registro);
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
        die(json_encode($respueta));
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
                    'id_eliminado' => '$id_borrar'
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

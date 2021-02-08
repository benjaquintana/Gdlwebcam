$(document).ready(function() {
    //Login User
    $('#login_admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if(resultado.respuesta == "exitoso") {
                    Swal.fire(
                        'Login Correcto',
                        'Bienvenido(a) '+resultado.usuario+'',
                        'success'
                    )
                    setTimeout(function(){
                        window.location.href = 'admin_area.php';
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o Password Incorrectos'
                    })
                }
            }
        })

    });

    //Guardar Registro
    $('#guardar_registro').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
              console.log(data);
                var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'El adminstrador se guardo correctamente',
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error'
                    })
                }
            }
        })

    });

    //Eliminar Registro
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esto no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            $.ajax({
                type: 'post',
                data: {
                  id: id,
                  registro: 'eliminar'
                },
                url: 'modelo_'+tipo+'.php',
                success:function(data) {
                    var resultado = JSON.parse(data);
                    if (resultado.respuesta == 'exito') {
                        Swal.fire(
                            '¡Borrado!',
                            'El administrador ha sido eliminado',
                            'success'
                        )
                        jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo eliminar'
                        })
                    }

                }
            })
        });
    });
});

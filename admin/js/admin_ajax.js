$(document).ready(function() {
    $('#crear_admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if(resultado.respuesta == "exito") {
                    Swal.fire(
                        'Correcto',
                        'El adminstrador se creó correctamente',
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error, elige otro usuario'
                    })
                }
            }
        })

    });
});
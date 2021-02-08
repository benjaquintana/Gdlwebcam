$(function () {
    $("#registro").DataTable({
        "responsive": true,
        "pageLength": 10,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "language": {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
            emptyTable: 'No hay resultados para mostrar',
            infoEmpty: 'No hay registros',
            search: 'Buscar:'
        }
    })
    .buttons()
    .container()
    .appendTo('#registro_wrapper .col-md-6:eq(0)');
});

//Repetir Password
$('#crear_registro').attr('disabled', true);
$('#repetir_password').on('input', function() {
    var password_nuevo = $('#password').val();
    if($(this).val() == password_nuevo ) {
        $('#resultado_password').text('Correcto');
        $('#repetir_password').parents('.form-group').addClass('text-success').removeClass('text-danger');
        $('input#password').parents('.form-group').addClass('text-success').removeClass('text-danger');
        $('#repetir_password').addClass('is-valid').removeClass('is-invalid');
        $('input#password').addClass('is-valid').removeClass('is-invalid');
        $('#crear_registro').attr('disabled', false);
    } else {
        $('#resultado_password').text('No son iguales!');
        $('#repetir_password').parents('.form-group').addClass('text-danger').removeClass('text-success');
        $('input#password').parents('.form-group').addClass('text-danger').removeClass('text-success');
        $('#repetir_password').addClass('is-invalid').removeClass('is-valid');
        $('input#password').addClass('is-invalid').removeClass('is-valid');
    }
});

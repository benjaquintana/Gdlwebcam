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

$(function() {
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Initialize Select2 Elements
    $('.select2').select2();

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    });

    //Icon Picker
    // Default options
    IconPicker.Init({
        // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
        jsonUrl: 'js/iconpicker-1.5.0.json',
        // Optional: Change the buttons or search placeholder text according to the language.
        searchPlaceholder: 'Buscar Icono',
        showAllButton: 'Mostrar Todos',
        cancelButton: 'Cancelar',
        noResultsFound: 'No se encontraron resultados.', // v1.5.0 and the next versions
        borderRadius: '20px', // v1.5.0 and the next versions
    });

    IconPicker.Run('#GetIconPicker', function(){

    Swal.fire({
        icon: 'success',
        title: 'Perfecto!',
        text: 'Has seleccionado un icono!',
        timer: 1300
    })

    });

    //Input file
    bsCustomFileInput.init();

});


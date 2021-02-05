$(function () {
    $("#registro").DataTable({
        "responsive": true,
        "pageLength": 5,
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

$(document).ready(function() {

    var table = $('#dt-table').DataTable({
        "autoWidth": false,
        "searching": true,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Tudo"]
        ],
        "dom": 'lrtip',
        buttons: [{
                extend: 'pdf',
                className: 'btn waves-effect blue accent-3',
                text: '<i class="material-icons">file_download</i>',
                titleAttr: 'Baixar Tabela em Pdf'

            },
            {
                extend: 'print',
                className: 'btn',
                text: '<i class="material-icons">print</i>',
                titleAttr: 'Iprimir Tabela'

            }
        ],
        "language": {
            "sProcessing": "A processar...",
            "sLengthMenu": "Mostrar _MENU_ registos",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registos",
            "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
            "sInfoPostFix": "",
            "sSearch": "Procurar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }

        }

    });

    table
        .buttons()
        .container()
        .appendTo('#controlPanel');


    $('#pesquisar-entregas').on('keyup', function() {
        table.search(this.value).draw();
    });

    $(".button-collapse").sideNav();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $('select').material_select();
});
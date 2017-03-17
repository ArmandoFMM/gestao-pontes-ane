$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
            "sZeroRecords": "Não foram encontrados registos",
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


    $('#pesquisar').on('keyup', function() {
        table.search(this.value).draw();
    });

    $(".button-collapse").sideNav();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $('select').material_select();

    $('.modal').modal();


    $('.delete').click(function() {
        var id = $(this).data("id");
        var linha = $(this).closest('tr');
        swal({
            title: 'Tem a certeza?',
            type: 'warning',
            html: '<form class="form-horizontal">' +
                '<h6>Não será possivel reverter esta accão</h6>' +
                '<h6 class="red-text">Introduza a sua senha</h6>' +
                '<div>' +
                '<div class="input-field col s12">' +
                '<input id="password" type="password" class="form-control" name="password" required>' +
                '<label for="password">Password</label>' +
                '</div>' +
                '</div>' +

                '</form>',
            confirmButtonColor: '#d33',
            showCancelButton: true,
            confirmButtonText: 'Sim, Eliminar',
            preConfirm: function() {

                var password = $("#password").val();
                var rota = "http://sgp-ane.herokuapp.com/pontes/" + id + "?xs=" + password;

                $.ajax({
                    url: rota,
                    type: 'DELETE',
                    success: function(data) {

                        if (data.status == 'success') {
                            swal({
                                title: 'Eliminada!',
                                text: data.msg,
                                timer: 2000
                            });
                            linha.remove();
                        }

                    }

                });


            },
            allowOutsideClick: true,
            cancelButtonText: 'Cancelar'
        }).then(function() {
            console.log(' Msg');
        });
    });

    // Listagem por grid
    $('#lista-grid').click(function() {


        $('#lista-grid').removeClass('btn-flat');
        $('#lista-grid').addClass('btn');

        $('#lista-tabela').removeClass('btn')
        $('#lista-tabela').addClass('btn-flat');

        $('#dt-table_wrapper').fadeOut();

        $('#pontes-grid').fadeIn();
        $('#pontes-grid').removeClass('hide');

    });

    // Listagem por tabela
    $('#lista-tabela').click(function() {

        $('#lista-tabela').removeClass('btn-flat')
        $('#lista-tabela').addClass('btn');

        $('#lista-grid').removeClass('btn')
        $('#lista-grid').addClass('btn-flat');

        $('#dt-table_wrapper').fadeIn();

        $('#pontes-grid').fadeOut();


    });





});
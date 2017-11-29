$(window).on('load', function() {
    $('.preloader-background').delay(1700).fadeOut('slow');

    $('#main-preloader')
        .delay(1700)
        .fadeOut();
});


$(document).ready(function() {

    // SideNav
    $(".button-collapse").sideNav();

    $('.side-nav a:not(.dropdown-button)').on('click', function() {
        $('.button-collapse').sideNav('hide');
    });

    $('select').material_select();    
    
    $('.modal').modal();
    
    $('.datepicker').pickadate({
            format: 'dd/mm/yyyy',
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
    });

});
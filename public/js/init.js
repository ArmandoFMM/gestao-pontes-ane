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

});
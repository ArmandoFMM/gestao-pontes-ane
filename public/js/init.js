$(window).load(function() {
        $('.preloader-background').delay(1700).fadeOut('slow');

        $('.preloader-wrapper')
            .delay(1700)
            .fadeOut();
    });


$(document).ready(function() {

    // SideNav
    $('.side-nav a:not(.dropdown-button)').click(function() {
        $('.button-collapse').sideNav('hide');
    });

});
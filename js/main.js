/**
 * Created by WYLLIAM on 17/04/2016.
 */

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        center: true,
        loop: true,
        margin: 10,
        smartSpeed: 1050
    });
});

$( ".cart" ).click(function() {
    alert( "Your cart is empty !!!" );
});
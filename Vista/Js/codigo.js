$(document).ready(function() {


    /**************************ACORDION  *************/
    //solo caundo estemos en el about.html
    if (window.location.href.indexOf('retos') > -1) {
        $('#acordion').accordion();
    }

});
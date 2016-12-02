document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')

jQuery(document).ready(function($){
    var MEASUREMENTS_ID = 'measurements'; // abstracted-out for convenience in renaming
    $("body").append('<div id="'+MEASUREMENTS_ID+'"></div>');
    $("#"+MEASUREMENTS_ID).css({
        'position': 'fixed',
        'bottom': '0',
        'right': '0',
        'background-color': 'black',
        'color': 'white',
        'padding': '5px',
        'font-size': '16px',
        'font-family': 'Arial, sans-serif',
        'opacity': '0.7',
        'z-index': '99999'
    });
    getDimensions = function(){
        return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
    }
    $("#"+MEASUREMENTS_ID).text(getDimensions());
    $(window).on("resize", function(){
        $("#"+MEASUREMENTS_ID).text(getDimensions());
    });
});
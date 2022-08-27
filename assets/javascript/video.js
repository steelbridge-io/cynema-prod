/** Video JS */

jQuery(function() {
    var myInterval = setInterval(function() {
        jQuery('video').attr('id', 'video');
        jQuery('video').attr('x-webkit-airplay', 'allow');
        jQuery('video').prop('controls', true );
        if(jQuery('video').is('#video')) {
            clearInterval(myInterval);
        }
    },4);
});
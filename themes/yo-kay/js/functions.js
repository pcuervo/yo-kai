var $=jQuery.noConflict();

(function($){

    "use strict";

    $(function(){

        /*------------------------------------*\
            #GLOBAL
        \*------------------------------------*/
        $(window).ready(function(){
            footerBottom();
        });

        $(window).on('resize', function(){
            footerBottom();
        });


        /**
         * LOGOUT AL CERRAR VENTANA
         */
        $(window).unload(function() {
            var url = $('.bt-logout').attr('href');
            $.get( url );
        });
    });

})(jQuery);

//Footer fixed

function footerBottom(){
    var alturaFooter = getFooterHeight();
    $('.main').css('padding-bottom', alturaFooter );
}

function getHeaderHeight(){
    return $('.js-header').outerHeight();
}

function getFooterHeight(){
    return $('footer').outerHeight();
}

console.log('asdasd');
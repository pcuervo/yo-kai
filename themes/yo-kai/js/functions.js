var $=jQuery.noConflict();

(function($){
    "use strict";
    $(function(){
        /*------------------------------------*\
            #GLOBAL
        \*------------------------------------*/
        $(window).ready(function(){
            footerBottom();
            $('.carousel').carousel();
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

        $('.image-perfil').click(function(e){
            e.preventDefault();

            //Cuando ya hay un perfil seleccionado previamente
            $( ".image-perfil div.perfil-selected" ).removeClass('perfil-selected');
            $( ".image-perfil div.perfil-selected" ).addClass('perfil-unselected');

            $(this).find('div').addClass('perfil-selected');
            //console.log('perfil seleccionado');

            if( $('.image-perfil div.perfil-selected').hasClass('perfil-unselected') ){
                $( ".image-perfil div.perfil-selected" ).removeClass('perfil-unselected');
            }
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
var $=jQuery.noConflict();

(function($){
    "use strict";
    $(function(){
         /**
         * LOGOUT AL CERRAR VENTANA
         */
        $(window).unload(function() {
            var url = $('.bt-logout').attr('href');
            $.get( url );

            // var xmlHttp = new XMLHttpRequest();
            // xmlHttp.open( "GET", url, false ); // false para asincrona
            // xmlHttp.send( null );
        });

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


        $('.image-perfil').on('click', function(event){
            event.preventDefault();

            //Cuando ya hay un perfil seleccionado previamente
            $( ".image-perfil div.perfil-selected" ).removeClass('perfil-selected');
            $( ".image-perfil div.perfil-selected" ).addClass('perfil-unselected');

            $(this).find('div').addClass('perfil-selected');
            //console.log('perfil seleccionado');

            if( $('.image-perfil div.perfil-selected').hasClass('perfil-unselected') ){
                $( ".image-perfil div.perfil-selected" ).removeClass('perfil-unselected');
            }

            var id = $(this).data('id');
            $('#avatar-participante').val(id);
        });


        // CARGAR MEDALLA

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

//Show controls video
$('video').hover(function toggleControls() {
    if (this.hasAttribute("controls")) {
        this.removeAttribute("controls")
    } else {
        this.setAttribute("controls", "controls")
    }
});

//Display de medalla cargada
$("#medalla-cargada").delay(3000).queue(function(){
    $(this).removeClass("hidden").dequeue();
    $(this).addClass("block").dequeue();
});

console.log('asdasd');

//formato para COOKIES
// date(DATE_COOKIE);
//   alert(DATE_COOKIE);
// function modalOpen(){


//     $( ".image-perfil div.perfil-selected" ).addClass('perfil-unselected');
// }

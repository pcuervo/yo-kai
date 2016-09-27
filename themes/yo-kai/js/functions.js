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
            $('.carousel').carousel({
                interval:false;
            });
            finalConcurso();
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


function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    alert(d);
    d.setTime(d.getTime() + (exdays*1*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
}



//Open Modal
function finalConcurso(){
    //document.cookie="Limite=finalConcurso; expires=5 Jan 2017 19:00:00 GMT"; //5hrs. de diferencia
    document.cookie="Limite=finalConcurso; expires=27 Sep 2015 11:06:00 GMT";
    console.log(document.cookie);
    //console.log(new Date().toGMTString());
    if (document.cookie.indexOf("Limite") < 0) {
       $('#concurso-terminado').modal('show');
       $('#ranking-cerrado').removeClass('hidden');
       $('#ranking-abierto').addClass('hidden');
    }
}

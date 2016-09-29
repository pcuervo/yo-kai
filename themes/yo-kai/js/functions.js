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
                interval:false
            });
            finalConcurso();
            if(window.location.href.indexOf("album/?cat=") > -1) {
                $( ".carousel-control" ).addClass('hidden');
            };
        });

        $(window).on('resize', function(){
            footerBottom();
        });

        // $('#modal-ok').on('click', function(){
        //     var ejecutado=1;
        //     alert(ejecutado);
        // });

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

        if (document.getElementById('gifCargando')) {
            
            var $img = $('#gifCargando');
            $img.show(0);
            $('#imgMedalla').hide(0);
            setTimeout(function() {
                $img.attr('src', $img.attr('src'));
            }, 0);
            setTimeout(function() {
                $('#imgMedalla').show(0);
                $img.hide(0);
                $('#textoCargaExitosa').removeClass('hidden');
                $('.formCargaMedalla').addClass('hidden');
            }, 3700);
        }
            


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
    //document.cookie="Limite=finalConcurso; expires=Thu, 5 Jan 2017 19:00:00 GMT"; //5hrs. de diferencia
    document.cookie="Limite=finalConcurso; expires=Thu, 30 Sep 2016 00:06:40 GMT";
    console.log(document.cookie);
    console.log(new Date().toGMTString());
     if (document.cookie.indexOf("Limite") < 0) {
        $(".modal").one( "load", function() {
            alert("Hola, soy una alerta que sólo aparecerá 1 vez.");
        });
        //var ejecutado=ejecutado+1;
        $('#concurso-terminado').modal('show');
        $('#ranking-cerrado').removeClass('hidden');
        $('#ranking-abierto').addClass('hidden');
    }
}
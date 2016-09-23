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

        $('.image-perfil').click(function(e){
            e.preventDefault();

             $(this).find('div').addClass('perfil-selected');
             console.log('clic');

            activePerfil();
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

function activePerfil(){

    if( $('.image-perfil div.perfil-selected').hasClass('block') ){
        $( ".image-perfil div.perfil-selected" ).removeClass('block');
        $( ".image-perfil div.perfil-selected" ).addClass('hidden');
        $( ".image-perfil div.perfil-selected" ).removeClass('hidden');
        $( ".image-perfil div.perfil-selected" ).addClass('block');
        $( ".image-perfil div.perfil-selected" ).removeClass('perfil-selected');
        console.log('perfil-selected removed');

        return;
    }
    $( ".image-perfil div.perfil-selected" ).removeClass('hidden');
    $( ".image-perfil div.perfil-selected" ).addClass('block');
    $( ".image-perfil div.perfil-selected" ).removeClass('perfil-selected');
}
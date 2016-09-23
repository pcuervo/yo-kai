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
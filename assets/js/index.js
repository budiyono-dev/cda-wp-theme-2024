jQuery(document).ready(function($) {
    console.log('doc ready')
    $('.menu-toggle').on('click', function(){
        $('#main-navbar').addClass('open');
        $('.menu-toggle').addClass('hide');
        $('.menu-close').addClass('show');
    });
    $('.menu-close').on('click', function(){
        $('#main-navbar').removeClass('open');
        $('.menu-toggle').removeClass('hide');
        $('.menu-close').removeClass('show');
    });
});

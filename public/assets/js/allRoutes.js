$(document).ready(function(){
    $('.images1').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');
        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');
    });
    $('.images1').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images2').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');


        $(this).removeClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeIn(500);

    });
    $('.images2').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images3').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');

        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');

    });
    $('.images3').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images4').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');

        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');

    });
    $('.images4').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images5').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');

        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');

    });
    $('.images5').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images6').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');

        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');

    });
    $('.images6').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
    $('.images7').on('mouseenter', function(e){
        $(this).addClass('animation-zoomIn');

        $(this).find('.slider-button1').fadeIn(500);
        $(this).removeClass('animation-zoomOut');

    });
    $('.images7').on('mouseleave', function(e){
        $(this).removeClass('animation-zoomIn');

        $(this).addClass('animation-zoomOut');
        $(this).find('.slider-button1').fadeOut(500);
    });
});
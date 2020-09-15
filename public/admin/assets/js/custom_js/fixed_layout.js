"use strict";
$(document).ready(function () {
    var header=$(".header").height();
    var footer=50;
    if ($(window).width() >= 992) {
        leftmenuscroll();
    }
    function leftmenuscroll() {
        $('.menu_scroll').slimScroll({
            height: $('.menu_scroll').css({'height': ($(window).height()) - header + 'px',"padding-bottom":footer}),
            size: '5px',
            color: '#ccc'
        });
    }
    $(window).resize(function() {
        setTimeout(function () {
            leftmenuscroll();
        },200);

    });
});
$(document).ready(function(){
    var swiper = new Swiper('.swiper-container', {

        grabCursor: false,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        autoplay: false,
        speed: 1500,
        watchSlidesProgress: true,
        watchVisibility: true,

        pagination: {
            el: '.swiper-pagination',
        },
        // Loop
        loop: true,
        loopAdditionalSlides: 3,
        loopedSlides: 3,

        // Lazy Loading
        watchSlidesVisibility: true,
        preloadImages: false,
        lazyLoading: true,
        breakpoints: {
            1200:{
                slidesPerView: 1,
                spaceBetween: 0,
            },
            1024:{
                slidesPerView: 1,
                spaceBetween: 0,
            },

            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            600: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
            }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    });



    var swiper1 = new Swiper('.swiper-container1', {

        grabCursor: false,
        slidesPerView: 4,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        autoplay: false,
        speed: 1500,
        watchSlidesProgress: true,
        watchVisibility: true,

        pagination: {
            el: '.swiper-pagination',
        },
        // Loop
        loop: true,
        loopAdditionalSlides: 3,
        loopedSlides: 3,

        // Lazy Loading
        watchSlidesVisibility: true,
        preloadImages: false,
        lazyLoading: true,
        breakpoints: {
            1200:{
                slidesPerView: 1,
                spaceBetween: 0,
            },
            1024:{
                slidesPerView: 1,
                spaceBetween: 0,
            },

            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            600: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
            }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    });
});

       $(document).ready(function(){
           var swiper = new Swiper('.swiper-container', {

               grabCursor: false,
                    slidesPerView: 4,
                    spaceBetween: 10,
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
           // $('.swiper-container').on('mouseenter', function(e){
           //     swiper.autoplay.stop();
           // });
           // $('.swiper-container').on('mouseleave', function(e){
           //     swiper.autoplay.start();
           // });
           $('.swiper-slide').on('mouseenter', function(e){
                $(this).addClass('animation-zoomIn');
                $(this).find('.slider-button').fadeIn(500);
                $(this).removeClass('animation-zoomOut');
           });
           $('.swiper-slide').on('mouseleave', function(e){
               $(this).addClass('animation-zoomOut');
               $(this).find('.slider-button').fadeOut(500);
               $(this).removeClass('animation-zoomIn');
           });
           // $('.swiper-button-next').click(function(){
           //     swiper.next();
           // });

       });
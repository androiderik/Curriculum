/*!
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
// $(function() {
//     $('a.page-scroll').bind('click', function(event) {
//         var $anchor = $(this);
//         $('html, body').stop().animate({
//             scrollTop: $($anchor.attr('href')).offset().top
//         }, 1500, 'easeInOutExpo');
//         event.preventDefault();
//     });
// });

// // Highlight the top nav as scrolling occurs
// $('body').scrollspy({
//     target: '.navbar-fixed-top'
// })

// // Closes the Responsive Menu on Menu Item Click
// $('.navbar-collapse ul li a').click(function() {
//     $('.navbar-toggle:visible').click();
// });


$(document).ready(function() {
  $("#owl-demo").owlCarousel({
  	items: 4
  });
   new WOW().init();
});


$('.elvideo').click(function(){
          var vid_num = $(this).data('vid');
          var vid_src = 'https://player.vimeo.com/video/'+vid_num;
          $('#myModal').modal('show');
          $('#myModal iframe').attr('src', vid_src);
      })
    $('.modal').on('shown.bs.modal', function () {
       froogaloop.api('pause');
    })
    $(function(){
      $('.modal').on('hidden.bs.modal', function (e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
      });
    });
    $(function() {


        function fadePause(){
            $("#pause-button").addClass('faded');
        }

        $('#play-button').click(function(){
            $(this).toggleClass('fadeOutDown')
            $('#pause-button').addClass('fadeInUp')
            $('#pause-button').removeClass('fadeOutDown')
            setTimeout(fadePause, 2000)
        });

        $('#pause-button').click(function(){
            $(this).toggleClass('fadeOutDown')
            $('#play-button').removeClass('fadeOutDown')
            $('#play-button').addClass('fadeInUp')
            $('#pause-button').removeClass('fadeInUp')
            $('#pause-button').removeClass('faded')

        });

       
        $('#menu-nosotros').hover(function(){
            $('#carrete').addClass('rotar2');
            $('.current-line').addClass('current-nosotros');
        },function(){
            $('#carrete').removeClass('rotar2');
            $('.current-line').removeClass('current-nosotros');
        });

        //LINEA  p:has(img)

        if ($('#menu-proyectos').hasClass('activo')){
             $('.current-line').addClass('activo-proyectos')
        }

        if ($('#menu-nosotros').hasClass('activo')){
             $('.current-line').addClass('activo-nosotros')
        }

        if ($('#menu-servicios').hasClass('activo')){
             $('.current-line').addClass('activo-servicios')
        }

        if ($('#menu-productions').hasClass('activo')){
             $('.current-line').addClass('activo-productions')
        }

        if ($('#menu-contacto').hasClass('activo')){
             $('.current-line').addClass('activo-contacto')
        }


        $('#menu-proyectos').hover(function(){
            $('#carrete').addClass('rotar3');
            $('.current-line').addClass('current-proyectos');
        },function(){
            $('#carrete').removeClass('rotar3');
            $('.current-line').removeClass('current-proyectos');
        });

        $('#menu-servicios').hover(function(){
            $('#carrete').addClass('rotar4');
            $('.current-line').addClass('current-servicios');
        },function(){
            $('#carrete').removeClass('rotar4');
            $('.current-line').removeClass('current-servicios');
        });

        $('#menu-productions').hover(function(){
            $('#carrete').addClass('rotar5');
            $('.current-line').addClass('current-productions');
        },function(){
            $('#carrete').removeClass('rotar5');
            $('.current-line').removeClass('current-productions');
        });

        $('#menu-contacto').hover(function(){
            $('#carrete').addClass('rotar6');
            $('.current-line').addClass('current-contacto');
        },function(){
            $('#carrete').removeClass('rotar6');
            $('.current-line').removeClass('current-contacto');
        });
        
     



    });
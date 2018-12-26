/*!
 * classie v1.0.1
 */

 $(document).ready(function () {

    "use strict";

    // scroll
    smoothScroll.init();
    
    /* _____________________________________

     Customizer
     _____________________________________ */

    if ($("#layout-customizer").length && $("#color-customizer").length) {
      if (!$.cookie("customizer")) {
        $('#layout-customizer').toggleClass('layout-open');

        setTimeout(function () {
          $('#layout-customizer').toggleClass('layout-open');
        }, 4000);


        $.cookie("customizer", true);
      }

      $('body').on('click', '#color-customizer', function () {
        $(this).toggleClass('color-open');
        $('#layout-customizer').removeClass('layout-open');
      });

      $('body').on('click', '#layout-customizer', function () {
        $(this).toggleClass('layout-open');
        $('#color-customizer').removeClass('color-open');
      });
	  
	  $('body').on('click', '#layout-customizer', function () {
        $(this).toggleClass('layout-open');
        $('#color-customizer').removeClass('color-open');
      });
    }


    /* _____________________________________

     Smooth Scroll
     _____________________________________ */


    var topHeight = 0;

    if ($(".navbar-fixed-top").length) {
      topHeight = 80;
    }
    $('body').on('click', 'a.smooth-scroll', function (event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - topHeight
      }, {
        duration: 1000,
        specialEasing: {
          width: "linear",
          height: "easeInOutCubic"
        }
      });
      event.preventDefault();
    });

    /* _____________________________________

     Scroll Top
     _____________________________________ */

    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        $('.btn-top').fadeIn();
      } else {
        $('.btn-top').fadeOut();
      }
    });


    /* _____________________________________

     Scroll Animations
     _____________________________________ */


    if (Modernizr.csstransforms3d) {
      window.sr = ScrollReveal();

      sr.reveal('.reveal-bottom-20', {
        origin: 'bottom',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-top-20', {
        origin: 'top',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-left-10', {
        origin: 'left',
        distance: '10px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-left-20', {
        origin: 'left',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-right-10', {
        origin: 'right',
        distance: '10px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      });

      sr.reveal('.reveal-right-20', {
        origin: 'right',
        distance: '20px',
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: 'linear',
        reset: true
      })

      sr.reveal('.reveal-bottom-opacity', {
        origin: 'bottom',
        distance: '20px',
        duration: 800,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: 'linear',
        mobile: false
      });
      ;
    }


    /* _____________________________________

     Owl Carousel
     _____________________________________ */

    if ($(".gallery-slider").length) {
      $('.gallery-slider').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 2000,
        dotsEach: 2,
        slideBy: 2,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            margin: 20
          },
          320: {
            items: 2,
            margin: 20
          },
          640: {
            items: 3,
            margin: 20
          },
          992: {
            items: 4,
            margin: 30
          }
        }
      })
    }

    
console.log(md.mobile());
    //mobile
    if(md.mobile()){

      if ($(".testimonial-slider").length) {
        $('.testimonial-slider').owlCarousel({
          loop: true,
          margin: 10,
          responsiveClass: true,
          autoplay: true,
          autoplayTimeout: 6000,
          autoplayHoverPause: true,
          items: 1,
          smartSpeed: 4000

        })
      }

    }
    

    // PC
    else{
      if ($(".testimonial-slider").length) {
        $('.testimonial-slider').owlCarousel({
          loop: true,
          margin: 10,
          responsiveClass: true,
          autoplay: true,
          autoplayTimeout: 6000,
          autoplayHoverPause: true,
          items: 2,
          smartSpeed: 4000

        })
      }
    }


    /* _____________________________________

     Bootstrap Fix: IE10 in Win 8 & Win Phone 8
     _____________________________________ */


    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement('style')
      msViewportStyle.appendChild(
        document.createTextNode(
          '@-ms-viewport{width:auto!important}'
        )
      )
      document.querySelector('head').appendChild(msViewportStyle)
    }

  }
)
;



/*=========================================================================
        Sticky Header Animation
=========================================================================*/
var animatedHeader = (function() {
  "use strict";

  var docElem = document.documentElement,
    header = document.querySelector( ".navbar-default" ),
    didScroll = false,
    changeHeaderOn = 100;

  function init() {
    window.addEventListener( 'scroll', function( event ) {
      if( !didScroll ) {
        didScroll = true;
        setTimeout( scrollPage, 250 );
      }
    }, false );
  }

  function scrollPage() {
    var sy = scrollY();
    if ( sy >= changeHeaderOn ) {
      classie.add( header, 'shrink' );
    }
    else {
      classie.remove( header, 'shrink' );
    }
    didScroll = false;
  }

  function scrollY() {
    return window.pageYOffset || docElem.scrollTop;
  }

  init();

})();



/*!
 * classie v1.0.1
 * class helper functions
 * from bonzo https://github.com/ded/bonzo
 * MIT license
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true, unused: true */
/*global define: false, module: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};


// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else if ( typeof exports === 'object' ) {
  // CommonJS
  module.exports = classie;
} else {
  // browser global
  window.classie = classie;
}

})( window );


// countUP


var options = {
  useEasing : true, 
  useGrouping : true, 
  separator : ',', 
  decimal : '.', 
  prefix : '', 
  suffix : '' 
};
// var demo = new CountUp("timer1", 0, 840, 0, 2.5, options);
// demo.start();
// var demo = new CountUp("timer2", 0, 589, 0, 2.5, options);
// demo.start();
// var demo = new CountUp("timer3", 0, 714, 0, 2.5, options);
// demo.start();
// var demo = new CountUp("timer4", 0, 920, 0, 2.5, options);
// demo.start();



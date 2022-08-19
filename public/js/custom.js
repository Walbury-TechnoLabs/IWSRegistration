(function ($) {
  "use strict";

  var review = $('.player_info_item');
  if (review.length) {
    review.owlCarousel({
      items: 1,
      loop: true,
      dots: false,
      autoplay: true,
      margin: 40,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      navText: [
        '<img src="img/icon/left.svg" alt="">',
        '<img src="img/icon/right.svg" alt="">'

      ],
      responsive: {
        0: {
          margin: 15,
        },
        600: {
          margin: 10,
        },
        1000: {
          margin: 10,
        }
      }
    });
  }
  $('.popup-youtube, .popup-vimeo').magnificPopup({
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  
//   var Countdown = {
  
//   // Backbone-like structure
//   $el: $('.countdown'),
  
//   // Params
//   countdown_interval: null,
//   total_seconds     : 0,
  
//   // Initialize the countdown  
//   init: function() {
    
//     // DOM
//     this.$ = {
//       hours  : this.$el.find('.bloc-time.hours .figure'),
//       minutes: this.$el.find('.bloc-time.min .figure'),
//       seconds: this.$el.find('.bloc-time.sec .figure')
//     };

//     // Init countdown values
//     this.values = {
//         hours  : this.$.hours.parent().attr('data-init-value'),
//         minutes: this.$.minutes.parent().attr('data-init-value'),
//         seconds: this.$.seconds.parent().attr('data-init-value'),
//     };
    
//     // Initialize total seconds
//     this.total_seconds = this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;

//     // Animate countdown to the end 
//     this.count();    
//   },
  
//   count: function() {
    
//     var that    = this,
//         $hour_1 = this.$.hours.eq(0),
//         $hour_2 = this.$.hours.eq(1),
//         $min_1  = this.$.minutes.eq(0),
//         $min_2  = this.$.minutes.eq(1),
//         $sec_1  = this.$.seconds.eq(0),
//         $sec_2  = this.$.seconds.eq(1);
    
//         this.countdown_interval = setInterval(function() {

//         if(that.total_seconds > 0) {

//             --that.values.seconds;              

//             if(that.values.minutes >= 0 && that.values.seconds < 0) {

//                 that.values.seconds = 59;
//                 --that.values.minutes;
//             }

//             if(that.values.hours >= 0 && that.values.minutes < 0) {

//                 that.values.minutes = 59;
//                 --that.values.hours;
//             }

//             // Update DOM values
//             // Hours
//             that.checkHour(that.values.hours, $hour_1, $hour_2);

//             // Minutes
//             that.checkHour(that.values.minutes, $min_1, $min_2);

//             // Seconds
//             that.checkHour(that.values.seconds, $sec_1, $sec_2);

//             --that.total_seconds;
//         }
//         else {
//             clearInterval(that.countdown_interval);
//         }
//     }, 1000);    
//   },
  
//   animateFigure: function($el, value) {
    
//      var that         = this,
//          $top         = $el.find('.top'),
//          $bottom      = $el.find('.bottom'),
//          $back_top    = $el.find('.top-back'),
//          $back_bottom = $el.find('.bottom-back');

//     // Before we begin, change the back value
//     $back_top.find('span').html(value);

//     // Also change the back bottom value
//     $back_bottom.find('span').html(value);

//     // Then animate
//     TweenMax.to($top, 0.8, {
//         rotationX           : '-180deg',
//         transformPerspective: 300,
//         ease                : Quart.easeOut,
//         onComplete          : function() {

//             $top.html(value);

//             $bottom.html(value);

//             TweenMax.set($top, { rotationX: 0 });
//         }
//     });

//     TweenMax.to($back_top, 0.8, { 
//         rotationX           : 0,
//         transformPerspective: 300,
//         ease                : Quart.easeOut, 
//         clearProps          : 'all' 
//     });    
//   },
  
//   checkHour: function(value, $el_1, $el_2) {
    
//     var val_1       = value.toString().charAt(0),
//         val_2       = value.toString().charAt(1),
//         fig_1_value = $el_1.find('.top').html(),
//         fig_2_value = $el_2.find('.top').html();

//     if(value >= 10) {

//         // Animate only if the figure has changed
//         if(fig_1_value !== val_1) this.animateFigure($el_1, val_1);
//         if(fig_2_value !== val_2) this.animateFigure($el_2, val_2);
//     }
//     else {

//         // If we are under 10, replace first figure with 0
//         if(fig_1_value !== '0') this.animateFigure($el_1, 0);
//         if(fig_2_value !== val_1) this.animateFigure($el_2, val_1);
//     }    
//   }
// };

// // Let's go !
// Countdown.init();


  var review = $('.textimonial_iner');
  if (review.length) {
    review.owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: false,
      responsive: {
        0: {
          margin: 15,
        },
        600: {
          margin: 10,
        },
        1000: {
          margin: 10,
        }
      }
    });
  }
  $(document).ready(function() {
    $('select').niceSelect();
  });
  // menu fixed js code
  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 50) {
      $('.main_menu').addClass('menu_fixed animated fadeInDown');
    } else {
      $('.main_menu').removeClass('menu_fixed animated fadeInDown');
    }
  });

//   $(document).ready(function(){

//     var owl_1 = $('#owl-1');
//     var owl_2 = $('#owl-2');

//     owl_1.owlCarousel({
//       loop:true,
//       margin:10,
//       nav:false,
//       items: 1,
//       dots: false,
//       navText: false,
//       autoplay: true,
      
//     });
//  owl_2.find(".item").click(function(){
//     var slide_index = owl_2.find(".item").index(this);
//     owl_1.trigger('to.owl.carousel',[slide_index,300]);
//   });

//     owl_2.owlCarousel({
//       margin:50,
//       nav: true,
//       items: 3,
//       dots: false,
//       center: true,
//       loop:true,
//       navText: false,
//       autoplay: true,
//       center: true
//     });
    
//   });
 

$('.counter').counterUp({
  time: 2000
});

  $('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 300,
    infinite: true,
    asNavFor: '.slider-nav-thumbnails',
    autoplay:true,
    pauseOnFocus: true,
    dots: true,
  });
 
  $('.slider-nav-thumbnails').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider',
    focusOnSelect: true,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    centerMode: true,
    responsive: [
      {
        breakpoint: 480,
        settings: {
          centerMode: false,
        }
      }
    ]
  });
 
  //remove active class from all thumbnail slides
  $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
 
  //set active class to first thumbnail slides
  $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');
 
  // On before slide change match active thumbnail to current slide
  $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var mySlideNumber = nextSlide;
    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
    $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
 });
 
 //UPDATED 
   
 $('.slider').on('afterChange', function(event, slick, currentSlide){   
   $('.content').hide();
   $('.content[data-id=' + (currentSlide + 1) + ']').show();
 }); 

 $('.gallery_img').magnificPopup({
  type: 'image',
  gallery:{
    enabled:true
  }
});




}(jQuery));
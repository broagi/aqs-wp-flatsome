jQuery(document).ready(function($){
	$('.service-post').matchHeight();
	$('.post-box-title').matchHeight();
	$('.other-news').matchHeight();
});



// /*---------------------------------------------------
// /*  Vertical menus toggles
// /* -------------------------------------------------*/
// jQuery(document).ready(function($) {
//   jQuery('.home-footer-slider').owlCarousel({
//         margin: 25,
//         autoHeight:false,
//         loop:true,
//         autoplay:true,
//         autoplayTimeout:3000,
//         autoplayHoverPause:false,
//         smartSpeed:450,
//         dots:false,
//         nav:false,
//         navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
//         responsive:{
//         300:{
//             items:1,
//         },
//         600:{
//             items:3,
//         },
//         1000:{
//             items:7,
//         }
//     }
//     });
//   jQuery('.project-hot-slider').owlCarousel({
//         margin: 15,
//         autoHeight:false,
//         loop:true,
//         autoplay:true,
//         autoplayTimeout:3000,
//         autoplayHoverPause:false,
//         smartSpeed:450,
//         dots:false,
//         nav:true,
//         navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
//         responsive:{
//         300:{
//             items:1,
//         },
//         600:{
//             items:3,
//         },
//         1000:{
//             items:5,
//         }
//     }
//     });
//   jQuery('.gallery-project-slider').owlCarousel({
//         loop:true,
//         autoplay:true,
//         autoplayTimeout:4000,
//         autoplayHoverPause:true,
//         smartSpeed:450,
//         dots:false,
//         nav:false,
//         navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
//         responsive:{
//         300:{
//             items:1,
//         },
//         600:{
//             items:1,
//         },
//         1000:{
//             items:1,
//         }
//     }
//     });

// });


// jQuery(document).ready(function ($) {
// var $sync1 = $("#sync1"),
//     $sync2 = $("#sync2"),
//     flag = false,
//     duration = 300;
// $sync1
//     .owlCarousel({
//         items: 1,
//         nav: false,
//         lazyLoad: true,
//         dots: false,
//         navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
//     })
//     .on('changed.owl.carousel', function (e) {
//         if (!flag) {
//             flag = true;
//             $sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
//             flag = false;
//         }
//     });
// $sync2
//     .owlCarousel({
//         nav: true,
//         dots: false,
//         lazyLoad: true,
//         margin:15,
//         navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
//         responsive : {
//             0 : {
//                 items: 2,
//             },
//             480 : {
//                 items: 4,
//             },
//             768 : {
//                 items: 8,
//                 nav: true,
//             }
//         }
//     })
//     .on('click', '.owl-item', function () {
//         $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
//     })
//     .on('changed.owl.carousel', function (e) {
//         if (!flag) {
//             flag = true;        
//             $sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
//             flag = false;
//         }
//     });
             
// });
// jQuery(document).ready(function($) {
// var $grid = $('.grid').isotope({
//   itemSelector: '.element-item',
//   layoutMode: 'fitRows'
// });
// // filter functions
// var filterFns = {
//   // show if number is greater than 50
//   numberGreaterThan50: function() {
//     var number = $(this).find('.number').text();
//     return parseInt( number, 10 ) > 50;
//   },
//   // show if name ends with -ium
//   ium: function() {
//     var name = $(this).find('.name').text();
//     return name.match( /ium$/ );
//   }
// };
// // bind filter button click
// $('.filters-button-group').on( 'click', 'button', function() {
//   var filterValue = $( this ).attr('data-filter');
//   // use filterFn if matches value
//   filterValue = filterFns[ filterValue ] || filterValue;
//   $grid.isotope({ filter: filterValue });
// });
// // change is-checked class on buttons
// $('.button-group').each( function( i, buttonGroup ) {
//   var $buttonGroup = $( buttonGroup );
//   $buttonGroup.on( 'click', 'button', function() {
//     $buttonGroup.find('.is-checked').removeClass('is-checked');
//     $( this ).addClass('is-checked');
//   });
// });
// });
// jQuery(document).ready(function($) {
//     jQuery('.pj_main_cat .button, .pj_main_cat .button-child').click(function(){
//         jQuery('.filters-button-group .button').removeClass('open');
//     });
//   jQuery('.pj_main_cat .button-child').click(function(){
    
//        jQuery(this).closest('.pj_main_cat').find('.button').addClass('open'); 
//     });
//     });

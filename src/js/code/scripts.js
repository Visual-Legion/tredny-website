// if ($(".gmaps").length > 0) {
// 	const {gmaps} = require('./maps');
// }

const {cookie} = require('./cookie');
const {contact} = require('./contact');

(function(root, $, undefined) {
"use strict";

$(() => {
	// DOM ready, take it away 

	console.log("JS/JQ Ready v.333 ");

	/* Loader */
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});

	/* Hamburger menu */
	var hamburger = $("#hamburger-icon");
	hamburger.click((e) => {
		e.preventDefault();
		hamburger.toggleClass("active");
		$(".navs_wrapper nav").toggleClass("tablet_menu_active");
	// return false;
	});

	/* Pagepiling */
	if ($('#pagepiling') && matchMedia('only screen and (min-width: 768px)').matches) {
		$('#pagepiling').pagepiling({
			verticalCentered: false,
			css3: false,
			menu: 'nav ul',
			anchors: ['view_top', 'view_design', 'view_development', 'view_seo', 'view_extras', 'view_startup', 'view_contact'],
			navigation: {
				'textColor': '#fff',
				'bulletsColor': '#fff',
				'position': 'left',
			// 'tooltips': ['Top', 'Design', 'Development', 'SEO', 'Extras', 'Startup', 'Contact']
			},
			onLeave: function(index, nextIndex, direction) {
				//fading out the text of the leaving section
				$('.section').eq(index - 1).find('h1, p, .button, input, textarea, label, span').fadeOut(700, 'easeInQuart');
				// $('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').removeClass('slid');

				//fading in the text of the destination (in case it was fadedOut)
				$('.section').eq(nextIndex - 1).find('h1, p, .button, input, textarea, label, span').fadeIn(700, 'easeInQuart');
			// $('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').addClass('slid');
			},

			// afterLoad: function(index, nextIndex, direction) {
			// 	$('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').addClass('slid');
			// }

		});

		$('.scroll_down').click(() => {
			$.fn.pagepiling.moveSectionDown();
		});

		//pbly better way
		//checking for pagepiling menu

		var list = $('nav ul li');
		Array.prototype.forEach.call(list, element => {
			// console.log(element)
			var classList = $(element).attr('class').split(/\s+/);
			// console.log('classList', classList);

			var anchor = false;

			classList.forEach(classElement => {
				if (classElement.indexOf('menu_') != -1) {
					anchor = classElement.replace("menu_", "view_");
				// console.log('anchor', anchor);
				}
			})

			if (anchor) {
				// console.log('$(element)', $(element));
				// console.log('anchor', anchor);
				$(element).attr('data-menuanchor', anchor);
			}
		});

		//if home slide in elements

		// console.log('list', list);
		// var url = window.location.href;
		var current_active_from_url = window.location.href.split('/');

		if (current_active_from_url[3] && current_active_from_url[3].indexOf('#') != -1) { // has anchor
			// console.log('current_active_from_url[3]', current_active_from_url[3]);
			$('.navs_wrapper li a[href="/' + current_active_from_url[3] + '"]').parent().addClass('active');
		// console.log($('.navs_wrapper li a[href="/' + current_active_from_url[3] + '"]'));
		}

	}

	// var top_imac_svg = $('.md-imac .md-screen svg');
	var top_imac_svg_size = $('.md-imac .md-screen svg').height();
	var top_imac_size = $('.md-imac .md-screen').height();
	var top_imac_toScroll = top_imac_svg_size - top_imac_size;

	// (function topImacScrollUpDownloop() {

	// 	console.log('dqdqsdsqdqdqs');

	// 	$('.md-imac .md-screen svg').animate({

	// 		step: (now, fx) => {
	// 			console.log('$(this)', $(this));
	// 			$(this).css('transform', 'translateY(-' + top_imac_size + ')');
	// 		}
	// 	}, { //.animate takes 2 args: direction, distance in px
	// 		duration: 3000, //duration is ms 
	// 		complete: function() {
	// 			$('.md-imac .md-screen svg').animate({
	// 				step: (now, fx) => {
	// 					$(this).css('transform', 'translateY(0)');
	// 				}
	// 			}, {
	// 				duration: 3000,
	// 				complete: topImacScrollUpDownloop
	// 			});
	// 		}
	// 	});
	// })();

	/*Show more events*/

	// setTimeout(() => {
	// 	$('.more_events').click((e) => {
	// 		console.log("showing more events");
	// 		e.preventDefault();
	// 		$('.event.ninja').fadeIn();
	// 		$('.more_events').css('left', '100%');
	// 	});
	// 	$('.more_photos').click((e) => {
	// 		console.log("showing more events");
	// 		e.preventDefault();
	// 		$('.album_thumb.ninja').fadeIn(() => {
	// 			// $('.more_photos').fadeOut(() => {
	// 			// 	console.log('slidup');
	// 			// });
	// 		});
	// 		$('.more_photos').css('left', '100%');
	// 	});
	// }, 10);

	/* Magnific popup */
	// $('.photo_gallery .photo').magnificPopup({
	// 	delegate: 'a', // child items selector, by clicking on it popup will open
	// 	type: 'image'
	// // other options
	// });

	// $('.photo_gallery .photo a').magnificPopup({
	// 	type: 'image',

	// 	gallery: {
	// 		enabled: true,
	// 		preload: [0, 2], // read about this option in next Lazy-loading section

	// 		navigateByImgClick: true,

	// 		arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button

	// 		tPrev: 'Previous (Left arrow key)', // title for left button
	// 		tNext: 'Next (Right arrow key)', // title for right button
	// 		tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
	// 	}
	// });


	/* Smooth anchor scroll from css-tricks */
	// Select all links with hashes
	// $('a[href*="#"]')
	// 	// Remove links that don't actually link to anything
	// 	.not('[href="#"]')
	// 	.not('[href="#0"]')
	// 	.click(function(event) {
	// 		// On-page links
	// 		if (
	// 				location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
	// 				&&
	// 				location.hostname == this.hostname
	// 		) {
	// 			// Figure out element to scroll to
	// 			var target = $(this.hash);
	// 			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	// 			// Does a scroll target exist?
	// 			if (target.length) {
	// 				// Only prevent default if animation is actually gonna happen
	// 				event.preventDefault();
	// 				$('html, body').animate({
	// 					scrollTop: target.offset().top
	// 				}, 1000, function() {
	// 					// Callback after animation
	// 					// Must change focus!
	// 					var $target = $(target);
	// 					$target.focus();
	// 					if ($target.is(":focus")) { // Checking if the target was focused
	// 						return false;
	// 					} else {
	// 						$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
	// 						$target.focus(); // Set focus again
	// 					}
	// 					;
	// 				});
	// 			}
	// 		}
	// 	});

});
})(undefined, jQuery);


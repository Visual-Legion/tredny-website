// if ($(".gmaps").length > 0) {
// 	const {gmaps} = require('./maps');
// }

const {cookie} = require('./cookie');
const {contact} = require('./contact');

(function(root, $, undefined) {
"use strict";

$(() => {
	// DOM ready, take it away 

	console.log("JS/JQ Ready v.11 ");

	/* Loader */
	$(window).load(function() {
		$(".loader").fadeOut("slow");
	});

	//to correct gradient text bug
	$('header nav li:not(:last-child) a').css('-webkit-background-clip', 'text');
	$('header nav li:not(:last-child) a').css('background-size', '250%')

	$('.wpml-ls-item a').css('-webkit-background-clip', 'text');
	$('.wpml-ls-item a').css('background-size', '250%')
	// $('.wpml-ls-item a').css('background-size', '200%');
	// $('.wpml-ls-item a').css('background-position', '100%');

	//menuItemTopHighlightedIfNoneAre()
	if ($('li.active a').length == 0) {
		$('nav ul li:first-child').addClass('active');
	}

	function removeHashtagFromElementHash(string) {
		return string.replace('#', '');
	}

	function getDegNumber(string) {

		var deg = '';
		var index = string.indexOf('deg') - 1;
		var isnumber = true;

		// while charAt is a number
		while (isnumber) {
			// console.log('in while loop');
			if (!isNaN(string.charAt(index))) {
				deg = string.charAt(index) + deg;
				--index;
			} else {
				// console.log(string.charAt(index) + 'is nan');
				isnumber = false;
			}

		}

		return deg;
	}

	//could be seperated in swith element to active then active lang to active view
	function switchLangBackgroundToActiveBackgroundGradient() {
		var css = $('li.active a').css('background-image');
		// css = css.replace('#000, #000 50%,', '');
		// css = css.replace('rgb(0, 0, 0), rgb(0, 0, 0) 50%,', '');
		$('.wpml-ls-current-language a').css('background-image', css);
		// $('.wpml-ls-item a').css('background-position', '0%');

		$('.wpml-ls-item a').css('transition', 'none');

		if (getDegNumber(css) < 180) {
			$('.wpml-ls-item a').css('background-position', '0%');
			setTimeout(function() {
				$('.wpml-ls-item a').css('transition', 'all 0.4s ease-in-out');
				$('.wpml-ls-item a').css('background-position', '-70%');
			}, 100);
		} else {
			$('.wpml-ls-item a').css('background-position', '100%');
			setTimeout(function() {
				$('.wpml-ls-item a').css('transition', 'all 0.4s ease-in-out');
				$('.wpml-ls-item a').css('background-position', '0%');
			}, 100);
		}

		$('.wpml-ls-item a').css('-webkit-background-clip', 'text');
		console.log('css done');
	}

	//add current colour to active language
	//settimoet bad, check why it needs timeout !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	setTimeout(function() {
		switchLangBackgroundToActiveBackgroundGradient();
	}, 500);

	function handleMobileNavClick(hamburger) {
		$(".tablet_menu_active a").click((e) => {

			e.preventDefault();
			$(".tablet_menu_active a").unbind("click");

			//close nav menu onclick
			$(".navs_wrapper nav").toggleClass("tablet_menu_active");
			hamburger.toggleClass("active");

			//scroll to hash
			$('html,body').animate({
				scrollTop: $(e.currentTarget.hash).offset().top - 80
			}, 'slow');

			//change active
			updateMobileActiveNavItem(e);

		})
	}

	//dom should be ready wtf why all there timeouts
	setTimeout(function() {
		$('.nav a').parent().parent().find('li:not(.wpml-ls-item)').removeClass('active');
	}, 500);
	function updateMobileActiveNavItem(e) {
		$('.nav a').parent().parent().find('li:not(.wpml-ls-item)').removeClass('active');
		$(e.target.parentElement).addClass('active');
	}

	/* Hamburger menu */
	var hamburger = $("#hamburger-icon");
	hamburger.click((e) => {
		e.preventDefault();

		if (hamburger.hasClass('active')) {
			$(".tablet_menu_active a").unbind("click");
		}

		hamburger.toggleClass("active");
		$(".navs_wrapper nav").toggleClass("tablet_menu_active");
		handleMobileNavClick(hamburger);

	});

	// close mobile menu on click


	/* Pagepiling */
	if ($('#pagepiling') && matchMedia('only screen and (min-width: 768px)').matches) {
		$('#pagepiling').pagepiling({
			verticalCentered: false,
			css3: false,
			menu: 'nav ul',
			anchors: ['view_top', 'view_design', 'view_development', 'view_seo', 'view_extras', 'view_startup', 'view_contact', 'view_footer'],
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
				setTimeout(function() {
					// $('.wpml-ls-current-language a').css('background-image', $('li.active a').css('background-image'));
					switchLangBackgroundToActiveBackgroundGradient();
				}, 100);
			// switchLangBackgroundToActiveBackgroundGradient();
			},

			// afterLoad: function(index, nextIndex, direction) {
			// 	$('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').addClass('slid');
			// }

		});

		// $('footer').addClass('footer_taht_pagepiling');
		$(".footer_wrapper").clone().appendTo(".view_footer");
		$(".copyright").clone().appendTo(".view_footer");

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


	/****************************/
	/* Mockup scroll animations */
	/****************************/

	// var top_imac_svg = $('.md-imac .md-screen svg');
	// var top_imac_svg_size = $('.md-imac .md-screen svg').height();
	// var top_imac_size = $('.md-imac .md-screen').height();
	// var top_imac_toScroll = top_imac_svg_size - top_imac_size;

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


	// if (matchMedia('only screen and (max-width: 768px)').matches) {
	// 	// Menu highlight when scroll/click
	// 	//https://codepen.io/joxmar/pen/NqqMEg

	// 	console.log('$(".nav").find("a")', $(".nav").find("a"));

	// 	// Cache selectors
	// 	var lastId,
	// 		topMenu = $(".nav"),
	// 		topMenuHeight = topMenu.outerHeight() + 1,
	// 		// All list items
	// 		menuItems = topMenu.find("a"),
	// 		// Anchors corresponding to menu items
	// 		scrollItems = menuItems.map(function() {
	// 			console.log('$(this)', $(this));
	// 			console.log('$($(this).attr("href"))', $($(this).hash));
	// 			var item = $($(this).attr("href"));
	// 			console.log("item", item);
	// 			if (item.length) {
	// 				return item;
	// 			}
	// 		});

	// 	// console.log('menuItems', menuItems);

	// 	// Bind click handler to menu items
	// 	// so we can get a fancy scroll animation
	// 	menuItems.click(function(e) {
	// 		var href = $(this).attr("href"),
	// 			offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
	// 		$('html, body').stop().animate({
	// 			scrollTop: offsetTop
	// 		}, 850);
	// 		e.preventDefault();
	// 	});

	// 	// Bind to scroll
	// 	$(window).scroll(function() {
	// 		// Get container scroll position
	// 		var fromTop = $(this).scrollTop() + topMenuHeight;

	// 		// Get id of current scroll item
	// 		var cur = scrollItems.map(function() {
	// 			if ($(this).offset().top < fromTop)
	// 				return this;
	// 		});
	// 		// Get the id of the current element
	// 		cur = cur[cur.length - 1];
	// 		var id = cur && cur.length ? cur[0].id : "";

	// 		if (lastId !== id) {
	// 			lastId = id;
	// 			// Set/remove active class
	// 			menuItems
	// 				.parent().removeClass("active")
	// 				.end().filter("[href=#" + id + "]").parent().addClass("active");
	// 		}
	// 	});
	// }
	// if (matchMedia('only screen and (max-width: 768px)').matches) {
	// 	$('.nav a').on('click', function(event) {
	// 		$(this).parent().parent().find('li:not(.wpml-ls-item)').removeClass('active');
	// 		$(this).parent().addClass('active');
	// 	});

	// 	$(window).on('scroll', function() {
	// 		$('.section').each(function() {
	// 			if ($(window).scrollTop() >= $(this).offset().top) {
	// 				var id = $(this).attr('id');
	// 				// console.log('$(window).scrollTop()', $(window).scrollTop());
	// 				// console.log('$(this).offset().top', $(this).offset().top);
	// 				// console.log(id, 'id');
	// 				$('.nav li:not(.wpml-ls-item)').removeClass('active'); 
	// 				$(".nav a[href='/#" + id + "']").parent().addClass('active');
	// 			}
	// 		});
	// 	});
	// }


	/* Smooth anchor scroll from css-tricks */
	// Select all links with hashes
	// only tablet because of pagepiling
	if (matchMedia('only screen and (max-width: 768px)').matches) {
		$('a[href*="#"]')
			// Remove links that don't actually link to anything
			.not('[href="#"]')
			.not('[href="#0"]')
			.click(function(event) {
				// On-page links
				if (
						location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
						&&
						location.hostname == this.hostname
				) {
					// Figure out element to scroll to
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
					// Does a scroll target exist?
					if (target.length) {
						// Only prevent default if animation is actually gonna happen
						event.preventDefault();
						$('html, body').animate({
							scrollTop: target.offset().top
						}, 1000, function() {
							// Callback after animation
							// Must change focus!
							var $target = $(target);
							$target.focus();
							if ($target.is(":focus")) { // Checking if the target was focused
								return false;
							} else {
								$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
								$target.focus(); // Set focus again
							}
							;
						});
					}
				}
			});
	}

});
})(undefined, jQuery);


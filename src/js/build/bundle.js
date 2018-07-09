"use strict";

(function e(t, n, r) {
	function s(o, u) {
		if (!n[o]) {
			if (!t[o]) {
				var a = typeof require == "function" && require;if (!u && a) return a(o, !0);if (i) return i(o, !0);var f = new Error("Cannot find module '" + o + "'");throw f.code = "MODULE_NOT_FOUND", f;
			}var l = n[o] = { exports: {} };t[o][0].call(l.exports, function (e) {
				var n = t[o][1][e];return s(n ? n : e);
			}, l, l.exports, e, t, n, r);
		}return n[o].exports;
	}var i = typeof require == "function" && require;for (var o = 0; o < r.length; o++) {
		s(r[o]);
	}return s;
})({ 1: [function (require, module, exports) {
		/* Cookie */

		var cookie = {
			createCookie: function createCookie(name, value, days) {
				var expires = "";
				if (days) {
					var date = new Date();
					date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
					expires = "; expires=" + date.toUTCString();
				}
				document.cookie = name + "=" + value + expires + "; path=/";
				console.log('creaded cookie');
			},
			readCookie: function readCookie(name) {
				var nameEQ = name + "=";
				var ca = document.cookie.split(';');
				for (var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') {
						c = c.substring(1, c.length);
					}if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
				}
				return null;
			}
		};

		(function (root, $, undefined) {
			"use strict";

			$(function () {

				$('.cookie_wrapper a').click(function () {
					cookie.createCookie('acceptedCookie', 'yes', 30);
					$('.cookie_wrapper').toggleClass('hidden');
				});

				var acceptedCookie = cookie.readCookie('acceptedCookie');

				console.log('acceptedCookie', acceptedCookie);

				if (acceptedCookie === 'yes') {
					$('.cookie_wrapper').addClass('hidden');
				}
			});
		})(undefined, jQuery);

		module.exports = {
			cookie: cookie
		};
	}, {}], 2: [function (require, module, exports) {
		// if ($(".gmaps").length > 0) {
		// 	const {gmaps} = require('./maps');
		// }

		var _require = require('./cookie'),
		    cookie = _require.cookie;

		(function (root, $, undefined) {
			"use strict";

			var _this = this;

			$(function () {
				// DOM ready, take it away 

				console.log("JS/JQ Ready v.333 ");

				/* Loader */
				$(window).load(function () {
					$(".loader").fadeOut("slow");
				});

				/* Hamburger menu */
				var hamburger = $("#hamburger-icon");
				hamburger.click(function () {
					hamburger.toggleClass("active");
					$(".navs_wrapper nav").toggleClass("tablet_menu_active");
					// return false;
				});

				/* Pagepiling */
				if ($('#pagepiling')) {
					$('#pagepiling').pagepiling({
						verticalCentered: false,
						css3: false,
						menu: 'nav ul',
						anchors: ['view_top', 'view_design', 'view_development', 'view_seo', 'view_extras', 'view_startup', 'view_contact'],
						navigation: {
							'textColor': '#000',
							'bulletsColor': '#000',
							'position': 'right',
							'tooltips': ['Top', 'Design', 'Development', 'SEO', 'Extras', 'Startup', 'Contact']
						},
						onLeave: function onLeave(index, nextIndex, direction) {
							//fading out the text of the leaving section
							$('.section').eq(index - 1).find('h1, p, .button').fadeOut(700, 'easeInQuart');

							//fading in the text of the destination (in case it was fadedOut)
							$('.section').eq(nextIndex - 1).find('h1, p, .button').fadeIn(700, 'easeInQuart');
						}

					});

					//pbly better way
					//checking for pagepiling menu

					var list = $('nav ul li');
					Array.prototype.forEach.call(list, function (element) {
						// console.log(element)
						var classList = $(element).attr('class').split(/\s+/);
						// console.log('classList', classList);

						var anchor = false;

						classList.forEach(function (classElement) {
							if (classElement.indexOf('menu_') != -1) {
								anchor = classElement.replace("menu_", "view_");
								// console.log('anchor', anchor);
							}
						});

						if (anchor) {
							// console.log('$(element)', $(element));
							// console.log('anchor', anchor);
							$(element).attr('data-menuanchor', anchor);
						}
					});

					// console.log('list', list);
					// var url = window.location.href;
					var current_active_from_url = window.location.href.split('/');

					if (current_active_from_url[3] && current_active_from_url[3].indexOf('#') != -1) {
						// has anchor
						// console.log('current_active_from_url[3]', current_active_from_url[3]);
						$('.navs_wrapper li a[href="/' + current_active_from_url[3] + '"]').parent().addClass('active');
						console.log($('.navs_wrapper li a[href="/' + current_active_from_url[3] + '"]'));
					}
				}

				/* Form button replacement */
				if ($("form.wpcf7-form .button").length > 0) {
					$("form.wpcf7-form .button").click(function () {
						console.log("submitting");
						$(_this).closest("form").submit();
					});
				}

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
	}, { "./cookie": 1 }] }, {}, [2]);
(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/* Cookie */

var contact = {
    aFunction: function(name, value) {}
};

(function(root, $, undefined) {
"use strict";

$(() => {

    var form_error_msg = "Some fields have issues, please check the fields above.";

    var tdny_required_msg = "This field is required!";
    var tdny_valid_email_msg = "This email is invalid!";

    // console.log('ajax_object', ajax_object);

    //  ADD MAILCHIMP ? MAYBE NOT A FIRST AS WE DONT WANT TO ADD CHECKBOX SAYING WE'RE COLLECTING INFO

    function testEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    //could be better if we check for first time touched?
    function validateEmail(element) {
        if (!testEmail(element.val())) {
            element.parent().find('.error').text(tdny_valid_email_msg);
            return false;
        } else {
            element.parent().find('.error').text('');
            return true;
        }
    }

    //should adapt for particular form
    function isEmailFieldCorrect() {
        // console.log(validateEmail($('input[type=email]')));
        return validateEmail($('input[type=email]'));
    }

    function isEmptyString(string) {
        return string == '' || string == null;
    }

    function validateRequiredField(element) {
        if (isEmptyString(element.val())) {
            element.parent().find('.error').text(tdny_required_msg);
            if (element.hasClass('not_empty')) {
                element.removeClass('not_empty')
            }
            return false;
        } else {
            element.parent().find('.error').text('');
            element.addClass('not_empty');
            return true;
        }
    }

    function areRequiredFieldsValid() {
        var required_fields = $('input[required=required],textarea[required=required]');
        var valid = true;
        Array.prototype.forEach.call(required_fields, element => {
            if (!validateRequiredField($(element))) {
                valid = false;
            }
        });

        // console.log('valid', valid);

        return valid;
    }

    //we're assuming there is only one form... we could adapt to find elements in given form
    function isFormValid() {

        // console.log('areRequiredFieldsValid()', areRequiredFieldsValid());
        // console.log('isEmailFieldCorrect();', isEmailFieldCorrect()); 

        return areRequiredFieldsValid() && isEmailFieldCorrect();
    }


    $("input, textarea").keyup(e => {
        // console.log('change', $(e.currentTarget));

        var current_element = $(e.currentTarget);

        //Is this field required and does it have text
        if (current_element.prop('required')) {
            validateRequiredField(current_element)
        }

        if (current_element.attr('type') == 'email') {
            validateEmail(current_element)
        }
    });

    $('.tdny_submit_contact_form').click(function() {
        //  ADD BACK WHEN TESTING DONE

        if (!isFormValid()) {
            $('.contact-msg').html(form_error_msg);
            $('.contact-msg').addClass('error')

            return false;
        } else {
            if ($('.contact-msg').hasClass('error')) {
                $('.contact-msg').removeClass('error')
            }
            // $('.contact-msg').html('<img src="https://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');
            $('.contact_form_button').addClass('trying');


            $.ajax({
                type: "GET",
                url: 'https://apilayer.net/api/check',
                data: {
                    access_key: 'c673ff585d5fa454aa388487d9b7ef7c',
                    // email: email,
                    //shoud get current form email var, TODO
                    email: $('input[type=email]').val(),
                    smtp: 1,
                    format: 0
                },
                dataType: "json",
                crossDomain: true,
                success: function(data, status_text) {
                    $('.contact_form_button').removeClass('trying');
                    //maybe add txt for disposable
                    if (data['format_valid'] && !data['disposable']) {
                        if (data['did_you_mean']) {
                            $('.contact-msg').addClass('error');
                            $('.contact-msg').html('Error, did you mean <em>' + data['did_you_mean'] + '</em>?');
                            return false;
                        } else if (!data['mx_found']) {
                            $('.contact-msg').addClass('error');
                            $('.contact-msg').html('The entered mail address is invalid.');
                            return false;
                        } else {
                            if (ajax_object) {
                                $.ajax({
                                    type: 'POST',
                                    url: ajax_object.ajax_url,
                                    data: $('.contact_form').serialize(),
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.status == 'success') {
                                            //and disable button after sent

                                            $('.contact_form_button').addClass('sent_ok');
                                            $('.contact_form')[0].reset();
                                        }
                                        $('.contact-msg').html(response.errmessage);
                                    }
                                });
                            } else {
                                $('.contact-msg').addClass('error');
                                $('.contact-msg').html('Sorry something went wrong. Please try again later or contact us manually here : contact "at" visual-legion.com');
                            }
                        }

                    } else {
                        $('.contact-msg').html('The entered mail address is invalid.');
                        return false;
                    }
                },
                error: function(request, status_text, error) {
                    $('.contact_form_button').removeClass('trying');
                    $('.contact-msg').html('Error occurred, unable to validate your email address.');
                    return false;
                }
            });
        }
    });

});
})(undefined, jQuery);

module.exports = {
    contact
};
},{}],2:[function(require,module,exports){
// if ($(".gmaps").length > 0) {
// 	const {gmaps} = require('./maps');
// }

// const {cookie} = require('./cookie');
const {contact} = require('./contact');

(function(root, $, undefined) {
"use strict";

$(() => {
	// DOM ready, take it away 

	console.log("JS/JQ Ready v.21 ");

	/* Loader */
	$(window).load(function() {

		//wtf it should be loaded
		setTimeout(function() {
			$(".loader").fadeOut("slow");
			menuItemActiveOnLoad();
			switchLogoColor();
		}, 500);

		// Event.observe(window, 'load', function() {
		// 	$(".loader").fadeOut("slow");
		// 	menuItemActiveOnLoad();
		// 	switchLogoColor();
		// });

		/* ADD WHEN ADDING LANGS (DONT FORGER HEADER PHP AND IN JS BOLOW) */
		// switchLangBackgroundToActiveBackgroundGradient()

	});

	//to correct gradient text bug
	$('header nav li:not(:last-child) a').css('-webkit-background-clip', 'text');
	$('header nav li:not(:last-child) a').css('background-size', '250%')

	$('.wpml-ls-item a').css('-webkit-background-clip', 'text');
	$('.wpml-ls-item a').css('background-size', '250%')
	// $('.wpml-ls-item a').css('background-size', '200%');
	// $('.wpml-ls-item a').css('background-position', '100%');

	//menuItemTopHighlightedIfNoneAre()
	// if ($('li.active a').length == 0) {
	// 	$('nav ul li:first-child').addClass('active');
	// }

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
		$('.wpml-ls-current-language a').css('background-image', css);
		$('.wpml-ls-item a').css('transition', 'none');

		if (getDegNumber(css) < 180) {
			$('.wpml-ls-item a').css('background-position', '0%');
			setTimeout(function() {
				$('.wpml-ls-item a').css('transition', 'all 0.4s ease-in-out');
				$('.wpml-ls-item a').css('background-position', '-70%');
			}, 500);
		} else {
			$('.wpml-ls-item a').css('background-position', '100%');
			setTimeout(function() {
				$('.wpml-ls-item a').css('transition', 'all 0.4s ease-in-out');
				$('.wpml-ls-item a').css('background-position', '0%');
			}, 500);
		}

		$('.wpml-ls-item a').css('-webkit-background-clip', 'text');
	// console.log('css done');
	}

	function switchLogoColor(active_val) {
		var active = 'top';
		if (active_val) {
			//todo regex better
			active = active_val.replace('#view_', '');;
			active = active_val.replace('view_', '');;
		} else {
			if (window.location.hash) {
				var active = window.location.hash.replace('#view_', '');
			}
		}

		// active += '_gradient';
		console.log('active', active);

		// $('.logo_ll').css('fill', 'url(#' + active + ') #000'); 

		switch (active) {
		case 'top':
			$('#vl_gradient stop:first-child').css('stop-color', '#7c28fb');
			$('#vl_gradient stop:last-child').css('stop-color', '#7f9efd');
			break;
		case 'design':
			$('#vl_gradient stop:first-child').css('stop-color', '#69FF97');
			$('#vl_gradient stop:last-child').css('stop-color', '#00E4FF');
			console.log('design is active');
			break;
		case 'development':
			$('#vl_gradient stop:first-child').css('stop-color', '#3CD500');
			$('#vl_gradient stop:last-child').css('stop-color', '#FFF720');
			break;
		case 'seo':
			$('#vl_gradient stop:first-child').css('stop-color', '#fc1d48');
			$('#vl_gradient stop:last-child').css('stop-color', '#ffe954');
			break;
		case 'extras':
			$('#vl_gradient stop:first-child').css('stop-color', '#ff6a88');
			$('#vl_gradient stop:last-child').css('stop-color', '#fd9a8d');
			break;
		case 'startup':
			$('#vl_gradient stop:first-child').css('stop-color', '#ddd6f3');
			$('#vl_gradient stop:last-child').css('stop-color', '#faaca8');
			break;
		case 'contact':
			$('#vl_gradient stop:first-child').css('stop-color', '#e9defa');
			$('#vl_gradient stop:last-child').css('stop-color', '#fbfcdb');
			break;
		default:
			$('#vl_gradient stop:first-child').css('stop-color', '#7c28fb');
			$('#vl_gradient stop:last-child').css('stop-color', '#7f9efd');
			// $('#vl_gradient stop:first-child').css('stop-color', '#000');
			// $('#vl_gradient stop:last-child').css('stop-color', '#000');
			break;
		}
	}

	//not DRY but too tired right now, TODO 
	function menuItemActiveOnLoad(callback) {
		if (window.location.hash) {
			var active = window.location.hash.replace('#view_', '');
		} else {
			active = 'top';
		}
		var href = '';
		// active += '_gradient';
		// $('.logo_ll').css('fill', 'url(#' + active + ') #000'); 

		switch (active) {
		case '':
		case 'top':
			href = '/#view_top';
			break;
		case 'design':
			href = '/#view_design';
			break;
		case 'development':
			href = '/#view_development';
			break;
		case 'seo':
			href = '/#view_seo';
			break;
		case 'extras':
			href = '/#view_extras';
			break;
		case 'startup':
			href = '/#view_startup';
			break;
		}

		$('a[href="' + href + '"]').parent().addClass('active');

		if (typeof callback == "function") {
			callback();
		}
	}


	function handleMobileNavClick(hamburger) {
		$(".tablet_menu_active a").click((e) => {

			e.preventDefault();
			$(".tablet_menu_active a").unbind("click");

			//close nav menu onclick
			$(".navs_wrapper nav").toggleClass("tablet_menu_active");
			hamburger.toggleClass("active");

			window.location.href = e.currentTarget.hash;
			switchLogoColor();

			//scroll to hash

			if (matchMedia('only screen and (max-width: 768px)').matches) {
				$('html,body').animate({
					scrollTop: $(e.currentTarget.hash).offset().top - 80
				}, 'slow');

				//change active
				updateMobileActiveNavItem(e);
			} else {
				console.log('default behaviour');
				return true;
			}



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
			anchors: ['view_top', 'view_design', 'view_development', 'view_seo', 'view_extras', /*'view_startup',*/ /*'view_team',*/ 'view_contact', 'view_footer'],
			navigation: {
				'textColor': '#fff',
				'bulletsColor': '#fff',
				'position': 'left',
			// 'tooltips': ['Top', 'Design', 'Development', 'SEO', 'Extras', 'Startup', 'Contact']
			},
			onLeave: function(index, nextIndex, direction) {
				//fading out the text of the leaving section
				$('.section').eq(index - 1).find('h1, h2, h3, h4, h5, h6, i, p, ul, .button, input, .contact_form_button, textarea, label, span, .logo_wraper').fadeOut(700, 'easeInQuart');
				// $('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').removeClass('slid');

				//fading in the text of the destination (in case it was fadedOut)
				$('.section').eq(nextIndex - 1).find('h1, h2, h3, h4, h5, h6, i, p, ul, .button, input, .contact_form_button, textarea, label, span, .logo_wraper').fadeIn(700, 'easeInQuart');
				// $('.section').eq(nextIndex - 1).find('.slide-up, .slide-down, .slide-left, .slide-right').addClass('slid');

				setTimeout(function() {
					// $('.wpml-ls-current-language a').css('background-image', $('li.active a').css('background-image'));
					// switchLangBackgroundToActiveBackgroundGradient();
					switchLogoColor();
				}, 500);
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


	// 	if (matchMedia('only screen and (max-width: 768px)').matches) {
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

	$(window).on('scroll', function() {
		let id = 'view_footer';
		// let old_id = 'view_top';
		$('.section').each(function() {
			if ($(window).scrollTop() >= $(this).offset().top + 20) {
				if ($(this).attr('id') != 'view_footer') {
					id = $(this).attr('id');
					// console.log('$(window).scrollTop()', $(window).scrollTop());
					// console.log('$(this).offset().top', $(this).offset().top);
					console.log(id, 'id');
					$('.nav li:not(.wpml-ls-item)').removeClass('active');
					$(".nav a[href='/#" + id + "']").parent().addClass('active');
				// window.location.hash = id;
				// switchLogoColor(id);
				}
			}
		});
		// window.location.hash = id;
		switchLogoColor(id);
	});

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


},{"./contact":1}]},{},[2]);

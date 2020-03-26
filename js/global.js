jQuery(document).ready(function($) {

"use strict";

    /***************************************************************************/
    // HIDE LOADER
    /***************************************************************************/
     $(window).load(function(){
        $('.loader').fadeOut('fast');
    });

    /***************************************************************************/
    //MAIN MENU TOGGLE
    /***************************************************************************/
    $('.main-menu-toggle').on('click', function(event) {
        event.preventDefault();
        var overlay = $('body').find('.mobile-overlay');
        var menu = $(this).closest('header').find('.main-menu-container');

        if(menu.hasClass('open')) {
            overlay.fadeOut('fast');
            menu.fadeOut('fast', function() {
                menu.removeClass('mobile open');
            });
        } else {
            overlay.fadeIn('fast');
            menu.addClass('mobile open');
            menu.animate({width:'toggle'}, 350);
        }
    });

    $('.mobile-overlay, .main-menu-close').on('click', function(event) {
        event.preventDefault();
        $('body').find('.mobile-overlay').fadeOut('fast');
        var menu = $('header').find('.main-menu-container');
        menu.fadeOut('fast', function() { menu.removeClass('mobile open'); });
    });

	/***************************************************************************/
	//FIXED HEADER
	/***************************************************************************/
	var navToggle = $('.header-default.navbar-fixed .navbar-toggle');
	var mainMenuWrap = $('.header-default.navbar-fixed .header-menu');
    var header = $('.main-header');
    var transparentHeader = $('.header-transparent.navbar-fixed');
    var stickPoint = $('.navbar-fixed').outerHeight();
	
	if ($(window).scrollTop() > stickPoint) { 
		navToggle.addClass('fixed'); 
		mainMenuWrap.addClass('fixed');
        header.addClass('scrolled');
        transparentHeader.addClass('fixed');
        transparentHeader.addClass('header-classic');
        transparentHeader.removeClass('header-transparent');
        transparentHeader.find('.header-logo-anchor.has-logo img').attr('src', logo);
	}

	$(window).bind('scroll', function () {
		if ($(window).scrollTop() > stickPoint) {
		    navToggle.addClass('fixed');
		    mainMenuWrap.addClass('fixed');
            header.addClass('scrolled');
            transparentHeader.addClass('fixed');
            transparentHeader.addClass('header-classic');
            transparentHeader.removeClass('header-transparent');
            transparentHeader.find('.header-logo-anchor.has-logo img').attr('src', logo);
		} else {
		    navToggle.removeClass('fixed');
		    mainMenuWrap.removeClass('fixed');
            header.removeClass('scrolled');
            transparentHeader.removeClass('fixed');
            transparentHeader.removeClass('header-classic');
            transparentHeader.addClass('header-transparent');
            transparentHeader.find('.header-logo-anchor.has-logo img').attr('src', logo_transparent);
		}
	});

    /***************************************************************************/
    //ADJUST LINE ICON SIZE
    /***************************************************************************/
    $('.icon-line').each(function() {
        var iconLineSize = $(this).css('font-size');
        iconLineSize = parseInt(iconLineSize, 10);
        iconLineSize = iconLineSize + 2;
        $(this).css('font-size', iconLineSize);
    });

    /***************************************************************************/
    //TABS
    /***************************************************************************/
    $( function() {
        $( ".tabs" ).tabs({
            create: function(event, ui) { 
                $(this).fadeIn(); 
            }
        });
    });

    /***************************************************************************/
    //ACCORDIONS
    /***************************************************************************/
    $(function() {
        $( ".accordion" ).accordion({
            heightStyle: "content",
            closedSign: '<i class="fa fa-minus"></i>',
            openedSign: '<i class="fa fa-plus"></i>'
        });
    });

    /***************************************************************************/
    //ACTIVATE CHOSEN 
    /***************************************************************************/
    $("select").chosen({disable_search_threshold: 11});

	/***************************************************************************/
	//SLICK SLIDER - SIMPLE SLIDER
	/***************************************************************************/
	if(rtl == 'true') { rtl =  true; } else { rtl =  false; }
    if(banner_slider_transition == 'horizontal') { banner_slider_transition =  false; } else { banner_slider_transition =  true; }
	if(banner_slider_duration == '') { banner_slider_duration = 5000 }
	if(banner_slider_auto_start == 'true') { banner_slider_auto_start =  true; } else { banner_slider_auto_start =  false; }

	$('.slider.slider-simple').slick({
		prevArrow: $('.slider-nav-simple-slider .slider-prev'),
		nextArrow: $('.slider-nav-simple-slider .slider-next'),
		adaptiveHeight: true,
		fade: banner_slider_transition,
		autoplay: banner_slider_auto_start,
		autoplaySpeed: banner_slider_duration,
        rtl: rtl
	});

    /***************************************************************************/
    //SLICK SLIDER - IMAGE GALLERY 
    /***************************************************************************/
    $('.slider.slider-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        arrows: false,
        fade: true,
        infinite:false,
        asNavFor: '.gallery-pager',
        rtl: rtl
    });

    $('.gallery-pager').slick({
        prevArrow: $('.slider-nav-gallery .slider-prev'),
        nextArrow: $('.slider-nav-gallery .slider-next'),
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider.slider-gallery',
        dots: false,
        focusOnSelect: true,
        infinite:false,
        rtl: rtl
    });

    /***************************************************************************/
    //SLICK SLIDER - TESTIMONIALS 
    /***************************************************************************/
    $('.slider-wrap-testimonials').each(function (idx, item) {
        var carouselId = "slider-wrap-testimonials-" + idx;
        this.id = carouselId;
        $(this).find('.slider.slider-testimonials').slick({
            prevArrow: $('#' + carouselId + ' .slider-nav-testimonials .slider-prev'),
            nextArrow: $('#' + carouselId + ' .slider-nav-testimonials .slider-next'),
            adaptiveHeight: true,
            rtl: rtl
        });
    });

    /***************************************************************************/
    //SLICK SLIDER - DYNAMIC
    /***************************************************************************/
    $('.slider-wrap-dynamic').each(function (idx, item) {
        var carouselId = "slider-wrap-dynamic-" + idx;
        this.id = carouselId;

        var slidesToShow = $(this).data('slides-to-show');
        var slidesToScroll = $(this).data('slides-to-scroll');
        var transition = $(this).data('transition');
        if(transition == 'slide') { transition = false; } else { transition = true; } 
        var autoplay = $(this).data('autoplay');
        var autoplaySpeed = $(this).data('autoplay-speed');
        var adaptiveHeight = $(this).data('adaptive-height');
        if(adaptiveHeight == 'true') { adaptiveHeight = true; } else { adaptiveHeight = false; }

        $(this).find('.slider.slider-dynamic').slick({
            prevArrow: $('#' + carouselId + ' .slider-nav-dynamic .slider-prev'),
            nextArrow: $('#' + carouselId + ' .slider-nav-dynamic .slider-next'),
            rtl: rtl,
            slidesToShow: slidesToShow,
            slidesToScroll: slidesToScroll,
            fade: transition,
            autoplay: autoplay,
            autoplaySpeed: autoplaySpeed,
            adaptiveHeight: adaptiveHeight,
            responsive: [
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
        });
    });

    /***************************************************************************/
    //SLICK SLIDER - TAXONOMY
    /***************************************************************************/
    $('.slider-wrap-tax').each(function (idx, item) {
        var carouselId = "slider-wrap-tax-" + idx;
        this.id = carouselId;
        $(this).find('.slider.slider-tax').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $('#' + carouselId + ' .slider-nav-tax .slider-prev'),
            nextArrow: $('#' + carouselId + ' .slider-nav-tax .slider-next'),
            adaptiveHeight: true,
            rtl: rtl,
            responsive: [
                {
                  breakpoint: 700,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
        });
    });

	//INITIATE SLIDES
	$('.slide').addClass('initialized');

	/******************************************************************************/
	/** VALIDATE LOGIN FORM  **/
	/******************************************************************************/
	$(".login-form #wp-submit").click(function() {
        var user = $("input#user_login").val();
        var pass = $("input#user_pass").val();
        if (user == "" || pass == "") {
        	$('.login-form .alert-box').remove();
            $('.login-form').prepend('<div class="alert-box error"><i class="fa fa-warning"></i> '+ ns_core_local_script.login_error +'</div>');
            return false;
        }
    });

	/******************************************************************************/
	/** CONTACT FORM  **/
	/******************************************************************************/
	$('form.contact-form').submit(function() {

        var contactForm = $(this);

		contactForm.find('.form-loader').show();
	    contactForm.find('.error').remove();

        var successMessage = $(this).find('.alert-box.success').html();

	    var hasError = false;

	    contactForm.find('.requiredField').each(function() {
	        if($.trim($(this).val()) == '') {
	          var labelText = $(this).attr('placeholder');
	          contactForm.find('.contact-form-fields').prepend('<div class="alert-box error"><span>'+ns_core_local_script.contact_form_error+'</span> '+labelText+'.</div>');
	          $(this).addClass('inputError');
              $('.form-loader').hide();
	          hasError = true;
	        } else if($(this).hasClass('email')) {
	          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	          if(!emailReg.test($.trim($(this).val()))) {
	            var labelText = $(this).prev('label').text();
	            contactForm.find('.contact-form-fields').prepend('<div class="alert-box error"><span>'+ns_core_local_script.contact_form_error_email+'</span> email.</div>');
	            $(this).addClass('inputError');
	            hasError = true;
	          }
	        }
	    });

	    if(!hasError) {
	        var formInput = $(this).serialize();
	        $.post($(this).attr('action'),formInput, function(data){
	           contactForm.find('.form-loader').hide();
	           contactForm.find('.contact-form-fields').slideUp("fast", function() {          
	               $(this).before('<div class="alert-box success">'+successMessage+'</div>');
	           });
	        });
	    }
	      
	    return false; 
	});

});
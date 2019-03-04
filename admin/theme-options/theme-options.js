jQuery(document).ready(function($) {

	/********************************************/
	/* SAVE THEME OPTIONS */
	/********************************************/
	$(document).ready(function() {
	   $('#theme-options-form').submit(function() { 
	      $(this).ajaxSubmit({
	      	 onLoading: $('.loader').show(),
	         success: function(){
	         	$('.loader').hide();
	            $('.save-result').fadeIn();
	            setTimeout(function() {
				    $('.save-result').fadeOut('fast');
				}, 2000);
	         }, 
	         timeout: 8000
	      }); 
	      return false; 
	   });
	});

	/********************************************/
    /* RESET ALL OPTIONS */
    /********************************************/
    $('.ns-theme-options').on('click', '.reset-theme-options', function(e) { 
        e.preventDefault();
        var confirmMessage = 'Are you sure you want to reset all options?';
        if (confirm(confirmMessage) == true) {
	        $.get({
	        	type: 'POST',
	        	url: ajaxurl,
	        	data: { action: 'ns_reset_options'}, 
	        	onLoading: $('.loader').show(),
				success: function() {
					$('.loader').hide();
					location.reload();
				},
			});
		}
    }); 

    /********************************************/
    /* RESET DEFAULT FONTS */
    /********************************************/
    $('.ns-theme-options').on('click', '.reset-fonts', function(e) { 
        e.preventDefault();
        var defaultFont = $(this).find('span').text();
        $(this).closest('.admin-module-fonts').find('select').val(defaultFont);
        $(this).closest('.admin-module-fonts').find('select').trigger("chosen:updated");
    });  

    /********************************************/
    /* CONTACT FORM ID */
    /********************************************/
    var contactFormSource = $('#contact_form_source_contact_7');
    contactFormSource.on('click', function() {
       $('.admin-module-contact-form-id').slideDown('fast');
       $('.admin-module-contact-form-default').hide();
    });
    $('#contact_form_source_default').on('click', function() {
       $('.admin-module-contact-form-id').hide();
       $('.admin-module-contact-form-default').show();
    });

    /********************************************/
    /* TOPBAR FIELD - TOGGLE CUSTOM CONTENT */
    /********************************************/
    $('.top-bar-field-select').on('change', function() {
		if(this.value == 'custom') {
			$(this).closest('.admin-module').find('.top-bar-custom').addClass('show');
			$(this).closest('.admin-module').find('.top-bar-custom').removeClass('hide-soft');
		} else {
			$(this).closest('.admin-module').find('.top-bar-custom').removeClass('show');
			$(this).closest('.admin-module').find('.top-bar-custom').addClass('hide-soft');
		}
	});

});
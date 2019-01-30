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
	         timeout: 5000
	      }); 
	      return false; 
	   });
	});

    /********************************************/
    /* RESET DEFAULT FONTS */
    /********************************************/
    $('.rc-theme-options').on('click', '.reset-fonts', function(e) { 
        e.preventDefault();
        var defaultFont = $(this).find('span').text();
        $(this).closest('.admin-module-fonts').find('select').val(defaultFont);
        $(this).closest('.admin-module-fonts').find('select').trigger("chosen:updated");
    });  

    /***************************************************************************/
    //ACTIVATE CHOSEN 
    /***************************************************************************/
    $(".admin-module select").chosen({disable_search_threshold: 5});

    /********************************************/
    /* TOGGLE SWITCH */
    /********************************************/
    $('.toggle-switch-label').on('click', function() {
        var settingsClass = $(this).data('settings');
        if($(this).parent().find('.toggle-switch-checkbox').is(':checked')) {
            $(this).parent().attr('title', 'Disabled');
            $(this).find('span').text(ns_core_local_script.off);
            $(this).find('span').removeClass('on');
            if(settingsClass) { $('.'+settingsClass).slideUp(); }
        } else {
            $(this).parent().attr('title', 'Active');
            $(this).find('span').text(ns_core_local_script.on);
            $(this).find('span').addClass('on');
            if(settingsClass) { $('.'+settingsClass).slideDown(); }
        }
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
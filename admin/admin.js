jQuery(document).ready(function($) {

	/******************************************************/
    /** GLOBAL **/
    /** Shared scripts between NightLight and NS Basics  **/
    /******************************************************/

	/** COLOR PICKER **/
    $(function() {
        $('.color-field').wpColorPicker();
    });

	/** SINGLE MEDIA UPLOAD **/
	var mediaUploader;

	$('.admin-module').on('click', '.ns_upload_image_button', function(e) {
	    e.preventDefault();
	    formfield = jQuery(this).prev('input');

	    // If the uploader object has already been created, reopen the dialog
	    if (mediaUploader) {
	      mediaUploader.open();
	      return;
	    }
	    // Extend the wp.media object
	    mediaUploader = wp.media.frames.file_frame = wp.media({
	      title: 'Choose Image',
	      button: {
	      text: 'Choose Image'
	    }, multiple: false });

	    // When a file is selected, grab the URL and set it as the text field's value
	    mediaUploader.on('select', function() {
	      attachment = mediaUploader.state().get('selection').first().toJSON();
	      $(formfield).val(attachment.url);
	    });
	    // Open the uploader dialog
	    mediaUploader.open();
	});

	/** SINGLE MEDIA REMOVE **/
	$('.admin-module').on('click', '.remove', function() {
		$(this).parent().find('input[type="text"]').removeAttr('value');
		$(this).parent().find('.option-preview').hide();
	});

	/** ACCORDIONS **/
	$(function() {
		$( "#accordion" ).removeClass('hide');
		$( ".accordion" ).accordion({
			collapsible: true,
			active: false,
			autoHeight: true,
			heightStyle: "content"
		});
		$('.accordion-tab').click(function() {
			var icon = $(this).find('.icon');
			if (icon.hasClass('fa-chevron-right')) {
				$(this).find('.icon').removeClass('fa-chevron-right');
				$(this).find('.icon').addClass('fa-chevron-down');
			} else {
				$(this).find('.icon').removeClass('fa-chevron-down');
				$(this).find('.icon').addClass('fa-chevron-right');
			}
		});
	});

	/** TABS **/
	$(function() {
        $('.ns-tabs').each(function() {
            if (!$(this).find('.ns-tabs-nav li').hasClass('active')) {
                $(this).find('.ns-tabs-nav li:first-child').addClass('active');
            }
            if (!$(this).find('.ns-tabs-content .tab-content').hasClass('active')) {
                $(this).find('.ns-tabs-content .tab-content:first').addClass('active');
            }
        }); 
        
        $('.ns-tabs').on('click', '.ns-tabs-nav li a', function(e) {
            e.preventDefault();
            var tabID = $(this).attr('href');
            var parentTabs = $(this).closest('.ns-tabs');
            parentTabs.find('.tab-content').removeClass('active');
            parentTabs.find(tabID).addClass('active');
            parentTabs.find('.ns-tabs-nav li').removeClass('active');
            $(this).closest('li').addClass('active');
        });
        $(".tab-loader").hide();
    });

	/** SELECTABLE ITEMS **/
	$('.selectable-item').click(function() {
		$( ".selectable-item" ).each(function( index ) {
		  $(this).removeClass('active');
		});
		$(this).addClass('active');

		var input  = $(this).find('input').val();
		input = 'selectable-item-options-' + input;
		
		$(".selectable-item-settings").each(function( index ) {
		  	if($(this).attr('id') == input) {
				$(".selectable-item-settings").hide();
				$(this).show();
		  	} else if($(this).attr('id') != input) {
		  		$(this).hide();
		  	}
		});
	});
    /****************************************************/
    /** END GLOBAL **/
    /****************************************************/


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
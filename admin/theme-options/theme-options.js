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

});
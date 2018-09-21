<?php global $current_user, $wp_roles; ?>    

<!-- start user dashboard -->
<div class="user-dashboard">
	<?php if(is_user_logged_in()) { 
		if(function_exists('rype_basics_member_edit_profile_form')) { echo rype_basics_member_edit_profile_form(); }

		// hook in for Rype Basics
        do_action( 'rype_basics_after_edit_profile'); 
	} else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>
</div><!-- end user dashboard -->
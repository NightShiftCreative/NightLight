<?php global $current_user, $wp_roles; ?>    

<!-- start user dashboard -->
<div class="user-dashboard">
	<?php if(is_user_logged_in()) { 
		if(function_exists('rao_member_edit_profile_form')) { echo rao_member_edit_profile_form(); } 
	} else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>
</div><!-- end user dashboard -->
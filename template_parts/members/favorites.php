<?php global $current_user, $wp_roles; ?>    

<!-- start user dashboard -->
<div class="user-dashboard">
	<?php if(is_user_logged_in()) { 
		//do stuff
	} else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>
</div><!-- end user dashboard -->
<?php global $current_user, $wp_roles; ?>    

<!-- start user dashboard -->
<div class="user-dashboard">
    <?php if(is_user_logged_in()) { ?>

    	<h3><?php esc_html_e('Welcome back,', 'rypecore'); ?> <strong><?php echo esc_attr($current_user->user_login); ?>!</strong></h3>
    		
    	<div class="user-dashboard-widget stat">
            <span>
                <?php 
                if(function_exists('rype_basics_show_user_likes_count')) {
                    $show_user_likes_count = rype_basics_show_user_likes_count($current_user); 
                    echo rype_basics_sl_format_count($show_user_likes_count );
                } else { echo '0'; }
                ?>
            </span> 
            <?php esc_html_e('Favorites', 'rypecore'); ?>
        </div>

        <!-- hook in for Rype Basics -->
        <?php do_action( 'rype_basics_after_dashboard'); ?>

	<?php } else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>

    <div class="clear"></div>
</div><!-- end user dashboard -->
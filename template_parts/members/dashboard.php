<?php global $current_user, $wp_roles; ?>    

<!-- start user dashboard -->
<div class="user-dashboard">
    <?php if(is_user_logged_in()) { ?>

    	<h3><?php esc_html_e('Welcome back,', 'rypecore'); ?> <strong><?php echo esc_attr($current_user->user_login); ?>!</strong></h3>
    		
    	<div class="user-dashboard-widget">
            <span>
                <?php 
                if(function_exists('rao_show_user_likes_count')) {
                    $show_user_likes_count = rao_show_user_likes_count($current_user); 
                    echo rao_sl_format_count($show_user_likes_count );
                } else { echo '0'; }
                ?>
            </span> 
            <?php esc_html_e('Favorites', 'rypecore'); ?>
        </div>

        <!-- hook in for Rype Add-Ons -->
        <?php do_action( 'rao_dashboard_widgets'); ?>

	<?php } else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>

</div><!-- end user dashboard -->
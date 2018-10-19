<?php
$header_vars = ns_core_load_header_settings();

//GET CURRENT USER INFO
$current_user = wp_get_current_user();
$avatar_id = get_user_meta( $current_user->ID, 'avatar', true ); 
$avatar_img = wp_get_attachment_image($avatar_id, array('16', '16'), "", array( "class" => "avatar"));
$social_icons = ns_core_get_social_icons('top-bar-item left');
?>  

<?php if($header_vars['display_topbar'] == 'true') { ?>
<div class="top-bar">
    <div class="container <?php if($header_vars['header_container'] != 'true') { echo 'container-full'; } ?>">

        <?php
            $topbar_fields = array();
            array_push($topbar_fields, $header_vars['topbar_first_field']);
            array_push($topbar_fields, $header_vars['topbar_second_field']);
            array_push($topbar_fields, $header_vars['topbar_third_field']);
            array_push($topbar_fields, $header_vars['topbar_fourth_field']);

            $count = 1;

            foreach ($topbar_fields as $topbar_field) { 
                if($count <= 2) { $position = 'left'; } else { $position = 'right'; } 
                if($count == 1 || $count == 3) { echo '<div class="top-bar-'.$position.' '.$position.'">'; } ?>
                
                <?php if($topbar_field == 'email') { ?>
                    
                    <?php if(!empty($header_vars['email'])) { echo '<a class="top-bar-item left" href="mailto:'.$header_vars['email'].'">'.ns_core_get_icon($header_vars['icon_set'], 'envelope', '', 'mail').$header_vars['email'].'</a>'; } ?>
                
                <?php } else if($topbar_field == 'phone') { ?>
                    
                    <?php if(!empty($header_vars['phone'])) { echo '<a class="top-bar-item left" href="tel:'.$header_vars['phone'].'">'.ns_core_get_icon($header_vars['icon_set'], 'phone', 'telephone').$header_vars['phone'].'</a>'; } ?>
                
                <?php } else if($topbar_field == 'social') { 
                    
                    if(!empty($social_icons)) { echo $social_icons; }
                
                } else if($topbar_field == 'member') { ?>

                    <!-- start member actions -->
                    <?php if(!is_user_logged_in()) { ?>
                        <div class="top-bar-item top-bar-member-actions left">
                            <a href="<?php echo esc_url($header_vars['members_login_page']); ?>" class="login-link"><?php echo ns_core_get_icon($header_vars['icon_set'], 'sign-in', 'enter-right', 'exit'); ?><?php esc_html_e( 'Login', 'ns-core' ); ?></a>
                            <a href="<?php echo esc_url($header_vars['members_register_page']); ?>" class="register-link"><?php echo ns_core_get_icon($header_vars['icon_set'], 'user-plus', 'user', 'user'); ?><?php esc_html_e( 'Register', 'ns-core' ); ?></a>
                        </div>
                    <?php } else {  ?>
                        <div class="top-bar-item top-bar-member-actions <?php if($header_vars['members_display_avatar'] == 'true') { echo 'has-avatar'; } ?> left">
                            <div>
                                <?php if($header_vars['members_display_avatar'] == 'true') { 
                                    if (!empty($avatar_img)) {
                                        echo wp_kses_post($avatar_img);
                                    } else {
                                        echo '<img width="16" height="16" class="avatar" src="'. esc_url( get_template_directory_uri() ) .'/images/avatar-default.png" alt="avatar" />';
                                    } 
                                } 
                                ?>
                                <?php 
                                    if($header_vars['members_display_name'] == 'username') {
                                        echo esc_attr($current_user->user_login);
                                    } else if($header_vars['members_display_name'] == 'fname') {
                                        echo esc_attr($current_user->user_firstname);
                                    } else if($header_vars['members_display_name'] == 'flname') {
                                        echo esc_attr($current_user->user_firstname).' '.esc_attr($current_user->user_lastname);
                                    } else if($header_vars['members_display_name'] == 'email') {
                                        echo esc_attr($current_user->user_email);
                                    } else if($header_vars['members_display_name'] == 'display_name') {
                                        echo esc_attr($current_user->display_name);
                                    }
                                ?>
                                <i class="fa icon fa-caret-down"></i>
                            </div>
                            <ul class="member-sub-menu">
                                <?php if(!empty($header_vars['members_dashboard_page'])) { ?><li><a href="<?php echo $header_vars['members_dashboard_page']; ?>"><?php echo ns_core_get_icon($header_vars['icon_set'], 'dashboard', 'layers', 'meter'); ?><?php esc_html_e( 'Dashboard', 'ns-core' ); ?></a></li><?php } ?>
                                <?php if(!empty($header_vars['members_edit_profile_page'])) { ?><li><a href="<?php echo $header_vars['members_edit_profile_page']; ?>"><?php echo ns_core_get_icon($header_vars['icon_set'], 'cog', 'cog', 'gear'); ?><?php esc_html_e( 'Edit Profile', 'ns-core' ); ?></a></li><?php } ?>
                                <?php if(!empty($header_vars['members_favorites_page'])) { ?><li><a href="<?php echo $header_vars['members_favorites_page']; ?>"><?php echo ns_core_get_icon($header_vars['icon_set'], 'heart'); ?><?php esc_html_e( 'Favorites', 'ns-core' ); ?></a></li><?php } ?>
                                <?php do_action('ns_basics_after_top_bar_member_menu'); ?>
                                <li><a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php echo ns_core_get_icon($header_vars['icon_set'], 'sign-out', 'enter-left', 'enter'); ?><?php esc_html_e( 'Logout', 'ns-core' ); ?></a></li>
                            </ul>
                        </div>
                    <?php } ?>
                    <!-- end member actions -->

                <?php } ?>
                <?php if($count == 2 || $count == 4) { echo '</div>'; } ?>
                <?php $count++; ?>
            <?php }   
            echo '</div>';
        ?>
        <div class="clear"></div>
        
    </div><!-- end container -->
</div><!-- end topbar -->
<?php } ?>
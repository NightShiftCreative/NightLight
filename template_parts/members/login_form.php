<?php $members_register_page = esc_attr(get_option('rypecore_members_register_page')); ?>

<?php if(!is_user_logged_in()) { ?>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">

            <p class="center">
				<?php esc_html_e( "Don't have an account yet?", 'rypecore' ); ?>
				<a href="<?php echo esc_url($members_register_page); ?>"><?php esc_html_e( 'Register here!', 'rypecore' ); ?></a>
			</p>

            <!-- start login form -->
            <div class="login-form">
                <?php
                    if(isset($_GET['login'])) { $result = $_GET['login']; } else { $result = null; }
                    if($result == 'failed') {
                        echo '<div class="alert-box error">'. esc_html__('The passord or username you entered was incorrect. Please try again.', 'rypecore') .'</div>';
                    }

                    if(!empty($my_properties_url)) {
                        $login_redirect = $my_properties_url;
                    } else {
                        $login_redirect = site_url();
                    }
                    $args = array(
                    'echo' => true,
                    'redirect' => $login_redirect, 
                    'form_id' => 'loginform'
                    );
                    wp_login_form($args);
                ?>
            </div><!-- end login form -->

        </div><!-- end col -->
    </div><!-- end row -->

<?php } else { ?>
    <?php $current_user = wp_get_current_user(); ?>
    <div class="alert-box success">
    <p><?php esc_html_e( 'You are logged in as', 'rypecore' ); ?> <b><a href="<?php echo get_edit_user_link(); ?>"><?php echo esc_attr($current_user->user_login); ?></a></b></p>
    <a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php esc_html_e( 'Logout?', 'rypecore' ); ?></a>
    </div>
<?php } ?>
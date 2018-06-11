<?php $members_login_page = esc_attr(get_option('rypecore_members_login_page')); ?>

<?php

    //PROCESS FORM
    $success = '';
    $usernameError = '';
    $passError = '';
    $emailError = '';
    $insertUserError = '';

    $username = '';
    $password = '';
    $email = '';

    if (!empty($_POST)) {

        if($_POST['register_username'] == '') {
            $usernameError = esc_html__('Please enter a username', 'rypecore');
            $hasError = true;
        } else {
            $username = $_POST['register_username'];
        }

        if($_POST['register_pass'] == '') {
            $passError = esc_html__('Please enter a password', 'rypecore');
            $hasError = true;
        } else {
            $password = $_POST['register_pass'];
        }

        if($_POST['register_email'] == '') {
            $emailError = esc_html__('Please enter an email', 'rypecore');
            $hasError = true;
        } else {
            $email = $_POST['register_email'];
        }

        if(!isset($hasError)) {

            $userdata = array(
                'user_login'  =>  $username,
                'user_pass'    =>  $password,
                'user_email'   =>  $email,
                'role' => 'subscriber'
            );

            $user_id = wp_insert_user( $userdata );

            //If no errors, log the user in
            if( !is_wp_error($user_id) ) {
                $success = esc_html__('Your account has been created.', 'rypecore') .' <a href="'. $members_login_page .'">'. esc_html__('Login here.', 'rypecore') .'</a>';
            } else {
                $insertUserError = $user_id->get_error_message();
            }

        } else {
                    
        }

    }
?>

<?php if(!is_user_logged_in()) { ?>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">

            <p class="center">
                <?php esc_html_e( "Already have an account?", 'rypecore' ); ?>
                <a href="<?php echo esc_url($members_login_page); ?>"><?php esc_html_e( 'Login here!', 'rypecore' ); ?></a>
            </p>

            <!-- start register form -->
            <div class="login-form">
                <?php if($success != '') { ?>
                    <div class="alert-box success"><h4><?php echo wp_kses_post($success); ?></h4></div>
                <?php } ?>
                <?php if($usernameError != '') { ?>
                    <div class="alert-box error"><h4><?php echo esc_attr($usernameError); ?></h4></div>
                <?php } ?>
                <?php if($passError != '') { ?>
                    <div class="alert-box error"><h4><?php echo esc_attr($passError); ?></h4></div>
                <?php } ?>
                <?php if($emailError != '') { ?>
                    <div class="alert-box error"><h4><?php echo esc_attr($emailError); ?></h4></div>
                <?php } ?>
                <?php if($insertUserError != '') { ?>
                    <div class="alert-box error"><h4><?php echo esc_attr($insertUserError); ?></h4></div>
                <?php } ?>
                <form method="post" action="<?php the_permalink(); ?>">
                    <div class="form-block">
                        <label for="register_username"><?php esc_html_e( 'Username', 'rypecore' ); ?></label>
                        <input type="text" name="register_username" id="register_username" value="<?php if(isset($_POST['register_username'])) { echo esc_attr($username); } ?>" />
                    </div>
                    <div class="form-block">
                        <label for="register_pass"><?php esc_html_e( 'Password', 'rypecore' ); ?></label>
                        <input type="password" name="register_pass" id="register_pass" value="<?php if(isset($_POST['register_pass'])) { echo esc_attr($password); } ?>" />
                    </div>
                    <div class="form-block">
                        <label for="register_email"><?php esc_html_e( 'Email', 'rypecore' ); ?></label>
                        <input type="email" name="register_email" id="register_email" value="<?php if(isset($_POST['register_email'])) { echo esc_attr($email); } ?>" />
                    </div>
                    <input type="submit" class="button" value="<?php esc_html_e( 'Create Account', 'rypecore' ); ?>" />
                </form>
            </div>
            <!-- end register form -->

        </div><!-- end col -->
    </div><!-- end row -->

<?php } else { ?>
    <?php $current_user = wp_get_current_user(); ?>
    <div class="alert-box success">
        <p><?php esc_html_e( 'You are logged in as', 'rypecore' ); ?> <b><a href="<?php echo get_edit_user_link(); ?>"><?php echo esc_attr($current_user->user_login); ?></a></b></p>
        <a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php esc_html_e( 'Logout?', 'rypecore' ); ?></a>
    </div>
<?php } ?>
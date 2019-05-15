<?php
/*-----------------------------------------------------------------------------------*/
/*	Load Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'ns-core', get_template_directory() . '/languages' );

/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 828;

/*-----------------------------------------------------------------------------------*/
/*  Add Theme Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' ); //Add RSS Feed Links
add_theme_support( 'title-tag' ); //Add Title Tag Support
add_theme_support( 'post-thumbnails' ); //Add post thumbnail support
add_image_size( 'listing-thumbnail', 200, 200, array( 'center', 'center' ) );
add_image_size( 'listing-thumbnail-small', 150, 100, false );
add_theme_support( 'ns-basics' ); //NS Basics support
do_action('ns_core_theme_support');

/*-----------------------------------------------------------------------------------*/
/*  Require plugins (using TGM activation)
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory() . '/admin/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ns_core_register_required_plugins' );

function ns_core_register_required_plugins() {

    $plugins = array(
        array(
            'name'         => 'NightShift Basics', // The plugin name.
            'slug'         => 'ns-basics', // The plugin slug (typically the folder name).
            'source'       => 'https://github.com/NightShiftCreative/NS-Basics/archive/1.0.0.zip', // The plugin source.
            'required'     => true, // If false, the plugin is only 'recommended' instead of required.
            'version'      => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url' => 'http://nightshiftcreative.co/',
        ),
    );

    $config = array(
        'id'           => 'ns-core',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}

/*-----------------------------------------------------------------------------------*/
/*	Include Admin Scripts
/*-----------------------------------------------------------------------------------*/
function ns_core_admin_scripts() {
    if (is_admin()) {

        //custom scripts
        wp_enqueue_script('ns-admin-global-js', get_template_directory_uri() . '/admin/ns-admin-global.js', array('jquery','media-upload','thickbox', 'wp-color-picker'), '', true);
		wp_enqueue_script('ns-core-theme-options-js', get_template_directory_uri() . '/admin/theme-options/theme-options.js', array('jquery','media-upload','thickbox'), '', true);
		wp_enqueue_style('ns-core-admin-css',  get_template_directory_uri() . '/admin/admin.css', array(), '3.0', 'all');
    	wp_enqueue_style('ns-font-awesome',  get_template_directory_uri() . '/css/font-awesome/css/all.min.css', array(), '', 'all');
        wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/chosen_v1.8.7/chosen.jquery.min.js', array( 'jquery' ), '', true );
        wp_enqueue_style('chosen',  get_template_directory_uri() . '/assets/chosen_v1.8.7/chosen.min.css', array(), '', 'all');

        //wordpress pre-loaded scripts
        if(function_exists( 'wp_enqueue_media' )) { wp_enqueue_media(); } else { wp_enqueue_script('media-upload'); }
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-form', array( 'jquery' ) );
		wp_enqueue_style( 'wp-color-picker' );
    }
}
add_action('admin_enqueue_scripts', 'ns_core_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/*	Include Theme Stylesheets
/*-----------------------------------------------------------------------------------*/
function ns_core_load_stylesheets() {
	if (!is_admin()) {

        $icon_set = ns_core_load_theme_options('ns_core_icon_set');

        //generate google font url
        function ns_core_fonts_url() {
            $heading_font = ns_core_load_theme_options('ns_core_heading_font');
            $body_font = ns_core_load_theme_options('ns_core_body_font');
            $fonts = array();
            $fonts_url = '';

            if ( 'off' !== _x( 'on', $heading_font.' font: on or off', 'ns-core' ) ) { $fonts[] = $heading_font.':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'; }
            if ( 'off' !== _x( 'on', $body_font.' font: on or off', 'ns-core' ) ) { $fonts[] = $body_font.':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'; }

            if($fonts) {
                $fonts_url = add_query_arg( array(
                    'family' => urlencode( implode( '|', $fonts ) ),
                ), 'https://fonts.googleapis.com/css' );
            }
            return $fonts_url;
        }

		// enqueue styles
		wp_enqueue_style('bootstrap',  get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.0', 'all');
        wp_enqueue_style('slick-slider',  get_template_directory_uri() . '/assets/slick-1.6.0/slick.css', array(), '', 'all');
        wp_enqueue_style('chosen',  get_template_directory_uri() . '/assets/chosen_v1.8.7/chosen.min.css', array(), '', 'all');
		wp_enqueue_style('ns-font-awesome',  get_template_directory_uri() . '/css/font-awesome/css/all.min.css', array(), '', 'all');
		wp_enqueue_style('linear-icons',  get_template_directory_uri() . '/assets/linear-icons/style.css', array(), '', 'all');
        wp_enqueue_style('dripicons',  get_template_directory_uri() . '/assets/dripicons/webfont.css', array(), '', 'all');
        wp_enqueue_style('fancybox',  get_template_directory_uri() . '/assets/fancybox/dist/jquery.fancybox.min.css', array(), '', 'all');
		wp_enqueue_style('ns-core-google-fonts',  ns_core_fonts_url(), array(), '', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style('ns-core-responsive',  get_template_directory_uri() . '/css/responsive.css', array(), '', 'all');

        //dynamic styles
        wp_enqueue_style('ns-core-dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.css');
        get_template_part('css/dynamic_styles');

	}
}
add_action('wp_enqueue_scripts', 'ns_core_load_stylesheets');

/*-----------------------------------------------------------------------------------*/
/*	Include Theme Scripts
/*-----------------------------------------------------------------------------------*/
function ns_core_load_scripts() {
	if (!is_admin()) {

		/* Enqueue Scripts */
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', '', '', false );
	    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/slick-1.6.0/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/chosen_v1.8.7/chosen.jquery.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/fancybox/dist/jquery.fancybox.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script( 'ns-core-global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '', true );

        if ( is_singular() ) wp_enqueue_script( "comment-reply" );

        /* dynamic scripts */
        get_template_part('js/dynamic_scripts');

        /* localize scripts */
        $translation_array = array(
            'login_error' => __( 'Username and password are required fields.', 'ns-core' ),
            'contact_form_error' => __( 'You forgot to enter your', 'ns-core' ),
            'contact_form_error_email' => __( 'Sorry! You entered an invalid', 'ns-core' ),
            'upload_img' => __( 'Upload Image', 'ns-core' ),
            'share_email_error' => __( 'Please enter an email address!', 'ns-core' ),
        );
        wp_localize_script( 'ns-core-global', 'ns_core_local_script', $translation_array );
	}
} 
add_action( 'wp_enqueue_scripts', 'ns_core_load_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Adds async/defer attributes to scripts/styles
/*-----------------------------------------------------------------------------------*/
add_filter( 'script_loader_tag', 'ns_core_add_async_to_script', 10, 3 );
function ns_core_add_async_to_script( $tag, $handle, $src ) {
    if (!is_admin()) {
        $script_array = array('html5shiv', 'respond');
        if (in_array($handle, $script_array)) {
            $tag = '<script async type="text/javascript" src="' . esc_url( $src ) . '"></script>';
        }
    }
    return $tag;
}

add_filter( 'style_loader_tag', 'ns_core_add_async_to_style', 10, 3 );
function ns_core_add_async_to_style($html, $handle) {
    if (!is_admin()) {
        $style_array = array('chosen', 'ns-font-awesome', 'linear-icons', 'dripicons', 'fancybox');
        $onload = "if(media!='all')media='all'";
        $media = 'media="none" onload="'.$onload.'"';
        if(in_array($handle, $style_array)) {
            return str_replace( "media='all'", $media, $html );
        }
    }
    return $html;
}

/*-----------------------------------------------------------------------------------*/
/* Insert Custom Scripts
/*-----------------------------------------------------------------------------------*/
function ns_core_insert_custom_header_script() {
    $header_script = ns_core_load_theme_options('ns_core_custom_scripts_header', false, false);
    if(!empty($header_script)) { echo $header_script; }
}
add_action('wp_head', 'ns_core_insert_custom_header_script');

function ns_core_insert_custom_footer_script() {
    $footer_script = ns_core_load_theme_options('ns_core_custom_scripts_footer', false, false);
    if(!empty($footer_script)) { echo $footer_script; }
}
add_action('wp_footer', 'ns_core_insert_custom_footer_script');

/*-----------------------------------------------------------------------------------*/
/*  Header functions
/*-----------------------------------------------------------------------------------*/

/* get header logo */
function ns_core_get_header_logo() {

    //GLOBAL SETTINGS
    $header_style = ns_core_load_theme_options('ns_core_header_style');
    $logo = ns_core_load_theme_options('ns_core_logo');
    $logo_transparent = ns_core_load_theme_options('ns_core_logo_transparent');

    //PAGE SETTINGS
    $page_id = ns_core_get_page_id();
    $values = get_post_custom($page_id);
    $banner_header_style = isset( $values['ns_basics_banner_header_style'] ) ? esc_attr( $values['ns_basics_banner_header_style'][0] ) : '';

    //SET HEADER STYLE
    if(isset($_GET['header_style'])) { 
        $header_style = $_GET['header_style']; 
    } else if(!empty($banner_header_style)) {
        $header_style = $banner_header_style; 
    } 

    ob_start(); ?>

    <?php if($header_style == 'transparent') { ?>
        <?php if(!empty($logo_transparent)) { ?>
            <a class="header-logo-anchor has-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_attr($logo_transparent); ?>" alt="<?php bloginfo('title') ?>" /></a>
        <?php } else { ?>
            <a class="header-logo-anchor" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('title') ?></a>
        <?php } ?> 
    <?php } else { ?>
        <?php if(!empty($logo)) { ?>
            <a class="header-logo-anchor has-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_attr($logo); ?>" alt="<?php bloginfo('title') ?>" /></a>
        <?php } else { ?>
            <a class="header-logo-anchor" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('title') ?></a>
        <?php } ?>  
    <?php } ?> 

    <?php $output = ob_get_clean();
    return $output;
}

/* get header main menu */
function ns_core_get_header_menu() {
    if ( has_nav_menu( 'menu-1' )) {
        $main_menu = wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'menu_class'     => 'main-menu',
            'depth'          => 3,
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        ));
    } else { $main_menu = ''; } 
    return '<div class="main-menu-container">'.$main_menu.'</div>';
}

/* add menu close button */
add_filter( 'wp_nav_menu_items', 'ns_core_add_menu_close', 10, 2 );
function ns_core_add_menu_close( $items, $args ) {
    $items = '<div class="main-menu-close"><i class="fa fa-times"></i></div>' . $items;
    return $items;
}

/* get header nav toggle */
function ns_core_get_header_toggle() {
    ob_start(); ?>

    <div class="main-menu-toggle"><i class="fa fa-bars"></i></div> 
    <div class="mobile-overlay img-overlay black"></div>

    <?php $output = ob_get_clean();
    return $output;
}

/* get header details */
function ns_core_get_header_items($class = null, $search = true) {
    $icon_set = ns_core_load_theme_options('ns_core_icon_set');
    $display_header_search = ns_core_load_theme_options('ns_core_display_header_search');
    $phone = ns_core_load_theme_options('ns_core_phone');
    $email = ns_core_load_theme_options('ns_core_email');
    $above_phone_text = ns_core_load_theme_options('ns_core_above_phone_text');
    $above_email_text = ns_core_load_theme_options('ns_core_above_email_text');
    ob_start(); ?>
    
    <div class="header-details <?php echo $class; ?>">

        <?php if($search == true) { ?>
            <?php if($display_header_search == 'true') { ?>
            <div class="header-item header-search left">
                <div class="header-item-icon"><?php echo ns_core_get_icon($icon_set, 'search', 'magnifier'); ?></div>
                <div class="header-search-form"><?php get_search_form(); ?></div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if(!empty($phone)) { ?>
        <div class="header-item header-phone left">
            <div class="header-item-icon"><?php echo ns_core_get_icon($icon_set, 'phone', 'telephone'); ?></div>
            <div class="header-item-text">
            <?php if(!empty($above_phone_text)) { echo '<p class="above-text">'.esc_attr($above_phone_text).'</p>'; } ?>
            <?php echo '<a href="tel:'.$phone.'"><span>'.$phone.'</span></a>'; ?>
            </div>
        </div>
        <?php } ?>

        <?php if(!empty($email)) { ?>
        <div class="header-item header-email left">
            <div class="header-item-icon"><?php echo ns_core_get_icon($icon_set, 'envelope', '', 'mail'); ?></div>
            <div class="header-item-text">
            <?php if(!empty($above_email_text)) { echo '<p class="above-text">'.esc_attr($above_email_text).'</p>'; } ?>
            <?php echo '<a href="mailto:'.$email.'" title="'.$email.'"><span>'.$email.'</span></a>'; ?>
            </div>
        </div>
        <?php } ?>

        <div class="clear"></div>
    </div>

    <?php $output = ob_get_clean();
    return $output;
}

/* get header member actions */
function ns_core_get_header_member_actions($class = null, $login_class = null, $register_class = null, $toggle_class = null) {
    $icon_set = ns_core_load_theme_options('ns_core_icon_set');
    $members_login_page = ns_core_load_theme_options('ns_core_members_login_page');
    $members_register_page = ns_core_load_theme_options('ns_core_members_register_page');
    $members_display_avatar = ns_core_load_theme_options('ns_core_members_display_avatar');
    $members_display_name = ns_core_load_theme_options('ns_core_members_display_name');
    $members_dashboard_page = ns_core_load_theme_options('ns_core_members_dashboard_page');
    $members_edit_profile_page = ns_core_load_theme_options('ns_core_members_edit_profile_page');
    $members_favorites_page = ns_core_load_theme_options('ns_core_members_favorites_page');
    $current_user = wp_get_current_user();
    $avatar_id = get_user_meta( $current_user->ID, 'avatar', true ); 
    $avatar_img = wp_get_attachment_image($avatar_id, array('16', '16'), "", array( "class" => "avatar"));
    ob_start(); ?>

    <?php if(!is_user_logged_in()) { ?>
        <div class="header-member-actions <?php echo $class; ?>">
            <a href="<?php echo esc_url($members_login_page); ?>" class="login-link <?php echo $login_class; ?>"><?php echo ns_core_get_icon($icon_set, 'sign-in-alt', 'enter-right', 'exit'); ?><?php esc_html_e( 'Login', 'ns-core' ); ?></a>
            <a href="<?php echo esc_url($members_register_page); ?>" class="register-link <?php echo $register_class; ?>"><?php echo ns_core_get_icon($icon_set, 'user-plus', 'user', 'user'); ?><?php esc_html_e( 'Register', 'ns-core' ); ?></a>
        </div>
    <?php } else {  ?>
        <div class="header-member-actions <?php echo $class; ?> <?php if($members_display_avatar == 'true') { echo 'has-avatar'; } ?>">
            <div class="member-actions-toggle <?php echo $toggle_class; ?>">
                <?php if($members_display_avatar == 'true') { 
                    if (!empty($avatar_img)) {
                        echo wp_kses_post($avatar_img);
                    } else {
                        echo '<img width="16" height="16" class="avatar" src="'. esc_url( get_template_directory_uri() ) .'/images/avatar-default.png" alt="avatar" />';
                    } 
                } 
                ?>
                <?php 
                    echo '<span class="display-name">';
                    if($members_display_name == 'username') {
                        echo esc_attr($current_user->user_login);
                    } else if($members_display_name == 'fname') {
                        echo esc_attr($current_user->user_firstname);
                    } else if($members_display_name == 'flname') {
                        echo esc_attr($current_user->user_firstname).' '.esc_attr($current_user->user_lastname);
                    } else if($members_display_name == 'email') {
                        echo esc_attr($current_user->user_email);
                    } else if($members_display_name == 'display_name') {
                        echo esc_attr($current_user->display_name);
                    }
                    echo '</span>';
                ?>
                <i class="fa icon fa-caret-down"></i>
            </div>
            <ul class="member-sub-menu">
                <?php if(!empty($members_dashboard_page)) { ?><li><a href="<?php echo $members_dashboard_page; ?>"><?php echo ns_core_get_icon($icon_set, 'tachometer-alt', 'layers', 'meter'); ?><?php esc_html_e( 'Dashboard', 'ns-core' ); ?></a></li><?php } ?>
                <?php if(!empty($members_edit_profile_page)) { ?><li><a href="<?php echo $members_edit_profile_page; ?>"><?php echo ns_core_get_icon($icon_set, 'cog', 'cog', 'gear'); ?><?php esc_html_e( 'Edit Profile', 'ns-core' ); ?></a></li><?php } ?>
                <?php if(!empty($members_favorites_page)) { ?><li><a href="<?php echo $members_favorites_page; ?>"><?php echo ns_core_get_icon($icon_set, 'heart'); ?><?php esc_html_e( 'Favorites', 'ns-core' ); ?></a></li><?php } ?>
                <?php do_action('ns_core_after_top_bar_member_menu'); ?>
                <li><a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php echo ns_core_get_icon($icon_set, 'sign-out-alt', 'enter-left', 'enter'); ?><?php esc_html_e( 'Logout', 'ns-core' ); ?></a></li>
            </ul>
        </div>
    <?php } ?>

    <?php $output = ob_get_clean();
    return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Include theme options
/*-----------------------------------------------------------------------------------*/
include('admin/theme-options/theme-options-loader.php');
include('admin/theme-options/theme_options.php');

function ns_core_bgDisplay($bg_display_class) {
        if($bg_display_class == 'fixed') {
            $bg_display_class = 'bg-display-fixed';
        } else if($bg_display_class == 'repeat') {
            $bg_display_class = 'bg-display-tiled';
        } else {
            $bg_display_class = 'bg-display-cover';
        }
    return $bg_display_class;
}

/*  Add body class */
add_filter( 'body_class', function( $classes ) {
    $theme_options = ns_core_load_theme_options();
    $global_bg_display = ns_core_bgDisplay($theme_options['ns_core_global_bg_display']);
    return array_merge( $classes, array($global_bg_display) );
} );

/*-----------------------------------------------------------------------------------*/
/*  Gets Page ID
/*-----------------------------------------------------------------------------------*/
function ns_core_get_page_id() {
    global $post;

    if(is_post_type_archive('job_listing') || is_singular('companies')) {
        $page_id = esc_attr(get_option('job_manager_jobs_page_id'));
    } else if(is_home()) {
        $queried_object = get_queried_object();
        if(!empty($queried_object)) {
            $page_id = $queried_object->ID;
        } else {
            $page_id = $post->ID;
        }
    } else if(is_singular('post')) {
        $page_id = get_option('page_for_posts');
    } else {
        $page_id = $post->ID;
    }
    return $page_id; 
}

/*-----------------------------------------------------------------------------------*/
/*  Check if slug exists
/*-----------------------------------------------------------------------------------*/
function ns_core_post_exists_by_slug($post_slug, $post_type = 'post') {
    $args_posts = array(
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'name'           => $post_slug,
        'posts_per_page' => 1,
    );
    $loop_posts = new WP_Query( $args_posts );
    if(!$loop_posts->have_posts()) {
        return false;
    } else {
        $loop_posts->the_post();
        return $loop_posts->post->ID;
    }
}


/*-----------------------------------------------------------------------------------*/
/*  Theme Setup and Demo Import
/*-----------------------------------------------------------------------------------*/
include('admin/demo-import/demo-import.php');

/*-----------------------------------------------------------------------------------*/
/*  Customized get_template_part that allows variable
/*-----------------------------------------------------------------------------------*/
function ns_core_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
    global $post;
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}

/*-----------------------------------------------------------------------------------*/
/*  Generate Page Banners
/*-----------------------------------------------------------------------------------*/
function ns_core_generate_page_banner($values) {
    $banner_source = isset( $values['ns_basics_banner_source'] ) ? esc_attr( $values['ns_basics_banner_source'][0] ) : 'image_banner';
    $banner_display = isset( $values['ns_basics_banner_display'] ) ? esc_attr( $values['ns_basics_banner_display'][0] ) : 'true';
    $banner_shortcode = isset( $values['ns_basics_banner_shortcode'] ) ? $values['ns_basics_banner_shortcode'][0] : '';
    
    if($banner_display == 'true') {
        do_action('ns_core_before_page_banner', $values);
        if($banner_source == 'slides' ) {
            ns_core_get_template_part('template_parts/banner_slider', ['post_id' => $page_id]); 
        } else if($banner_source == 'shortcode') {
            if(!empty($banner_shortcode)) { echo do_shortcode($banner_shortcode); } else { get_template_part('template_parts/subheader'); }
        } else if($banner_source == 'image_banner') {
            get_template_part('template_parts/subheader'); 
        } else {
            do_action('ns_core_custom_banner_source', $banner_source);
        }
        do_action('ns_core_after_page_banner', $values);
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Get Page Column Classes
/*-----------------------------------------------------------------------------------*/
function ns_core_get_page_col_classes($page_layout = 'full', $sidebar_size = null) {
    
    if(empty($sidebar_size)) {
        $sidebar_size = ns_core_load_theme_options('ns_core_page_sidebar_size');
    }
    
    $col_class = array();

    if($sidebar_size == 'medium') {
        $col_num_content = '8';
        $col_num_sidebar = '4';
    } else if($sidebar_size == 'large') {
        $col_num_content = '7';
        $col_num_sidebar = '5';
    } else {
        $col_num_content = '9';
        $col_num_sidebar = '3';
    }

    if($page_layout == 'left sidebar') {
        $col_class['content'] = 'col-lg-'.$col_num_content.' col-md-'.$col_num_content.' col-md-push-'.$col_num_sidebar;
        $col_class['sidebar'] = 'col-lg-'.$col_num_sidebar.' col-md-'.$col_num_sidebar.' col-md-pull-'.$col_num_content.' sidebar-left';
    } else {
        $col_class['content'] = 'col-lg-'.$col_num_content.' col-md-'.$col_num_content;
        $col_class['sidebar'] = 'col-lg-'.$col_num_sidebar.' col-md-'.$col_num_sidebar.' sidebar';
    }

    return $col_class;
}

/*-----------------------------------------------------------------------------------*/
/*  Include Breadcrumbs
/*-----------------------------------------------------------------------------------*/
include('admin/breadcrumbs.php');

/*-----------------------------------------------------------------------------------*/
/*  Generate Icon
/*-----------------------------------------------------------------------------------*/
if(!function_exists('ns_core_get_icon')) {
    function ns_core_get_icon($type, $fa_name, $line_name = null, $dripicon_name = null, $class = null) {
        if($type == 'line' && $line_name != 'n/a' && wp_style_is('linear-icons')) {
            if(empty($line_name)) { $line_name = $fa_name; }
            return '<i class="fa icon-'.$line_name.' icon icon-line '.$class.'"></i>';
        } else if($type == 'dripicon' && $dripicon_name != 'n/a' && wp_style_is('dripicons')) {
            if(empty($dripicon_name)) { $dripicon_name = $fa_name; }
            return '<i class="fa dripicons-'.$dripicon_name.' icon icon-dripicon'.$class.'"></i>';
        } else {
            return '<i class="fa fa-'.$fa_name.' icon '.$class.'"></i>';
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Get Social Icons
/*-----------------------------------------------------------------------------------*/
function ns_core_get_social_icons($class = null) {
    $output = '';
    $fb = ns_core_load_theme_options('ns_core_fb');
    $twitter = ns_core_load_theme_options('ns_core_twitter');
    $google = ns_core_load_theme_options('ns_core_google');
    $linkedin = ns_core_load_theme_options('ns_core_linkedin');
    $youtube = ns_core_load_theme_options('ns_core_youtube');
    $vimeo = ns_core_load_theme_options('ns_core_vimeo');
    $instagram = ns_core_load_theme_options('ns_core_instagram');
    $flickr = ns_core_load_theme_options('ns_core_flickr');
    $dribbble = ns_core_load_theme_options('ns_core_dribbble');
    if(!empty($fb) || !empty($twitter) || !empty($google) || !empty($linkedin) || !empty($youtube) || !empty($vimeo) || !empty($instagram) || !empty($flickr) || !empty($dribbble)) { 
        $output .= '<ul class="social-icons '.$class.'">';
            if(!empty($fb)) { $output .= '<li><a href="'.esc_url($fb).'" target="_blank"><i class="fab fa-facebook-f icon"></i></a></li>'; }
            if(!empty($twitter)) { $output .= '<li><a href="'.esc_url($twitter).'" target="_blank"><i class="fab fa-twitter icon"></i></a></li>'; }
            if(!empty($google)) { $output .= '<li><a href="'.esc_url($google).'" target="_blank"><i class="fab fa-google-plus-g icon"></i></a></li>'; }
            if(!empty($linkedin)) { $output .= '<li><a href="'.esc_url($linkedin).'" target="_blank"><i class="fab fa-linkedin-in icon"></i></a></li>'; }
            if(!empty($youtube)) { $output .= '<li><a href="'.esc_url($youtube).'" target="_blank"><i class="fab fa-youtube icon"></i></a></li>'; }
            if(!empty($vimeo)) { $output .= '<li><a href="'.esc_url($vimeo).'" target="_blank"><i class="fab fa-vimeo icon"></i></a></li>'; }
            if(!empty($instagram)) { $output .= '<li><a href="'.esc_url($instagram).'" target="_blank"><i class="fab fa-instagram icon"></i></a></li>'; }
            if(!empty($flickr)) { $output .= '<li><a href="'.esc_url($flickr).'" target="_blank"><i class="fab fa-flickr icon"></i></a></li>'; }
            if(!empty($dribbble)) { $output .= '<li><a href="'.esc_url($dribbble).'" target="_blank"><i class="fab fa-dribbble icon"></i></a></li>'; }
        $output .= '</ul>';
    } 
    return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Register Menus
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'ns_core_register_menus' );
	function ns_core_register_menus() {
	    register_nav_menus(
	        array(
	            'menu-1' => esc_html__( 'Primary Menu', 'ns-core' ),
	        )
	    );
	}

/*-----------------------------------------------------------------------------------*/
/*	Excerpt modifications
/*-----------------------------------------------------------------------------------*/
function ns_core_excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}

function ns_core_trim_excerpt($text) {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    $text = strip_tags($text, '<a>');
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split('/(<a.*?a>)|\n|\r|\t|\s/', $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
    if ( count($words) > $excerpt_length ) {
      array_pop($words);
      $text = implode(' ', $words);
      $text = $text . $excerpt_more;
      } 
    else {
      $text = implode(' ', $words);
      }
    }
  return apply_filters('new_wp_trim_excerpt', $text, $raw_excerpt);
  }
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'ns_core_trim_excerpt');

/*-----------------------------------------------------------------------------------*/
/*	Comment List
/*-----------------------------------------------------------------------------------*/
function ns_core_comment_list($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    $icon_set = ns_core_load_theme_options('ns_core_icon_set');
	?>

	<li <?php comment_class(); ?>>
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
				<?php echo get_avatar($comment, 40); ?>
			</div>
			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10">
				<div class="arrow"></div>
				<div class="comment-text">
					<h4><?php comment_author_link(); ?></h4>
					<?php comment_text(); ?>
					<div class="comment-details">
						<a href="#"><?php echo ns_core_get_icon($icon_set, 'clock', 'clock3', 'clock'); ?><?php comment_date(); ?> at <?php comment_time(); ?></a>
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'login_text' => esc_html__('Login to Reply', 'ns-core'), 'reply_text' => ns_core_get_icon($icon_set, 'reply').esc_html__('Reply', 'ns-core')))); ?>
						<?php edit_comment_link(ns_core_get_icon($icon_set, 'pencil-alt', 'pencil', 'pencil').esc_html__('Edit', 'ns-core')); ?>
						<div class="clear"></div>
					</div>
				</div>

				<?php if($comment->comment_approved == '0') : ?>
					<em><?php echo esc_html_e('Your comment is awaiting moderation.', 'ns-core'); ?></em>
				<?php endif; ?>
			</div>
		</div><!-- end row -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/
function ns_core_widgets_init() {

	/** MAIN SIDEBAR **/
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'ns-core' ),
		'id' => 'page_sidebar',
		'before_widget' => '<div class="widget widget-sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );

	/** BLOG SIDEBAR **/
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'ns-core' ),
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget widget-sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	/** FOOTER **/
    $num_footer_cols = ns_core_load_theme_options('ns_core_num_footer_cols');
	if($num_footer_cols == '1') {
		$footer_widget_class = '<div class="col-lg-12 col-md-12 col-sm-12 widget widget-footer %2$s">';
	} else if ($num_footer_cols == '2') {
		$footer_widget_class = '<div class="col-lg-6 col-md-6 col-sm-6 widget widget-footer %2$s">';
	} else if($num_footer_cols == '3') {
		$footer_widget_class = '<div class="col-lg-4 col-md-4 col-sm-6 widget widget-footer %2$s">';
	} else if($num_footer_cols == '4') {
		$footer_widget_class = '<div class="col-lg-3 col-md-3 col-sm-6 widget widget-footer %2$s">';
	} else if($num_footer_cols == '6') {
		$footer_widget_class = '<div class="col-lg-2 col-md-2 col-sm-6 widget widget-footer %2$s">';
	} else {
		$footer_widget_class = '<div class="col-lg-3 col-md-3 col-sm-6 widget widget-footer %2$s">';
	}

	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'ns-core' ),
		'id' => 'footer-widgets',
		'before_widget' => $footer_widget_class,
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4><div class="widget-divider"><div class="bar"></div></div>',
	) );
}
add_action( 'widgets_init', 'ns_core_widgets_init' );

?>
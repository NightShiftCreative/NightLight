<?php
/*-----------------------------------------------------------------------------------*/
/*	Load Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'rypecore', get_template_directory() . '/languages' );

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
add_theme_support( 'rype-basics' ); //Rype Basics support
do_action('rype_basics_theme_support');

/*-----------------------------------------------------------------------------------*/
/*  Require bundled plugins (using TGM activation)
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory() . '/admin/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'rypecore_register_required_plugins' );

function rypecore_register_required_plugins() {

    $plugins = array(
        array(
            'name'         => 'Rype Basics', // The plugin name.
            'slug'         => 'rype-basics', // The plugin slug (typically the folder name).
            'source'       => 'https://github.com/RypeCreative/Rype-Basics/archive/1.0.0.zip', // The plugin source.
            'required'     => true, // If false, the plugin is only 'recommended' instead of required.
            'version'      => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url' => 'http://rypecreative.com',
        ),
    );

    $config = array(
        'id'           => 'rypecore',                 // Unique ID for hashing notices for multiple instances of TGMPA.
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
function rypecore_admin_scripts() {
    if (is_admin()) {

        //custom scripts
		wp_enqueue_script('rypecore-admin-js', get_template_directory_uri() . '/admin/admin.js', array('jquery','media-upload','thickbox', 'wp-color-picker'), '', true);
		wp_enqueue_style('rypecore-admin-css',  get_template_directory_uri() . '/admin/admin.css', array(), '3.0', 'all');
    	wp_enqueue_style('font-awesome',  get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', array(), '', 'all');
        wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/chosen-1.6.2/chosen.jquery.min.js', array( 'jquery' ), '', true );
        wp_enqueue_style('chosen',  get_template_directory_uri() . '/assets/chosen-1.6.2/chosen.min.css', array(), '', 'all');

        //wordpress pre-loaded scripts
        if(function_exists( 'wp_enqueue_media' )) { wp_enqueue_media(); } else { wp_enqueue_script('media-upload'); }
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-form', array( 'jquery' ) );
		wp_enqueue_style( 'wp-color-picker' );

        /* localize scripts */
        $translation_array = array( 
            'remove_text' => __( 'Remove', 'rypecore' ),
            'save_text' => __( 'Save', 'rypecore' ),
            'name_text' => __( 'Name', 'rypecore' ),
            'image_url' => __( 'Image URL', 'rypecore' ),
            'on' => __( 'On', 'rypecore' ),
            'off' => __( 'Off', 'rypecore' ),
        );
        wp_localize_script( 'rypecore-admin-js', 'rypecore_local_script', $translation_array );
    }
}
add_action('admin_enqueue_scripts', 'rypecore_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/*	Include Theme Stylesheets
/*-----------------------------------------------------------------------------------*/
function rypecore_load_stylesheets() {
	if (!is_admin()) {

        $icon_set = esc_attr(get_option('rypecore_icon_set', 'fa'));

        //generate google font url
        function rypecore_fonts_url() {
            $heading_font = esc_attr(get_option('rypecore_heading_font', 'Varela Round'));
            $body_font = esc_attr(get_option('rypecore_body_font', 'Varela Round'));
            $fonts = array();
            $fonts_url = '';

            if ( 'off' !== _x( 'on', $heading_font.' font: on or off', 'rypecore' ) ) { $fonts[] = $heading_font.':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'; }
            if ( 'off' !== _x( 'on', $body_font.' font: on or off', 'rypecore' ) ) { $fonts[] = $body_font.':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i'; }

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
        wp_enqueue_style('chosen',  get_template_directory_uri() . '/assets/chosen-1.6.2/chosen.min.css', array(), '', 'all');
		wp_enqueue_style('font-awesome',  get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', array(), '', 'all');
		wp_enqueue_style('linear-icons',  get_template_directory_uri() . '/assets/linear-icons/style.css', array(), '', 'all');
        wp_enqueue_style('dripicons',  get_template_directory_uri() . '/assets/dripicons/webfont.css', array(), '', 'all');
        wp_enqueue_style('fancybox',  get_template_directory_uri() . '/assets/fancybox/dist/jquery.fancybox.min.css', array(), '', 'all');
		wp_enqueue_style('rypecore-google-fonts',  rypecore_fonts_url(), array(), '', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style('rypecore-responsive',  get_template_directory_uri() . '/css/responsive.css', array(), '', 'all');

        //dynamic styles
        wp_enqueue_style('rypecore-dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.css');
        get_template_part('css/dynamic_styles');

	}
}
add_action('wp_enqueue_scripts', 'rypecore_load_stylesheets');

/*-----------------------------------------------------------------------------------*/
/*	Include Theme Scripts
/*-----------------------------------------------------------------------------------*/
function rypecore_load_scripts() {
	if (!is_admin()) {

		/* Enqueue Scripts */
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.js', '', '', false );
	    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), '', true );
	    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/slick-1.6.0/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/chosen-1.6.2/chosen.jquery.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/fancybox/dist/jquery.fancybox.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script( 'rypecore-global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '', true );

        if ( is_singular() ) wp_enqueue_script( "comment-reply" );

        /* dynamic scripts */
        get_template_part('js/dynamic_scripts');

        /* localize scripts */
        $translation_array = array(
            'login_error' => __( 'Username and password are required fields.', 'rypecore' ),
            'contact_form_error' => __( 'You forgot to enter your', 'rypecore' ),
            'contact_form_error_email' => __( 'Sorry! You entered an invalid', 'rypecore' ),
            'upload_img' => __( 'Upload Image', 'rypecore' ),
            'share_email_error' => __( 'Please enter an email address!', 'rypecore' ),
        );
        wp_localize_script( 'rypecore-global', 'rypecore_local_script', $translation_array );
	}
} 
add_action( 'wp_enqueue_scripts', 'rypecore_load_scripts' );

/*-----------------------------------------------------------------------------------*/
/*  Header functions
/*-----------------------------------------------------------------------------------*/
/* get all header variables */
function rypecore_load_header_settings() {
    $header_vars = array();
    $header_vars['icon_set'] = esc_attr(get_option('rypecore_icon_set', 'fa'));
    if(isset($_GET['rtl'])) { $header_vars['rtl'] = $_GET['rtl']; } else { $header_vars['rtl'] = esc_attr(get_option('rypecore_rtl')); }  
    $header_vars['preloader'] = esc_attr(get_option('rypecore_preloader', 'true'));
    $header_vars['preloader_img_default'] = esc_url(get_template_directory_uri().'/images/loader.gif');
    $header_vars['preloader_img'] = esc_attr(get_option('rypecore_preloader_img', $header_vars['preloader_img_default']));
    $header_vars['display_topbar'] = esc_attr(get_option('rypecore_display_topbar', 'true'));
    $header_vars['topbar_first_field'] = esc_attr(get_option('rypecore_topbar_first_field', 'email'));
    $header_vars['topbar_second_field'] = esc_attr(get_option('rypecore_topbar_second_field', 'phone'));
    $header_vars['topbar_third_field'] = esc_attr(get_option('rypecore_topbar_third_field', 'social'));
    $header_vars['topbar_fourth_field'] = esc_attr(get_option('rypecore_topbar_fourth_field', 'member'));
    $header_vars['sticky_header'] = esc_attr(get_option('rypecore_sticky_header', 'true'));
    $header_vars['header_container'] = esc_attr(get_option('rypecore_header_container', 'true'));
    $header_vars['phone'] = esc_attr(get_option('rypecore_phone'));
    $header_vars['email'] = esc_attr(get_option('rypecore_email'));
    $header_vars['fb']  = esc_attr(get_option('rypecore_fb'));
    $header_vars['twitter'] = esc_attr(get_option('rypecore_twitter'));
    $header_vars['google'] = esc_attr(get_option('rypecore_google'));
    $header_vars['linkedin'] = esc_attr(get_option('rypecore_linkedin'));
    $header_vars['youtube'] = esc_attr(get_option('rypecore_youtube'));
    $header_vars['vimeo'] = esc_attr(get_option('rypecore_vimeo'));
    $header_vars['instagram'] = esc_attr(get_option('rypecore_instagram'));
    $header_vars['flickr'] = esc_attr(get_option('rypecore_flickr'));
    $header_vars['dribbble'] = esc_attr(get_option('rypecore_dribbble'));
    $header_vars['header_bg'] = esc_attr(get_option('rypecore_header_bg'));
    $header_vars['header_bg_display'] = esc_attr(get_option('rypecore_header_bg_display'));
    $header_vars['header_style'] = esc_attr(get_option('rypecore_header_style', 'default'));
    $default_logo = esc_url( get_template_directory_uri() ).'/images/logo-dark.png'; 
    $default_logo_transparent = esc_url( get_template_directory_uri() ).'/images/logo.png'; 
    $header_vars['logo'] = esc_attr(get_option('rypecore_logo', $default_logo));
    $header_vars['logo_transparent'] = esc_attr(get_option('rypecore_logo_transparent', $default_logo_transparent));
    $header_vars['favicon'] = esc_attr(get_option('rypecore_favicon'));
    $header_vars['above_phone_text'] = esc_attr(get_option('rypecore_above_phone_text', esc_html__('Call us anytime', 'rypecore') ));
    $header_vars['above_email_text'] = esc_attr(get_option('rypecore_above_email_text', esc_html__('Drop us a line', 'rypecore') ));
    $header_vars['display_header_search'] = esc_attr(get_option('rypecore_display_header_search', 'true'));
    $header_vars['header_menu_button_page'] = esc_attr(get_option('rypecore_header_menu_button_page'));
    $header_vars['header_menu_button_text'] = esc_attr(get_option('rypecore_header_menu_button_text'));
    $header_vars['members_display_avatar'] = esc_attr(get_option('rypecore_members_display_avatar', 'true'));
    $header_vars['members_display_name'] = esc_attr(get_option('rypecore_members_display_name', 'username'));
    $header_vars['members_login_page'] = esc_attr(get_option('rypecore_members_login_page'));
    $header_vars['members_register_page'] = esc_attr(get_option('rypecore_members_register_page'));
    $header_vars['members_dashboard_page'] = esc_attr(get_option('rypecore_members_dashboard_page'));
    $header_vars['members_edit_profile_page'] = esc_attr(get_option('rypecore_members_edit_profile_page'));
    $header_vars['members_favorites_page'] = esc_attr(get_option('rypecore_members_favorites_page'));

    //custom filters (for rype add-ons)
    $header_vars = apply_filters( 'rype_basics_custom_header_vars', $header_vars);

    return $header_vars;
}

/* get header logo */
function rypecore_get_header_logo() {
    $header_vars = rypecore_load_header_settings();
    ob_start(); ?>

    <?php if($header_vars['header_style'] == 'transparent') { ?>
        <?php if(!empty($header_vars['logo_transparent'])) { ?>
            <a class="navbar-brand has-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_attr($header_vars['logo_transparent']); ?>" alt="<?php bloginfo('title') ?>" /></a>
        <?php } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('title') ?></a>
        <?php } ?> 
    <?php } else { ?>
        <?php if(!empty($header_vars['logo'])) { ?>
            <a class="navbar-brand has-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_attr($header_vars['logo']); ?>" alt="<?php bloginfo('title') ?>" /></a>
        <?php } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('title') ?></a>
        <?php } ?>  
    <?php } ?> 

    <?php $output = ob_get_clean();
    return $output;
}

/* get header nav toggle */
function rypecore_get_header_toggle() {
    $header_vars = rypecore_load_header_settings();
    ob_start(); ?>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button> 

    <?php $output = ob_get_clean();
    return $output;
}

/* get header details */
function rypecore_get_header_items($class = null, $search = true) {
    $header_vars = rypecore_load_header_settings();
    ob_start(); ?>
    
    <div class="header-details <?php echo $class; ?>">

        <?php if($search == true) { ?>
            <?php if($header_vars['display_header_search'] == 'true') { ?>
            <div class="header-item header-search left">
                <div class="header-item-icon"><?php echo rypecore_get_icon($header_vars['icon_set'], 'search', 'magnifier'); ?></div>
                <div class="header-search-form"><?php get_search_form(); ?></div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if(!empty($header_vars['phone'])) { ?>
        <div class="header-item header-phone left">
            <div class="header-item-icon"><?php echo rypecore_get_icon($header_vars['icon_set'], 'phone', 'telephone'); ?></div>
            <div class="header-item-text">
            <?php if(!empty($header_vars['above_phone_text'])) { echo '<p class="above-text">'.esc_attr($header_vars['above_phone_text']).'</p>'; } ?>
            <?php echo '<a href="tel:'.$header_vars['phone'].'"><span>'.$header_vars['phone'].'</span></a>'; ?>
            </div>
        </div>
        <?php } ?>

        <?php if(!empty($header_vars['email'])) { ?>
        <div class="header-item header-email left">
            <div class="header-item-icon"><?php echo rypecore_get_icon($header_vars['icon_set'], 'envelope', '', 'mail'); ?></div>
            <div class="header-item-text">
            <?php if(!empty($header_vars['above_email_text'])) { echo '<p class="above-text">'.esc_attr($header_vars['above_email_text']).'</p>'; } ?>
            <?php echo '<a href="mailto:'.$header_vars['email'].'" title="'.$header_vars['email'].'"><span>'.$header_vars['email'].'</span></a>'; ?>
            </div>
        </div>
        <?php } ?>

        <div class="clear"></div>
    </div>

    <?php $output = ob_get_clean();
    return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Include theme options
/*-----------------------------------------------------------------------------------*/
include('admin/theme_options.php');

function rypecore_bgDisplay($bg_display_class) {
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
    $global_bg_display = rypecore_bgDisplay(esc_attr(get_option('rypecore_global_bg_display')));
    return array_merge( $classes, array($global_bg_display) );
} );

/*-----------------------------------------------------------------------------------*/
/*  Gets Page ID
/*-----------------------------------------------------------------------------------*/
function rypecore_get_page_id() {
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
function rypecore_the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row( $wpdb->prepare("SELECT post_name FROM wp_posts WHERE post_name = %s", $post_name), 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Add default theme pages, posts, and widgets
/*-----------------------------------------------------------------------------------*/
function rypecore_add_default_pages() {

    //Add contact page
    $post_contact_page = array(
      'ID' => 0,
      'page_template' => 'template_contact.php', //Sets the template for the page.
      'post_name' => 'contact', // The name (slug) for your post
      'post_status' => 'publish', //Set the status of the new post.
      'post_title' => esc_html__('Contact', 'rypecore'), //The title of your post.
      'post_type' => 'page', //Sometimes you want to post a page.
      'post_content' => '',
    ); 
    if (!rypecore_the_slug_exists('contact')) { wp_insert_post($post_contact_page); }

    //Update "Hello World" blog post
    $hello_world_content = '';
    $hello_world_content .= esc_html__('Welcome to RypeCore. This is your first post. Edit or delete it, then start writing! Here are some steps to help you get started.', 'rypecore');
    $hello_world_content .= '<ul>';
    $hello_world_content .= '<li><a href="http://rypecreative.com/homely-wp/doc/#configure-permalinks" target="_blank">'.esc_html__('1. Configure Permalinks', 'rypecore').'</a></li>';
    $hello_world_content .= '<li><a href="http://rypecreative.com/homely-wp/doc/#create-home-page" target="_blank">'.esc_html__('2. Creating the Home Page', 'rypecore').'</a></li>';
    $hello_world_content .= '<li><a href="http://rypecreative.com/homely-wp/doc/#reading-settings" target="_blank">'.esc_html__('3. Update Reading Settings', 'rypecore').'</a></li>';
    $hello_world_content .= '<li><a href="http://rypecreative.com/homely-wp/doc/#create-properties-listing-page" target="_blank">'.esc_html__('4. Creating Properties Listing Page', 'rypecore').'</a></li>';
    $hello_world_content .= '</ul>';

    $post_hello_world = array(
      'ID' => 1,
      'post_name' => 'welcome', // The name (slug) for your post
      'post_status' => 'publish', //Set the status of the new post.
      'post_title' => esc_html__('Welcome to RypeCore', 'rypecore'), //The title of your post.
      'post_type' => 'post', //Sometimes you want to post a page.
      'post_content' => $hello_world_content,
    );  
    if (!rypecore_the_slug_exists('welcome')) { wp_insert_post($post_hello_world); }

    //Add main menu
    $menu_name = 'Main Menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    $menu_location = 'menu-1';

    if(!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  esc_html__('Contact', 'rypecore'),
            'menu-item-object' => 'page',
            'menu-item-object-id' => get_page_by_path('contact')->ID,
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish'));

        if( !has_nav_menu( $menu_location ) ){
            $locations = get_theme_mod('nav_menu_locations');
            $locations[$menu_location] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }

    function rypecore_auto_add_sidebar_widgets( $add_to_sidebar = array(), $ignore_sidebar_with_content = true ){

        if(empty($add_to_sidebar)) { return; }

        $sidebar_options = get_option('sidebars_widgets');

        foreach($add_to_sidebar as $sidebar_id => $widgets){

            //** do not add widgets if sidebar already has content
            if ( !empty($sidebar_options[$sidebar_id]) && $ignore_sidebar_with_content) {
                continue;
            }

            foreach ($widgets as $index => $widget){
                $widget_id_base      = $widget['id_base'];
                $widget_instance  = $widget['instance'];

                $widget_instances = get_option('widget_'.$widget_id_base);

                if(!is_array($widget_instances)){
                    $widget_instances = array();
                }

                $count = count($widget_instances)+1;

                
                $sidebar_options[$sidebar_id][] = $widget_id_base.'-'.$count;

                $widget_instances[$count] = $widget_instance;

                //** save widget options
                update_option('widget_'.$widget_id_base,$widget_instances);
            } 
        } 

        //** save sidebar options:
        update_option('sidebars_widgets',$sidebar_options);  
    }

    $sidebar_id = 'footer-widgets';
    $add_to_sidebar[$sidebar_id] = array(
        array(
           'id_base'=> 'archives',
           'instance' => array(
               'title' => esc_html__('Archived Content', 'rypecore'),
               'count' => 'on',
           )
        ),                      
        array(
           'id_base'=> 'categories',
           'instance' => array()
        ),
        array(
           'id_base'=> 'meta',
           'instance' => array()
        ),
        array(
           'id_base'=> 'pages',
           'instance' => array()
        )
    );

    rypecore_auto_add_sidebar_widgets($add_to_sidebar);

}
 add_action( 'after_switch_theme', 'rypecore_add_default_pages' );


/*-----------------------------------------------------------------------------------*/
/*  Customized get_template_part that allows variable
/*-----------------------------------------------------------------------------------*/
function rypecore_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
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
function rypecore_generate_page_banner($values) {
    $banner_source = isset( $values['rypecore_banner_source'] ) ? esc_attr( $values['rypecore_banner_source'][0] ) : 'image_banner';
    $banner_display = isset( $values['rypecore_banner_display'] ) ? esc_attr( $values['rypecore_banner_display'][0] ) : 'true';
    $banner_shortcode = isset( $values['rypecore_banner_shortcode'] ) ? $values['rypecore_banner_shortcode'][0] : '';
    
    if($banner_display == 'true') {
        do_action( 'rype_basics_before_page_banner', $values);
        if($banner_source == 'slides' ) {
            rypecore_get_template_part('template_parts/banner_slider', ['post_id' => $page_id]); 
        } else if($banner_source == 'shortcode') {
            if(!empty($banner_shortcode)) { echo do_shortcode($banner_shortcode); } else { get_template_part('template_parts/subheader'); }
        } else if($banner_source == 'image_banner') {
            get_template_part('template_parts/subheader'); 
        } else {
            do_action( 'rype_basics_custom_banner_source', $banner_source);
        }
        do_action( 'rype_basics_after_page_banner', $values);
    }
}

/*-----------------------------------------------------------------------------------*/
/*  Get Page Column Classes
/*-----------------------------------------------------------------------------------*/
function rypecore_get_page_col_classes($page_layout = 'full', $sidebar_size = null) {
    
    if(empty($sidebar_size)) {
        $sidebar_size = esc_attr(get_option('rypecore_page_sidebar_size', 'small')); 
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
if( !function_exists('rypecore_get_icon') ){
    function rypecore_get_icon($type, $fa_name, $line_name = null, $dripicon_name = null, $class = null) {
        if($type == 'line' && $line_name != 'n/a') {
            if(empty($line_name)) { $line_name = $fa_name; }
            return '<i class="fa icon-'.$line_name.' icon icon-line '.$class.'"></i>';
        } else if($type == 'dripicon' && $dripicon_name != 'n/a') {
            if(empty($dripicon_name)) { $dripicon_name = $fa_name; }
            return '<i class="fa dripicons-'.$dripicon_name.' icon icon-dripicon'.$class.'"></i>';
        } else {
            return '<i class="fa fa-'.$fa_name.' icon '.$class.'"></i>';
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Image Upload (used for front end avatar upload)
/*-----------------------------------------------------------------------------------*/
function rypecore_upload_user_file( $file = array() ) {
        
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
                            
    $file_return = wp_handle_upload( $file, array('test_form' => false ) );
                            
    if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
        return false;
    } else {
                                
        $filename = $file_return['file'];
                                
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );

        $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
                                
        require_once (ABSPATH . 'wp-admin/includes/image.php' );
        $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
        wp_update_attachment_metadata( $attachment_id, $attachment_data );
                                    
        if( 0 < intval( $attachment_id ) ) {
            return $attachment_id;
        }
                                
    }
                            
    return false;
}

/*-----------------------------------------------------------------------------------*/
/*	Register Menus
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'rypecore_register_menus' );
	function rypecore_register_menus() {
	    register_nav_menus(
	        array(
	            'menu-1' => esc_html__( 'Primary Menu', 'rypecore' ),
	        )
	    );
	}

/*-----------------------------------------------------------------------------------*/
/*	Excerpt modifications
/*-----------------------------------------------------------------------------------*/
function rypecore_excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}

function rypecore_trim_excerpt($text) {
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
add_filter('get_the_excerpt', 'rypecore_trim_excerpt');

/*-----------------------------------------------------------------------------------*/
/*	Comment List
/*-----------------------------------------------------------------------------------*/
function rypecore_comment_list($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    $icon_set = get_option('rypecore_icon_set', 'fa');
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
						<a href="#"><?php echo rypecore_get_icon($icon_set, 'clock-o', 'clock3', 'clock'); ?><?php comment_date(); ?> at <?php comment_time(); ?></a>
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'login_text' => esc_html__('Login to Reply', 'rypecore'), 'reply_text' => rypecore_get_icon($icon_set, 'reply').esc_html__('Reply', 'rypecore')))); ?>
						<?php edit_comment_link(rypecore_get_icon($icon_set, 'pencil').esc_html__('Edit', 'rypecore')); ?>
						<div class="clear"></div>
					</div>
				</div>

				<?php if($comment->comment_approved == '0') : ?>
					<em><?php echo esc_html_e('Your comment is awaiting moderation.', 'rypecore'); ?></em>
				<?php endif; ?>
			</div>
		</div><!-- end row -->
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/
function rypecore_widgets_init() {

	/** MAIN SIDEBAR **/
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'rypecore' ),
		'id' => 'page_sidebar',
		'before_widget' => '<div class="widget widget-sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );

	/** BLOG SIDEBAR **/
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'rypecore' ),
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget widget-sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	/** FOOTER **/
	$num_footer_cols = get_option('rypecore_num_footer_cols', '4');
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
		'name' => esc_html__( 'Footer', 'rypecore' ),
		'id' => 'footer-widgets',
		'before_widget' => $footer_widget_class,
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4><div class="widget-divider"><div class="bar"></div></div>',
	) );
}
add_action( 'widgets_init', 'rypecore_widgets_init' );

?>
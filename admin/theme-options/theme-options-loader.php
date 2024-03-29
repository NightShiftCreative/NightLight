<?php
/***************************************************************/
/* Retrieves all Theme Options
/* or a single option if parameter is set
/***************************************************************/
function ns_core_load_theme_options($single_option = null, $return_defaults = false, $esc = true) {
    
    $sitelink = 'https://nightshiftcreative.co/';

    $theme_options = array();
    $theme_options_init = array(
    	'ns_core_site_width' => 1170,
    	'ns_core_global_bg' => false,
    	'ns_core_global_bg_display' => false,
    	'ns_core_icon_set' => 'fa',
    	'ns_core_rtl' => false,
    	'ns_core_preloader' => 'true',
        'ns_core_preloader_img' => esc_url( get_template_directory_uri() ).'/images/loader.gif',
    	'ns_core_heading_font' => 'Varela Round',
    	'ns_core_body_font' => 'Varela Round',
        'ns_core_custom_scripts_header' => '',
        'ns_core_custom_scripts_body' => '',
        'ns_core_custom_scripts_footer' => '',
    	'ns_core_phone' => false,
    	'ns_core_email' => get_option('admin_email'),
    	'ns_core_address' => false,
    	'ns_core_fb' => false,
    	'ns_core_twitter' => false,
    	'ns_core_google' => false,
    	'ns_core_linkedin' => false,
    	'ns_core_youtube' => false,
    	'ns_core_vimeo' => false,
    	'ns_core_instagram' => false,
    	'ns_core_flickr' => false,
    	'ns_core_dribbble' => false,
        'ns_core_github' => false,
        'ns_core_yelp' => false,
        'ns_core_tiktok' => false,
    	'ns_core_contact_details_display' => 'true',
    	'ns_core_contact_form_title' => 'Quick Contact',
    	'ns_core_contact_form_before' => false,
    	'ns_core_contact_form_after' => false,
    	'ns_core_contact_form_source' => 'default',
    	'ns_core_contact_form_success' => esc_html__('Thanks! Your email has been delivered!', 'ns-core'),
    	'ns_core_contact_form_id' => false,
    	'ns_core_display_topbar' => 'true',
    	'ns_core_topbar_first_field' => 'email',
    	'ns_core_topbar_first_field_custom' => false,
    	'ns_core_topbar_second_field' => 'phone',
    	'ns_core_topbar_second_field_custom' => false,
    	'ns_core_topbar_third_field' => 'social',
    	'ns_core_topbar_third_field_custom' => false,
    	'ns_core_topbar_fourth_field' => 'member',
    	'ns_core_topbar_fourth_field_custom' => false,
    	'ns_core_members_display_avatar' => 'true',
    	'ns_core_header_style' => 'transparent',
    	'ns_core_sticky_header' => 'true',
    	'ns_core_header_container' => 'true',
    	'ns_core_logo' => esc_url( get_template_directory_uri() ).'/images/logo-dark.png',
    	'ns_core_logo_transparent' => esc_url( get_template_directory_uri() ).'/images/logo.png',
    	'ns_core_favicon' => false,
    	'ns_core_above_phone_text' => esc_html__('Call us anytime', 'ns-core'),
    	'ns_core_above_email_text' => esc_html__('Drop us a line', 'ns-core'),
    	'ns_core_display_header_search' => 'true',
    	'ns_core_header_menu_align' => 'right',
    	'ns_core_header_menu_parent_links' => 'toggle-submenu',
    	'ns_core_header_menu_button_page' => false,
    	'ns_core_header_menu_button_text' => esc_html__('Contact Us', 'ns-core'),
    	'ns_core_header_bg' => false,
    	'ns_core_header_bg_display' => false,
    	'ns_core_page_banner_bg' => esc_url(get_template_directory_uri()).'/images/page-banner-default.jpg',
    	'ns_core_page_banner_bg_display' => false,
    	'ns_core_page_banner_title_align' => false,
    	'ns_core_page_banner_padding_top' => '100',
    	'ns_core_page_banner_padding_bottom' => '100',
    	'ns_core_page_banner_overlay_display' => false,
    	'ns_core_page_banner_overlay_opacity' => '0.25',
    	'ns_core_page_banner_overlay_color' => '#000000',
    	'ns_core_page_banner_display_breadcrumb' => false,
    	'ns_core_page_banner_display_search' => false,
    	'ns_core_page_banner_slider_transition' => 'horizontal',
    	'ns_core_page_banner_slider_duration' => '5000',
    	'ns_core_page_banner_slider_auto_start' => 'true',
    	'ns_core_page_sidebar_size' => 'small',
    	'ns_core_members_login_page' => false,
    	'ns_core_members_register_page' => false,
    	'ns_core_members_dashboard_page' => false,
    	'ns_core_members_edit_profile_page' => false,
    	'ns_core_members_favorites_page' => false,
    	'ns_core_cta_global_block' => '',
        'ns_core_display_cta' => false,
        'ns_core_cta_title' => '',
        'ns_core_cta_text' => '',
        'ns_core_cta_button_text' => '',
        'ns_core_cta_button_url' => '',
        'ns_core_cta_bg_img' => '',
        'ns_core_cta_bg_display' => '',
        'ns_core_hide_footer_widget_area' => false,
    	'ns_core_num_footer_cols' => '4',
    	'ns_core_footer_bg' => false,
    	'ns_core_footer_bg_display' => false,
    	'ns_core_display_bottombar' => 'true',
    	'ns_core_bottom_bar_text' => get_bloginfo('title').' | Theme by <a href="'.$sitelink.'" target="_blank">NightShift Creative</a> | &copy; '. date('Y'),
    	'ns_core_style_global_bg' => '#f5f8fa',
    	'ns_core_style_global_main' => '#04d2c8',
    	'ns_core_style_global_comp' => '#ff9900',
    	'ns_core_style_top_bar_bg' => '#04d2c8',
    	'ns_core_style_top_bar_text' => '#ffffff',
    	'ns_core_style_top_bar_social' => '#ffffff',
    	'ns_core_style_header_bg' => '#ffffff',
    	'ns_core_style_header_text' => '#838893',
    	'ns_core_style_header_icon' => '#04d2c8',
    	'ns_core_style_header_menu' => '#2f353d',
    	'ns_core_style_page_banner_bg' => '#8d92a4',
    	'ns_core_style_page_banner_title' => '#ffffff',
    	'ns_core_style_footer_bg' => '#323746',
    	'ns_core_style_footer_header' => '#ffffff',
    	'ns_core_style_footer_text' => '#8e95ac',
    	'ns_core_style_footer_link' => '#04d2c8',
    	'ns_core_style_bottom_bar_bg' => '#262a35',
    	'ns_core_style_bottom_bar_text' => '#8e95ac',
    );
	$theme_options_init = apply_filters( 'ns_core_theme_options_filter', $theme_options_init);

    //set RTL from url parameter
    if(isset($_GET['rtl'])) { 
        $theme_options_init['ns_core_rtl'] = $_GET['rtl']; 
    }

	//returns DEFAULT array or single option
    if($return_defaults == true) {
    	if(isset($single_option)) { 
	    	if(array_key_exists($single_option, $theme_options_init)) {
	    		$default = $theme_options_init[$single_option];
	    		return $default;
	    	} else {
	    		return false;
	    	}
	    } else {
    		return $theme_options_init;
    	}
    }

    //returns DATABASE array or single option
    if(isset($single_option)) { 
    	if(array_key_exists($single_option, $theme_options_init)) {
    		$default = $theme_options_init[$single_option];
    		if($esc == false) {
                $single_option_value = get_option($single_option, $default);
            } else {
                $single_option_value = esc_attr(get_option($single_option, $default));
            }
            $single_option_value = apply_filters( 'ns_core_theme_options_single_filter', $single_option_value, $single_option);
            return $single_option_value;
    	} else {
    		return false;
    	}
    } else {
    	foreach($theme_options_init as $key=>$value) {
	    	$theme_options[$key] = esc_attr(get_option($key, $value));
	    }
	    $theme_options['ns_core_default_font'] = 'Varela Round';
        $theme_options = apply_filters( 'ns_core_theme_options_saved_filter', $theme_options);
    	return $theme_options;
    }	
    
}

/***************************************************************/
/* Check if an option exists
/***************************************************************/
function ns_core_option_exists($option_name) {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare("SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", $option_name));
    if (is_object($row)) {
        return true;
    }
    return false;
}

/***************************************************************/
/* Reset all options
/***************************************************************/
add_action('wp_ajax_nopriv_ns_reset_options', 'ns_core_reset_theme_options');
add_action('wp_ajax_ns_reset_options', 'ns_core_reset_theme_options');
function ns_core_reset_theme_options(){
    $theme_options = ns_core_load_theme_options(null, true);
    foreach($theme_options as $key => $value) {
        delete_option($key);
    }
    exit();
}

?>
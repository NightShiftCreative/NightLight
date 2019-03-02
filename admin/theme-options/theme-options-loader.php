<?php

function ns_core_load_theme_options() {
    $theme_options = array();

	//general settings
	$theme_options['ns_core_site_width'] = esc_attr(get_option('ns_core_site_width', 1170));
	$theme_options['ns_core_global_bg'] = esc_attr(get_option('ns_core_global_bg'));
	$theme_options['ns_core_global_bg_display'] = esc_attr(get_option('ns_core_global_bg_display'));
	$theme_options['ns_core_icon_set'] = esc_attr(get_option('ns_core_icon_set', 'fa'));
	$theme_options['ns_core_rtl'] = esc_attr(get_option('ns_core_rtl'));
	$theme_options['ns_core_preloader'] = esc_attr(get_option('ns_core_preloader', 'true'));
	$theme_options['ns_core_preloader_img'] = esc_attr(get_option('ns_core_preloader_img'));
	$theme_options['ns_core_default_font'] = 'Varela Round';
	$theme_options['ns_core_heading_font'] = esc_attr(get_option('ns_core_heading_font', 'Varela Round'));
	$theme_options['ns_core_body_font'] = esc_attr(get_option('ns_core_body_font', 'Varela Round'));

	//contact & social setings

	$theme_options = apply_filters( 'ns_core_theme_options_filter', $theme_options);
    return $theme_options;
    
}

//check if option exists
function ns_core_option_exists($option_name) {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare("SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", $option_name));
    if (is_object($row)) {
        return true;
    }
    return false;
}

?>
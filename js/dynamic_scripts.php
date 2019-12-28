<?php
$sticky_header = ns_core_load_theme_options('ns_core_sticky_header');
$header_style = ns_core_load_theme_options('ns_core_header_style');
$header_menu_parent_links = ns_core_load_theme_options('ns_core_header_menu_parent_links');
$logo = ns_core_load_theme_options('ns_core_logo');
$logo_transparent = ns_core_load_theme_options('ns_core_logo_transparent');
$rtl = ns_core_load_theme_options('ns_core_rtl');
$theme_url = esc_url( get_template_directory_uri() );

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

//Get banner settings
$banner_slider_transition = ns_core_load_theme_options('ns_core_page_banner_slider_transition');
$banner_slider_duration = ns_core_load_theme_options('ns_core_page_banner_slider_duration');
$banner_slider_auto_start = ns_core_load_theme_options('ns_core_page_banner_slider_auto_start');

$dynamic_script = '';

//STICKY HEADER
if($sticky_header == 'true' && $header_style != 'transparent') {
    $dynamic_script .= 'jQuery(document).ready(function($) {';
        $dynamic_script .= '$(window).resize(function() {';
        $dynamic_script .= 'var headerHeight = $("header.header-classic").outerHeight();';
        $dynamic_script .= '$("body").css("padding-top", headerHeight);';
        $dynamic_script .= '}).resize();';
    $dynamic_script .= '});';
}

//TRANSPARENT HEADER
if($header_style == 'transparent') {
    $dynamic_script .= 'jQuery(document).ready(function($) {';
    $dynamic_script .= 'var headerHeight = parseInt($("header.main-header").outerHeight());';
    $dynamic_script .= 'var subheaderPadding = parseInt($(".subheader").css("padding-top"));';
    $dynamic_script .= 'subheaderPadding = subheaderPadding + headerHeight;';
    $dynamic_script .= '$(".subheader").css("padding-top", subheaderPadding);';
    $dynamic_script .= '$(".subheader.subheader-slider").css("padding-top", 0);';
    $dynamic_script .= 'var subheaderSlidePadding = parseInt($(".subheader.subheader-slider .slide").css("padding-top"));';
    $dynamic_script .= 'subheaderSlidePadding = subheaderSlidePadding + headerHeight;';
    $dynamic_script .= '$(".subheader.subheader-slider .slide").css("padding-top", subheaderSlidePadding);';
    $dynamic_script .= '});';
}

//HEADER PARENT LINK BEHAVIOR
if($header_menu_parent_links != 'open-page') {
    $dynamic_script .= 'jQuery(document).ready(function($) {';
        $dynamic_script .= '$(".header-menu .main-menu li.menu-item-has-children > a").on("click", function(event) {';
            $dynamic_script .= 'event.preventDefault();';
            $dynamic_script .= '$(this).parent().find(".sub-menu").toggle();';
            $dynamic_script .= '$(this).parent().find(".sub-menu li .sub-menu").hide();';
        $dynamic_script .= '});';
    $dynamic_script .= '});';
}

//OUTPUT VARIABLES FOR USE IN GLOBAL.JS
$dynamic_script .= "var home_url = '{$theme_url}';";
$dynamic_script .= "var logo = '{$logo}';";
$dynamic_script .= "var logo_transparent = '{$logo_transparent}';";
$dynamic_script .= "var rtl = '{$rtl}';";
$dynamic_script .= "var banner_slider_transition = '{$banner_slider_transition}';";
$dynamic_script .= "var banner_slider_duration = '{$banner_slider_duration}';";
$dynamic_script .= "var banner_slider_auto_start = '{$banner_slider_auto_start}';";

//CHOSEN SELECT RTL SUPPORT
if($rtl == 'true') {
    $dynamic_script .= "jQuery('select').addClass('chosen-rtl');";
}

wp_add_inline_script( 'ns-core-global', $dynamic_script);

?>
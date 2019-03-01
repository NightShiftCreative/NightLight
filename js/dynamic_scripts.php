<?php
$header_vars = ns_core_load_header_settings();
$sticky_header = $header_vars['sticky_header'];
$header_style = $header_vars['header_style'];
$header_menu_parent_links = $header_vars['header_menu_parent_links'];
$logo = $header_vars['logo'];
$logo_transparent = $header_vars['logo_transparent'];

$theme_url = esc_url( get_template_directory_uri() );

if(isset($_GET['rtl'])) { $rtl = $_GET['rtl']; } else { $rtl = esc_attr(get_option('ns_core_rtl')); } 

//Get banner settings
$banner_slider_transition = get_option('ns_core_page_banner_slider_transition', 'horizontal');
$banner_slider_duration = get_option('ns_core_page_banner_slider_duration', 5000);
$banner_slider_auto_start = get_option('ns_core_page_banner_slider_auto_start', 'true');

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
$dynamic_script .= "var contact_form_success = '{$contact_form_success}';";

//CHOSEN SELECT RTL SUPPORT
if($rtl == 'true') {
    $dynamic_script .= "jQuery('select').addClass('chosen-rtl');";
}

wp_add_inline_script( 'ns-core-global', $dynamic_script);

?>
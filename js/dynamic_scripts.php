<?php
$header_vars = rypecore_load_header_settings();
$sticky_header = $header_vars['sticky_header'];
$header_style = $header_vars['header_style'];
$logo = $header_vars['logo'];
$logo_transparent = $header_vars['logo_transparent'];

$theme_url = esc_url( get_template_directory_uri() );

if(isset($_GET['rtl'])) { $rtl = $_GET['rtl']; } else { $rtl = esc_attr(get_option('rypecore_rtl')); } 

$banner_slider_transition = get_option('rypecore_page_banner_slider_transition', 'horizontal');
$banner_slider_duration = get_option('rypecore_page_banner_slider_duration', 5000);
$banner_slider_auto_start = get_option('rypecore_page_banner_slider_auto_start', 'true');

//Contact form messaging
$contact_form_success = esc_attr(get_option('rypecore_contact_form_success', esc_html__('Thanks! Your email has been delivered!', 'rypecore')) );


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

wp_add_inline_script( 'rypecore-global', $dynamic_script);

?>
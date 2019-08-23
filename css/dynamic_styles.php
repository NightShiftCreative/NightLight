<?php 
    //load theme options
    $theme_options = ns_core_load_theme_options();

    function ns_core_adjust_brightness($hex, $steps) {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max(-255, min(255, $steps));

        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }

        // Get decimal values
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));

        // Adjust number of steps and keep it inside 0 to 255
        $r = max(0,min(255,$r + $steps));
        $g = max(0,min(255,$g + $steps));  
        $b = max(0,min(255,$b + $steps));

        $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
        $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
        $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return '#'.$r_hex.$g_hex.$b_hex;
    } 

    function ns_core_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);
       return $rgb; // returns an array with the rgb values
    }

    /************************************************************************/
    /* THEME OPTION FONTS */
    /************************************************************************/
    $heading_font = $theme_options['ns_core_heading_font'];
    $body_font = $theme_options['ns_core_body_font'];
    $font_css = "";

    if(!empty($heading_font) && $heading_font != 'Varela Round') { 
        $font_css .= "h1,h2,h3,h4,h5,h6 { font-family:'{$heading_font}', Helvetica; }";
        $font_css .= ".ui-tabs .ui-tabs-nav .ui-tabs-anchor { font-family:'{$heading_font}', Helvetica; }";
    }

    if(!empty($body_font) && $body_font != 'Varela Round') { 
        $font_css .= "body { font-family:'{$body_font}', Arial; }";
        $font_css .= ".ui-accordion .ui-accordion-content, .tabs { font-family:'{$body_font}', Arial; }";
        $font_css .= "input, textarea, select { font-family:'{$body_font}', Arial !important; }";
        $font_css .= ".button, input[type='submit'] { font-family:'{$body_font}', Arial; }";
    }

    wp_add_inline_style( 'ns-core-dynamic-styles', $font_css );

    /************************************************************************/
    /* THEME OPTION COLOR STYLES */
    /************************************************************************/
    $style_global_bg = $theme_options['ns_core_style_global_bg'];
    $style_global_main = $theme_options['ns_core_style_global_main'];
    $style_global_main_bright = ns_core_adjust_brightness($style_global_main, 25);
    $style_global_main_dark = ns_core_adjust_brightness($style_global_main, -25);
    $style_global_main_rgb = ns_core_hex2rgb($style_global_main);
    $style_global_main_rgb0 = $style_global_main_rgb[0];
    $style_global_main_rgb1 = $style_global_main_rgb[1];
    $style_global_main_rgb2 = $style_global_main_rgb[2];
    $style_global_comp = $theme_options['ns_core_style_global_comp'];
    $style_global_comp_bright = ns_core_adjust_brightness($style_global_comp, 25);
    $style_top_bar_bg = $theme_options['ns_core_style_top_bar_bg'];
    $style_top_bar_submenu = ns_core_adjust_brightness($style_top_bar_bg, -50);
    $style_top_bar_text = $theme_options['ns_core_style_top_bar_text'];
    $style_top_bar_social = $theme_options['ns_core_style_top_bar_social'];
    $style_header_bg = $theme_options['ns_core_style_header_bg'];
    $style_header_text = $theme_options['ns_core_style_header_text'];
    $style_header_text_bright = ns_core_adjust_brightness($style_header_text, 25);
    $style_header_icon = $theme_options['ns_core_style_header_icon'];
    $style_header_menu = $theme_options['ns_core_style_header_menu'];
    $style_header_submenu = ns_core_adjust_brightness($style_header_menu, -20);
    $style_header_subsubmenu = ns_core_adjust_brightness($style_header_menu, -70);
    $style_page_banner_bg = $theme_options['ns_core_style_page_banner_bg'];
    $style_page_banner_title = $theme_options['ns_core_style_page_banner_title'];
    $style_footer_bg = $theme_options['ns_core_style_footer_bg'];
    $style_footer_header = $theme_options['ns_core_style_footer_header'];
    $style_footer_text = $theme_options['ns_core_style_footer_text'];
    $style_footer_link = $theme_options['ns_core_style_footer_link'];
    $style_bottom_bar_bg = $theme_options['ns_core_style_bottom_bar_bg'];
    $style_bottom_bar_text = $theme_options['ns_core_style_bottom_bar_text'];

    $dynamic_css = '';
    
    //GLOBAL BACKGROUND COLOR
    if(!empty($style_global_bg) && $style_global_bg != '#f5f8fa') { 
        $dynamic_css .= "body { background: {$style_global_bg}; }"; 
    }

    //GLOBAL MAIN COLOR
    if(!empty($style_global_main) && $style_global_main != '#04d2c8') {
        $dynamic_css .= ".content blockquote, .social-icons.circle li a { border-color: {$style_global_main}; }";
        $dynamic_css .= ".subheader.simple-search .ui-tabs-nav li.ui-state-active:after { border-color: {$style_global_main} transparent; }";
        $dynamic_css .= "
            .button, input[type='submit'], 
            .bar, 
            .page-list .page-numbers.current,
            .chosen-container .chosen-results li.highlighted,
            .ui-accordion .ui-accordion-header-active,
            .color-bar, .property-color-bar,
            .top-bar,
            .subheader.subheader-slider .slider-advanced .slide-price,
            .widget #wp-calendar a,
            .widget .filter-widget-title,
            .multi-page-form-content#map .remove-pin,
            .service-item .fa,
            .blog-post-date,
            .cta { background: {$style_global_main}; }
        ";
        $dynamic_css .= ".filter .ui-tabs .ui-tabs-nav li.ui-state-active a, .filter-with-slider .tabs.ui-widget, .property-share-email-input { background: {$style_global_main_dark}; }";
        $dynamic_css .= ".filter .ui-tabs .ui-tabs-nav li.ui-state-active a:after { border-color: {$style_global_main_dark} transparent; }";
        $dynamic_css .= ".social-icons.circle li a:hover, .slider-prev:hover, .slider-next:hover, .video-cover:hover .icon, .subheader.simple-search .ui-tabs-nav li.ui-state-active { background: {$style_global_main} !important; border-color: {$style_global_main} !important; }";
        $dynamic_css .= ".button:hover, input[type='submit']:hover, .button.grey:hover, .services .service-item:hover .fa { background: {$style_global_main_bright}; }";
        $dynamic_css .= ".tabs li.ui-state-active, .sticky .blog-post, .comment-list .comment-text, .user-stat-item { border-color: {$style_global_main}; }";
        $dynamic_css .= ".tabs li.ui-state-active .ui-tabs-anchor { color: {$style_global_main}; }";
        $dynamic_css .= "
            a, .accordion-footer a, 
            .top-bar-member-actions .member-sub-menu li a:hover,
            .header-member-actions .member-sub-menu li a:hover,
            .header-default .header-item td > .fa,
            .sl-wrapper a.liked .fa,
            .subheader.subheader-slider .slider-advanced .slide .fa,
            .blog-post-content h3 a:hover,
            .comment-details a:hover,
            .search-result-item:hover h4,
            .bottom-bar a { color: {$style_global_main}; }
            a:hover { color: {$style_global_main_bright}; }
        ";
        $dynamic_css .= ".member-nav-menu li.current-menu-item a { color: {$style_global_main}; border-color: {$style_global_main}; }";
        $dynamic_css .= ".header-menu .main-menu > li > a:hover, .header-menu .main-menu li:hover.menu-item-has-children:after { color: {$style_global_main} !important; }";
        $dynamic_css .= ".header-menu .main-menu > li.current-menu-item > a { box-shadow:inset 0px -2px {$style_global_main}; }";
        $dynamic_css .= ".comment-list .arrow { border-color:transparent {$style_global_main_dark}; }";
        $dynamic_css .= ".img-overlay { background:rgba({$style_global_main_rgb0}, {$style_global_main_rgb1}, {$style_global_main_rgb2}, 0.6); }";
        $dynamic_css .= ".contact-details { background-color: {$style_global_main}; }";
        $dynamic_css .= ".widget-sidebar h4 { border-left-color: {$style_global_main}; }";
    }

    //GLOBAL COMP COLOR
    if(!empty($style_global_comp) && $style_global_comp != '#ff9900') {
        $dynamic_css .= ".button.alt, .button.outline:hover, .subheader h1 strong { background-color: {$style_global_comp}; }";
        $dynamic_css .= ".button.outline:hover { border-color: {$style_global_comp}; }";
        $dynamic_css .= ".button.alt:hover { background-color: {$style_global_comp_bright}; }";
    }

    //TOPBAR
    if(!empty($style_top_bar_bg) && $style_top_bar_bg != '#04d2c8') {
        $dynamic_css .= ".top-bar { background: {$style_top_bar_bg}; }";
    }
    if(!empty($style_top_bar_text) && $style_top_bar_text != '#ffffff') { 
        $dynamic_css .= ".top-bar, .top-bar a { color: {$style_top_bar_text}; }";
    }
    if(!empty($style_top_bar_social) && $style_top_bar_social != '#ffffff') {
        $dynamic_css .= ".top-bar .social-icons a { color: {$style_top_bar_social}; }";
    }

    //HEADER
    if(!empty($style_header_bg) && $style_header_bg != '#ffffff') {
        $dynamic_css .= "header { background: {$style_header_bg}; }";
    }
    if(!empty($style_header_text) && $style_header_text != '#838893') {
        $dynamic_css .= ".ns-custom-styles .header-menu .main-menu > li > a, .header-logo a, .header-menu .main-menu > li.menu-item-has-children:after, .header-default .header-item .header-item-text, .header-default .header-item span { color: {$style_header_text}; }";
        $dynamic_css .= ".ns-custom-styles .header-menu .main-menu > li > a:hover, .header-logo a:hover, .header-menu .main-menu li:hover.menu-item-has-children:after { color: {$style_header_text_bright} !important; }";
    }
    if(!empty($style_header_icon) && $style_header_icon != '#04d2c8') {
        $dynamic_css .= ".header-default .header-item .header-item-icon > .fa { color: {$style_header_icon}; }";
    }
    if(!empty($style_header_menu) && $style_header_menu != '#2f353d') {
        $dynamic_css .= ".header-default .header-menu .container-fixed, .header-default .header-menu.fixed { background: {$style_header_menu}; }";
        $dynamic_css .= ".header-default .sub-menu { background: {$style_header_submenu}; }";
        $dynamic_css .= ".header-menu .main-menu li .sub-menu li .sub-menu { background: {$style_header_subsubmenu}; }";
    }

    //PAGE BANNER
    if(!empty($style_page_banner_bg) && $style_page_banner_bg != '#8d92a4') {
        $dynamic_css .= ".subheader { background: {$style_page_banner_bg}; }";
    }
    if(!empty($style_page_banner_title) && $style_page_banner_title != '#ffffff') {
        $dynamic_css .= ".subheader, .subheader a, #breadcrumbs li a, .subheader h1 { color: {$style_page_banner_title}; }";
    }

    //FOOTER
    if(!empty($style_footer_bg) && $style_footer_bg != '#323746') {
        $dynamic_css .= "#footer { background-color: {$style_footer_bg}; }";
    }
    if(!empty($style_footer_header) && $style_footer_header != '#ffffff') {
        $dynamic_css .= "#footer h4 { color: {$style_footer_header}; }";
    }
    if(!empty($style_footer_text) && $style_footer_text != '#8e95ac') {
        $dynamic_css .= "#footer { color: {$style_footer_text}; }";
        $dynamic_css .= "#footer .widget-divider .bar { background: {$style_footer_text}; }";
    }
    if(!empty($style_footer_link) && $style_footer_link != '#04d2c8') {
        $dynamic_css .= "#footer a { color: {$style_footer_link}; border-color:{$style_footer_link}; }";
        $dynamic_css .= "#footer .social-icons a:hover { background:transparent; }";
    }
    if(!empty($style_bottom_bar_bg) && $style_bottom_bar_bg != '#262a35') { 
        $dynamic_css .= ".bottom-bar { background: {$style_bottom_bar_bg}; }";
    }
    if(!empty($style_bottom_bar_text) && $style_bottom_bar_text != '#8e95ac') {
        $dynamic_css .= ".bottom-bar { color:{$style_bottom_bar_text}; }";
        $dynamic_css .= ".bottom-bar a { color: {$style_bottom_bar_text}; }";
    }

    //ADD BODY CLASS TO OVERWRITE THEME STYLES
    if(!empty($dynamic_css)) {
        add_filter( 'body_class','ns_core_custom_style_body_class' );
        function ns_core_custom_style_body_class( $classes ) {
            $classes[] = 'ns-custom-styles';
            return $classes;   
        }
    }

    $dynamic_css = apply_filters( 'ns_core_dynamic_styles_filter', $dynamic_css);
    wp_add_inline_style( 'ns-core-dynamic-styles', $dynamic_css );

    /************************************************************************/
    /* MISC STYLES */
    /************************************************************************/
    $site_width = $theme_options['ns_core_site_width'];
    $global_bg = $theme_options['ns_core_global_bg'];
    $header_bg = $theme_options['ns_core_header_bg'];
    $page_banner_padding_top = $theme_options['ns_core_page_banner_padding_top'];
    $page_banner_padding_bottom = $theme_options['ns_core_page_banner_padding_bottom'];
    $footer_bg = $theme_options['ns_core_footer_bg'];

    $misc_css = "";

    //SITE WIDTH
    if(ns_core_option_exists('ns_core_site_width') && !empty($site_width)) { $misc_css .= "@media (min-width: 1200px) { .container{ max-width: {$site_width}px; } }"; }

    //GLOBAL BG IMAGE
    if(ns_core_option_exists('ns_core_global_bg') && !empty($global_bg)) { $misc_css .= "body { background-image:url({$global_bg}); }"; }
    
    //HEADER BG IMAGE
    if(!empty($header_bg)) { $misc_css .= "header { background-image:url({$header_bg}); }"; }

    //PAGE BANNER PADDING
    $misc_css .= ".subheader {";
    if(!empty($page_banner_padding_top)) { $misc_css .= "padding-top:{$page_banner_padding_top}px;"; }
    if(!empty($page_banner_padding_bottom)) { $misc_css .= "padding-bottom:{$page_banner_padding_bottom}px;"; }
    $misc_css .= "}";

    //FOOTER BG IMAGE
    if(!empty($footer_bg)) { $misc_css .= "footer { background-image:url({$footer_bg}); }"; } 

    wp_add_inline_style( 'ns-core-dynamic-styles', $misc_css );


    /************************************************************************/
    /* RTL(Right to Left) STYLES */
    /************************************************************************/
    $rtl = ns_core_load_theme_options('ns_core_rtl');

    if($rtl == 'true') {
        $rtl_css = "";

        /** GLOBAL **/
        $rtl_css .= ".right { float:left; }";
        $rtl_css .= ".left { float:right; }";
        $rtl_css .= ".icon { margin-right:0; margin-left:4px; }";
        $rtl_css .= ".module-header-left { text-align:right; }";
        $rtl_css .= ".module-header-left .widget-divider { margin-right:0; margin-left:auto; }";
        $rtl_css .= ".button-icon .fa { margin-left:0; }";
        $rtl_css .= ".chosen-container .chosen-single div { left:6px; right:auto; }";
        $rtl_css .= ".listing .col-lg-1, .listing .col-lg-10, .listing .col-lg-11, .listing .col-lg-12, .listing .col-lg-2, .listing .col-lg-3, .listing .col-lg-4, .listing .col-lg-5, .listing .col-lg-6, .listing .col-lg-7, .listing .col-lg-8, .listing .col-lg-9 { float:right; }";
        $rtl_css .= "input[type='checkbox'], input[type='radio'] { margin-right:0; margin-left:5px; }";

        /** HEADER **/
        $rtl_css .= "@media only screen and (max-width: 589px) { .top-bar-left.left, .top-bar-right.right { float:none; width:100%; text-align:center; } }";
        $rtl_css .= "@media only screen and (max-width: 589px) { .top-bar-item { float:none !important; } }";
        $rtl_css .= ".top-bar-member-actions .member-sub-menu { text-align:right; }";
        $rtl_css .= "header .right { float:right; }";
        $rtl_css .= "header .left { float:left; }";
        $rtl_css .= ".header-default .header-item:first-child { padding-left:0px; }";
        $rtl_css .= ".header-default .header-menu .button { float:left; }";
        $rtl_css .= ".header-default .header-menu-before { margin-right:auto; margin-left:0; }";
        $rtl_css .= ".header-menu .main-menu li .sub-menu li .sub-menu { margin-right:200px; border-radius:4px 0px 4px 4px; }";
        $rtl_css .= ".header-menu .main-menu > li.menu-item-has-children > a { padding-left:10px !important; padding-right:0px !important; }";
        $rtl_css .= ".header-menu .main-menu li.menu-item-has-children::after { right:auto; left:11px; }";
        $rtl_css .= '.header-menu .main-menu li .sub-menu li.menu-item-has-children::after { content:"\f104"; right:auto; left:10px; }';

        /** SUBHEADER **/
        $rtl_css .=  "#breadcrumbs li { margin-right:0px; margin-left:10px; }";
        $rtl_css .= ".subheader .search-form-wrap { float:left; padding-left:0px; padding-right:15px; }";
        $rtl_css .= ".search-form button[type='submit'] { left:13px; right:auto; }";
        $rtl_css .= ".subheader.simple-search .simple-search-form .chosen-container { text-align:right; }";
        $rtl_css .= ".subheader.subheader-slider .slider-advanced .slide-content { float:right; text-align:right; }";
        $rtl_css .= ".subheader.subheader-slider .slider-advanced .slide .button.small.grey { margin-right:0; margin-left:10px; }";

        /** BLOG **/
        $rtl_css .= '.blog-post-details > li:first-child { margin-left:13px !important; margin-right:0px !important; }';

        /** WIDGETS **/
        $rtl_css .= '.widget ul li::before { content:"\f104"; left:auto; right:-20px; }';
        $rtl_css .= ".widget-footer .widget-divider, .widget-sidebar .widget-divider { margin-right:0; margin-left:auto; }";
        

        wp_add_inline_style( 'ns-core-dynamic-styles', $rtl_css );
    }
    
?>
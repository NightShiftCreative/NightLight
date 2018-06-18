<?php

// create settings menu
add_action('admin_menu', 'rypecore_theme_options_create_menu');

function rypecore_theme_options_create_menu() {

    //create new top-level menu
    add_theme_page('Theme Options', 'Theme Options', 'administrator', 'theme_options', 'rypecore_theme_options_page' , null, 99 );

    //call register settings function
    add_action( 'admin_init', 'register_rypecore_theme_options' );
}

function register_rypecore_theme_options() {

    //register general settings
    register_setting( 'rypecore-settings-group', 'rypecore_site_width' );
    register_setting( 'rypecore-settings-group', 'rypecore_global_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_global_bg_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_icon_set' );
    register_setting( 'rypecore-settings-group', 'rypecore_rtl' );
    register_setting( 'rypecore-settings-group', 'rypecore_preloader' );
    register_setting( 'rypecore-settings-group', 'rypecore_preloader_img' );
    register_setting( 'rypecore-settings-group', 'rypecore_heading_font' );
    register_setting( 'rypecore-settings-group', 'rypecore_body_font' );
    register_setting( 'rypecore-settings-group', 'rypecore_google_maps_api' );
    register_setting( 'rypecore-settings-group', 'rypecore_home_default_map_zoom' );
    register_setting( 'rypecore-settings-group', 'rypecore_home_default_map_latitude' );
    register_setting( 'rypecore-settings-group', 'rypecore_home_default_map_longitude' );
    register_setting( 'rypecore-settings-group', 'rypecore_google_maps_pin' );

    //register contact & social
    register_setting( 'rypecore-settings-group', 'rypecore_phone' );
    register_setting( 'rypecore-settings-group', 'rypecore_email' );
    register_setting( 'rypecore-settings-group', 'rypecore_fb' );
    register_setting( 'rypecore-settings-group', 'rypecore_twitter' );
    register_setting( 'rypecore-settings-group', 'rypecore_google' );
    register_setting( 'rypecore-settings-group', 'rypecore_linkedin' );
    register_setting( 'rypecore-settings-group', 'rypecore_youtube' );
    register_setting( 'rypecore-settings-group', 'rypecore_vimeo' );
    register_setting( 'rypecore-settings-group', 'rypecore_instagram' );
    register_setting( 'rypecore-settings-group', 'rypecore_flickr' );
    register_setting( 'rypecore-settings-group', 'rypecore_dribbble' );
    register_setting( 'rypecore-settings-group', 'rypecore_company_latitude' );
    register_setting( 'rypecore-settings-group', 'rypecore_company_longitude' );
    register_setting( 'rypecore-settings-group', 'rypecore_address' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_details_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_title' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_before' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_after' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_source' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_success' );
    register_setting( 'rypecore-settings-group', 'rypecore_contact_form_id' );

    //register header settings
    register_setting( 'rypecore-settings-group', 'rypecore_display_topbar' );
    register_setting( 'rypecore-settings-group', 'rypecore_topbar_first_field' );
    register_setting( 'rypecore-settings-group', 'rypecore_topbar_second_field' );
    register_setting( 'rypecore-settings-group', 'rypecore_topbar_third_field' );
    register_setting( 'rypecore-settings-group', 'rypecore_topbar_fourth_field' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_display_avatar' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_style' );
    register_setting( 'rypecore-settings-group', 'rypecore_sticky_header' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_container' );
    register_setting( 'rypecore-settings-group', 'rypecore_logo' );
    register_setting( 'rypecore-settings-group', 'rypecore_logo_transparent' );
    register_setting( 'rypecore-settings-group', 'rypecore_favicon' );
    register_setting( 'rypecore-settings-group', 'rypecore_above_phone_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_above_email_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_display_header_search' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_menu_button_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_menu_button_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_header_bg_display' );

    //register page banner settings
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_bg_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_title_align' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_padding_top' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_padding_bottom' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_display_breadcrumb' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_display_search' );
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_slider_transition' ); 
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_slider_duration' ); 
    register_setting( 'rypecore-settings-group', 'rypecore_page_banner_slider_auto_start' ); 
    register_setting( 'rypecore-settings-group', 'rypecore_page_sidebar_size' );  

    //register member settings
    register_setting( 'rypecore-settings-group', 'rypecore_members_login_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_register_page' );
    register_setting( 'rypecore-settings-group', 'rypecore_members_display_name' );

    //register footer settings
    register_setting( 'rypecore-settings-group', 'rypecore_hide_footer_widget_area' );
    register_setting( 'rypecore-settings-group', 'rypecore_num_footer_cols' );
    register_setting( 'rypecore-settings-group', 'rypecore_footer_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_footer_bg_display' );
    register_setting( 'rypecore-settings-group', 'rypecore_display_bottombar' );
    register_setting( 'rypecore-settings-group', 'rypecore_bottom_bar_text' );

    //register style settings
    register_setting( 'rypecore-settings-group', 'rypecore_style_global_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_global_main' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_global_comp' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_top_bar_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_top_bar_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_top_bar_social' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_header_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_header_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_header_icon' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_header_menu' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_page_banner_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_page_banner_title' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_footer_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_footer_header' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_footer_text' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_footer_link' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_bottom_bar_bg' );
    register_setting( 'rypecore-settings-group', 'rypecore_style_bottom_bar_text' );

    //register currency settings
    register_setting( 'rypecore-settings-group', 'rypecore_currency_symbol' );
    register_setting( 'rypecore-settings-group', 'rypecore_currency_symbol_position' );
    register_setting( 'rypecore-settings-group', 'rypecore_thousand_separator' );
    register_setting( 'rypecore-settings-group', 'rypecore_decimal_separator' );
    register_setting( 'rypecore-settings-group', 'rypecore_num_decimal' );

    //register add-on settings
    do_action( 'rao_theme_option_register_settings');
}

function rypecore_theme_options_page() {
?>

<div class="wrap rc-theme-options">
<h2>Theme Options</h2>
<br/>

<?php 
    $sitelink = 'http://rypecreative.com/';
    $siteSupportLink = 'http://rypecreative.com/contact/'; 
?>

<form method="post" action="options.php" id="theme-options-form">

    <table class="theme-options-header" cellspacing="0" cellpadding="0">
        <tr>
        <td class="theme-options-logo">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/logo.svg" alt="" />
        </td>
        <td>
            <div class="created-by">
                <a href="<?php echo esc_url($sitelink); ?>" target="_blank"><?php echo esc_html_e('Made by', 'rypecore'); ?> Rype Creative</a> 
                | <a href="<?php echo esc_url($siteSupportLink); ?>" target="_blank"><?php echo esc_html_e('Support', 'rypecore'); ?></a>
                <?php
                $my_theme = wp_get_theme();
                echo ' | ';
                echo esc_html_e('Version ', 'rypecore') . $my_theme->get( 'Version' );
                ?>
            </div>
            <div class="theme-version">
                <?php submit_button( __( 'Save Changes', 'rypecore' ), 'primary', 'submit_top' ); ?>
                <div class="loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /></div>
                <div class="save-result" id="save-result"><?php echo esc_html_e('Settings Saved Successfully', 'rypecore'); ?></div>
            </div>
        </td>
        </tr>
    </table>

    <?php settings_errors(); ?>

    <?php settings_fields( 'rypecore-settings-group' ); ?>
    <?php do_settings_sections( 'rypecore-settings-group' ); ?>

    <?php
        //set default values
        $site_width_default = 1170;
        $bottom_bar_text_default = get_bloginfo('title').' | Theme by <a href="'.$sitelink.'" target="_blank">Rype Creative</a> | &copy; '. date('Y');
    ?>

    <div id="tabs" class="ui-tabs">
        <table class="theme-options-content" cellspacing="0" cellpadding="0">
            <tr>

                <td class="theme-options-nav-container" valign="top">
                    <ul class="ui-tabs-nav">
                        <li><a href="#general"><i class="fa fa-globe"></i> <span class="ui-tab-text"><?php echo esc_html_e('General', 'rypecore'); ?></span></a></li>
                        <li><a href="#contact" onclick="refreshMap()"><i class="fa fa-comment"></i> <span class="ui-tab-text"><?php echo esc_html_e('Contact & Social', 'rypecore'); ?></span></a></li>
                        <li><a href="#header"><div class="header-icon"><div class="header-icon-head"></div><div class="header-icon-content"></div></div> <span class="ui-tab-text"><?php echo esc_html_e('Header', 'rypecore'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#page-banner"><div class="header-icon page-banner-icon"><div class="header-icon-head"></div><div class="header-icon-banner"></div><div class="header-icon-content"></div></div> <span class="ui-tab-text"><?php echo esc_html_e('Page Banners & Sidebars', 'rypecore'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#members"><i class="fa fa-key"></i> <span class="ui-tab-text"><?php echo esc_html_e('Members', 'rypecore'); ?></span></a></li>
                        <li><a href="#footer"><div class="header-icon"><div class="header-icon-content"></div><div class="header-icon-head"></div></div> <span class="ui-tab-text"><?php echo esc_html_e('Footer', 'rypecore'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#styling"><i class="fa fa-tint"></i> <span class="ui-tab-text"><?php echo esc_html_e('Styling', 'rypecore'); ?></span></a></li>
                        <li><a href="#currency"><i class="fa fa-money"></i> <span class="ui-tab-text"><?php echo esc_html_e('Currency & Numbers', 'rypecore'); ?></span></a></li>
                        <?php do_action( 'rao_after_theme_option_menu'); ?>
                    </ul>
                </td>

                <td class="theme-options-tab-container" valign="top">

                    <div class="tab-loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /> <?php esc_html_e('Loading...', 'rypecore'); ?></div>

                    <div id="general" class="tab-content">
                        <h2><?php echo esc_html_e('General', 'rypecore'); ?></h2>

                        <div class="admin-module">
                            <label class="left" for="site_width"><?php echo esc_html_e('Site Width', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('Set the site width within the range of 700 - 1200px. The default value is 1170px.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="number" min="700" max="1200" id="site_width" name="rypecore_site_width" value="<?php echo esc_attr( get_option('rypecore_site_width',  $site_width_default) ); ?>" />
                            <?php echo esc_html_e('Pixels', 'rypecore'); ?>
                        </div>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Global Background Image', 'rypecore'); ?></label><br/>
                            <input type="text" id="global_bg" name="rypecore_global_bg" value="<?php echo esc_attr( get_option('rypecore_global_bg') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Global Background Display', 'rypecore'); ?></label><br/>
                            <select name="rypecore_global_bg_display">
                                <option value="cover" <?php if(esc_attr(get_option('rypecore_global_bg_display')) == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'rypecore'); ?></option>
                                <option value="fixed" <?php if(esc_attr(get_option('rypecore_global_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'rypecore'); ?></option>
                                <option value="repeat" <?php if(esc_attr(get_option('rypecore_global_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Icon Style', 'rypecore'); ?></label><br/>
                            <select name="rypecore_icon_set">
                                <option value="fa" <?php if(esc_attr(get_option('rypecore_icon_set', 'fa')) == 'fa') { echo 'selected'; } ?>><?php echo esc_html_e('Font Awesome', 'rypecore'); ?></option>
                                <option value="line" <?php if(esc_attr(get_option('rypecore_icon_set', 'fa')) == 'line') { echo 'selected'; } ?>><?php echo esc_html_e('Line Icons', 'rypecore'); ?></option>
                                <option value="dripicon" <?php if(esc_attr(get_option('rypecore_icon_set', 'fa')) == 'dripicon') { echo 'selected'; } ?>><?php echo esc_html_e('Dripicons', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="rtl" name="rypecore_rtl" value="true" <?php checked('true', get_option('rypecore_rtl'), true) ?> />
                            <label for="rtl"><?php echo esc_html_e('Enable RTL(Right to Left) layout', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="preloader" name="rypecore_preloader" value="true" <?php checked('true', get_option('rypecore_preloader', 'true'), true) ?> />
                            <label for="preloader"><?php echo esc_html_e('Enable Preloader', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Preloader Custom Image', 'rypecore'); ?></label><br/>
                            <input type="text" id="preloader_img" name="rypecore_preloader_img" value="<?php echo esc_attr( get_option('rypecore_preloader_img') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>

                        <br/><hr><br/>
                        <div class="admin-module-fonts">
                            <h3><?php echo esc_html_e('Font Settings', 'rypecore'); ?></h3>
                            <?php
                                $google_fonts = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAieN5h5Kk6EzbJMGCuI-vBsE4rGFPMsSw';
                                $default_font = 'Varela Round';
                                
                                $arrContextOptions=array(
                                    "ssl"=>array(
                                        "verify_peer"=>false,
                                        "verify_peer_name"=>false,
                                    ),
                                );
                                $json = file_get_contents($google_fonts, false, stream_context_create($arrContextOptions));
                                $data = json_decode($json,true);
                                $items = $data['items'];
                                $i = 0;
                            ?>
                            <div class="admin-module">
                                <p class="admin-module-note"><?php esc_html_e('All fonts are generated from', 'rypecore'); ?> <a href="https://fonts.google.com/" target="_blank"><?php esc_html_e('Google Fonts', 'rypecore'); ?></a></p>
                                <label><?php esc_html_e('Heading Font Face', 'rypecore'); ?></label><br/>
                                <select name="rypecore_heading_font">
                                <option value=""><?php esc_html_e('Choose a font...', 'rypecore'); ?></option>
                                <?php
                                    foreach ($items as $item) {
                                        $i++; ?>
                                        <option value="<?php echo $item['family']; ?>" <?php if(esc_attr(get_option('rypecore_heading_font', $default_font)) == $item['family']) { echo 'selected'; } ?>><?php echo $item['family']; ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>

                            <div class="admin-module">
                                <label><?php esc_html_e('Body Font Face', 'rypecore'); ?></label><br/>
                                <select name="rypecore_body_font">
                                <option value=""><?php esc_html_e('Choose a font...', 'rypecore'); ?></option>
                                <?php
                                    foreach ($items as $item) {
                                        $i++; ?>
                                        <option value="<?php echo $item['family']; ?>" <?php if(esc_attr(get_option('rypecore_body_font', $default_font)) == $item['family']) { echo 'selected'; } ?>><?php echo $item['family']; ?></option>
                                    <?php }
                                ?>
                                </select>
                            </div>

                            <?php if(get_option('rypecore_heading_font', $default_font) != $default_font || get_option('rypecore_body_font', $default_font) != $default_font) { ?>
                            <a href="#" class="admin-module-note reset-fonts">
                                <span class="hide"><?php echo $default_font; ?></span>
                                <?php esc_html_e('Reset to default fonts', 'rypecore'); ?>
                            </a>
                            <?php } ?>
                        </div>

                        <br/><hr><br/><h3><?php esc_html_e('Google Maps Settings', 'rypecore'); ?></h3>
                        <div class="admin-module">
                            <label class="left" for="google_maps_api"><?php echo esc_html_e('Google Maps API Key', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo wp_kses_post(__('Provide your unique Google maps API key. <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Click here</a> to get a key.', 'rypecore')); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="text" id="google_maps_api" name="rypecore_google_maps_api" value="<?php echo esc_attr( get_option('rypecore_google_maps_api') ); ?>" />
                        </div>

                        <div class="admin-module">   
                            <label class="left" for="home_default_map_zoom"><?php echo esc_html_e('Default Map Zoom', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('The map zoom ranges from 1 - 19. Zoom level 1 being the most zoomed out.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="number" min="1" max="19" id="home_default_map_zoom" name="rypecore_home_default_map_zoom" value="<?php echo esc_attr( get_option('rypecore_home_default_map_zoom', 10) ); ?>" />
                        </div>

                        <div class="admin-module">   
                            <label for="home_default_map_latitude"><?php echo esc_html_e('Default Map Latitude', 'rypecore'); ?></label><br/>
                            <input type="text" id="home_default_map_latitude" name="rypecore_home_default_map_latitude" value="<?php echo esc_attr( get_option('rypecore_home_default_map_latitude', 39.2904) ); ?>" />
                        </div>

                        <div class="admin-module">   
                            <label for="home_default_map_longitude"><?php echo esc_html_e('Default Map Longitude', 'rypecore'); ?></label><br/>
                            <input type="text" id="home_default_map_longitude" name="rypecore_home_default_map_longitude" value="<?php echo esc_attr( get_option('rypecore_home_default_map_longitude', -76.5000) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label class="left"><?php echo esc_html_e('Custom Pin Image', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('Replace the default map pin with a custom image. Recommended size: 50x50 pixels.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="text" id="google_maps_pin" name="rypecore_google_maps_pin" value="<?php echo esc_attr( get_option('rypecore_google_maps_pin') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>
                        
                    </div><!-- end general -->

                    <div id="contact" class="tab-content">
                        <h2><?php echo esc_html_e('Global Contact Details', 'rypecore'); ?></h2>

                        <div class="admin-module">
                            <label for="phone"><?php echo esc_html_e('Phone', 'rypecore'); ?></label><br/>
                            <input type="text" id="phone" name="rypecore_phone" value="<?php echo esc_attr( get_option('rypecore_phone') ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label for="email"><?php echo esc_html_e('Email', 'rypecore'); ?></label><br/>
                            <input type="text" id="email" name="rypecore_email" value="<?php echo esc_attr( get_option('rypecore_email') ); ?>" />
                        </div><br/><br/>

                        <h3><?php echo esc_html_e('Social Media', 'rypecore'); ?></h3>
                        <div class="social-media-profiles">
                            <div class="admin-module">
                                <label for="fb">Facebook</label><br/>
                                <input type="text" id="fb" name="rypecore_fb" value="<?php echo esc_attr( get_option('rypecore_fb') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="twitter">Twitter</label><br/>
                                <input type="text" id="twitter" name="rypecore_twitter" value="<?php echo esc_attr( get_option('rypecore_twitter') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="google">Google Plus</label><br/>
                                <input type="text" id="google" name="rypecore_google" value="<?php echo esc_attr( get_option('rypecore_google') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="linkedin">LinkedIn</label><br/>
                                <input type="text" id="linkedin" name="rypecore_linkedin" value="<?php echo esc_attr( get_option('rypecore_linkedin') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="youtube">Youtube</label><br/>
                                <input type="text" id="youtube" name="rypecore_youtube" value="<?php echo esc_attr( get_option('rypecore_youtube') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="vimeo">Vimeo</label><br/>
                                <input type="text" id="vimeo" name="rypecore_vimeo" value="<?php echo esc_attr( get_option('rypecore_vimeo') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="instagram">Instagram</label><br/>
                                <input type="text" id="instagram" name="rypecore_instagram" value="<?php echo esc_attr( get_option('rypecore_instagram') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="flickr">Flickr</label><br/>
                                <input type="text" id="flickr" name="rypecore_flickr" value="<?php echo esc_attr( get_option('rypecore_flickr') ); ?>" />
                            </div>

                            <div class="admin-module">
                                <label for="dribbble">Dribbble</label><br/>
                                <input type="text" id="dribbble" name="rypecore_dribbble" value="<?php echo esc_attr( get_option('rypecore_dribbble') ); ?>" />
                            </div>
                        </div><br/><br/><!-- end social media profiles -->

                        <h3><?php echo esc_html_e('Company Location', 'rypecore'); ?></h3>
                        <?php
                            $latitude = esc_attr( get_option('rypecore_company_latitude') );
                            $longitude = esc_attr( get_option('rypecore_company_longitude') );
                        ?>
                        <div class="admin-module">
                            <div class="admin-module left right-bump">
                                <label for="property_latitude"><?php echo esc_html_e('Latitude', 'rypecore'); ?></label><br/>
                                <input type="text" name="rypecore_company_latitude" id="property_latitude" value="<?php echo esc_attr($latitude); ?>" />
                            </div>

                            <div class="admin-module left">
                                <label for="property_longitude"><?php echo esc_html_e('Longitude', 'rypecore'); ?></label><br/>
                                <input type="text" name="rypecore_company_longitude" id="property_longitude" value="<?php echo esc_attr($longitude); ?>" />
                            </div>
                            <?php include(get_parent_theme_file_path('/admin/admin_map.php')); ?>
                        </div><br/><br/>

                        <h3><?php echo esc_html_e('Contact Page', 'rypecore'); ?></h3>
                        <div class="admin-module">
                            <input type="checkbox" id="contact_details_display" name="rypecore_contact_details_display" value="true" <?php checked('true', get_option('rypecore_contact_details_display', 'true'), true) ?> />
                            <label for="contact_details_display"><?php echo esc_html_e('Display Contact Details Section', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <label for="contact_form_title"><?php echo esc_html_e('Contact Form Title', 'rypecore'); ?></label><br/>
                            <input type="text" id="contact_form_title" name="rypecore_contact_form_title" value="<?php echo esc_attr( get_option('rypecore_contact_form_title', 'Quick Contact') ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label for="contact_form_before"><?php echo esc_html_e('Text Before Form', 'rypecore'); ?></label><br/>
                            <textarea id="contact_form_before" name="rypecore_contact_form_before"><?php echo esc_attr( get_option('rypecore_contact_form_before') ); ?></textarea>
                        </div>

                        <div class="admin-module">
                            <label for="contact_form_after"><?php echo esc_html_e('Text After Form', 'rypecore'); ?></label><br/>
                            <textarea id="contact_form_after" name="rypecore_contact_form_after"><?php echo esc_attr( get_option('rypecore_contact_form_after') ); ?></textarea>
                        </div>

                        <div class="admin-module">
                            <label for="contact_form_success"><?php echo esc_html_e('Contact Form Success Message', 'rypecore'); ?></label><br/>
                            <input type="text" id="contact_form_success" name="rypecore_contact_form_success" value="<?php echo esc_attr( get_option('rypecore_contact_form_success', esc_html__('Thanks! Your email has been delivered!', 'rypecore')) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <p><strong><?php echo esc_html_e('Contact Form Source', 'rypecore'); ?></strong></p>
                            <?php $contact_form_source = get_option('rypecore_contact_form_source', 'default'); ?>
                            <input type="radio" id="contact_form_source_default" name="rypecore_contact_form_source" value="default" <?php checked('default', $contact_form_source, true) ?> /> 
                            <label class="contact-form-source-label" for="contact_form_source_default"><?php echo esc_html_e('Default Contact Form', 'rypecore'); ?></label>
                            <input type="radio" id="contact_form_source_contact_7" name="rypecore_contact_form_source" value="contact-form-7" <?php checked('contact-form-7', $contact_form_source, true) ?> /> 
                            <label for="contact_form_source_contact_7"><?php echo esc_html_e('Contact Form 7 Plugin', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module admin-module-contact-form-default hide-soft <?php if($contact_form_source == 'default') { echo 'show'; } ?>">
                            <?php if(!function_exists('rao_main_contact_form')) { 
                                echo '<i>You need to install and/or activate the required bundled plugin: <b>Rype Real Estate</b></i>'; 
                            } ?>
                        </div>

                        <div class="admin-module admin-module-contact-form-id hide-soft <?php if($contact_form_source == 'contact-form-7') { echo 'show'; } ?>">
                            <?php 
                            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                            if( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) { ?>
                                <label for="contact_form_id"><?php echo esc_html_e('Contact From 7 ID', 'rypecore'); ?></label><br/>
                                <input type="number" min="0" name="rypecore_contact_form_id" value="<?php echo esc_attr( get_option('rypecore_contact_form_id') ); ?>" />
                                <span class="admin-module-note"><?php echo esc_html_e('Provide the ID of the contact form you would like displayed', 'rypecore'); ?></span>
                            <?php } else {
                                echo '<i>You need to install and/or activate the <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> plugin.</i>';
                            }
                            ?>
                        </div>

                    </div><!-- end contact and social -->

                    <div id="header" class="tab-content">
                        <h2><?php echo esc_html_e('Header', 'rypecore'); ?></h2>

                        <div class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Top Bar Options', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <input type="checkbox" id="display_topbar" name="rypecore_display_topbar" value="true" <?php checked('true', get_option('rypecore_display_topbar', 'true'), true) ?> />
                                    <label for="display_topbar"><?php echo esc_html_e('Display top bar', 'rypecore'); ?></label>
                                </div>

                                <div class="admin-module">
                                    <label><?php echo esc_html_e('Top Bar First Field', 'rypecore'); ?></label><br/>
                                    <select name="rypecore_topbar_first_field">
                                        <option value="email" <?php if(esc_attr(get_option('rypecore_topbar_first_field', 'email')) == 'email') { echo 'selected'; } ?>>Email</option>
                                        <option value="phone" <?php if(esc_attr(get_option('rypecore_topbar_first_field', 'email')) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                        <option value="social" <?php if(esc_attr(get_option('rypecore_topbar_first_field', 'email')) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                        <option value="member" <?php if(esc_attr(get_option('rypecore_topbar_first_field', 'email')) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                        <option value="" <?php if(esc_attr(get_option('rypecore_topbar_first_field', 'email')) == '') { echo 'selected'; } ?>>None</option>
                                    </select>
                                </div>

                                <div class="admin-module">
                                    <label><?php echo esc_html_e('Top Bar Second Field', 'rypecore'); ?></label><br/>
                                    <select name="rypecore_topbar_second_field">
                                        <option value="email" <?php if(esc_attr(get_option('rypecore_topbar_second_field', 'phone')) == 'email') { echo 'selected'; } ?>>Email</option>
                                        <option value="phone" <?php if(esc_attr(get_option('rypecore_topbar_second_field', 'phone')) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                        <option value="social" <?php if(esc_attr(get_option('rypecore_topbar_second_field', 'phone')) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                        <option value="member" <?php if(esc_attr(get_option('rypecore_topbar_second_field', 'phone')) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                        <option value="" <?php if(esc_attr(get_option('rypecore_topbar_second_field', 'phone')) == '') { echo 'selected'; } ?>>None</option>
                                    </select>
                                </div>

                                <div class="admin-module">
                                    <label><?php echo esc_html_e('Top Bar Third Field', 'rypecore'); ?></label><br/>
                                    <select name="rypecore_topbar_third_field">
                                        <option value="email" <?php if(esc_attr(get_option('rypecore_topbar_third_field', 'social')) == 'email') { echo 'selected'; } ?>>Email</option>
                                        <option value="phone" <?php if(esc_attr(get_option('rypecore_topbar_third_field', 'social')) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                        <option value="social" <?php if(esc_attr(get_option('rypecore_topbar_third_field', 'social')) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                        <option value="member" <?php if(esc_attr(get_option('rypecore_topbar_third_field', 'social')) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                        <option value="" <?php if(esc_attr(get_option('rypecore_topbar_third_field', 'social')) == '') { echo 'selected'; } ?>>None</option>
                                    </select>
                                </div>

                                <div class="admin-module">
                                    <label><?php echo esc_html_e('Top Bar Fourth Field', 'rypecore'); ?></label><br/>
                                    <select name="rypecore_topbar_fourth_field">
                                        <option value="email" <?php if(esc_attr(get_option('rypecore_topbar_fourth_field', 'member')) == 'email') { echo 'selected'; } ?>>Email</option>
                                        <option value="phone" <?php if(esc_attr(get_option('rypecore_topbar_fourth_field', 'member')) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                        <option value="social" <?php if(esc_attr(get_option('rypecore_topbar_fourth_field', 'member')) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                        <option value="member" <?php if(esc_attr(get_option('rypecore_topbar_fourth_field', 'member')) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                        <option value="" <?php if(esc_attr(get_option('rypecore_topbar_fourth_field', 'member')) == '') { echo 'selected'; } ?>>None</option>
                                    </select>
                                </div>

                                <div class="admin-module">
                                    <input type="checkbox" id="members_display_avatar" name="rypecore_members_display_avatar" value="true" <?php checked('true', get_option('rypecore_members_display_avatar', 'true'), true) ?> />
                                    <label for="members_display_avatar">Display member avatar in header?</label>
                                </div>

                            </div>
                        </div><!-- end topbar options -->

                        <div class="admin-module admin-module-header-style">
                            <label><strong><?php echo esc_html_e('Select a header style', 'rypecore'); ?></strong></label><br/>
                            <?php $header_style = get_option('rypecore_header_style', 'default'); ?>
                            <label class="selectable-item <?php if($header_style == 'default') { echo 'active'; } ?>" for="header_style_default">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/default-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_default" name="rypecore_header_style" value="default" <?php checked('default', $header_style, true) ?> />
                                <?php echo esc_html_e('Default Header', 'rypecore'); ?>
                            </label>
                            <label class="selectable-item <?php if($header_style == 'classic') { echo 'active'; } ?>" for="header_style_classic">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/classic-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_classic" name="rypecore_header_style" value="classic" <?php checked('classic', $header_style, true) ?> /><?php echo esc_html_e('Classic Header', 'rypecore'); ?><br/>
                            </label>
                            <label class="selectable-item <?php if($header_style == 'transparent') { echo 'active'; } ?>" for="header_style_transparent">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/transparent-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_transparent" name="rypecore_header_style" value="transparent" <?php checked('transparent', $header_style, true) ?> /><?php echo esc_html_e('Transparent Header', 'rypecore'); ?><br/>
                            </label>
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="sticky_header" name="rypecore_sticky_header" value="true" <?php checked('true', get_option('rypecore_sticky_header', 'true'), true) ?> />
                            <label for="sticky_header"><?php echo esc_html_e('Enable sticky header', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="header_container" name="rypecore_header_container" value="true" <?php checked('true', get_option('rypecore_header_container', 'true'), true) ?> />
                            <label for="header_container"><?php echo esc_html_e('Enable header container', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <label class="left"><?php echo esc_html_e('Logo', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('Recommended size: 172 x 50 pixels.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php $default_logo = esc_url( get_template_directory_uri() ).'/images/logo-dark.png'; ?>
                            <input type="text" id="logo" name="rypecore_logo" value="<?php echo esc_attr( get_option('rypecore_logo', $default_logo) ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                            <?php $logo = get_option('rypecore_logo', $default_logo); ?>
                            <?php if(!empty($logo)) { ?><div class="option-preview logo-preview"><img src="<?php echo esc_attr( get_option('rypecore_logo', $default_logo) ); ?>" alt="" /></div><?php } ?>
                        </div>

                        <div class="admin-module">
                            <label class="left"><?php echo esc_html_e('Logo Transparent', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('This logo will be used if the transparent header is activated. Recommended size: 172 x 50 pixels.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php $default_logo_transparent = esc_url( get_template_directory_uri() ).'/images/logo.png'; ?>
                            <input type="text" id="logo_transparent" name="rypecore_logo_transparent" value="<?php echo esc_attr( get_option('rypecore_logo_transparent', $default_logo_transparent) ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                            <?php $logo_transparent = get_option('rypecore_logo_transparent', $default_logo_transparent); ?>
                            <?php if(!empty($logo_transparent)) { ?><div class="option-preview logo-preview"><img src="<?php echo esc_attr( get_option('rypecore_logo_transparent', $default_logo_transparent) ); ?>" alt="" /></div><?php } ?>
                        </div>

                        <div class="admin-module">
                            <label class="left"><?php echo esc_html_e('Favicon', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('A favicon, also known as a shortcut icon, website icon, tab icon, URL icon or bookmark icon, is a file named favicon.ico and 
                                    containing one or more small icons, most commonly 16x16 pixels.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="text" id="favicon" name="rypecore_favicon" value="<?php echo esc_attr( get_option('rypecore_favicon') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                            <?php $favicon = get_option('rypecore_favicon'); ?>
                            <?php if(!empty($favicon)) { ?><div class="option-preview favicon-preview"><img src="<?php echo esc_attr( get_option('rypecore_favicon') ); ?>" alt="" /></div><?php } ?>
                        </div>

                        <div class="admin-module">
                            <label for="above_phone_text"><?php echo esc_html_e('Above Phone Text', 'rypecore'); ?></label><br/>
                            <input type="text" id="above_phone_text" name="rypecore_above_phone_text" value="<?php echo esc_attr( get_option('rypecore_above_phone_text', esc_html__('Call us anytime', 'rypecore')) ); ?>" />
                            <span class="admin-module-note"><?php echo esc_html_e('*Only for default header style', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">
                            <label for="above_email_text"><?php echo esc_html_e('Above Email Text', 'rypecore'); ?></label><br/>
                            <input type="text" id="above_email_text" name="rypecore_above_email_text" value="<?php echo esc_attr( get_option('rypecore_above_email_text', esc_html__('Drop us a line', 'rypecore')) ); ?>" />
                            <span class="admin-module-note"><?php echo esc_html_e('*Only for default header style', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="display_header_search" name="rypecore_display_header_search" value="true" <?php checked('true', get_option('rypecore_display_header_search', 'true'), true) ?> />
                            <label for="display_header_search"><?php echo esc_html_e('Display Header Search Form', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <?php 
                                $members_submit_property_page = get_option('rypecore_members_submit_property_page');
                                $header_menu_button_page = get_option('rypecore_header_menu_button_page'); 
                                if(isset($members_submit_property_page) && empty($header_menu_button_page)) {
                                    $header_menu_button_page = $members_submit_property_page;
                                }
                            ?>
                            <label><?php echo esc_html_e('Menu Call to Action Page', 'rypecore'); ?></label><br/>
                            <select name="rypecore_header_menu_button_page">
                                <option value=""><?php echo esc_attr( esc_html__( 'Select page', 'rypecore' ) ); ?></option> 
                                <?php 
                                $pages = get_pages(); 
                                foreach ( $pages as $page ) { ?>
                                        <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr($header_menu_button_page) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                            <?php echo esc_attr($page->post_title); ?>
                                        </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="admin-module">
                            <label for="header_menu_button_text"><?php echo esc_html_e('Menu Call to Action Text', 'rypecore'); ?></label><br/>
                            <input type="text" id="header_menu_button_text" name="rypecore_header_menu_button_text" value="<?php echo esc_attr( get_option('rypecore_header_menu_button_text', esc_html__('Post Job', 'rypecore')) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Header Background Image', 'rypecore'); ?></label><br/>
                            <input type="text" id="header_bg" name="rypecore_header_bg" value="<?php echo esc_attr( get_option('rypecore_header_bg') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Header Background Display', 'rypecore'); ?></label><br/>
                            <select name="rypecore_header_bg_display">
                                <option value="cover" <?php if(esc_attr(get_option('rypecore_header_bg_display')) == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'rypecore'); ?></option>
                                <option value="fixed" <?php if(esc_attr(get_option('rypecore_header_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'rypecore'); ?></option>
                                <option value="repeat" <?php if(esc_attr(get_option('rypecore_header_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'rypecore'); ?></option>
                            </select>
                        </div>
                    </div><!-- end header -->

                    <div id="page-banner" class="tab-content">
                        <h2><?php echo esc_html_e('Page Banners', 'rypecore'); ?></h2>

                        <div class="admin-module">
                            <label class="left"><?php echo esc_html_e('Page Banner Background Image', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php echo esc_html_e('Set the global banner background image for all pages/posts. This can be overridden on individual pages/posts.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <input type="text" id="page_banner_bg" name="rypecore_page_banner_bg" value="<?php echo esc_attr( get_option('rypecore_page_banner_bg', esc_url(get_template_directory_uri()).'/images/page-banner-default.jpg' ) ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Page Banner Background Display', 'rypecore'); ?></label><br/>
                            <select name="rypecore_page_banner_bg_display">
                                <option value="cover" <?php if(esc_attr(get_option('rypecore_page_banner_bg_display')) == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'rypecore'); ?></option>
                                <option value="fixed" <?php if(esc_attr(get_option('rypecore_page_banner_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'rypecore'); ?></option>
                                <option value="repeat" <?php if(esc_attr(get_option('rypecore_page_banner_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Text Alignment', 'rypecore'); ?></label><br/>
                            <select name="rypecore_page_banner_title_align">
                                <option value="left" <?php if(esc_attr(get_option('rypecore_page_banner_title_align')) == 'left') { echo 'selected'; } ?>><?php echo esc_html_e('Left', 'rypecore'); ?></option>
                                <option value="center" <?php if(esc_attr(get_option('rypecore_page_banner_title_align')) == 'center') { echo 'selected'; } ?>><?php echo esc_html_e('Center', 'rypecore'); ?></option>
                                <option value="right" <?php if(esc_attr(get_option('rypecore_page_banner_title_align')) == 'right') { echo 'selected'; } ?>><?php echo esc_html_e('Right', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">
                            <label for="page_banner_padding_top"><?php echo esc_html_e('Padding Top', 'rypecore'); ?></label><br/>
                            <input type="number" id="page_banner_padding_top" name="rypecore_page_banner_padding_top" value="<?php echo esc_attr( get_option('rypecore_page_banner_padding_top',  '100') ); ?>" />
                            <?php echo esc_html_e('Pixels', 'rypecore'); ?>
                        </div>

                        <div class="admin-module">
                            <label for="page_banner_padding_bottom"><?php echo esc_html_e('Padding Bottom', 'rypecore'); ?></label><br/>
                            <input type="number" id="page_banner_padding_bottom" name="rypecore_page_banner_padding_bottom" value="<?php echo esc_attr( get_option('rypecore_page_banner_padding_bottom',  '100') ); ?>" />
                            <?php echo esc_html_e('Pixels', 'rypecore'); ?>
                        </div>
                        
                        <div class="admin-module">
                            <input type="checkbox" id="page_banner_display_breadcrumb" name="rypecore_page_banner_display_breadcrumb" value="true" <?php checked('true', get_option('rypecore_page_banner_display_breadcrumb'), true) ?> />
                            <label for="page_banner_display_breadcrumb"><?php echo esc_html_e('Display Breadcrumb', 'rypecore'); ?></label>
                        </div>
                        
                        <div class="admin-module">
                            <input type="checkbox" id="page_banner_display_search" name="rypecore_page_banner_display_search" value="true" <?php checked('true', get_option('rypecore_page_banner_display_search'), true) ?> />
                            <label for="page_banner_display_search"><?php echo esc_html_e('Display Search Form', 'rypecore'); ?></label>
                        </div>

                        <hr/>
                        <h2><?php echo esc_html_e('Sliders', 'rypecore'); ?></h2>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Transition Between Slides', 'rypecore'); ?></label><br/>
                            <select name="rypecore_page_banner_slider_transition">
                                <option value="horizontal" <?php if(esc_attr(get_option('rypecore_page_banner_slider_transition', 'horizontal')) == 'horizontal') { echo 'selected'; } ?>><?php echo esc_html_e('Slide', 'rypecore'); ?></option>
                                <option value="fade" <?php if(esc_attr(get_option('rypecore_page_banner_slider_transition', 'horizontal')) == 'fade') { echo 'selected'; } ?>><?php echo esc_html_e('Fade', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">
                            <label for="page_banner_slider_duration"><?php echo esc_html_e('Slide Duration (in ms)', 'rypecore'); ?></label><br/>
                            <input type="number" id="page_banner_slider_duration" name="rypecore_page_banner_slider_duration" value="<?php echo esc_attr( get_option('rypecore_page_banner_slider_duration', '5000') ); ?>" />
                        </div>

                        <div class="admin-module">
                            <input type="checkbox" id="page_banner_slider_auto_start" name="rypecore_page_banner_slider_auto_start" value="true" <?php checked('true', get_option('rypecore_page_banner_slider_auto_start', 'true'), true) ?> />
                            <label for="page_banner_slider_auto_start"><?php echo esc_html_e('Auto Start Sliders', 'rypecore'); ?></label>
                        </div>

                        <hr/>
                        <h2><?php echo esc_html_e('Page Sidebars', 'rypecore'); ?></h2>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Sidebar Width', 'rypecore'); ?></label><br/>
                            <select name="rypecore_page_sidebar_size">
                                <option value="small" <?php if(esc_attr(get_option('rypecore_page_sidebar_size', 'small')) == 'small') { echo 'selected'; } ?>><?php echo esc_html_e('Small', 'rypecore'); ?></option>
                                <option value="medium" <?php if(esc_attr(get_option('rypecore_page_sidebar_size', 'small')) == 'medium') { echo 'selected'; } ?>><?php echo esc_html_e('Medium', 'rypecore'); ?></option>
                                <option value="large" <?php if(esc_attr(get_option('rypecore_page_sidebar_size', 'small')) == 'large') { echo 'selected'; } ?>><?php echo esc_html_e('Large', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <!-- hook in for other add-ons -->
                        <?php do_action( 'rao_after_page_banner_theme_options'); ?>
                        
                    </div><!-- end page banner -->

                    <div id="members" class="tab-content">
                        <h2><?php echo esc_html_e('Members', 'rypecore'); ?></h2>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Member Display Name', 'rypecore'); ?></label><br/>
                            <select name="rypecore_members_display_name">
                                <option value="username" <?php if(esc_attr(get_option('rypecore_members_display_name', 'username')) == 'username') { echo 'selected'; } ?>><?php esc_html_e('Username', 'rypecore'); ?></option>
                                <option value="fname" <?php if(esc_attr(get_option('rypecore_members_display_name', 'username')) == 'fname') { echo 'selected'; } ?>><?php esc_html_e('First Name', 'rypecore'); ?></option>
                                <option value="flname" <?php if(esc_attr(get_option('rypecore_members_display_name', 'username')) == 'flname') { echo 'selected'; } ?>><?php esc_html_e('First & Last Name', 'rypecore'); ?></option>
                                <option value="display_name" <?php if(esc_attr(get_option('rypecore_members_display_name', 'username')) == 'display_name') { echo 'selected'; } ?>><?php esc_html_e('Display Name', 'rypecore'); ?></option>
                                <option value="email" <?php if(esc_attr(get_option('rypecore_members_display_name', 'username')) == 'email') { echo 'selected'; } ?>><?php esc_html_e('Email', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div class="admin-module">   
                            <label class="left"><?php echo esc_html_e('Select Member Login Page', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php esc_html_e('Create a page and assign it the Login template.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <select name="rypecore_members_login_page">
                                <option value="">
                                <?php echo esc_attr( esc_html__( 'Select page', 'rypecore' ) ); ?></option> 
                                    <?php 
                                    $pages = get_pages(); 
                                    foreach ( $pages as $page ) { ?>
                                    <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('rypecore_members_login_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                        <?php echo esc_attr($page->post_title); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="admin-module">   
                            <label class="left"><?php echo esc_html_e('Select Member Register Page', 'rypecore'); ?></label>
                            <div class="more-info">
                                <div class="more-info-question">?</div>
                                <div class="more-info-content">
                                    <?php esc_html_e('Create a page and assign it the Register template.', 'rypecore'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <select name="rypecore_members_register_page">
                                <option value="">
                                <?php echo esc_attr( esc_html__( 'Select page', 'rypecore' ) ); ?></option> 
                                    <?php 
                                    $pages = get_pages(); 
                                    foreach ( $pages as $page ) { ?>
                                    <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('rypecore_members_register_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                        <?php echo esc_attr($page->post_title); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div><!-- end members -->

                    <div id="footer" class="tab-content">
                        <h2><?php echo esc_html_e('Footer', 'rypecore'); ?></h2>

                        <div class="admin-module">
                            <input type="checkbox" id="hide_footer_widget_area" name="rypecore_hide_footer_widget_area" value="true" <?php checked('true', get_option('rypecore_hide_footer_widget_area'), true) ?> />
                            <label for="hide_footer_widget_area"><?php echo esc_html_e('Hide Footer Widget Area', 'rypecore'); ?></label>
                        </div>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Number of footer columns', 'rypecore'); ?></label><br/>
                            <select name="rypecore_num_footer_cols">
                                <option value="1" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '1') { echo 'selected'; } ?>>1</option>
                                <option value="2" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '2') { echo 'selected'; } ?>>2</option>
                                <option value="3" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '3') { echo 'selected'; } ?>>3</option>
                                <option value="4" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '4') { echo 'selected'; } ?>>4</option>
                                <option value="5" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '5') { echo 'selected'; } ?>>5</option>
                                <option value="6" <?php if(esc_attr(get_option('rypecore_num_footer_cols', '4')) == '6') { echo 'selected'; } ?>>6</option>
                            </select>
                        </div>

                        <div class="admin-module">
                            <label><?php echo esc_html_e('Footer Background Image', 'rypecore'); ?></label><br/>
                            <input type="text" id="footer_bg" name="rypecore_footer_bg" value="<?php echo esc_attr( get_option('rypecore_footer_bg') ); ?>" />
                            <input id="_btn" class="upload_image_button" type="button" value="<?php esc_html_e('Upload Image', 'rypecore'); ?>" />
                            <span class="button-secondary remove"><?php esc_html_e('Remove', 'rypecore'); ?></span>
                        </div>

                        <div class="admin-module">   
                            <label><?php echo esc_html_e('Footer Background Display', 'rypecore'); ?></label><br/>
                            <select name="rypecore_footer_bg_display">
                                <option value="cover" <?php if(esc_attr(get_option('rypecore_footer_bg_display')) == 'cover') { echo 'selected'; } ?>><?php esc_html_e('Cover', 'rypecore'); ?></option>
                                <option value="fixed" <?php if(esc_attr(get_option('rypecore_footer_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php esc_html_e('Fixed', 'rypecore'); ?></option>
                                <option value="repeat" <?php if(esc_attr(get_option('rypecore_footer_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php esc_html_e('Tiled', 'rypecore'); ?></option>
                            </select>
                        </div>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Bottom Bar', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <input type="checkbox" id="display_bottombar" name="rypecore_display_bottombar" value="true" <?php checked('true', get_option('rypecore_display_bottombar', 'true'), true) ?> />
                                    <label for="display_bottombar"><?php echo esc_html_e('Display Bottom Bar', 'rypecore'); ?></label>
                                </div>

                                <div class="admin-module">
                                    <label for="bottom_bar_text"><?php echo esc_html_e('Bottom Bar Text', 'rypecore'); ?></label><br/>
                                    <textarea id="bottom_bar_text" name="rypecore_bottom_bar_text"><?php echo esc_attr( get_option('rypecore_bottom_bar_text', $bottom_bar_text_default) ); ?></textarea>
                                </div>
                            </div>
                        </div>

                    </div><!-- end footer -->

                    <div id="styling" class="tab-content">
                        <h3><?php echo esc_html_e('Styling', 'rypecore'); ?></h3>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Global Styles', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <label for="style_global_bg"><?php echo esc_html_e('Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_global_bg" id="style_global_bg" class="color-field" data-default-color="#ecf2f6" value="<?php echo esc_attr( get_option('rypecore_style_global_bg', '#ecf2f6') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_global_main"><?php echo esc_html_e('Main Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_global_main" id="style_global_main" class="color-field" data-default-color="#59aee9" value="<?php echo esc_attr( get_option('rypecore_style_global_main', '#59aee9') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_global_comp"><?php echo esc_html_e('Complementary Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_global_comp" id="style_global_comp" class="color-field" data-default-color="#4fba6f" value="<?php echo esc_attr( get_option('rypecore_style_global_comp', '#4fba6f') ); ?>" />
                                </div>
                            </div>
                        </div>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Top Bar Styles', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <label for="style_top_bar_bg"><?php echo esc_html_e('Top Bar Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_top_bar_bg" id="style_top_bar_bg" class="color-field" data-default-color="#48a0dc" value="<?php echo esc_attr( get_option('rypecore_style_top_bar_bg', '#48a0dc') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_top_bar_text"><?php echo esc_html_e('Top Bar Text Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_top_bar_text" id="style_top_bar_text" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('rypecore_style_top_bar_text', '#ffffff') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_top_bar_social"><?php echo esc_html_e('Top Bar Social Icons Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_top_bar_social" id="style_top_bar_social" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('rypecore_style_top_bar_social', '#ffffff') ); ?>" />
                                </div>
                            </div>
                        </div>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Header Styles', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <label for="style_header_bg"><?php echo esc_html_e('Header Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_header_bg" id="style_header_bg" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('rypecore_style_header_bg', '#ffffff') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_header_text"><?php echo esc_html_e('Header Text Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_header_text" id="style_header_text" class="color-field" data-default-color="#464646" value="<?php echo esc_attr( get_option('rypecore_style_header_text', '#464646') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_header_icon"><?php echo esc_html_e('Header Icon Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_header_icon" id="style_header_icon" class="color-field" data-default-color="#59aee9" value="<?php echo esc_attr( get_option('rypecore_style_header_icon', '#59aee9') ); ?>" />
                                </div>
                                

                                <div class="admin-module">
                                    <label for="style_header_menu"><?php echo esc_html_e('Header Menu Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_header_menu" id="style_header_menu" class="color-field" data-default-color="#323746" value="<?php echo esc_attr( get_option('rypecore_style_header_menu', '#323746') ); ?>" />
                                    <span class="admin-module-note"><?php echo esc_html_e('*Only for Default Header style', 'rypecore'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Page Banner Styles', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <label for="style_page_banner_bg"><?php echo esc_html_e('Page Banner Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_page_banner_bg" id="style_page_banner_bg" class="color-field" data-default-color="#8d92a4" value="<?php echo esc_attr( get_option('rypecore_style_page_banner_bg', '#8d92a4') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_page_banner_title"><?php echo esc_html_e('Page Banner Title Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_page_banner_title" id="style_page_banner_title" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('rypecore_style_page_banner_title', '#ffffff') ); ?>" />
                                </div>
                            </div>
                        </div>

                        <div id="accordion" class="accordion rc-accordion">
                            <h3 class="accordion-tab"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Footer Styles', 'rypecore'); ?></h3>
                            <div>
                                <div class="admin-module">
                                    <label for="style_footer_bg"><?php echo esc_html_e('Footer Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_footer_bg" id="style_footer_bg" class="color-field" data-default-color="#323746" value="<?php echo esc_attr( get_option('rypecore_style_footer_bg', '#323746') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_footer_header"><?php echo esc_html_e('Footer Header Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_footer_header" id="style_footer_header" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('rypecore_style_footer_header', '#ffffff') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_footer_text"><?php echo esc_html_e('Footer Text Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_footer_text" id="style_footer_text" class="color-field" data-default-color="#8e95ac" value="<?php echo esc_attr( get_option('rypecore_style_footer_text', '#8e95ac') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_footer_link"><?php echo esc_html_e('Footer Link Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_footer_link" id="style_footer_link" class="color-field" data-default-color="#68b4e8" value="<?php echo esc_attr( get_option('rypecore_style_footer_link', '#68b4e8') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_bottom_bar_bg"><?php echo esc_html_e('Bottom Bar Background Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_bottom_bar_bg" id="style_bottom_bar_bg" class="color-field" data-default-color="#262a35" value="<?php echo esc_attr( get_option('rypecore_style_bottom_bar_bg', '#262a35') ); ?>" />
                                </div>

                                <div class="admin-module">
                                    <label for="style_bottom_bar_text"><?php echo esc_html_e('Bottom Bar Text Color', 'rypecore'); ?></label><br/>
                                    <input type="text" name="rypecore_style_bottom_bar_text" id="style_bottom_bar_text" class="color-field" data-default-color="#8e95ac" value="<?php echo esc_attr( get_option('rypecore_style_bottom_bar_text', '#8e95ac') ); ?>" />
                                </div>
                            </div>
                        </div>

                    </div><!-- end styling -->

                    <div id="currency" class="tab-content">
                        <h2><?php echo esc_html_e('Currency & Numbers', 'rypecore'); ?></h2>

                        <?php
                        $currency_symbol_default = '$';
                        $currency_symbol_position_default = 'before';
                        $thousand_separator_default = ',';
                        $decimal_separator_default = '.';
                        $num_decimal_default = '0';
                        ?>

                        <div class="admin-module">
                            <label for="currency_symbol"><?php echo esc_html_e('Currency Symbol', 'rypecore'); ?></label><br/>
                            <input type="text" id="currency_symbol" name="rypecore_currency_symbol" value="<?php echo esc_attr( get_option('rypecore_currency_symbol', $currency_symbol_default) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label for="currency_symbol_position"><?php echo esc_html_e('Currency Symbol Position', 'rypecore'); ?></label><br/>
                            <input type="radio" id="currency_symbol_position" name="rypecore_currency_symbol_position" value="before" <?php if(esc_attr( get_option('rypecore_currency_symbol_position', $currency_symbol_position_default)) == 'before') { echo 'checked'; } ?> /><?php echo esc_html_e('Display before price', 'homely'); ?><br/>
                            <input type="radio" id="currency_symbol_position" name="rypecore_currency_symbol_position" value="after" <?php if(esc_attr( get_option('rypecore_currency_symbol_position', $currency_symbol_position_default)) == 'after') { echo 'checked'; } ?> /><?php echo esc_html_e('Display after price', 'homely'); ?><br/>
                        </div>

                        <div class="admin-module">
                            <label for="thousand_separator"><?php echo esc_html_e('Thousand Separator', 'rypecore'); ?></label><br/>
                            <input type="text" id="thousand_separator" name="rypecore_thousand_separator" value="<?php echo esc_attr( get_option('rypecore_thousand_separator', $thousand_separator_default) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label for="decimal_separator"><?php echo esc_html_e('Decimal Separator', 'rypecore'); ?></label><br/>
                            <input type="text" id="decimal_separator" name="rypecore_decimal_separator" value="<?php echo esc_attr( get_option('rypecore_decimal_separator', $decimal_separator_default) ); ?>" />
                        </div>

                        <div class="admin-module">
                            <label for="num_decimal"><?php echo esc_html_e('Number of Decimals', 'rypecore'); ?></label><br/>
                            <input type="number" min="0" max="5" id="num_decimal" name="rypecore_num_decimal" value="<?php echo esc_attr( get_option('rypecore_num_decimal', $num_decimal_default) ); ?>" />
                        </div>
                    </div>

                    <?php do_action( 'rao_after_theme_option_content'); ?>

                </td>
            </tr>
        </table>
    </div>
    
    <?php submit_button(); ?>
    <div class="loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /></div>
    <div class="save-result" id="save-result"><?php echo esc_html_e('Settings Saved Successfully', 'rypecore'); ?></div>

</form>
</div>

<?php } ?>
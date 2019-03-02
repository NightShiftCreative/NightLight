<?php

// create settings menu
add_action('admin_menu', 'ns_core_theme_options_create_menu');
function ns_core_theme_options_create_menu() {

    //create new top-level menu
    add_theme_page('Theme Options', 'Theme Options', 'administrator', 'theme_options', 'ns_core_theme_options_page' , null, 99 );

    //call register settings function
    add_action( 'admin_init', 'ns_core_register_theme_options' );
}

function ns_core_register_theme_options() {

    //register general settings
    register_setting( 'ns-core-settings-group', 'ns_core_site_width' );
    register_setting( 'ns-core-settings-group', 'ns_core_global_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_global_bg_display' );
    register_setting( 'ns-core-settings-group', 'ns_core_icon_set' );
    register_setting( 'ns-core-settings-group', 'ns_core_rtl' );
    register_setting( 'ns-core-settings-group', 'ns_core_preloader' );
    register_setting( 'ns-core-settings-group', 'ns_core_preloader_img' );
    register_setting( 'ns-core-settings-group', 'ns_core_heading_font' );
    register_setting( 'ns-core-settings-group', 'ns_core_body_font' );

    //register contact & social
    register_setting( 'ns-core-settings-group', 'ns_core_phone' );
    register_setting( 'ns-core-settings-group', 'ns_core_email' );
    register_setting( 'ns-core-settings-group', 'ns_core_address' );
    register_setting( 'ns-core-settings-group', 'ns_core_fb' );
    register_setting( 'ns-core-settings-group', 'ns_core_twitter' );
    register_setting( 'ns-core-settings-group', 'ns_core_google' );
    register_setting( 'ns-core-settings-group', 'ns_core_linkedin' );
    register_setting( 'ns-core-settings-group', 'ns_core_youtube' );
    register_setting( 'ns-core-settings-group', 'ns_core_vimeo' );
    register_setting( 'ns-core-settings-group', 'ns_core_instagram' );
    register_setting( 'ns-core-settings-group', 'ns_core_flickr' );
    register_setting( 'ns-core-settings-group', 'ns_core_dribbble' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_details_display' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_title' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_before' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_after' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_source' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_success' );
    register_setting( 'ns-core-settings-group', 'ns_core_contact_form_id' );

    //register header settings
    register_setting( 'ns-core-settings-group', 'ns_core_display_topbar' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_first_field' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_first_field_custom' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_second_field' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_second_field_custom' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_third_field' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_third_field_custom' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_fourth_field' );
    register_setting( 'ns-core-settings-group', 'ns_core_topbar_fourth_field_custom' );
    register_setting( 'ns-core-settings-group', 'ns_core_members_display_avatar' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_style' );
    register_setting( 'ns-core-settings-group', 'ns_core_sticky_header' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_container' );
    register_setting( 'ns-core-settings-group', 'ns_core_logo' );
    register_setting( 'ns-core-settings-group', 'ns_core_logo_transparent' );
    register_setting( 'ns-core-settings-group', 'ns_core_favicon' );
    register_setting( 'ns-core-settings-group', 'ns_core_above_phone_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_above_email_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_display_header_search' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_menu_align' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_menu_parent_links' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_menu_button_page' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_menu_button_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_header_bg_display' );

    //register page banner settings
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_bg_display' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_title_align' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_padding_top' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_padding_bottom' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_overlay_display' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_overlay_opacity' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_overlay_color' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_display_breadcrumb' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_display_search' );
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_slider_transition' ); 
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_slider_duration' ); 
    register_setting( 'ns-core-settings-group', 'ns_core_page_banner_slider_auto_start' ); 
    register_setting( 'ns-core-settings-group', 'ns_core_page_sidebar_size' );  

    //register member settings
    register_setting( 'ns-core-settings-group', 'ns_core_members_display_name' );
    register_setting( 'ns-core-settings-group', 'ns_core_members_login_page' );
    register_setting( 'ns-core-settings-group', 'ns_core_members_register_page' ); 
    register_setting( 'ns-core-settings-group', 'ns_core_members_dashboard_page' );
    register_setting( 'ns-core-settings-group', 'ns_core_members_edit_profile_page' );
    register_setting( 'ns-core-settings-group', 'ns_core_members_favorites_page' );

    //register footer settings
    register_setting( 'ns-core-settings-group', 'ns_core_hide_footer_widget_area' );
    register_setting( 'ns-core-settings-group', 'ns_core_num_footer_cols' );
    register_setting( 'ns-core-settings-group', 'ns_core_footer_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_footer_bg_display' );
    register_setting( 'ns-core-settings-group', 'ns_core_display_bottombar' );
    register_setting( 'ns-core-settings-group', 'ns_core_bottom_bar_text' );

    //register style settings
    register_setting( 'ns-core-settings-group', 'ns_core_style_global_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_global_main' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_global_comp' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_top_bar_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_top_bar_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_top_bar_social' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_header_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_header_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_header_icon' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_header_menu' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_page_banner_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_page_banner_title' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_footer_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_footer_header' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_footer_text' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_footer_link' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_bottom_bar_bg' );
    register_setting( 'ns-core-settings-group', 'ns_core_style_bottom_bar_text' );

    //register add-on settings
    do_action('ns_core_theme_option_register_settings');
}

function ns_core_theme_options_page() {
?>

<div class="wrap ns-theme-options">
<h2><?php esc_html_e('Theme Options', 'ns-core') ?></h2>
<br/>

<?php 
    $sitelink = 'https://nightshiftcreative.co/';
    $siteSupportLink = 'https://studio.nightshiftcreative.co/support-package/'; 
?>

<form method="post" action="options.php" id="theme-options-form">

    <table class="theme-options-header" cellspacing="0" cellpadding="0">
        <tr>
        <td class="theme-options-logo">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/logo.svg" alt="" />
        </td>
        <td>
            <div class="created-by">
                <a href="<?php echo esc_url($sitelink); ?>" target="_blank"><?php echo esc_html_e('Made by', 'ns-core'); ?> NightShift Creative</a> 
                | <a href="<?php echo esc_url($siteSupportLink); ?>" target="_blank"><?php echo esc_html_e('Support', 'ns-core'); ?></a>
                <?php
                $my_theme = wp_get_theme();
                echo ' | ';
                echo esc_html_e('Version ', 'ns-core') . $my_theme->get( 'Version' );
                ?>
            </div>
            <div class="theme-version">
                <?php submit_button( __( 'Save Changes', 'ns-core' ), 'primary', 'submit_top' ); ?>
                <div class="loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /></div>
                <div class="save-result" id="save-result"><?php echo esc_html_e('Settings Saved Successfully', 'ns-core'); ?></div>
            </div>
        </td>
        </tr>
    </table>

    <?php settings_errors(); ?>

    <?php settings_fields( 'ns-core-settings-group' ); ?>
    <?php do_settings_sections( 'ns-core-settings-group' ); ?>

    <?php
        //load default theme option values
        include('theme-options-loader.php');
        $theme_options = ns_core_load_theme_options();
        $bottom_bar_text_default = get_bloginfo('title').' | Theme by <a href="'.$sitelink.'" target="_blank">NightShift Creative</a> | &copy; '. date('Y');
    ?>

    <div class="ns-tabs">
        <table class="theme-options-content" cellspacing="0" cellpadding="0">
            <tr>

                <td class="theme-options-nav-container" valign="top">
                    <ul class="ns-tabs-nav">
                        <li><a href="#general" title="<?php echo esc_html_e('General', 'ns-core'); ?>"><i class="fa fa-globe"></i> <span class="ns-tab-text"><?php echo esc_html_e('General', 'ns-core'); ?></span></a></li>
                        <li><a href="#contact" title="<?php echo esc_html_e('Contact & Social', 'ns-core'); ?>"><i class="fa fa-comment"></i> <span class="ns-tab-text"><?php echo esc_html_e('Contact & Social', 'ns-core'); ?></span></a></li>
                        <li><a href="#header" title="<?php echo esc_html_e('Header', 'ns-core'); ?>"><i class="fa fa-columns"></i> <span class="ns-tab-text"><?php echo esc_html_e('Header', 'ns-core'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#page-banner" title="<?php echo esc_html_e('Page Banners & Sidebars', 'ns-core'); ?>"><i class="fa fa-copy"></i> <span class="ns-tab-text"><?php echo esc_html_e('Page Banners & Sidebars', 'ns-core'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#members" title="<?php echo esc_html_e('Members', 'ns-core'); ?>"><i class="fa fa-key"></i> <span class="ns-tab-text"><?php echo esc_html_e('Members', 'ns-core'); ?></span></a></li>
                        <li><a href="#footer" title="<?php echo esc_html_e('Footer', 'ns-core'); ?>"><i class="fas fa-columns fa-rotate-180"></i> <span class="ns-tab-text"><?php echo esc_html_e('Footer', 'ns-core'); ?></span><div class="clear"></div></a></li>
                        <li><a href="#styling" title="<?php echo esc_html_e('Styling', 'ns-core'); ?>"><i class="fa fa-tint"></i> <span class="ns-tab-text"><?php echo esc_html_e('Styling', 'ns-core'); ?></span></a></li>
                        <?php do_action('ns_core_after_theme_option_menu'); ?>
                    </ul>
                </td>

                <td class="ns-tabs-content theme-options-tab-container" valign="top">

                    <div class="tab-loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /> <?php esc_html_e('Loading...', 'ns-core'); ?></div>

                    <div id="general" class="tab-content">
                        <h2><?php echo esc_html_e('General', 'ns-core'); ?></h2>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Site Width', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('Set the site width within the range of 700 - 1200px. The default value is 1170px.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <input type="number" min="700" max="1200" id="site_width" name="ns_core_site_width" value="<?php echo $theme_options['ns_core_site_width']; ?>" />
                                    <?php echo esc_html_e('Pixels', 'ns-core'); ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Global Background Image', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="text" id="global_bg" name="ns_core_global_bg" value="<?php echo $theme_options['ns_core_global_bg']; ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Global Background Display', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_global_bg_display">
                                        <option value="cover" <?php if($theme_options['ns_core_global_bg_display'] == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if($theme_options['ns_core_global_bg_display'] == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if($theme_options['ns_core_global_bg_display'] == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Icon Style', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_icon_set">
                                        <option value="fa" <?php if($theme_options['ns_core_icon_set'] == 'fa') { echo 'selected'; } ?>><?php echo esc_html_e('Font Awesome', 'ns-core'); ?></option>
                                        <option value="line" <?php if($theme_options['ns_core_icon_set'] == 'line') { echo 'selected'; } ?>><?php echo esc_html_e('Line Icons', 'ns-core'); ?></option>
                                        <option value="dripicon" <?php if($theme_options['ns_core_icon_set'] == 'dripicon') { echo 'selected'; } ?>><?php echo esc_html_e('Dripicons', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Enable RTL(Right to Left) layout', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_rtl'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_rtl" value="true" class="toggle-switch-checkbox" id="rtl" <?php checked('true', $theme_options['ns_core_rtl'], true) ?>>
                                        <label class="toggle-switch-label" for="rtl"><?php if($theme_options['ns_core_rtl'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Enable Preloader', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_preloader'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_preloader" value="true" class="toggle-switch-checkbox" id="preloader" <?php checked('true', $theme_options['ns_core_preloader'], true) ?>>
                                        <label class="toggle-switch-label" for="preloader"><?php if($theme_options['ns_core_preloader'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Preloader Custom Image', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="text" id="preloader_img" name="ns_core_preloader_img" value="<?php echo $theme_options['ns_core_preloader_img']; ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                </td>
                            </tr>
                        </table>

                        <br/><br/>
                        <div class="admin-module-fonts">
                            <h3>
                                <?php echo esc_html_e('Font Settings', 'ns-core'); ?>
                                <?php $default_font = $theme_options['ns_core_default_font']; ?>
                                <p class="admin-module-note" style="margin-bottom:0;"><?php esc_html_e('All fonts are generated from', 'ns-core'); ?> <a href="https://fonts.google.com/" target="_blank"><?php esc_html_e('Google Fonts', 'ns-core'); ?></a></p>
                                <?php if($theme_options['ns_core_heading_font'] != $default_font || $theme_options['ns_core_body_font'] != $default_font) { ?>
                                <a href="#" class="admin-module-note reset-fonts">
                                    <span class="hide"><?php echo $default_font; ?></span>
                                    <?php esc_html_e('Reset to default fonts', 'ns-core'); ?>
                                </a>
                                <?php } ?>
                            </h3>

                            <?php
                                $google_fonts = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAieN5h5Kk6EzbJMGCuI-vBsE4rGFPMsSw';
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

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label><?php esc_html_e('Heading Font Face', 'ns-core'); ?></label></td>
                                    <td class="admin-module-field">
                                        <select name="ns_core_heading_font">
                                        <option value=""><?php esc_html_e('Choose a font...', 'ns-core'); ?></option>
                                        <?php
                                            foreach ($items as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item['family']; ?>" <?php if($theme_options['ns_core_heading_font'] == $item['family']) { echo 'selected'; } ?>><?php echo $item['family']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label><?php esc_html_e('Body Font Face', 'ns-core'); ?></label></td>
                                    <td class="admin-module-field">
                                        <select name="ns_core_body_font">
                                        <option value=""><?php esc_html_e('Choose a font...', 'ns-core'); ?></option>
                                        <?php
                                            foreach ($items as $item) {
                                                $i++; ?>
                                                <option value="<?php echo $item['family']; ?>" <?php if($theme_options['ns_core_body_font'] == $item['family']) { echo 'selected'; } ?>><?php echo $item['family']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <?php do_action('ns_core_after_general_theme_options'); ?>

                    </div><!-- end general -->

                    <div id="contact" class="tab-content">
                        <h2><?php echo esc_html_e('Global Contact Details', 'ns-core'); ?></h2>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Phone', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" id="phone" name="ns_core_phone" value="<?php echo esc_attr( get_option('ns_core_phone') ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Email', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" id="email" name="ns_core_email" value="<?php echo esc_attr( get_option('ns_core_email') ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Address', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" name="ns_core_address" value="<?php echo esc_attr( get_option('ns_core_address') ); ?>" /></td>
                            </tr>
                        </table>

                        <br/><h3><?php echo esc_html_e('Social Media', 'ns-core'); ?></h3>
                        <div class="social-media-profiles">

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Facebook</label></td>
                                    <td class="admin-module-field"><input type="text" id="fb" name="ns_core_fb" value="<?php echo esc_attr( get_option('ns_core_fb') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Twitter</label></td>
                                    <td class="admin-module-field"><input type="text" id="twitter" name="ns_core_twitter" value="<?php echo esc_attr( get_option('ns_core_twitter') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Google Plus</label></td>
                                    <td class="admin-module-field"><input type="text" id="google" name="ns_core_google" value="<?php echo esc_attr( get_option('ns_core_google') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>LinkedIn</label></td>
                                    <td class="admin-module-field"><input type="text" id="linkedin" name="ns_core_linkedin" value="<?php echo esc_attr( get_option('ns_core_linkedin') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Youtube</label></td>
                                    <td class="admin-module-field"><input type="text" id="youtube" name="ns_core_youtube" value="<?php echo esc_attr( get_option('ns_core_youtube') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Vimeo</label></td>
                                    <td class="admin-module-field"><input type="text" id="vimeo" name="ns_core_vimeo" value="<?php echo esc_attr( get_option('ns_core_vimeo') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Instagram</label></td>
                                    <td class="admin-module-field"><input type="text" id="instagram" name="ns_core_instagram" value="<?php echo esc_attr( get_option('ns_core_instagram') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Flickr</label></td>
                                    <td class="admin-module-field"><input type="text" id="flickr" name="ns_core_flickr" value="<?php echo esc_attr( get_option('ns_core_flickr') ); ?>" /></td>
                                </tr>
                            </table>

                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label>Dribbble</label></td>
                                    <td class="admin-module-field"><input type="text" id="dribbble" name="ns_core_dribbble" value="<?php echo esc_attr( get_option('ns_core_dribbble') ); ?>" /></td>
                                </tr>
                            </table>
                        </div><!-- end social media profiles -->

                        <br/><h3><?php echo esc_html_e('Contact Page', 'ns-core'); ?></h3>
                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="contact_details_display"><?php echo esc_html_e('Display Contact Details Section', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_contact_details_display', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_contact_details_display" value="true" class="toggle-switch-checkbox" id="contact_details_display" <?php checked('true', get_option('ns_core_contact_details_display', 'true'), true) ?>>
                                        <label class="toggle-switch-label" for="contact_details_display"><?php if(get_option('ns_core_contact_details_display', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="contact_form_title"><?php echo esc_html_e('Contact Form Title', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" id="contact_form_title" name="ns_core_contact_form_title" value="<?php echo esc_attr( get_option('ns_core_contact_form_title', 'Quick Contact') ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="contact_form_before"><?php echo esc_html_e('Text Before Form', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><textarea id="contact_form_before" name="ns_core_contact_form_before"><?php echo esc_attr( get_option('ns_core_contact_form_before') ); ?></textarea></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="contact_form_after"><?php echo esc_html_e('Text After Form', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><textarea id="contact_form_after" name="ns_core_contact_form_after"><?php echo esc_attr( get_option('ns_core_contact_form_after') ); ?></textarea></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="contact_form_success"><?php echo esc_html_e('Contact Form Success Message', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" id="contact_form_success" name="ns_core_contact_form_success" value="<?php echo esc_attr( get_option('ns_core_contact_form_success', esc_html__('Thanks! Your email has been delivered!', 'ns-core')) ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module no-border">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Contact Form Source', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <?php $contact_form_source = get_option('ns_core_contact_form_source', 'default'); ?>
                                    <input type="radio" id="contact_form_source_default" name="ns_core_contact_form_source" value="default" <?php checked('default', $contact_form_source, true) ?> /> 
                                    <label class="contact-form-source-label" for="contact_form_source_default"><?php echo esc_html_e('Default Contact Form', 'ns-core'); ?></label>
                                    <input type="radio" id="contact_form_source_contact_7" name="ns_core_contact_form_source" value="contact-form-7" <?php checked('contact-form-7', $contact_form_source, true) ?> /> 
                                    <label for="contact_form_source_contact_7"><?php echo esc_html_e('Contact Form 7 Plugin', 'ns-core'); ?></label>
                                
                                    <div class="admin-module no-border admin-module-contact-form-default hide-soft <?php if($contact_form_source == 'default') { echo 'show'; } ?>">
                                        <?php if(!function_exists('ns_basics_template_loader')) { 
                                            echo '<i>You need to install and/or activate the required bundled plugin: <b>NightShift Basics</b></i>'; 
                                        } ?>
                                    </div>

                                    <div class="admin-module no-border admin-module-contact-form-id hide-soft <?php if($contact_form_source == 'contact-form-7') { echo 'show'; } ?>">
                                        <?php 
                                        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                                        if( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) { ?>
                                            <label for="contact_form_id"><?php echo esc_html_e('Contact From 7 ID', 'ns-core'); ?></label><br/>
                                            <input type="number" min="0" name="ns_core_contact_form_id" value="<?php echo esc_attr( get_option('ns_core_contact_form_id') ); ?>" />
                                            <span class="admin-module-note"><?php echo esc_html_e('Provide the ID of the contact form you would like displayed', 'ns-core'); ?></span>
                                        <?php } else {
                                            echo '<i>You need to install and/or activate the <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">Contact Form 7</a> plugin.</i>';
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <?php do_action('ns_core_after_contact_theme_options'); ?>

                    </div><!-- end contact and social -->

                    <div id="header" class="tab-content">
                        <h2><?php echo esc_html_e('Header', 'ns-core'); ?></h2>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right"></i> <?php echo esc_html_e('Top Bar Options', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Display top bar', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">                             
                                            <div class="toggle-switch" title="<?php if(get_option('ns_core_display_topbar', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                                <input type="checkbox" name="ns_core_display_topbar" value="true" class="toggle-switch-checkbox" id="display_topbar" <?php checked('true', get_option('ns_core_display_topbar', 'true'), true) ?>>
                                                <label class="toggle-switch-label" for="display_topbar"><?php if(get_option('ns_core_display_topbar', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar First Field', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <?php $topbar_first_field = get_option('ns_core_topbar_first_field', 'email'); ?>
                                            <select name="ns_core_topbar_first_field" class="top-bar-field-select">
                                                <option value="email" <?php if(esc_attr($topbar_first_field) == 'email') { echo 'selected'; } ?>>Email</option>
                                                <option value="phone" <?php if(esc_attr($topbar_first_field) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                                <option value="social" <?php if(esc_attr($topbar_first_field) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                                <option value="member" <?php if(esc_attr($topbar_first_field) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                                <option value="custom" <?php if(esc_attr($topbar_first_field) == 'custom') { echo 'selected'; } ?>>Custom</option>
                                                <option value="" <?php if(esc_attr($topbar_first_field) == '') { echo 'selected'; } ?>>None</option>
                                            </select>
                                            <div class="top-bar-custom <?php if($topbar_first_field != 'custom') { echo 'hide-soft'; } ?>">
                                                <label><?php echo esc_html_e('Custom Content', 'ns-core'); ?></label>
                                                <textarea class="" name="ns_core_topbar_first_field_custom"><?php echo get_option('ns_core_topbar_first_field_custom'); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Second Field', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <?php $topbar_second_field = get_option('ns_core_topbar_second_field', 'phone'); ?>
                                            <select name="ns_core_topbar_second_field" class="top-bar-field-select">
                                                <option value="email" <?php if(esc_attr($topbar_second_field) == 'email') { echo 'selected'; } ?>>Email</option>
                                                <option value="phone" <?php if(esc_attr($topbar_second_field) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                                <option value="social" <?php if(esc_attr($topbar_second_field) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                                <option value="member" <?php if(esc_attr($topbar_second_field) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                                <option value="custom" <?php if(esc_attr($topbar_second_field) == 'custom') { echo 'selected'; } ?>>Custom</option>
                                                <option value="" <?php if(esc_attr($topbar_second_field) == '') { echo 'selected'; } ?>>None</option>
                                            </select>
                                            <div class="top-bar-custom <?php if($topbar_second_field != 'custom') { echo 'hide-soft'; } ?>">
                                                <label><?php echo esc_html_e('Custom Content', 'ns-core'); ?></label>
                                                <textarea class="" name="ns_core_topbar_second_field_custom"><?php echo get_option('ns_core_topbar_second_field_custom'); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Third Field', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <?php $topbar_third_field = get_option('ns_core_topbar_third_field', 'social'); ?>
                                            <select name="ns_core_topbar_third_field" class="top-bar-field-select">
                                                <option value="email" <?php if(esc_attr($topbar_third_field) == 'email') { echo 'selected'; } ?>>Email</option>
                                                <option value="phone" <?php if(esc_attr($topbar_third_field) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                                <option value="social" <?php if(esc_attr($topbar_third_field) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                                <option value="member" <?php if(esc_attr($topbar_third_field) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                                <option value="custom" <?php if(esc_attr($topbar_third_field) == 'custom') { echo 'selected'; } ?>>Custom</option>
                                                <option value="" <?php if(esc_attr($topbar_third_field) == '') { echo 'selected'; } ?>>None</option>
                                            </select>
                                            <div class="top-bar-custom <?php if($topbar_third_field != 'custom') { echo 'hide-soft'; } ?>">
                                                <label><?php echo esc_html_e('Custom Content', 'ns-core'); ?></label>
                                                <textarea class="" name="ns_core_topbar_third_field_custom"><?php echo get_option('ns_core_topbar_third_field_custom'); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Fourth Field', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <?php $topbar_fourth_field = get_option('ns_core_topbar_fourth_field', 'member'); ?>
                                            <select name="ns_core_topbar_fourth_field" class="top-bar-field-select">
                                                <option value="email" <?php if(esc_attr($topbar_fourth_field) == 'email') { echo 'selected'; } ?>>Email</option>
                                                <option value="phone" <?php if(esc_attr($topbar_fourth_field) == 'phone') { echo 'selected'; } ?>>Phone</option>
                                                <option value="social" <?php if(esc_attr($topbar_fourth_field) == 'social') { echo 'selected'; } ?>>Social Links</option>
                                                <option value="member" <?php if(esc_attr($topbar_fourth_field) == 'member') { echo 'selected'; } ?>>Member Actions</option>
                                                <option value="custom" <?php if(esc_attr($topbar_third_field) == 'custom') { echo 'selected'; } ?>>Custom</option>
                                                <option value="" <?php if(esc_attr($topbar_fourth_field) == '') { echo 'selected'; } ?>>None</option>
                                            </select>
                                            <div class="top-bar-custom <?php if($topbar_fourth_field != 'custom') { echo 'hide-soft'; } ?>">
                                                <label><?php echo esc_html_e('Custom Content', 'ns-core'); ?></label>
                                                <textarea class="" name="ns_core_topbar_fourth_field_custom"><?php echo get_option('ns_core_topbar_fourth_field_custom'); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php esc_html_e('Display member avatar in header?', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <div class="toggle-switch" title="<?php if(get_option('ns_core_members_display_avatar', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                                <input type="checkbox" name="ns_core_members_display_avatar" value="true" class="toggle-switch-checkbox" id="members_display_avatar" <?php checked('true', get_option('ns_core_members_display_avatar', 'true'), true) ?>>
                                                <label class="toggle-switch-label" for="members_display_avatar"><?php if(get_option('ns_core_members_display_avatar', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div><!-- end topbar options -->

                        <div class="admin-module admin-module-header-style no-border">
                            <label style="font-weight:700;"><?php echo esc_html_e('Select a header style', 'ns-core'); ?></label><br/>
                            <?php $header_style = get_option('ns_core_header_style', 'transparent'); ?>
                            <label class="selectable-item <?php if($header_style == 'default') { echo 'active'; } ?>" for="header_style_default">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/default-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_default" name="ns_core_header_style" value="default" <?php checked('default', $header_style, true) ?> />
                                <?php echo esc_html_e('Menu Bar Header', 'ns-core'); ?>
                            </label>
                            <label class="selectable-item <?php if($header_style == 'classic') { echo 'active'; } ?>" for="header_style_classic">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/classic-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_classic" name="ns_core_header_style" value="classic" <?php checked('classic', $header_style, true) ?> /><?php echo esc_html_e('Classic Header', 'ns-core'); ?><br/>
                            </label>
                            <label class="selectable-item <?php if($header_style == 'transparent') { echo 'active'; } ?>" for="header_style_transparent">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/admin/images/transparent-header.png" alt="" /><br/>
                                <input type="radio" id="header_style_transparent" name="ns_core_header_style" value="transparent" <?php checked('transparent', $header_style, true) ?> /><?php echo esc_html_e('Transparent Header', 'ns-core'); ?><br/>
                            </label>
                        </div>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Enable sticky header', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_sticky_header', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_sticky_header" value="true" class="toggle-switch-checkbox" id="sticky_header" <?php checked('true', get_option('ns_core_sticky_header', 'true'), true) ?>>
                                        <label class="toggle-switch-label" for="sticky_header"><?php if(get_option('ns_core_sticky_header', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Enable header container', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_header_container', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_header_container" value="true" class="toggle-switch-checkbox" id="header_container" <?php checked('true', get_option('ns_core_header_container', 'true'), true) ?>>
                                        <label class="toggle-switch-label" for="header_container"><?php if(get_option('ns_core_header_container', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Logo', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('Recommended size: 172 x 50 pixels.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <?php $default_logo = esc_url( get_template_directory_uri() ).'/images/logo-dark.png'; ?>
                                    <input type="text" id="logo" name="ns_core_logo" value="<?php echo esc_attr( get_option('ns_core_logo', $default_logo) ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                    <?php $logo = get_option('ns_core_logo', $default_logo); ?>
                                    <?php if(!empty($logo)) { ?><div class="option-preview logo-preview"><img src="<?php echo esc_attr( get_option('ns_core_logo', $default_logo) ); ?>" alt="" /></div><?php } ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Logo Transparent', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('This logo will be used if the transparent header is activated. Recommended size: 172 x 50 pixels.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <?php $default_logo_transparent = esc_url( get_template_directory_uri() ).'/images/logo.png'; ?>
                                    <input type="text" id="logo_transparent" name="ns_core_logo_transparent" value="<?php echo esc_attr( get_option('ns_core_logo_transparent', $default_logo_transparent) ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                    <?php $logo_transparent = get_option('ns_core_logo_transparent', $default_logo_transparent); ?>
                                    <?php if(!empty($logo_transparent)) { ?><div class="option-preview logo-preview"><img src="<?php echo esc_attr( get_option('ns_core_logo_transparent', $default_logo_transparent) ); ?>" alt="" /></div><?php } ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Favicon', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('A favicon, also known as a shortcut icon, website icon, tab icon, URL icon or bookmark icon, is a file named favicon.ico and 
                                    containing one or more small icons, most commonly 16x16 pixels.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <input type="text" id="favicon" name="ns_core_favicon" value="<?php echo esc_attr( get_option('ns_core_favicon') ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                    <?php $favicon = get_option('ns_core_favicon'); ?>
                                    <?php if(!empty($favicon)) { ?><div class="option-preview favicon-preview"><img src="<?php echo esc_attr( get_option('ns_core_favicon') ); ?>" alt="" /></div><?php } ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Above Phone Text', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('*Only for default header style', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field"><input type="text" id="above_phone_text" name="ns_core_above_phone_text" value="<?php echo esc_attr( get_option('ns_core_above_phone_text', esc_html__('Call us anytime', 'ns-core')) ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                     <label><?php echo esc_html_e('Above Email Text', 'ns_core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('*Only for default header style', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field"><input type="text" id="above_email_text" name="ns_core_above_email_text" value="<?php echo esc_attr( get_option('ns_core_above_email_text', esc_html__('Drop us a line', 'ns-core')) ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Header Search Form', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_display_header_search', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_display_header_search" value="true" class="toggle-switch-checkbox" id="display_header_search" <?php checked('true', get_option('ns_core_display_header_search', 'true'), true) ?>>
                                        <label class="toggle-switch-label" for="display_header_search"><?php if(get_option('ns_core_display_header_search', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Menu Alignment', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <?php $header_menu_align = get_option('ns_core_header_menu_align', 'right'); ?>
                                    <select name="ns_core_header_menu_align">
                                        <option value="right" <?php if(esc_attr($header_menu_align) == 'right') { echo 'selected'; } ?>>Right</option>
                                        <option value="left" <?php if(esc_attr($header_menu_align) == 'left') { echo 'selected'; } ?>>Left</option>
                                        <option value="center" <?php if(esc_attr($header_menu_align) == 'center') { echo 'selected'; } ?>>Center</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Menu Parent Link Behavior', 'ns-core'); ?></label>
                                    <span class="admin-module-note"><?php echo esc_html_e('Decide how links with sub-menus should be behave when clicked', 'ns-core'); ?></span>
                                </td>
                                <td class="admin-module-field">
                                    <?php $header_menu_parent_links = get_option('ns_core_header_menu_parent_links', 'toggle-submenu'); ?>
                                    <select name="ns_core_header_menu_parent_links">
                                        <option value="toggle-submenu" <?php if(esc_attr($header_menu_parent_links) == 'toggle-submenu') { echo 'selected'; } ?>><?php echo esc_html_e('Toggle Sub-Menu', 'ns-core'); ?></option>
                                        <option value="open-page" <?php if(esc_attr($header_menu_parent_links) == 'open-page') { echo 'selected'; } ?>><?php echo esc_html_e('Go to Page', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <?php $header_menu_button_page = get_option('ns_core_header_menu_button_page'); ?>
                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Menu Call to Action Page', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_header_menu_button_page">
                                        <option value=""><?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                        <?php 
                                        $pages = get_pages(); 
                                        foreach ( $pages as $page ) { ?>
                                                <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr($header_menu_button_page) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                    <?php echo esc_attr($page->post_title); ?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Menu Call to Action Text', 'ns-core'); ?></label></td>
                                <td class="admin-module-field"><input type="text" id="header_menu_button_text" name="ns_core_header_menu_button_text" value="<?php echo esc_attr( get_option('ns_core_header_menu_button_text', esc_html__('Contact Us', 'ns-core')) ); ?>" /></td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Header Background Image', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="text" id="header_bg" name="ns_core_header_bg" value="<?php echo esc_attr( get_option('ns_core_header_bg') ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module no-border">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Header Background Display', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_header_bg_display">
                                        <option value="cover" <?php if(esc_attr(get_option('ns_core_header_bg_display')) == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if(esc_attr(get_option('ns_core_header_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if(esc_attr(get_option('ns_core_header_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <?php do_action('ns_core_after_header_theme_options'); ?>

                    </div><!-- end header -->

                    <div id="page-banner" class="tab-content">
                        <h2><?php echo esc_html_e('Page Banners', 'ns-core'); ?></h2>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Page Banner Background Image', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php echo esc_html_e('Set the global banner background image for all pages/posts. This can be overridden on individual pages/posts.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <input type="text" id="page_banner_bg" name="ns_core_page_banner_bg" value="<?php echo esc_attr( get_option('ns_core_page_banner_bg', esc_url(get_template_directory_uri()).'/images/page-banner-default.jpg' ) ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php echo esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php echo esc_html_e('Remove', 'ns-core'); ?></span>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Page Banner Background Display', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_page_banner_bg_display">
                                        <option value="cover" <?php if(esc_attr(get_option('ns_core_page_banner_bg_display')) == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if(esc_attr(get_option('ns_core_page_banner_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if(esc_attr(get_option('ns_core_page_banner_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Text Alignment', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_page_banner_title_align">
                                        <option value="left" <?php if(esc_attr(get_option('ns_core_page_banner_title_align')) == 'left') { echo 'selected'; } ?>><?php echo esc_html_e('Left', 'ns-core'); ?></option>
                                        <option value="center" <?php if(esc_attr(get_option('ns_core_page_banner_title_align')) == 'center') { echo 'selected'; } ?>><?php echo esc_html_e('Center', 'ns-core'); ?></option>
                                        <option value="right" <?php if(esc_attr(get_option('ns_core_page_banner_title_align')) == 'right') { echo 'selected'; } ?>><?php echo esc_html_e('Right', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Padding Top', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_padding_top" name="ns_core_page_banner_padding_top" value="<?php echo esc_attr( get_option('ns_core_page_banner_padding_top',  '100') ); ?>" />
                                    <?php echo esc_html_e('Pixels', 'ns-core'); ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Padding Bottom', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_padding_bottom" name="ns_core_page_banner_padding_bottom" value="<?php echo esc_attr( get_option('ns_core_page_banner_padding_bottom',  '100') ); ?>" />
                                    <?php echo esc_html_e('Pixels', 'ns-core'); ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Banner Overlay', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_page_banner_overlay_display') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_overlay_display" value="true" class="toggle-switch-checkbox" id="page_banner_overlay_display" <?php checked('true', get_option('ns_core_page_banner_overlay_display'), true) ?>>
                                        <label class="toggle-switch-label" data-settings="banner-overlay-settings" for="page_banner_overlay_display"><?php if(get_option('ns_core_page_banner_overlay_display') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="admin-module no-padding banner-overlay-settings <?php if(get_option('ns_core_page_banner_overlay_display')) { echo 'show'; } else { echo 'hide-soft'; } ?>">
                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label">
                                        <label><?php echo esc_html_e('Banner Overlay Opacity', 'ns-core'); ?></label>
                                        <span class="admin-module-note"><?php echo esc_html_e('Choose an opacity ranging from 0 to 1 (0 is fully transparent).', 'ns-core'); ?></span>
                                    </td>
                                    <td class="admin-module-field">
                                        <input type="number" step="0.01" min="0.00" max="1.00" id="page_banner_overlay_opacity" name="ns_core_page_banner_overlay_opacity" value="<?php echo esc_attr( get_option('ns_core_page_banner_overlay_opacity', '0.25') ); ?>" />
                                    </td>
                                </tr>
                            </table>
                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label><?php echo esc_html_e('Banner Overlay Color', 'ns-core'); ?></label></td>
                                    <td class="admin-module-field">
                                        <input type="text" id="page_banner_overlay_color" name="ns_core_page_banner_overlay_color" class="color-field" data-default-color="#000000" value="<?php echo esc_attr( get_option('ns_core_page_banner_overlay_color', '#000000') ); ?>" />
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Breadcrumb', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_page_banner_display_breadcrumb') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_display_breadcrumb" value="true" class="toggle-switch-checkbox" id="page_banner_display_breadcrumb" <?php checked('true', get_option('ns_core_page_banner_display_breadcrumb'), true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_display_breadcrumb"><?php if(get_option('ns_core_page_banner_display_breadcrumb') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Search Form', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_page_banner_display_search') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_display_search" value="true" class="toggle-switch-checkbox" id="page_banner_display_search" <?php checked('true', get_option('ns_core_page_banner_display_search'), true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_display_search"><?php if(get_option('ns_core_page_banner_display_search') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <br/><h3><?php echo esc_html_e('Sliders', 'ns-core'); ?></h3>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Transition Between Slides', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_page_banner_slider_transition">
                                        <option value="horizontal" <?php if(esc_attr(get_option('ns_core_page_banner_slider_transition', 'horizontal')) == 'horizontal') { echo 'selected'; } ?>><?php echo esc_html_e('Slide', 'ns-core'); ?></option>
                                        <option value="fade" <?php if(esc_attr(get_option('ns_core_page_banner_slider_transition', 'horizontal')) == 'fade') { echo 'selected'; } ?>><?php echo esc_html_e('Fade', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="page_banner_slider_duration"><?php echo esc_html_e('Slide Duration (in ms)', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_slider_duration" name="ns_core_page_banner_slider_duration" value="<?php echo esc_attr( get_option('ns_core_page_banner_slider_duration', '5000') ); ?>" />
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Auto Start Sliders', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_page_banner_slider_auto_start', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_slider_auto_start" value="true" class="toggle-switch-checkbox" id="page_banner_slider_auto_start" <?php checked('true', get_option('ns_core_page_banner_slider_auto_start', 'true'), true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_slider_auto_start"><?php if(get_option('ns_core_page_banner_slider_auto_start', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <br/><h3><?php echo esc_html_e('Page Sidebars', 'ns-core'); ?></h3>

                        <table class="admin-module no-border">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Sidebar Width', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_page_sidebar_size">
                                        <option value="small" <?php if(esc_attr(get_option('ns_core_page_sidebar_size', 'small')) == 'small') { echo 'selected'; } ?>><?php echo esc_html_e('Small', 'ns-core'); ?></option>
                                        <option value="medium" <?php if(esc_attr(get_option('ns_core_page_sidebar_size', 'small')) == 'medium') { echo 'selected'; } ?>><?php echo esc_html_e('Medium', 'ns-core'); ?></option>
                                        <option value="large" <?php if(esc_attr(get_option('ns_core_page_sidebar_size', 'small')) == 'large') { echo 'selected'; } ?>><?php echo esc_html_e('Large', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <?php do_action('ns_core_after_page_banner_theme_options'); ?>
                        
                    </div><!-- end page banner -->

                    <div id="members" class="tab-content">
                        <h2><?php echo esc_html_e('Members', 'ns-core'); ?></h2>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Member Display Name', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_display_name">
                                        <option value="username" <?php if(esc_attr(get_option('ns_core_members_display_name', 'username')) == 'username') { echo 'selected'; } ?>><?php esc_html_e('Username', 'ns-core'); ?></option>
                                        <option value="fname" <?php if(esc_attr(get_option('ns_core_members_display_name', 'username')) == 'fname') { echo 'selected'; } ?>><?php esc_html_e('First Name', 'ns-core'); ?></option>
                                        <option value="flname" <?php if(esc_attr(get_option('ns_core_members_display_name', 'username')) == 'flname') { echo 'selected'; } ?>><?php esc_html_e('First & Last Name', 'ns-core'); ?></option>
                                        <option value="display_name" <?php if(esc_attr(get_option('ns_core_members_display_name', 'username')) == 'display_name') { echo 'selected'; } ?>><?php esc_html_e('Display Name', 'ns-core'); ?></option>
                                        <option value="email" <?php if(esc_attr(get_option('ns_core_members_display_name', 'username')) == 'email') { echo 'selected'; } ?>><?php esc_html_e('Email', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Select Member Login Page', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php esc_html_e('Create a page and assign it the Login template, or insert the Login Form shortcode.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_login_page">
                                        <option value="">
                                        <?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                            <?php 
                                            $pages = get_pages(); 
                                            foreach ( $pages as $page ) { ?>
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('ns_core_members_login_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                <?php echo esc_attr($page->post_title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Select Member Register Page', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php esc_html_e('Create a page and assign it the Register template, or insert the Register Form shortcode.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_register_page">
                                        <option value="">
                                        <?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                            <?php 
                                            $pages = get_pages(); 
                                            foreach ( $pages as $page ) { ?>
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('ns_core_members_register_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                <?php echo esc_attr($page->post_title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Select Member Dashboard Page', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php esc_html_e('Create a page and assign it the Dashboard template, or insert the User Dashboard shortcode.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_dashboard_page">
                                        <option value="">
                                        <?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                            <?php 
                                            $pages = get_pages(); 
                                            foreach ( $pages as $page ) { ?>
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('ns_core_members_dashboard_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                <?php echo esc_attr($page->post_title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Select Member Edit Profile Page', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php esc_html_e('Create a page and assign it the Edit Profile template, or insert the Edit Profile shortcode.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_edit_profile_page">
                                        <option value="">
                                        <?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                            <?php 
                                            $pages = get_pages(); 
                                            foreach ( $pages as $page ) { ?>
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('ns_core_members_edit_profile_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                <?php echo esc_attr($page->post_title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module no-border">
                            <tr>
                                <td class="admin-module-label">
                                    <label><?php echo esc_html_e('Select Member Favorites Page', 'ns-core'); ?></label>
                                    <div class="admin-module-note"><?php esc_html_e('Create a page and assign it the Favorites template, or insert the Favorites shortcode.', 'ns-core'); ?></div>
                                </td>
                                <td class="admin-module-field">
                                    <select name="ns_core_members_favorites_page">
                                        <option value="">
                                        <?php echo esc_attr( esc_html__( 'Select page', 'ns-core' ) ); ?></option> 
                                            <?php 
                                            $pages = get_pages(); 
                                            foreach ( $pages as $page ) { ?>
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if(esc_attr(get_option('ns_core_members_favorites_page')) == get_page_link( $page->ID )) { echo 'selected'; } ?>>
                                                <?php echo esc_attr($page->post_title); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <?php do_action('ns_core_after_member_theme_options'); ?>

                    </div><!-- end members -->

                    <div id="footer" class="tab-content">
                        <h2><?php echo esc_html_e('Footer', 'ns-core'); ?></h2>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Hide Footer Widget Area', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if(get_option('ns_core_hide_footer_widget_area') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_hide_footer_widget_area" value="true" class="toggle-switch-checkbox" id="hide_footer_widget_area" <?php checked('true', get_option('ns_core_hide_footer_widget_area'), true) ?>>
                                        <label class="toggle-switch-label" for="hide_footer_widget_area"><?php if(get_option('ns_core_hide_footer_widget_area') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Number of footer columns', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_num_footer_cols">
                                        <option value="1" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '1') { echo 'selected'; } ?>>1</option>
                                        <option value="2" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '2') { echo 'selected'; } ?>>2</option>
                                        <option value="3" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '3') { echo 'selected'; } ?>>3</option>
                                        <option value="4" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '4') { echo 'selected'; } ?>>4</option>
                                        <option value="5" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '5') { echo 'selected'; } ?>>5</option>
                                        <option value="6" <?php if(esc_attr(get_option('ns_core_num_footer_cols', '4')) == '6') { echo 'selected'; } ?>>6</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Footer Background Image', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="text" id="footer_bg" name="ns_core_footer_bg" value="<?php echo esc_attr( get_option('ns_core_footer_bg') ); ?>" />
                                    <input id="_btn" class="ns_upload_image_button" type="button" value="<?php esc_html_e('Upload Image', 'ns-core'); ?>" />
                                    <span class="button-secondary remove"><?php esc_html_e('Remove', 'ns-core'); ?></span>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Footer Background Display', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_footer_bg_display">
                                        <option value="cover" <?php if(esc_attr(get_option('ns_core_footer_bg_display')) == 'cover') { echo 'selected'; } ?>><?php esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if(esc_attr(get_option('ns_core_footer_bg_display')) == 'fixed') { echo 'selected'; } ?>><?php esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if(esc_attr(get_option('ns_core_footer_bg_display')) == 'repeat') { echo 'selected'; } ?>><?php esc_html_e('Tiled', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Bottom Bar', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">
                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Display Bottom Bar', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <div class="toggle-switch" title="<?php if(get_option('ns_core_display_bottombar', 'true') == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                                <input type="checkbox" name="ns_core_display_bottombar" value="true" class="toggle-switch-checkbox" id="display_bottombar" <?php checked('true', get_option('ns_core_display_bottombar', 'true'), true) ?>>
                                                <label class="toggle-switch-label" for="display_bottombar"><?php if(get_option('ns_core_display_bottombar', 'true') == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Text', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <textarea id="bottom_bar_text" name="ns_core_bottom_bar_text"><?php echo esc_attr( get_option('ns_core_bottom_bar_text', $bottom_bar_text_default) ); ?></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <?php do_action('ns_core_after_footer_theme_options'); ?>

                    </div><!-- end footer -->

                    <div id="styling" class="tab-content">
                        <h3><?php echo esc_html_e('Styling', 'ns-core'); ?></h3>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Global Styles', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_bg" id="style_global_bg" class="color-field" data-default-color="#f5f8fa" value="<?php echo esc_attr( get_option('ns_core_style_global_bg', '#f5f8fa') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Main Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_main" id="style_global_main" class="color-field" data-default-color="#04d2c8" value="<?php echo esc_attr( get_option('ns_core_style_global_main', '#04d2c8') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Complementary Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_comp" id="style_global_comp" class="color-field" data-default-color="#ff9900" value="<?php echo esc_attr( get_option('ns_core_style_global_comp', '#ff9900') ); ?>" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Top Bar Styles', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_bg" id="style_top_bar_bg" class="color-field" data-default-color="#04d2c8" value="<?php echo esc_attr( get_option('ns_core_style_top_bar_bg', '#04d2c8') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_text" id="style_top_bar_text" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('ns_core_style_top_bar_text', '#ffffff') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Social Icons Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_social" id="style_top_bar_social" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('ns_core_style_top_bar_social', '#ffffff') ); ?>" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Header Styles', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Header Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_bg" id="style_header_bg" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('ns_core_style_header_bg', '#ffffff') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Header Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_text" id="style_header_text" class="color-field" data-default-color="#838893" value="<?php echo esc_attr( get_option('ns_core_style_header_text', '#838893') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label">
                                            <label><?php echo esc_html_e('Header Icon Color', 'ns-core'); ?></label>
                                            <span class="admin-module-note"><?php echo esc_html_e('*Only for menu bar header style', 'ns-core'); ?></span>
                                        </td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_icon" id="style_header_icon" class="color-field" data-default-color="#04d2c8" value="<?php echo esc_attr( get_option('ns_core_style_header_icon', '#04d2c8') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label">
                                            <label><?php echo esc_html_e('Header Menu Background Color', 'ns-core'); ?></label>
                                            <span class="admin-module-note"><?php echo esc_html_e('*Only for menu bar header style', 'ns-core'); ?></span>
                                        </td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_menu" id="style_header_menu" class="color-field" data-default-color="#2f353d" value="<?php echo esc_attr( get_option('ns_core_style_header_menu', '#2f353d') ); ?>" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Page Banner Styles', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Page Banner Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_page_banner_bg" id="style_page_banner_bg" class="color-field" data-default-color="#8d92a4" value="<?php echo esc_attr( get_option('ns_core_style_page_banner_bg', '#8d92a4') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Page Banner Title Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_page_banner_title" id="style_page_banner_title" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('ns_core_style_page_banner_title', '#ffffff') ); ?>" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right icon"></i> <?php echo esc_html_e('Footer Styles', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">
                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_bg" id="style_footer_bg" class="color-field" data-default-color="#323746" value="<?php echo esc_attr( get_option('ns_core_style_footer_bg', '#323746') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Header Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_header" id="style_footer_header" class="color-field" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('ns_core_style_footer_header', '#ffffff') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_text" id="style_footer_text" class="color-field" data-default-color="#8e95ac" value="<?php echo esc_attr( get_option('ns_core_style_footer_text', '#8e95ac') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Link Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_link" id="style_footer_link" class="color-field" data-default-color="#04d2c8" value="<?php echo esc_attr( get_option('ns_core_style_footer_link', '#04d2c8') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_bottom_bar_bg" id="style_bottom_bar_bg" class="color-field" data-default-color="#262a35" value="<?php echo esc_attr( get_option('ns_core_style_bottom_bar_bg', '#262a35') ); ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_bottom_bar_text" id="style_bottom_bar_text" class="color-field" data-default-color="#8e95ac" value="<?php echo esc_attr( get_option('ns_core_style_bottom_bar_text', '#8e95ac') ); ?>" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <?php do_action('ns_core_after_style_theme_options'); ?>

                    </div><!-- end styling -->

                    <?php do_action('ns_core_after_theme_option_content'); ?>

                </td>
            </tr>
        </table>
    </div>
    
    <?php submit_button(); ?>
    <div class="loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /></div>
    <div class="save-result" id="save-result"><?php echo esc_html_e('Settings Saved Successfully', 'ns-core'); ?></div>

</form>
</div>

<?php } ?>
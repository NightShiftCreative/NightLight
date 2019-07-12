<?php

/***************************************************************/
/* Create settings menu
/***************************************************************/
add_action('admin_menu', 'ns_core_theme_options_create_menu');
function ns_core_theme_options_create_menu() {

    //create new top-level menu
    add_theme_page('Theme Options', 'Theme Options', 'administrator', 'theme_options', 'ns_core_theme_options_page' , null, 99 );

    //call register settings function
    add_action( 'admin_init', 'ns_core_register_theme_options' );
}

/***************************************************************/
/* Register Options
/* (use theme-options-loader.php to register new fields)
/***************************************************************/
function ns_core_register_theme_options() {

    $theme_options = ns_core_load_theme_options(null, true);
    foreach($theme_options as $key => $value) {
        register_setting( 'ns-core-settings-group', $key);
    } 

    //register add-on settings
    do_action('ns_core_theme_option_register_settings');
}

/***************************************************************/
/* Output Theme Options Form
/***************************************************************/
function ns_core_theme_options_page() { 

$admin_obj = new NS_Basics_Admin(); ?>

<div class="wrap ns-theme-options">
<h2><?php esc_html_e('Theme Options', 'ns-core') ?></h2>
<br/>

<?php 
    $sitelink = 'https://nightshiftcreative.co/';
    $siteSupportLink = 'https://studio.nightshiftcreative.co/support-package/'; 

    //load default theme option values
    $theme_options = ns_core_load_theme_options();
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
            <div class="theme-options-actions">
                <div class="button reset-theme-options"><?php esc_html_e('Reset to Default', 'ns-core'); ?></div>
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

                        <?php
                        //Site Width Field
                        $site_width_field = array(
                            'title' => esc_html__('Site Width', 'ns-core'),
                            'name' => 'ns_core_site_width',
                            'value' => $theme_options['ns_core_site_width'],
                            'description' => esc_html__('Set the site width within the range of 700 - 1200px. The default value is 1170px.', 'ns-core'),
                            'type' => 'number',
                            'min' => 700,
                            'max' => 1200,
                        );
                        $admin_obj->build_admin_field($site_width_field);

                        //Global Background Field
                        $global_bg_field = array(
                            'title' => esc_html__('Global Background Image', 'ns-core'),
                            'name' => 'ns_core_global_bg',
                            'value' => $theme_options['ns_core_global_bg'],
                            'type' => 'image_upload',
                        );
                        $admin_obj->build_admin_field($global_bg_field);

                        //Global Background Display Field
                        $global_bg_display_field = array(
                            'title' => esc_html__('Global Background Display', 'ns-core'),
                            'name' => 'ns_core_global_bg_display',
                            'value' => $theme_options['ns_core_global_bg_display'],
                            'type' => 'select',
                            'options' => array('Cover' => 'cover', 'Fixed' => 'fixed', 'Tiled' => 'repeat'),
                        );
                        $admin_obj->build_admin_field($global_bg_display_field);

                        //Icon Style Field
                        $icon_style_field = array(
                            'title' => esc_html__('Icon Style', 'ns-core'),
                            'name' => 'ns_core_icon_set',
                            'value' => $theme_options['ns_core_icon_set'],
                            'type' => 'select',
                            'options' => array('Font Awesome' => 'fa', 'Line Icons' => 'line', 'Dripicons' => 'dripicon'),
                        );
                        $admin_obj->build_admin_field($icon_style_field);

                        //RTL Field
                        $rtl_field = array(
                            'title' => esc_html__('Enable RTL(Right to Left) layout', 'ns-core'),
                            'name' => 'ns_core_rtl',
                            'value' => $theme_options['ns_core_rtl'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($rtl_field);

                        //Enable Preloader Field
                        $preloader_field = array(
                            'title' => esc_html__('Enable Preloader', 'ns-core'),
                            'name' => 'ns_core_preloader',
                            'value' => $theme_options['ns_core_preloader'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($preloader_field);

                        //Preloader Image Field
                        $preloader_img_field = array(
                            'title' => esc_html__('Preloader Custom Image', 'ns-core'),
                            'name' => 'ns_core_preloader_img',
                            'value' => $theme_options['ns_core_preloader_img'],
                            'type' => 'image_upload',
                        );
                        $admin_obj->build_admin_field($preloader_img_field);
                        ?>

                        <br/><br/>
                        <div class="admin-module admin-module-fonts no-padding">
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
                            $google_font_args = array('timeout' => 20, 'sslverify' => false);
                            $json = wp_remote_get($google_fonts, $google_font_args );
                            $json = wp_remote_retrieve_body($json);
                            $data = json_decode($json,true);
                            $items = $data['items'];
                            $google_font_options = array();
                            foreach($items as $item) { $google_font_options[$item['family']] = $item['family']; }
                            $i = 0;
                            
                            //Heading Font Field
                            $heading_font_field = array(
                                'title' => esc_html__('Heading Font Face', 'ns-core'),
                                'name' => 'ns_core_heading_font',
                                'value' => $theme_options['ns_core_heading_font'],
                                'type' => 'select',
                                'options' => $google_font_options,
                            );
                            $admin_obj->build_admin_field($heading_font_field);

                            //Body Font Field
                            $body_font_field = array(
                                'title' => esc_html__('Body Font Face', 'ns-core'),
                                'name' => 'ns_core_body_font',
                                'value' => $theme_options['ns_core_body_font'],
                                'type' => 'select',
                                'options' => $google_font_options,
                            );
                            $admin_obj->build_admin_field($body_font_field);
                            ?>
                        </div>

                        <h3>
                            <?php echo esc_html_e('Custom Scripts', 'ns-core'); ?>
                            <span class="admin-module-note"><?php esc_html_e('Add any custom scripts, such as a Google Anayltics tracking code. Include <script> tags.', 'ns-core'); ?></span>
                        </h3>

                        <?php
                        //Header Scripts Field
                        $header_scripts_field = array(
                            'title' => esc_html__('Header Scripts', 'ns-core'),
                            'name' => 'ns_core_custom_scripts_header',
                            'description' => esc_html__('These scripts will be printed in the <head> section.', 'ns-core'),
                            'value' => $theme_options['ns_core_custom_scripts_header'],
                            'type' => 'textarea',
                        );
                        $admin_obj->build_admin_field($header_scripts_field);

                        //Footer Scripts Field
                        $footer_scripts_field = array(
                            'title' => esc_html__('Footer Scripts', 'ns-core'),
                            'name' => 'ns_core_custom_scripts_footer',
                            'description' => esc_html__('These scripts will be printed at the bottom of the <body> section.', 'ns-core'),
                            'value' => $theme_options['ns_core_custom_scripts_footer'],
                            'type' => 'textarea',
                        );
                        $admin_obj->build_admin_field($footer_scripts_field);
                        ?>

                        <?php do_action('ns_core_after_general_theme_options'); ?>

                    </div><!-- end general -->

                    <div id="contact" class="tab-content">
                        <h2><?php echo esc_html_e('Global Contact Details', 'ns-core'); ?></h2>

                        <?php
                        //Phone Field
                        $phone_field = array(
                            'title' => esc_html__('Phone', 'ns-core'),
                            'name' => 'ns_core_phone',
                            'value' => $theme_options['ns_core_phone'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($phone_field);

                        //Email Field
                        $email_field = array(
                            'title' => esc_html__('Email', 'ns-core'),
                            'name' => 'ns_core_email',
                            'value' => $theme_options['ns_core_email'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($email_field);

                        //Address Field
                        $address_field = array(
                            'title' => esc_html__('Address', 'ns-core'),
                            'name' => 'ns_core_address',
                            'value' => $theme_options['ns_core_address'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($address_field);
                        ?>

                        <br/><h3><?php echo esc_html_e('Social Media', 'ns-core'); ?></h3>
                        <div class="social-media-profiles">

                            <?php
                            //Facebook Field
                            $fb_field = array(
                                'title' => esc_html__('Facebook', 'ns-core'),
                                'name' => 'ns_core_fb',
                                'value' => $theme_options['ns_core_fb'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($fb_field);

                            //Twitter Field
                            $twitter_field = array(
                                'title' => esc_html__('Twitter', 'ns-core'),
                                'name' => 'ns_core_twitter',
                                'value' => $theme_options['ns_core_twitter'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($twitter_field);

                            //Google Plus Field
                            $google_field = array(
                                'title' => esc_html__('Google Plus', 'ns-core'),
                                'name' => 'ns_core_google',
                                'value' => $theme_options['ns_core_google'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($google_field);

                            //Linkedin Field
                            $linkedin_field = array(
                                'title' => esc_html__('LinkedIn', 'ns-core'),
                                'name' => 'ns_core_linkedin',
                                'value' => $theme_options['ns_core_linkedin'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($linkedin_field);

                            //Youtube Field
                            $youtube_field = array(
                                'title' => esc_html__('Youtube', 'ns-core'),
                                'name' => 'ns_core_youtube',
                                'value' => $theme_options['ns_core_youtube'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($youtube_field);

                            //Vimeo Field
                            $vimeo_field = array(
                                'title' => esc_html__('Vimeo', 'ns-core'),
                                'name' => 'ns_core_vimeo',
                                'value' => $theme_options['ns_core_vimeo'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($vimeo_field);

                            //Instagram Field
                            $instagram_field = array(
                                'title' => esc_html__('Instagram', 'ns-core'),
                                'name' => 'ns_core_instagram',
                                'value' => $theme_options['ns_core_instagram'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($instagram_field);

                            //Flickr Field
                            $flickr_field = array(
                                'title' => esc_html__('Flickr', 'ns-core'),
                                'name' => 'ns_core_flickr',
                                'value' => $theme_options['ns_core_flickr'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($flickr_field);

                            //Dribbble Field
                            $dribbble_field = array(
                                'title' => esc_html__('Dribbble', 'ns-core'),
                                'name' => 'ns_core_dribbble',
                                'value' => $theme_options['ns_core_dribbble'],
                                'type' => 'text',
                            );
                            $admin_obj->build_admin_field($dribbble_field);
                            ?>
                        </div><!-- end social media profiles -->

                        <br/><h3><?php echo esc_html_e('Contact Page', 'ns-core'); ?></h3>
                        
                        <?php
                        //Contact Details Field
                        $contact_details_field = array(
                            'title' => esc_html__('Display Contact Details Section', 'ns-core'),
                            'name' => 'ns_core_contact_details_display',
                            'value' => $theme_options['ns_core_contact_details_display'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($contact_details_field);

                        //Contact Form Title Field
                        $contact_form_title_field = array(
                            'title' => esc_html__('Contact Form Title', 'ns-core'),
                            'name' => 'ns_core_contact_form_title',
                            'value' => $theme_options['ns_core_contact_form_title'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($contact_form_title_field);

                        //Text Before Form Field
                        $text_before_form_field = array(
                            'title' => esc_html__('Text Before Form', 'ns-core'),
                            'name' => 'ns_core_contact_form_before',
                            'value' => $theme_options['ns_core_contact_form_before'],
                            'type' => 'textarea',
                        );
                        $admin_obj->build_admin_field($text_before_form_field);

                        //Text after Form Field
                        $text_after_form_field = array(
                            'title' => esc_html__('Text After Form', 'ns-core'),
                            'name' => 'ns_core_contact_form_after',
                            'value' => $theme_options['ns_core_contact_form_after'],
                            'type' => 'textarea',
                        );
                        $admin_obj->build_admin_field($text_after_form_field);

                        //Contact Form Success Message Field
                        $contact_form_success_field = array(
                            'title' => esc_html__('Contact Form Success Message', 'ns-core'),
                            'name' => 'ns_core_contact_form_success',
                            'value' => $theme_options['ns_core_contact_form_success'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($contact_form_success_field);

                        //Contact Form Source
                        $contact_form_source_field = array(
                            'title' => esc_html__('Contact Form Source', 'ns-core'),
                            'name' => 'ns_core_contact_form_source',
                            'value' => $theme_options['ns_core_contact_form_source'],
                            'type' => 'radio_image',
                            'options' => array(
                                esc_html__('Default Contact Form', 'ns-core') => array('value' => 'default'), 
                                esc_html__('Contact Form 7 Plugin', 'ns-core') => array('value' => 'contact-form-7'),
                            ),
                            'children' => array(
                                'banner_title' => array(
                                    'title' => esc_html__('Contact From 7 ID', 'ns-core'),
                                    'name' => 'ns_core_contact_form_id',
                                    'type' => 'number',
                                    'value' => $theme_options['ns_core_contact_form_id'],
                                    'parent_val' => 'contact-form-7',
                                ),
                            ),
                        );
                        $admin_obj->build_admin_field($contact_form_source_field);
                        ?>

                        <?php do_action('ns_core_after_contact_theme_options'); ?>

                    </div><!-- end contact and social -->

                    <div id="header" class="tab-content">
                        <h2><?php echo esc_html_e('Header', 'ns-core'); ?></h2>

                        <div class="ns-accordion">
                            <div class="ns-accordion-header"><i class="fa fa-chevron-right"></i> <?php echo esc_html_e('Top Bar Options', 'ns-core'); ?></div>
                            <div class="ns-accordion-content">

                                <?php 
                                //Display top bar Field
                                $display_top_bar_field = array(
                                    'title' => esc_html__('Display top bar', 'ns-core'),
                                    'name' => 'ns_core_display_topbar',
                                    'value' => $theme_options['ns_core_display_topbar'],
                                    'type' => 'switch',
                                );
                                $admin_obj->build_admin_field($display_top_bar_field);

                                //Top bar First Field
                                $top_bar_first_field = array(
                                    'title' => esc_html__('Top Bar First Field', 'ns-core'),
                                    'name' => 'ns_core_topbar_first_field',
                                    'value' => $theme_options['ns_core_topbar_first_field'],
                                    'type' => 'select',
                                    'options' => array('Email' => 'email', 'Phone' => 'phone', 'Social Links' => 'social', 'Member Actions' => 'member', 'Custom' => 'custom', 'None' => ''),
                                    'children' => array(
                                        'custom_content' => array(
                                            'title' => esc_html__('Custom Content', 'ns-basics'),
                                            'name' => 'ns_core_topbar_first_field_custom',
                                            'type' => 'textarea',
                                            'value' => $theme_options['ns_core_topbar_first_field_custom'],
                                            'parent_val' => 'custom',
                                        ),
                                    ),
                                );
                                $admin_obj->build_admin_field($top_bar_first_field);

                                //Top bar Second Field
                                $top_bar_second_field = array(
                                    'title' => esc_html__('Top Bar Second Field', 'ns-core'),
                                    'name' => 'ns_core_topbar_second_field',
                                    'value' => $theme_options['ns_core_topbar_second_field'],
                                    'type' => 'select',
                                    'options' => array('Email' => 'email', 'Phone' => 'phone', 'Social Links' => 'social', 'Member Actions' => 'member', 'Custom' => 'custom', 'None' => ''),
                                    'children' => array(
                                        'custom_content' => array(
                                            'title' => esc_html__('Custom Content', 'ns-basics'),
                                            'name' => 'ns_core_topbar_second_field_custom',
                                            'type' => 'textarea',
                                            'value' => $theme_options['ns_core_topbar_second_field_custom'],
                                            'parent_val' => 'custom',
                                        ),
                                    ),
                                );
                                $admin_obj->build_admin_field($top_bar_second_field);

                                //Top bar Third Field
                                $top_bar_third_field = array(
                                    'title' => esc_html__('Top Bar Third Field', 'ns-core'),
                                    'name' => 'ns_core_topbar_third_field',
                                    'value' => $theme_options['ns_core_topbar_third_field'],
                                    'type' => 'select',
                                    'options' => array('Email' => 'email', 'Phone' => 'phone', 'Social Links' => 'social', 'Member Actions' => 'member', 'Custom' => 'custom', 'None' => ''),
                                    'children' => array(
                                        'custom_content' => array(
                                            'title' => esc_html__('Custom Content', 'ns-basics'),
                                            'name' => 'ns_core_topbar_third_field_custom',
                                            'type' => 'textarea',
                                            'value' => $theme_options['ns_core_topbar_third_field_custom'],
                                            'parent_val' => 'custom',
                                        ),
                                    ),
                                );
                                $admin_obj->build_admin_field($top_bar_third_field);

                                //Top bar Fourth Field
                                $top_bar_fourth_field = array(
                                    'title' => esc_html__('Top Bar Fourth Field', 'ns-core'),
                                    'name' => 'ns_core_topbar_fourth_field',
                                    'value' => $theme_options['ns_core_topbar_fourth_field'],
                                    'type' => 'select',
                                    'options' => array('Email' => 'email', 'Phone' => 'phone', 'Social Links' => 'social', 'Member Actions' => 'member', 'Custom' => 'custom', 'None' => ''),
                                    'children' => array(
                                        'custom_content' => array(
                                            'title' => esc_html__('Custom Content', 'ns-basics'),
                                            'name' => 'ns_core_topbar_fourth_field_custom',
                                            'type' => 'textarea',
                                            'value' => $theme_options['ns_core_topbar_fourth_field_custom'],
                                            'parent_val' => 'custom',
                                        ),
                                    ),
                                );
                                $admin_obj->build_admin_field($top_bar_fourth_field);

                                //Display avatar 
                                $display_avatar_field = array(
                                    'title' => esc_html__('Display member avatar in header?', 'ns-core'),
                                    'name' => 'ns_core_members_display_avatar',
                                    'value' => $theme_options['ns_core_members_display_avatar'],
                                    'type' => 'switch',
                                );
                                $admin_obj->build_admin_field($display_avatar_field);
                                ?>

                            </div>
                        </div><!-- end topbar options -->

                        <?php
                        //Header Style
                        $header_style_field = array(
                            'title' => esc_html__('Select a header style', 'ns-core'),
                            'name' => 'ns_core_header_style',
                            'value' => $theme_options['ns_core_header_style'],
                            'type' => 'radio_image',
                            'options' => array(
                                esc_html__('Menu Bar Header', 'ns-core') => array(
                                    'value' => 'default', 
                                    'icon' => esc_url( get_template_directory_uri() ).'/admin/images/default-header.png',
                                ), 
                                esc_html__('Classic Header', 'ns-core') => array(
                                    'value' => 'classic', 
                                    'icon' => esc_url( get_template_directory_uri() ).'/admin/images/classic-header.png',
                                ),
                                esc_html__('Transparent Header', 'ns-core') => array(
                                    'value' => 'transparent', 
                                    'icon' => esc_url( get_template_directory_uri() ).'/admin/images/transparent-header.png',
                                ),
                            ),
                            'children' => array(
                                'above_phone_text' => array(
                                    'title' => esc_html__('Above Phone Text', 'ns-core'),
                                    'name' => 'ns_core_above_phone_text',
                                    'type' => 'text',
                                    'value' => $theme_options['ns_core_above_phone_text'],
                                    'parent_val' => 'default',
                                ),
                                'above_email_text' => array(
                                    'title' => esc_html__('Above Email Text', 'ns-core'),
                                    'name' => 'ns_core_above_email_text',
                                    'type' => 'text',
                                    'value' => $theme_options['ns_core_above_email_text'],
                                    'parent_val' => 'default',
                                ),
                            ),
                        );
                        $admin_obj->build_admin_field($header_style_field);

                        //Enable Sticky Header
                        $sticky_header_field = array(
                            'title' => esc_html__('Enable sticky header', 'ns-core'),
                            'name' => 'ns_core_sticky_header',
                            'value' => $theme_options['ns_core_sticky_header'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($sticky_header_field);

                        //Enable Header Container
                        $header_container_field = array(
                            'title' => esc_html__('Enable header container', 'ns-core'),
                            'name' => 'ns_core_header_container',
                            'value' => $theme_options['ns_core_header_container'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($header_container_field);

                        //Logo
                        $logo_field = array(
                            'title' => esc_html__('Logo', 'ns-core'),
                            'name' => 'ns_core_logo',
                            'description' => esc_html__('Recommended size: 172 x 50 pixels.', 'ns-core'),
                            'value' => $theme_options['ns_core_logo'],
                            'type' => 'image_upload',
                            'display_img' => true,
                        );
                        $admin_obj->build_admin_field($logo_field);

                        //Logo Transparent
                        $logo_transparent_field = array(
                            'title' => esc_html__('Logo Transparent', 'ns-core'),
                            'name' => 'ns_core_logo_transparent',
                            'description' => esc_html__('This logo will be used if the transparent header is activated. Recommended size: 172 x 50 pixels.', 'ns-core'),
                            'value' => $theme_options['ns_core_logo_transparent'],
                            'type' => 'image_upload',
                            'display_img' => true,
                        );
                        $admin_obj->build_admin_field($logo_transparent_field);

                        //Favicon
                        $favicon_field = array(
                            'title' => esc_html__('Favicon', 'ns-core'),
                            'name' => 'ns_core_favicon',
                            'description' => esc_html__('A favicon, also known as a shortcut icon, website icon, tab icon, URL icon or bookmark icon, is a file named favicon.ico and containing one or more small icons, most commonly 16x16 pixels.', 'ns-core'),
                            'value' => $theme_options['ns_core_favicon'],
                            'type' => 'image_upload',
                            'display_img' => true,
                        );
                        $admin_obj->build_admin_field($favicon_field);

                        //Display Header Search
                        $header_search_field = array(
                            'title' => esc_html__('Display Header Search Form', 'ns-core'),
                            'name' => 'ns_core_display_header_search',
                            'value' => $theme_options['ns_core_display_header_search'],
                            'type' => 'switch',
                        );
                        $admin_obj->build_admin_field($header_search_field);

                        //Menu Alignment
                        $menu_align_field = array(
                            'title' => esc_html__('Menu Alignment', 'ns-core'),
                            'name' => 'ns_core_header_menu_align',
                            'value' => $theme_options['ns_core_header_menu_align'],
                            'type' => 'select',
                            'options' => array('Right' => 'right', 'Left' => 'left', 'Center' => 'center'),
                        );
                        $admin_obj->build_admin_field($menu_align_field);

                        //Menu Parent Link
                        $menu_parent_link_field = array(
                            'title' => esc_html__('Menu Parent Link Behavior', 'ns-core'),
                            'name' => 'ns_core_header_menu_parent_links',
                            'value' => $theme_options['ns_core_header_menu_parent_links'],
                            'type' => 'select',
                            'options' => array('Toggle Sub-Menu' => 'toggle-submenu', 'Go to Page' => 'open-page'),
                        );
                        $admin_obj->build_admin_field($menu_parent_link_field);

                        //Menu Call to Action
                        $pages = get_pages(); 
                        $page_options_array == array();
                        $page_options_array['Select page'] = '';
                        foreach ( $pages as $page ) { $page_options_array[$page->post_title] = get_page_link( $page->ID ); } 
                        $menu_call_to_action_field = array(
                            'title' => esc_html__('Menu Call to Action Page', 'ns-core'),
                            'name' => 'ns_core_header_menu_button_page',
                            'value' => $theme_options['ns_core_header_menu_button_page'],
                            'type' => 'select',
                            'options' => $page_options_array,
                        );
                        $admin_obj->build_admin_field($menu_call_to_action_field);

                        //Menu Call to Action Text
                        $menu_call_to_action_text_field = array(
                            'title' => esc_html__('Menu Call to Action Text', 'ns-core'),
                            'name' => 'ns_core_header_menu_button_text',
                            'value' => $theme_options['ns_core_header_menu_button_text'],
                            'type' => 'text',
                        );
                        $admin_obj->build_admin_field($menu_call_to_action_text_field);

                        //Header background
                        $header_bg_field = array(
                            'title' => esc_html__('Header Background Image', 'ns-core'),
                            'name' => 'ns_core_header_bg',
                            'value' => $theme_options['ns_core_header_bg'],
                            'type' => 'image_upload',
                        );
                        $admin_obj->build_admin_field($header_bg_field);

                        //Header background display
                        $header_bg_display_field = array(
                            'title' => esc_html__('Header Background Display', 'ns-core'),
                            'name' => 'ns_core_header_bg_display',
                            'value' => $theme_options['ns_core_header_bg_display'],
                            'type' => 'select',
                            'options' => array('Cover' => 'cover', 'Fixed' => 'fixed', 'Tiled' => 'repeat'),
                        );
                        $admin_obj->build_admin_field($header_bg_display_field);
                        ?>

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
                                    <input type="text" id="page_banner_bg" name="ns_core_page_banner_bg" value="<?php echo $theme_options['ns_core_page_banner_bg']; ?>" />
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
                                        <option value="cover" <?php if($theme_options['ns_core_page_banner_bg_display'] == 'cover') { echo 'selected'; } ?>><?php echo esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if($theme_options['ns_core_page_banner_bg_display'] == 'fixed') { echo 'selected'; } ?>><?php echo esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if($theme_options['ns_core_page_banner_bg_display'] == 'repeat') { echo 'selected'; } ?>><?php echo esc_html_e('Tiled', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Text Alignment', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_page_banner_title_align">
                                        <option value="left" <?php if($theme_options['ns_core_page_banner_title_align'] == 'left') { echo 'selected'; } ?>><?php echo esc_html_e('Left', 'ns-core'); ?></option>
                                        <option value="center" <?php if($theme_options['ns_core_page_banner_title_align'] == 'center') { echo 'selected'; } ?>><?php echo esc_html_e('Center', 'ns-core'); ?></option>
                                        <option value="right" <?php if($theme_options['ns_core_page_banner_title_align'] == 'right') { echo 'selected'; } ?>><?php echo esc_html_e('Right', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Padding Top', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_padding_top" name="ns_core_page_banner_padding_top" value="<?php echo $theme_options['ns_core_page_banner_padding_top']; ?>" />
                                    <?php echo esc_html_e('Pixels', 'ns-core'); ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Padding Bottom', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_padding_bottom" name="ns_core_page_banner_padding_bottom" value="<?php echo $theme_options['ns_core_page_banner_padding_bottom']; ?>" />
                                    <?php echo esc_html_e('Pixels', 'ns-core'); ?>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Banner Overlay', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_page_banner_overlay_display'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_overlay_display" value="true" class="toggle-switch-checkbox" id="page_banner_overlay_display" <?php checked('true', $theme_options['ns_core_page_banner_overlay_display'], true) ?>>
                                        <label class="toggle-switch-label" data-settings="banner-overlay-settings" for="page_banner_overlay_display"><?php if($theme_options['ns_core_page_banner_overlay_display'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="admin-module no-padding banner-overlay-settings <?php if($theme_options['ns_core_page_banner_overlay_display']) { echo 'show'; } else { echo 'hide-soft'; } ?>">
                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label">
                                        <label><?php echo esc_html_e('Banner Overlay Opacity', 'ns-core'); ?></label>
                                        <span class="admin-module-note"><?php echo esc_html_e('Choose an opacity ranging from 0 to 1 (0 is fully transparent).', 'ns-core'); ?></span>
                                    </td>
                                    <td class="admin-module-field">
                                        <input type="number" step="0.01" min="0.00" max="1.00" id="page_banner_overlay_opacity" name="ns_core_page_banner_overlay_opacity" value="<?php echo $theme_options['ns_core_page_banner_overlay_opacity']; ?>" />
                                    </td>
                                </tr>
                            </table>
                            <table class="admin-module">
                                <tr>
                                    <td class="admin-module-label"><label><?php echo esc_html_e('Banner Overlay Color', 'ns-core'); ?></label></td>
                                    <td class="admin-module-field">
                                        <input type="text" id="page_banner_overlay_color" name="ns_core_page_banner_overlay_color" class="color-field" data-default-color="#000000" value="<?php echo $theme_options['ns_core_page_banner_overlay_color']; ?>" />
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Breadcrumb', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_page_banner_display_breadcrumb'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_display_breadcrumb" value="true" class="toggle-switch-checkbox" id="page_banner_display_breadcrumb" <?php checked('true', $theme_options['ns_core_page_banner_display_breadcrumb'], true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_display_breadcrumb"><?php if($theme_options['ns_core_page_banner_display_breadcrumb'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Display Search Form', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_page_banner_display_search'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_display_search" value="true" class="toggle-switch-checkbox" id="page_banner_display_search" <?php checked('true', $theme_options['ns_core_page_banner_display_search'], true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_display_search"><?php if($theme_options['ns_core_page_banner_display_search'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
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
                                        <option value="horizontal" <?php if($theme_options['ns_core_page_banner_slider_transition'] == 'horizontal') { echo 'selected'; } ?>><?php echo esc_html_e('Slide', 'ns-core'); ?></option>
                                        <option value="fade" <?php if($theme_options['ns_core_page_banner_slider_transition'] == 'fade') { echo 'selected'; } ?>><?php echo esc_html_e('Fade', 'ns-core'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label for="page_banner_slider_duration"><?php echo esc_html_e('Slide Duration (in ms)', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="number" id="page_banner_slider_duration" name="ns_core_page_banner_slider_duration" value="<?php echo $theme_options['ns_core_page_banner_slider_duration']; ?>" />
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Auto Start Sliders', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_page_banner_slider_auto_start'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_page_banner_slider_auto_start" value="true" class="toggle-switch-checkbox" id="page_banner_slider_auto_start" <?php checked('true', $theme_options['ns_core_page_banner_slider_auto_start'], true) ?>>
                                        <label class="toggle-switch-label" for="page_banner_slider_auto_start"><?php if($theme_options['ns_core_page_banner_slider_auto_start'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
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
                                        <option value="small" <?php if($theme_options['ns_core_page_sidebar_size'] == 'small') { echo 'selected'; } ?>><?php echo esc_html_e('Small', 'ns-core'); ?></option>
                                        <option value="medium" <?php if($theme_options['ns_core_page_sidebar_size'] == 'medium') { echo 'selected'; } ?>><?php echo esc_html_e('Medium', 'ns-core'); ?></option>
                                        <option value="large" <?php if($theme_options['ns_core_page_sidebar_size'] == 'large') { echo 'selected'; } ?>><?php echo esc_html_e('Large', 'ns-core'); ?></option>
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
                                        <option value="username" <?php if($theme_options['ns_core_members_display_name'] == 'username') { echo 'selected'; } ?>><?php esc_html_e('Username', 'ns-core'); ?></option>
                                        <option value="fname" <?php if($theme_options['ns_core_members_display_name'] == 'fname') { echo 'selected'; } ?>><?php esc_html_e('First Name', 'ns-core'); ?></option>
                                        <option value="flname" <?php if($theme_options['ns_core_members_display_name'] == 'flname') { echo 'selected'; } ?>><?php esc_html_e('First & Last Name', 'ns-core'); ?></option>
                                        <option value="display_name" <?php if($theme_options['ns_core_members_display_name'] == 'display_name') { echo 'selected'; } ?>><?php esc_html_e('Display Name', 'ns-core'); ?></option>
                                        <option value="email" <?php if($theme_options['ns_core_members_display_name'] == 'email') { echo 'selected'; } ?>><?php esc_html_e('Email', 'ns-core'); ?></option>
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
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if($theme_options['ns_core_members_login_page'] == get_page_link( $page->ID )) { echo 'selected'; } ?>>
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
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if($theme_options['ns_core_members_register_page'] == get_page_link( $page->ID )) { echo 'selected'; } ?>>
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
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if($theme_options['ns_core_members_dashboard_page'] == get_page_link( $page->ID )) { echo 'selected'; } ?>>
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
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if($theme_options['ns_core_members_edit_profile_page'] == get_page_link( $page->ID )) { echo 'selected'; } ?>>
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
                                            <option value="<?php echo get_page_link( $page->ID ); ?>" <?php if($theme_options['ns_core_members_favorites_page'] == get_page_link( $page->ID )) { echo 'selected'; } ?>>
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
                                    <div class="toggle-switch" title="<?php if($theme_options['ns_core_hide_footer_widget_area'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                        <input type="checkbox" name="ns_core_hide_footer_widget_area" value="true" class="toggle-switch-checkbox" id="hide_footer_widget_area" <?php checked('true', $theme_options['ns_core_hide_footer_widget_area'], true) ?>>
                                        <label class="toggle-switch-label" for="hide_footer_widget_area"><?php if($theme_options['ns_core_hide_footer_widget_area'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Number of footer columns', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <select name="ns_core_num_footer_cols">
                                        <option value="1" <?php if($theme_options['ns_core_num_footer_cols'] == '1') { echo 'selected'; } ?>>1</option>
                                        <option value="2" <?php if($theme_options['ns_core_num_footer_cols'] == '2') { echo 'selected'; } ?>>2</option>
                                        <option value="3" <?php if($theme_options['ns_core_num_footer_cols'] == '3') { echo 'selected'; } ?>>3</option>
                                        <option value="4" <?php if($theme_options['ns_core_num_footer_cols'] == '4') { echo 'selected'; } ?>>4</option>
                                        <option value="5" <?php if($theme_options['ns_core_num_footer_cols'] == '5') { echo 'selected'; } ?>>5</option>
                                        <option value="6" <?php if($theme_options['ns_core_num_footer_cols'] == '6') { echo 'selected'; } ?>>6</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <table class="admin-module">
                            <tr>
                                <td class="admin-module-label"><label><?php echo esc_html_e('Footer Background Image', 'ns-core'); ?></label></td>
                                <td class="admin-module-field">
                                    <input type="text" id="footer_bg" name="ns_core_footer_bg" value="<?php echo $theme_options['ns_core_footer_bg']; ?>" />
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
                                        <option value="cover" <?php if($theme_options['ns_core_footer_bg_display'] == 'cover') { echo 'selected'; } ?>><?php esc_html_e('Cover', 'ns-core'); ?></option>
                                        <option value="fixed" <?php if($theme_options['ns_core_footer_bg_display'] == 'fixed') { echo 'selected'; } ?>><?php esc_html_e('Fixed', 'ns-core'); ?></option>
                                        <option value="repeat" <?php if($theme_options['ns_core_footer_bg_display'] == 'repeat') { echo 'selected'; } ?>><?php esc_html_e('Tiled', 'ns-core'); ?></option>
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
                                            <div class="toggle-switch" title="<?php if($theme_options['ns_core_display_bottombar'] == 'true') { esc_html_e('Active', 'ns-core'); } else { esc_html_e('Disabled', 'ns-core'); } ?>">
                                                <input type="checkbox" name="ns_core_display_bottombar" value="true" class="toggle-switch-checkbox" id="display_bottombar" <?php checked('true', $theme_options['ns_core_display_bottombar'], true) ?>>
                                                <label class="toggle-switch-label" for="display_bottombar"><?php if($theme_options['ns_core_display_bottombar'] == 'true') { echo '<span class="on">'.esc_html__('On', 'ns-core').'</span>'; } else { echo '<span>'.esc_html__('Off', 'ns-core').'</span>'; } ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Text', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field">
                                            <textarea id="bottom_bar_text" name="ns_core_bottom_bar_text"><?php echo $theme_options['ns_core_bottom_bar_text']; ?></textarea>
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
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_bg" id="style_global_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_global_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_global_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Main Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_main" id="style_global_main" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_global_main', true); ?>" value="<?php echo $theme_options['ns_core_style_global_main']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Complementary Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_global_comp" id="style_global_comp" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_global_comp', true); ?>" value="<?php echo $theme_options['ns_core_style_global_comp']; ?>" /></td>
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
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_bg" id="style_top_bar_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_top_bar_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_top_bar_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_text" id="style_top_bar_text" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_top_bar_text', true); ?>" value="<?php echo $theme_options['ns_core_style_top_bar_text']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Top Bar Social Icons Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_top_bar_social" id="style_top_bar_social" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_top_bar_social', true); ?>" value="<?php echo $theme_options['ns_core_style_top_bar_social']; ?>" /></td>
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
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_bg" id="style_header_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_header_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_header_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Header Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_text" id="style_header_text" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_header_text', true); ?>" value="<?php echo $theme_options['ns_core_style_header_text']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label">
                                            <label><?php echo esc_html_e('Header Icon Color', 'ns-core'); ?></label>
                                            <span class="admin-module-note"><?php echo esc_html_e('*Only for menu bar header style', 'ns-core'); ?></span>
                                        </td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_icon" id="style_header_icon" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_header_icon', true); ?>" value="<?php echo $theme_options['ns_core_style_header_icon']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label">
                                            <label><?php echo esc_html_e('Header Menu Background Color', 'ns-core'); ?></label>
                                            <span class="admin-module-note"><?php echo esc_html_e('*Only for menu bar header style', 'ns-core'); ?></span>
                                        </td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_header_menu" id="style_header_menu" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_header_menu', true); ?>" value="<?php echo $theme_options['ns_core_style_header_menu']; ?>" /></td>
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
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_page_banner_bg" id="style_page_banner_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_page_banner_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_page_banner_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Page Banner Title Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_page_banner_title" id="style_page_banner_title" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_page_banner_title', true); ?>" value="<?php echo $theme_options['ns_core_style_page_banner_title']; ?>" /></td>
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
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_bg" id="style_footer_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_footer_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_footer_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Header Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_header" id="style_footer_header" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_footer_header', true); ?>" value="<?php echo $theme_options['ns_core_style_footer_header']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_text" id="style_footer_text" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_footer_text', true); ?>" value="<?php echo $theme_options['ns_core_style_footer_text']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Footer Link Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_footer_link" id="style_footer_link" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_footer_link', true); ?>" value="<?php echo $theme_options['ns_core_style_footer_link']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Background Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_bottom_bar_bg" id="style_bottom_bar_bg" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_bottom_bar_bg', true); ?>" value="<?php echo $theme_options['ns_core_style_bottom_bar_bg']; ?>" /></td>
                                    </tr>
                                </table>

                                <table class="admin-module no-border">
                                    <tr>
                                        <td class="admin-module-label"><label><?php echo esc_html_e('Bottom Bar Text Color', 'ns-core'); ?></label></td>
                                        <td class="admin-module-field"><input type="text" name="ns_core_style_bottom_bar_text" id="style_bottom_bar_text" class="color-field" data-default-color="<?php echo ns_core_load_theme_options('ns_core_style_bottom_bar_text', true); ?>" value="<?php echo $theme_options['ns_core_style_bottom_bar_text']; ?>" /></td>
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

    <table class="theme-options-header theme-options-footer" cellspacing="0" cellpadding="0">
        <tr>
        <td>
            <div class="theme-options-actions">
                <?php submit_button( __( 'Save Changes', 'ns-core' ), 'primary', 'submit_top' ); ?>
                <div class="loader"><img src="<?php echo esc_url(home_url('/')); ?>wp-admin/images/spinner.gif" alt="" /></div>
                <div class="save-result" id="save-result"><?php echo esc_html_e('Settings Saved Successfully', 'ns-core'); ?></div>
            </div>
        </td>
        </tr>
    </table>

</form>
</div>

<?php } ?>
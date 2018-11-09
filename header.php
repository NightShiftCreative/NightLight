<?php 
    $header_vars = ns_core_load_header_settings();

    //GET CURRENT USER INFO
    $current_user = wp_get_current_user();
    $avatar_id = get_user_meta( $current_user->ID, 'avatar', true ); 
    $avatar_img = wp_get_attachment_image($avatar_id, array('16', '16'), "", array( "class" => "avatar"));
?>

<!DOCTYPE html>
<html <?php if($header_vars['rtl'] == 'true') { echo 'dir="rtl"'; } ?> <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
//SET HEADER STYLE
if(isset($_GET['header_style'])) { $header_style = $_GET['header_style']; } else { $header_style = $header_vars['header_style']; }  

// FAVICON
if(!(function_exists('has_site_icon') && has_site_icon()) && !empty($header_vars['favicon'])) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url($header_vars['favicon']); ?>" />
<?php } 

//GENERATE HEADER CLASS
$header_class = '';
$main_menu_items = wp_nav_menu( array('theme_location' => 'menu-1', 'echo' => FALSE));
if($header_style == 'default') { 
    $header_class = 'header-default'; 
} else if($header_style == 'transparent') {
    $header_class = 'header-transparent'; 
} else { 
    $header_class = 'header-classic'; 
}
if(has_nav_menu('menu-1') && !empty($main_menu_items)) { $header_class = $header_class.' has-menu'; }
if($header_vars['sticky_header'] == 'true') { $header_class = $header_class.' navbar-fixed'; }
if(!empty($header_vars['header_bg'])) { $header_class = $header_class.' '.ns_core_bgDisplay($header_vars['header_bg_display']);  }
?>

<!-- wp head -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if($header_vars['preloader'] == 'true') { ?>
<div class="loader">
    <table>
        <tr><td><img src="<?php if(!empty($header_vars['preloader_img'])) { echo $header_vars['preloader_img']; } else { echo $header_vars['preloader_img_default']; } ?>" alt="" /></td></tr>
    </table>
</div>
<?php } ?>

<header class="main-header <?php echo esc_attr($header_class); ?>">

<?php get_template_part('template_parts/top_bar'); ?>

<div class="container <?php if($header_vars['header_container'] != 'true') { echo 'container-full'; } ?>">

    <!-- HEADER DEFAULT STYLE -->
    <?php if($header_style == 'default') { ?>

        <div class="navbar-header">
            <!-- DETAILS -->
            <?php echo ns_core_get_header_items(); ?>

            <!-- LOGO -->
            <?php echo ns_core_get_header_logo(); ?>

            <!-- NAVBAR TOGGLE -->
            <?php echo ns_core_get_header_toggle(); ?>
        </div>

    <!-- HEADER CLASSIC STYLE -->
    <?php } else { ?>
        
        <!-- LOGO -->
        <div class="navbar-header"><?php echo ns_core_get_header_logo(); ?></div>

        <!-- NAVBAR TOGGLE -->
        <?php echo ns_core_get_header_toggle(); ?>
    <?php } ?>
    
    <!-- MAIN MENU -->
    <?php
    if ( has_nav_menu( 'menu-1' )) {
        $main_menu = wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'menu_class'     => 'nav navbar-nav right',
            'depth'          => 3,
            'echo' => FALSE,
            'fallback_cb' => '__return_false'
        ));
    } else {
        $main_menu = '';
    }
    ?>

    <?php if (!empty($main_menu)) { ?>
        <div class="navbar-collapse collapse">
            <div class="main-menu-wrap">
                <div class="container-fixed <?php if($header_vars['header_container'] != 'true') { echo 'container-full'; } ?>">
                    
                    <!-- HOOK FOR PLUGINS -->
                    <?php do_action('ns_core_before_main_menu'); ?>

                    <?php if(!empty($header_vars['header_menu_button_page']) && !empty($header_vars['header_menu_button_text'])) { ?>
                    <div class="member-actions right">
                        <a href="<?php echo esc_url($header_vars['header_menu_button_page']); ?>" class="button small light button-icon"><i class="fa fa-plus icon"></i><?php echo esc_attr($header_vars['header_menu_button_text']); ?></a>
                    </div>
                    <?php } ?>
                    <?php echo wp_kses_post($main_menu); ?>

                    <!-- HOOK FOR PLUGINS -->
                    <?php do_action('ns_core_after_main_menu'); ?>

                </div>
            </div>
        </div>
    <?php } ?>
    <!-- END MAIN MENU -->

</div><!-- end header container -->
</header><!-- End Header -->
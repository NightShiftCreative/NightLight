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
if($header_vars['header_container'] != 'true') { $header_class = $header_class.' full-width'; }
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

    <?php do_action('ns_core_before_header'); ?>

    <?php get_template_part('template_parts/top_bar'); ?>

    <div class="container <?php if($header_vars['header_container'] != 'true') { echo 'container-full'; } ?>">

        <?php 
        if($header_style == 'default') {
            include('template_parts/header-menu-bar.php');
        } else {
            include('template_parts/header-classic.php');
        }
        ?>

    </div><!-- end header container -->

    <?php do_action('ns_core_after_header'); ?>

</header><!-- End Header -->
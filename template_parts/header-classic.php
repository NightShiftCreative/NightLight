<?php 
$header_menu_align = ns_core_load_theme_options('ns_core_header_menu_align');
$header_menu_button_page = ns_core_load_theme_options('ns_core_header_menu_button_page');
$header_menu_button_text = ns_core_load_theme_options('ns_core_header_menu_button_text');
?>

<!-- LOGO -->
<div class="header-logo">
    <?php echo ns_core_get_header_logo(); ?>
</div>

<!-- BEFORE MAIN MENU -->
<div class="header-menu-before">
    <?php do_action('ns_core_before_main_menu'); ?>
</div>

<!-- MAIN MENU -->
<?php $main_menu = ns_core_get_header_menu();
if (!empty($main_menu)) { ?>
    <div class="header-menu <?php if($header_menu_align == 'left') { echo 'align-left'; } else if($header_menu_align == 'center') { echo 'align-center'; } ?>">
        <div class="container-fixed">
            <?php echo ns_core_get_header_toggle(); ?>
            <?php echo wp_kses_post($main_menu); ?>
        </div>
    </div>
<?php } ?>

<!-- AFTER MAIN MENU -->
<div class="header-menu-after">
    <?php if(!empty($header_menu_button_page) && !empty($header_menu_button_text)) { ?>
        <a href="<?php echo esc_url($header_menu_button_page); ?>" class="button small light button-icon button-header-cta"><i class="fa fa-plus icon"></i><?php echo esc_attr($header_menu_button_text); ?></a>
    <?php } ?>
    <?php do_action('ns_core_after_main_menu'); ?>
</div>
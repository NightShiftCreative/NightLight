<?php $header_vars = ns_core_load_header_settings(); ?>

<!-- LOGO -->
<div class="header-logo">
    <?php echo ns_core_get_header_logo(); ?>
</div>

<!-- BEFORE MAIN MENU -->
<div class="header-menu-before">
    <?php echo ns_core_get_header_items(); ?>
    <?php do_action('ns_core_before_main_menu'); ?>
</div>

<!-- MAIN MENU -->
<?php $main_menu = ns_core_get_header_menu();
if (!empty($main_menu)) { ?>
    <div class="header-menu <?php if($header_vars['header_menu_align'] == 'left') { echo 'align-left'; } else if($header_vars['header_menu_align'] == 'center') { echo 'align-center'; } ?>">
        <div class="container-fixed">
            <?php if(!empty($header_vars['header_menu_button_page']) && !empty($header_vars['header_menu_button_text'])) { ?>
                <a href="<?php echo esc_url($header_vars['header_menu_button_page']); ?>" class="button small alt"><?php echo esc_attr($header_vars['header_menu_button_text']); ?></a>
            <?php } ?>
            <?php echo ns_core_get_header_toggle(); ?>
            <?php echo wp_kses_post($main_menu); ?>
        </div>
    </div>
<?php } ?>

<!-- AFTER MAIN MENU -->
<div class="header-menu-after">     
    <?php do_action('ns_core_after_main_menu'); ?>
</div>
<?php 
    // Global Settings
    $cta_display = ns_core_load_theme_options('ns_core_display_cta');
    $cta_title = ns_core_load_theme_options('ns_core_cta_title');
    $cta_text = ns_core_load_theme_options('ns_core_cta_text');
    $cta_text = apply_filters('the_content', $cta_text);
    $cta_button_text = ns_core_load_theme_options('ns_core_cta_button_text');
    $cta_button_url = ns_core_load_theme_options('ns_core_cta_button_url');
    $cta_bg_img = ns_core_load_theme_options('ns_core_cta_bg_img');
    $cta_bg_display = ns_core_load_theme_options('ns_core_cta_bg_display');

    // Individual page settings (these overwrite global settings)
    $page_id = ns_core_get_page_id();
    $values = get_post_custom( $page_id );

    $cta_custom_settings = isset( $values['ns_basics_cta_custom_settings'] ) ? $values['ns_basics_cta_custom_settings'][0] : '';
    if($cta_custom_settings == 'true') {
        $cta_display = isset( $values['ns_basics_cta_display'] ) ? esc_attr( $values['ns_basics_cta_display'][0] ) : '';
        $cta_title = isset( $values['ns_basics_cta_title'] ) ? $values['ns_basics_cta_title'][0] : '';
        $cta_text = isset( $values['ns_basics_cta_text'] ) ? $values['ns_basics_cta_text'][0] : '';
        $cta_text = apply_filters('the_content', $cta_text);
        $cta_button_text = isset( $values['ns_basics_cta_button_text'] ) ? esc_attr( $values['ns_basics_cta_button_text'][0] ) : '';
        $cta_button_url = isset( $values['ns_basics_cta_button_url'] ) ? esc_attr( $values['ns_basics_cta_button_url'][0] ) : '';
        $cta_bg_img = isset( $values['ns_basics_cta_bg_img'] ) ? esc_attr( $values['ns_basics_cta_bg_img'][0] ) : '';
        $cta_bg_display = isset( $values['ns_basics_cta_bg_display'] ) ? esc_attr( $values['ns_basics_cta_bg_display'][0] ) : '';
    }
?>

<?php if($cta_display == 'true') { ?>
<section class="module cta <?php if(!empty($cta_bg_img)) { echo ns_core_bgDisplay($cta_bg_display); } ?>"
    <?php 
         if(!empty($cta_bg_img)) { echo 'style="background-image:url('.$cta_bg_img.');"';  }
    ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <?php if(!empty($cta_title)) { ?><h3><?php echo wp_kses_post($cta_title); ?></h3><?php } ?>
                <?php if(!empty($cta_text)) { ?><p><?php echo wp_kses_post($cta_text); ?></p><?php } ?>
            </div>
            <div class="col-lg-4 col-md-4">
                <?php if(!empty($cta_button_text)) { ?><a href="<?php echo esc_url($cta_button_url); ?>" class="button right large"><?php echo esc_attr($cta_button_text); ?></a><?php } ?>
            </div>
        </div><!-- end row -->
    </div>
</section>
<?php } ?>
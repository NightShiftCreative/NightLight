<?php 
    if(is_home()) {
        $queried_object = get_queried_object();
        if(!empty($queried_object)) {
            $values = get_post_custom( $queried_object->ID );
        } else {
            $values = get_post_custom( $post->ID );
        }
    } else if(is_singular('post')) {
        $page_for_posts = get_option( 'page_for_posts' );
        $values = get_post_custom( $page_for_posts );
    } else {
        $values = get_post_custom( $post->ID );
    }

    $cta_title = isset( $values['ns_basics_cta_title'] ) ? $values['ns_basics_cta_title'][0] : '';
    $cta_text = isset( $values['ns_basics_cta_text'] ) ? $values['ns_basics_cta_text'][0] : '';
    $cta_button_text = isset( $values['ns_basics_cta_button_text'] ) ? esc_attr( $values['ns_basics_cta_button_text'][0] ) : '';
    $cta_button_url = isset( $values['ns_basics_cta_button_url'] ) ? esc_attr( $values['ns_basics_cta_button_url'][0] ) : '';
    $cta_bg_img = isset( $values['ns_basics_cta_bg_img'] ) ? esc_attr( $values['ns_basics_cta_bg_img'][0] ) : '';
    $cta_bg_display = isset( $values['ns_basics_cta_bg_display'] ) ? esc_attr( $values['ns_basics_cta_bg_display'][0] ) : '';
?>

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
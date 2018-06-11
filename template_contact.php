<?php 
/*
*   Template Name: Contact
*/
?>

<?php 
    //global settings
    $contact_details_display = esc_attr(get_option('rypecore_contact_details_display', 'true'));

    //page settings
    $page_id = rypecore_get_page_id();
    $values = get_post_custom( $page_id );
    $banner_source = isset( $values['rypecore_banner_source'] ) ? esc_attr( $values['rypecore_banner_source'][0] ) : 'image_banner';
    $banner_slider_rev_alias = isset( $values['rypecore_banner_slider_rev_alias'] ) ? esc_attr( $values['rypecore_banner_slider_rev_alias'][0] ) : '';
    $page_layout = isset( $values['rypecore_page_layout'] ) ? esc_attr( $values['rypecore_page_layout'][0] ) : 'full';
    $col_class = rypecore_get_page_col_classes($page_layout);
    $page_layout_widget_area = isset( $values['rypecore_page_layout_widget_area'] ) ? esc_attr( $values['rypecore_page_layout_widget_area'][0] ) : 'blog_sidebar';
    $page_layout_container = isset( $values['rypecore_page_layout_container'] ) ? esc_attr( $values['rypecore_page_layout_container'][0] ) : 'true';
    $cta_display = isset( $values['rypecore_cta_display'] ) ? esc_attr( $values['rypecore_cta_display'][0] ) : '';
?>

<?php get_header() ?>

<?php 
if($banner_source == 'slides' ) {
    rypecore_get_template_part('template_parts/banner_slider', ['post_id' => $page_id]); 
} else if($banner_source == 'slider_revolution') {
    echo do_shortcode($banner_slider_rev_alias);
} else if($banner_source == 'image_banner') {
    get_template_part('template_parts/subheader'); 
} else {
    do_action( 'rao_custom_banner_source', $banner_source);
}
?>

<?php if($contact_details_display == 'true') { get_template_part('template_parts/contact_details'); } ?>

<section <?php if($page_layout_container == 'true') { echo 'class="module"'; } ?>>
    <div class="<?php if($page_layout_container != 'true') { echo 'container-fluid'; } else { echo 'container'; } ?>">

        <div class="row">
            <?php if($page_layout == 'full') { ?>
                <div class="col-lg-12 <?php if($page_layout_container != 'true') { echo 'col-full'; } ?>">
                    <?php get_template_part('template_parts/loop_page'); ?>
                    <?php get_template_part('template_parts/contact_form'); ?>
                </div>
            <?php } ?>

            <?php if($page_layout == 'right sidebar' || $page_layout == 'left sidebar') { ?>
                <div class="<?php echo $col_class['content']; ?>">
                    <?php get_template_part('template_parts/loop_page'); ?>
                    <?php get_template_part('template_parts/contact_form'); ?>
                </div>
                <div class="<?php echo $col_class['sidebar']; ?>"><?php if(is_active_sidebar($page_layout_widget_area)) { dynamic_sidebar( $page_layout_widget_area ); } ?></div>
            <?php } ?>
        </div><!-- end row -->

    </div><!-- end container -->
</section>

<?php if ( comments_open() || get_comments_number() ) { ?>
    <section class="module no-padding-top"><div class="container"><?php comments_template(); ?></div></section>
<?php } ?>

<?php if($cta_display == 'true') { get_template_part('template_parts/call_to_action'); } ?>

<?php get_footer() ?>
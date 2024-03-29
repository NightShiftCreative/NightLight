<?php 
/*
*   Template Name: Contact
*/
?>

<?php 
    //global settings
    $contact_details_display = ns_core_load_theme_options('ns_core_contact_details_display');

    //page settings
    $page_id = ns_core_get_page_id();
    $values = get_post_custom( $page_id );
    $page_layout = isset( $values['ns_basics_page_layout'] ) ? esc_attr( $values['ns_basics_page_layout'][0] ) : 'full';
    $col_class = ns_core_get_page_col_classes($page_layout);
    $page_layout_widget_area = isset( $values['ns_basics_page_layout_widget_area'] ) ? esc_attr( $values['ns_basics_page_layout_widget_area'][0] ) : 'blog_sidebar';
    $page_layout_container = isset( $values['ns_basics_page_layout_container'] ) ? esc_attr( $values['ns_basics_page_layout_container'][0] ) : 'true';
?>

<?php get_header() ?>

<?php echo ns_core_generate_page_banner($values); ?>

<?php if($contact_details_display == 'true') { get_template_part('template_parts/contact_details'); } ?>

<section <?php if($page_layout_container == 'true') { echo 'class="module module-main"'; } else { echo 'class="module-main"'; } ?>>
    <div class="<?php if($page_layout_container != 'true') { echo 'container-fluid'; } else { echo 'container'; } ?>">

        <div class="row">
            <?php if($page_layout == 'full') { ?>
                <div class="col-lg-12 <?php if($page_layout_container != 'true') { echo 'col-full'; } ?>">
                    <?php get_template_part('template_parts/loop_page'); ?>
                    <?php get_template_part('template_parts/contact_form'); ?>
                </div>
            <?php } ?>

            <?php if($page_layout == 'right sidebar' || $page_layout == 'left sidebar') { ?>
                <div class="<?php echo esc_attr($col_class['content']); ?>">
                    <?php get_template_part('template_parts/loop_page'); ?>
                    <?php get_template_part('template_parts/contact_form'); ?>
                </div>
                <div class="<?php echo esc_attr($col_class['sidebar']); ?>">
                    <?php 
                    do_action('ns_core_before_sidebar');
                    if(is_active_sidebar($page_layout_widget_area)) { dynamic_sidebar( $page_layout_widget_area ); } ?> 
                </div>
            <?php } ?>
        </div><!-- end row -->

    </div><!-- end container -->
</section>

<?php if ( comments_open() || get_comments_number() ) { ?>
    <section class="module module-comments no-padding-top"><div class="container"><?php comments_template(); ?></div></section>
<?php } ?>

<?php get_template_part('template_parts/call_to_action'); ?>

<?php get_footer() ?>
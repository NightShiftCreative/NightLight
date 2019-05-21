<?php
	// Global page banner settings
    $page_banner_bg = ns_core_load_theme_options('ns_core_page_banner_bg');
    $page_banner_bg_display = ns_core_load_theme_options('ns_core_page_banner_bg_display');
    $page_banner_title_align = ns_core_load_theme_options('ns_core_page_banner_title_align');
    $page_banner_overlay = ns_core_load_theme_options('ns_core_page_banner_overlay_display');
    $page_banner_overlay_opacity = ns_core_load_theme_options('ns_core_page_banner_overlay_opacity');
    $page_banner_overlay_color = ns_core_load_theme_options('ns_core_page_banner_overlay_color');
    $page_banner_display_breadcrumb = ns_core_load_theme_options('ns_core_page_banner_display_breadcrumb');
    $page_banner_display_search = ns_core_load_theme_options('ns_core_page_banner_display_search');

    //Individual page banner settings (these overwrite global settings)
    if(!empty($template_args['post_id'])) {
        $values = get_post_custom( $template_args['post_id'] );
    } else {
        $page_id = ns_core_get_page_id();
        $values = get_post_custom( $page_id );
    }

    $banner_title = isset( $values['ns_basics_banner_title'] ) ? $values['ns_basics_banner_title'][0] : '';
    $banner_text = isset( $values['ns_basics_banner_text'] ) ? $values['ns_basics_banner_text'][0] : '';
    $banner_class = isset( $values['ns_basics_banner_class'] ) ? esc_attr( $values['ns_basics_banner_class'][0] ) : '';
    $banner_custom_settings = isset( $values['ns_basics_banner_custom_settings'] ) ? esc_attr( $values['ns_basics_banner_custom_settings'][0] ) : '';

    if($banner_custom_settings == 'true') { 
        $page_banner_bg = isset( $values['ns_basics_banner_bg_img'] ) ? esc_attr( $values['ns_basics_banner_bg_img'][0] ) : '';
        $page_banner_bg_display = isset( $values['ns_basics_banner_bg_display'] ) ? esc_attr( $values['ns_basics_banner_bg_display'][0] ) : '';
        $page_banner_title_align = isset( $values['ns_basics_banner_text_align'] ) ? esc_attr( $values['ns_basics_banner_text_align'][0] ) : '';
        $banner_padding_top = isset( $values['ns_basics_banner_padding_top'] ) ? esc_attr( $values['ns_basics_banner_padding_top'][0] ) : '';
        $banner_padding_bottom = isset( $values['ns_basics_banner_padding_bottom'] ) ? esc_attr( $values['ns_basics_banner_padding_bottom'][0] ) : '';
        $page_banner_overlay = isset( $values['ns_basics_banner_overlay'] ) ? esc_attr( $values['ns_basics_banner_overlay'][0] ) : '';
        $page_banner_overlay_opacity = isset( $values['ns_basics_banner_overlay_opacity'] ) ? esc_attr( $values['ns_basics_banner_overlay_opacity'][0] ) : '0.25';
        $page_banner_overlay_color = isset( $values['ns_basics_banner_overlay_color'] ) ? esc_attr( $values['ns_basics_banner_overlay_color'][0] ) : '#000000';
        $page_banner_display_breadcrumb = isset( $values['ns_basics_banner_breadcrumbs'] ) ? esc_attr( $values['ns_basics_banner_breadcrumbs'][0] ) : '';
        $page_banner_display_search = isset( $values['ns_basics_banner_search'] ) ? esc_attr( $values['ns_basics_banner_search'][0] ) : '';
    }
?>

<section class="module subheader <?php if(!empty($banner_class)) { echo $banner_class; } ?> <?php if($page_banner_title_align == 'right') { echo 'align-right'; } else if($page_banner_title_align == 'center') { echo 'align-center'; } else { echo 'align-left'; } ?> <?php if($page_banner_display_search == 'true') { echo 'has-search-form'; } ?> <?php if(!empty($page_banner_bg)) { echo ns_core_bgDisplay($page_banner_bg_display); } ?>" 
	<?php 
        $custom_style = '';
        if(!empty($page_banner_bg)) { $custom_style .= 'background-image:url('.$page_banner_bg.');'; }
        if(!empty($banner_padding_top)) {$custom_style .= 'padding-top:'.$banner_padding_top.'px;'; }
        if(!empty($banner_padding_bottom)) {$custom_style .= 'padding-bottom:'.$banner_padding_bottom.'px;'; }
        if(!empty($custom_style)) { echo 'style="'.$custom_style.'"'; }
	?>>

    <?php if($page_banner_overlay == 'true') { 
        $page_banner_overlay_rgb = ns_core_hex2rgb($page_banner_overlay_color); ?>
        <div class="img-overlay black" style="<?php if(!empty($page_banner_overlay_rgb)) { echo 'background:rgba('.$page_banner_overlay_rgb[0].', '.$page_banner_overlay_rgb[1].', '.$page_banner_overlay_rgb[2].', '.$page_banner_overlay_opacity.');'; } ?>"></div>
    <?php } ?>

	<div class="container">

        <div class="subheader-title-wrap">

            <?php do_action( 'ns_core_before_subheader_title', $values); ?>

            <!-- BANNER TITLE -->
    		<h1>
    			<?php
                if(!empty($banner_title)) {
                    echo wp_kses_post($banner_title);
                } else if(!empty($template_args['banner_title'])) {
                    echo wp_kses_post($template_args['banner_title']);
                } else if (is_front_page()) {			
    				bloginfo('title');
    			} else if(is_singular('post')) {
                    $page_for_posts = get_option('page_for_posts', true);
                    if(!empty($page_for_posts)) { echo get_the_title( get_option('page_for_posts', true) ); } else { esc_html_e('Blog', 'ns-core'); }
                } else if(is_page() || is_home() || is_single()) {
                    single_post_title();
                } else if(is_tax()) {
                    single_term_title();
                } else if(is_archive()) {
                    the_archive_title();
                } else {
                    wp_title('');
    			}
    			?>

                <!-- BANNER SUB-TEXT -->
                <?php $term_description = term_description(); ?>
                <?php if(!empty($banner_text) || !empty($template_args['banner_text']) || !empty($term_description)) { ?>
                    <span class="subheader-text">
                        <?php 
                        if(!empty($banner_text)) {
                            echo wp_kses_post($banner_text);  
                        } else if(!empty($template_args['banner_text'])) {
                            echo wp_kses_post($template_args['banner_text']); 
                        }
                        ?> 
                        <?php echo term_description(); ?>  
                    </span>
                <?php } ?>      
    		</h1>

            <?php do_action( 'ns_core_after_subheader_title', $values); ?>
        </div>

        <!-- SEARCH FILTER -->
        <?php if($page_banner_display_search == 'true') { ?>
            <div class="search-form-wrap">
                <?php echo get_search_form(); ?>
            </div>
        <?php } ?>

	</div><!-- end container -->

    <!-- BREADCRUMBS -->
    <?php if($page_banner_display_breadcrumb == 'true') { 
        ns_core_breadcrumbs($page_banner_title_align); 
    } ?>

</section>
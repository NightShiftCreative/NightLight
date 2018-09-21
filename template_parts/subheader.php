<?php
	// Global page banner settings
	$page_banner_bg = esc_attr(get_option('rypecore_page_banner_bg'));
	$page_banner_bg_display = esc_attr(get_option('rypecore_page_banner_bg_display'));
	$page_banner_title_align = esc_attr(get_option('rypecore_page_banner_title_align'));
	$page_banner_display_breadcrumb = esc_attr(get_option('rypecore_page_banner_display_breadcrumb'));
	$page_banner_display_search = esc_attr(get_option('rypecore_page_banner_display_search'));

    //Individual page banner settings (these overwrite global settings)
    if(!empty($template_args['post_id'])) {
        $values = get_post_custom( $template_args['post_id'] );
    } else {
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
        } else if(is_404() || is_search() || is_tax()) {
            $values = '';
        } else {
            $values = get_post_custom( $post->ID );
        }
    }

    $banner_title = isset( $values['rypecore_banner_title'] ) ? $values['rypecore_banner_title'][0] : '';
    $banner_text = isset( $values['rypecore_banner_text'] ) ? $values['rypecore_banner_text'][0] : '';
    $banner_bg_img = isset( $values['rypecore_banner_bg_img'] ) ? esc_attr( $values['rypecore_banner_bg_img'][0] ) : '';
    $banner_bg_display = isset( $values['rypecore_banner_bg_display'] ) ? esc_attr( $values['rypecore_banner_bg_display'][0] ) : '';
    $banner_overlay = isset( $values['rypecore_banner_overlay'] ) ? esc_attr( $values['rypecore_banner_overlay'][0] ) : '';
    $banner_overlay_opacity = isset( $values['rypecore_banner_overlay_opacity'] ) ? esc_attr( $values['rypecore_banner_overlay_opacity'][0] ) : '0.25';
    $banner_overlay_color = isset( $values['rypecore_banner_overlay_color'] ) ? esc_attr( $values['rypecore_banner_overlay_color'][0] ) : '#000000';
    $banner_overlay_rgb = rypecore_hex2rgb($banner_overlay_color);
    $banner_text_align = isset( $values['rypecore_banner_text_align'] ) ? esc_attr( $values['rypecore_banner_text_align'][0] ) : '';
    if(!empty($banner_text_align) && $banner_text_align != $page_banner_title_align) { $page_banner_title_align = $banner_text_align; }
    $banner_padding_top = isset( $values['rypecore_banner_padding_top'] ) ? esc_attr( $values['rypecore_banner_padding_top'][0] ) : '';
    $banner_padding_bottom = isset( $values['rypecore_banner_padding_bottom'] ) ? esc_attr( $values['rypecore_banner_padding_bottom'][0] ) : '';
?>

<section class="module subheader <?php if($page_banner_title_align == 'right') { echo 'align-right'; } else if($page_banner_title_align == 'center') { echo 'align-center'; } else { echo 'align-left'; } ?> <?php if($page_banner_display_search == 'true') { echo 'has-search-form'; } ?> <?php if(!empty($banner_bg_img)) { echo rypecore_bgDisplay($banner_bg_display); } else if(!empty($page_banner_bg)) { echo rypecore_bgDisplay($page_banner_bg_display); } ?>" 
	<?php 
        $custom_style = '';
		if(!empty($banner_bg_img)) { 
			$custom_style .= 'background-image:url('.$banner_bg_img.');'; 
		} else if (!empty($page_banner_bg)) {
			$custom_style .= 'background-image:url('.$page_banner_bg.');';
		}
        if(!empty($banner_padding_top)) {$custom_style .= 'padding-top:'.$banner_padding_top.'px;'; }
        if(!empty($banner_padding_bottom)) {$custom_style .= 'padding-bottom:'.$banner_padding_bottom.'px;'; }
        if(!empty($custom_style)) { echo 'style="'.$custom_style.'"'; }
	?>>

    <?php if($banner_overlay == 'true') { ?>
        <div class="img-overlay black" style="<?php if(!empty($banner_overlay_rgb)) { echo 'background:rgba('.$banner_overlay_rgb[0].', '.$banner_overlay_rgb[1].', '.$banner_overlay_rgb[2].', '.$banner_overlay_opacity.');'; } ?>"></div>
    <?php } ?>

	<div class="container">

        <div class="subheader-title-wrap">

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
                    if(!empty($page_for_posts)) { echo get_the_title( get_option('page_for_posts', true) ); } else { esc_html_e('Blog', 'rypecore'); }
                } else if(is_page() || is_home() || is_single()) {
                    single_post_title();
                } else if(is_archive()) {
                    the_archive_title();
                } else if(is_tax()) {
                    single_term_title();
                } else {
                    wp_title('');
    			}
    			?>

                <!-- BANNER SUB-TEXT -->
                <?php if(!empty($banner_text) || !empty($template_args['banner_text']) || !empty(term_description())) { ?>
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

            <!-- RYPE BASICS HOOK -->
            <?php do_action( 'rype_basics_after_subheader_title', $values); ?>
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
        rypecore_breadcrumbs($page_banner_title_align); 
    } ?>

</section>
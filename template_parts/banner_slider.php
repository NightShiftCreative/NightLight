<?php
    //Global Settings
    $icon_set = ns_core_load_theme_options('ns_core_icon_set');

    //Page Settings
    if(!empty($template_args['post_id'])) {
        $values = get_post_custom( $template_args['post_id'] );
    } else {
        $values = get_post_custom( $post->ID );
    }
    $banner_source = isset( $values['ns_basics_banner_source'] ) ? esc_attr( $values['ns_basics_banner_source'][0] ) : 'image_banner';
    $banner_slider_cat = isset( $values['ns_basics_banner_slider_cat'] ) ? esc_attr( $values['ns_basics_banner_slider_cat'][0] ) : '';
    $banner_slider_layout = isset( $values['ns_basics_banner_slider_layout'] ) ? esc_attr( $values['ns_basics_banner_slider_layout'][0] ) : 'minimal';
    $banner_slider_num = isset( $values['ns_basics_banner_slider_num'] ) ? esc_attr( $values['ns_basics_banner_slider_num'][0] ) : '3';
?>

<?php
	$slide_listing_args = array(
	    'post_type' => $banner_source,
	    'posts_per_page' => $banner_slider_num,
        'slide_category' => $banner_slider_cat, 
	);

	$slide_listing_query = new WP_Query( $slide_listing_args );
?>

<?php if($slide_listing_query->found_posts != 0) { ?>
	
	<section class="subheader subheader-slider">
		<div class="slider-wrap">

			<div class="slider-nav slider-nav-simple-slider">
		  		<span class="slider-prev"><i class="fa fa-angle-left"></i></span>
		  		<span class="slider-next"><i class="fa fa-angle-right"></i></span>
		  	</div>

		  	<div class="slider slider-simple <?php if($banner_slider_layout == 'detailed') { echo 'slider-advanced'; } ?>">

			    <?php if ( $slide_listing_query->have_posts() ) : while ( $slide_listing_query->have_posts() ) : $slide_listing_query->the_post(); ?>

			    	<?php
				    	$slide_values = get_post_custom( $post->ID );
                        $slide_text_align = isset( $slide_values['ns_basics_slide_text_align'] ) ? esc_attr( $slide_values['ns_basics_slide_text_align'][0] ) : '';
						$slide_button_link = isset( $slide_values['ns_basics_slide_button_link'] ) ? $slide_values['ns_basics_slide_button_link'][0] : '';
						$slide_button_text = isset( $slide_values['ns_basics_slide_button_text'] ) ? $slide_values['ns_basics_slide_button_text'][0] : 'Contact Us';	
                        $slide_overlay = isset( $slide_values['ns_basics_slide_overlay'] ) ? $slide_values['ns_basics_slide_overlay'][0] : 'true';
                        $slide_overlay_opacity = isset( $slide_values['ns_basics_slide_overlay_opacity'] ) ? $slide_values['ns_basics_slide_overlay_opacity'][0] : '0.25';
                        $slide_overlay_color = isset( $slide_values['ns_basics_slide_overlay_color'] ) ? $slide_values['ns_basics_slide_overlay_color'][0] : '#000000';
                        $slide_overlay_rgb = ns_core_hex2rgb($slide_overlay_color);

			    		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
					    
			    	?>

			    	<?php if($banner_slider_layout == 'detailed') { ?>
			    		<div class="slide slide-detailed <?php if($slide_text_align == 'left') { echo 'slide-left'; } else if($slide_text_align == 'right') { echo 'slide-right'; } else if($slide_text_align == 'center') { echo 'slide-center'; } ?>" style="background-image:url('<?php echo esc_url($url); ?>');">
							
                            <?php if($slide_overlay == 'true') { ?>
                                <div class="img-overlay black" style="<?php if(!empty($slide_overlay_rgb)) { echo 'background:rgba('.$slide_overlay_rgb[0].', '.$slide_overlay_rgb[1].', '.$slide_overlay_rgb[2].', '.$slide_overlay_opacity.');'; } ?>"></div>
                            <?php } ?>

							<div class="container">
								<div class="slide-content">
            						<h1><?php the_title(); ?></h1>
									<div class="slide-text"><?php the_content(); ?></div>
            						<?php if(!empty($slide_button_text)) { echo '<a href="'.$slide_button_link.'" class="button alt button-icon"><i class="fa fa-angle-right"></i>'.$slide_button_text.'</a>'; } ?>
            					</div>
							</div>
						</div>
			    	<?php } else { ?>
			    		<div class="slide <?php if($slide_text_align == 'left') { echo 'slide-left'; } else if($slide_text_align == 'right') { echo 'slide-right'; } ?>" style="background-image:url('<?php echo esc_url($url); ?>');">
							
                            <?php if($slide_overlay == 'true') { ?>
                                <div class="img-overlay black" style="<?php if(!empty($slide_overlay_rgb)) { echo 'background:rgba('.$slide_overlay_rgb[0].', '.$slide_overlay_rgb[1].', '.$slide_overlay_rgb[2].', '.$slide_overlay_opacity.');'; } ?>"></div>
                            <?php } ?>

							<div class="container">
                                <div class="slide-content">
    								<h1><?php the_title(); ?></h1>
                                    <div class="slide-text"><?php the_content(); ?></div>
                                    <?php if(!empty($slide_button_text)) { ?>
	                                    <div class="slider-simple-buttons">
	    									<?php echo '<a href="'.$slide_button_link.'" class="button alt">'.$slide_button_text.'</a>'; ?>
	    								</div>
	    							<?php } ?>
                                </div>
							</div>
						</div>
			    	<?php } ?>

				<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			    <?php else: ?>
			    <?php endif; ?>

			</div><!-- end slider -->
		</div><!-- end slider wrap -->
	</section>

<?php } else { ?>
	<section class="module subheader">
		<div class="container">
			<p><?php echo ns_core_get_icon($icon_set, 'pencil'); ?> <?php esc_html_e('No slides have been posted yet.', 'ns-core'); ?> <?php if(is_user_logged_in()) { echo '<i><b><a target="_blank" href="'. esc_url(home_url('/')) .'wp-admin/post-new.php?post_type=slides">Click here</a> to add a new slide.</b></i>'; } ?></p>
		</div>
	</section>
<?php } ?>
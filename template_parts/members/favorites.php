<?php 
global $current_user, $wp_roles;
 $icon_set = esc_attr(get_option('rypecore_icon_set', 'fa'));
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
?>    

<!-- start user dashboard -->
<div class="user-dashboard">
	<?php if(is_user_logged_in()) { ?>
		
		<?php
		$all_types = get_post_types( array( 'public' => true ) );

		$post_favorites_args = array(
	        'post_type' => $all_types,
	        'posts_per_page' => -1,
	        'paged' => $paged,
	        'meta_query' => array (
	            array (
	                'key' => '_user_liked',
	                'value' => $current_user->ID,
	                'compare' => 'LIKE'
	            )
	        )
	    );
	    $post_favorites_query = new WP_Query( $post_favorites_args );
		?>

		<h4>
			<?php if(function_exists('rao_show_user_likes_count')) {
			    $show_user_likes_count = rao_show_user_likes_count($current_user); 
			    echo rao_sl_format_count($show_user_likes_count );
			} ?>
			<?php esc_html_e('Favorites', 'rypecore'); ?>
		</h4>

		<table class="favorites-listing">
			<tr class="favorites-listing-header">
	            <td class="favorites-listing-img"><?php esc_html_e('Image', 'rypecore'); ?></td>
	            <td class="favorites-listing-title"><?php esc_html_e('Title', 'rypecore'); ?></td>
	            <td class="favorites-listing-type"><?php esc_html_e('Post Type', 'rypecore'); ?></td>
	            <td class="favorites-listing-actions"><?php esc_html_e('Actions', 'rypecore'); ?></td>
	        </tr>

	        <?php if ( $post_favorites_query->have_posts() ) : while ( $post_favorites_query->have_posts() ) : $post_favorites_query->the_post(); ?>
	        	
	        	<?php
	        	$post_type = get_post_type();
	        	foreach($all_types as $type) {
					if($type == $post_type) {
						$post_type_data = get_post_type_object($type);
						$post_type_slug = $post_type_data->rewrite['slug'];
						if(!empty($post_type_slug )) { $post_type = $post_type_slug; }
					}
				} ?>

	        	<tr>
	        		<td class="favorites-listing-img"><?php if(has_post_thumbnail()) { the_post_thumbnail('thumb'); } else { echo '--'; } ?></td>
	        		<td class="favorites-listing-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
	        		<td class="favorites-listing-type"><?php echo $post_type; ?></td>
	        		<td class="favorites-listing-actions">
	        			<a href="<?php the_permalink(); ?>"><?php echo rypecore_get_icon($icon_set, 'eye', 'eye', 'preview'); ?><?php esc_html_e('View', 'rypecore'); ?></a>
	        			<?php if(function_exists('rao_get_post_likes_button')) { echo rao_get_post_likes_button(get_the_ID()).' Unlike'; } ?>
	        		</td>
	        	</tr>
	        <?php endwhile; ?>
	        <?php else: ?>
	        	<tr><td colspan="3"><?php esc_html_e('You have not liked any posts.', 'rypecore'); ?></td></tr>
                <?php wp_reset_postdata(); ?>
	        <?php endif; ?>
		</table>

		<!-- hook in for Rype Add-Ons -->
        <?php do_action( 'rao_after_favorites'); ?>

	<?php } else {
        get_template_part('template_parts/members/alert_not_logged_in');
    } ?>
</div><!-- end user dashboard -->
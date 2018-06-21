<?php 
global $current_user, $wp_roles;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
?>    

<!-- start user dashboard -->
<div class="user-dashboard">
	<?php if(is_user_logged_in()) { ?>
		
		<?php
		$post_favorites_args = array(
	        'post_type' => 'post',
	        'posts_per_page' => 8,
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

		<h4><?php esc_html_e('Post Likes', 'rypecore'); ?></h4>
		<table class="favorites-listing">
			<tr class="favorites-listing-header">
	            <td class="favorites-listing-img"><?php esc_html_e('Image', 'rypecore'); ?></td>
	            <td class="favorites-listing-title"><?php esc_html_e('Title', 'rypecore'); ?></td>
	            <td class="favorites-listing-actions"><?php esc_html_e('Actions', 'rypecore'); ?></td>
	        </tr>

	        <?php if ( $post_favorites_query->have_posts() ) : while ( $post_favorites_query->have_posts() ) : $post_favorites_query->the_post(); ?>
	        	<tr>
	        		<td><?php if(has_post_thumbnail()) { the_post_thumbnail(); } else { echo '--'; } ?></td>
	        		<td><?php the_title(); ?></td>
	        		<td><a href="<?php the_permalink(); ?>"><?php esc_html_e('View', 'rypecore'); ?></a></td>
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
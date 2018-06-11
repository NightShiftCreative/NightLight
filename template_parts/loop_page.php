<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="content"><?php the_content(); ?></div>
<?php endwhile; else: ?>
	<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'rypecore'); ?></p>
<?php endif; ?>
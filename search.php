
<?php get_header() ?>

<?php get_template_part('template_parts/subheader'); ?>

<section class="module">
    <div class="container">

        <h5><?php echo '<strong>'.$wp_query->post_count.'</strong> '. esc_html__('search results found', 'rypecore'); ?></h5><br/>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="blog-post shadow-hover search-result-item">
                <?php if($post->post_type == 'post') { esc_html_e( 'Blog Post >', 'rypecore' ); } ?>
                <?php if($post->post_type == 'page') { esc_html_e( 'Page >', 'rypecore' ); } ?>
                <?php if($post->post_type == 'properties') { esc_html_e( 'Property >', 'rypecore' ); } ?>
                <?php if($post->post_type == 'agents') { esc_html_e( 'Agent >', 'rypecore' ); } ?>
                <h4><?php the_title(); ?></h4>
            </a>

        <?php endwhile; ?>
        <?php else: ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'rypecore'); ?></p>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div><!-- end container -->
</section>

<?php get_footer() ?>
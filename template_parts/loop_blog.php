<?php $icon_set = ns_core_load_theme_options('ns_core_icon_set'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
    <?php get_template_part('template_parts/loop_blog_post'); ?>                
    <?php comments_template(); ?>
                    
<?php endwhile; ?>

    <?php 
	wp_reset_postdata();
    $big = 999999999; // need an unlikely integer

    $args = array(
        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'       => '/page/%#%',
        'total'        => $wp_query->max_num_pages,
        'current'      => max( 1, get_query_var('paged') ),
        'show_all'     => False,
        'end_size'     => 1,
        'mid_size'     => 2,
        'prev_next'    => True,
        'prev_text'    => esc_html__('&raquo; Previous', 'ns-core'),
        'next_text'    => esc_html__('Next &raquo;', 'ns-core'),
        'type'         => 'plain',
        'add_args'     => False,
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    ); ?>

    <div class="page-list">
    <?php echo paginate_links( $args ); ?> 
    </div>

<?php else: ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'ns-core'); ?></p>
<?php endif; ?>
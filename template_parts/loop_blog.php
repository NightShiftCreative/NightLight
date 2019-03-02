<?php $icon_set = ns_core_load_theme_options('ns_core_icon_set'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
    <!-- start post -->
    <article <?php post_class(); ?>>
        <div class="blog-post shadow-hover">
									
            <?php if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink(); ?>" class="blog-post-img">
                <div class="img-fade"></div>
                <div class="blog-post-date"><?php the_time('\<\s\p\a\n\>j\<\/\s\p\a\n\> M') ?></div>
                <?php the_post_thumbnail('full'); ?>
            </a>
            <?php } ?>

            <div class="content blog-post-content">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="blog-post-details">
                    <li><?php echo ns_core_get_icon($icon_set, 'user'); ?><?php esc_html_e('Posted by', 'ns-core'); ?> <?php the_author_link(); ?> <?php esc_html_e('in', 'ns-core'); ?> <?php the_category(', '); ?></li>
                    <li><?php echo ns_core_get_icon($icon_set, 'comment', 'bubble-dots', 'pencil'); ?><?php comments_number(); ?></li>
                    <?php do_action('ns_core_after_post_meta'); ?>
                </ul>
                <?php 
                if(is_single()) { 
                    the_content(); 
                    wp_link_pages();
                } else {
                    the_excerpt(); ?>
                    <a class="button button-icon small alt" href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i><?php esc_html_e('Read More', 'ns-core'); ?></a>
                <?php } ?>
                                        
                <?php if(has_tag()) { ?>
                    <div class="tag-list right">
                        <?php echo ns_core_get_icon($icon_set, 'tag'); ?>
                        <?php the_tags('',', ',''); ?>
                    </div>
                    <div class="clear"></div>
                <?php } ?>

            </div>
									
        </div>
    </article>
    <!-- end post -->
						
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
<?php
$icon_set = ns_core_load_theme_options('ns_core_icon_set');
$author_id = get_the_author_meta('ID');
$author_display_name = get_the_author_meta('user_nicename');
 ?>

<article <?php post_class(); ?>> 
    <div class="blog-post shadow-hover">
                                    
        <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" class="blog-post-img">
            <div class="img-fade"></div>
            <div class="blog-post-date"><?php the_time('\<\s\p\a\n\>j\<\/\s\p\a\n\> M') ?></div>
            <?php if(isset($blog_thumb) && $blog_thumb == true) { the_post_thumbnail('ns-blog-thumb'); } else { the_post_thumbnail('ns-blog-full'); } ?>
        </a>
        <?php } ?>

        <div class="content blog-post-content">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <ul class="blog-post-details">
                <li class="blog-post-details-author"><?php echo ns_core_get_icon($icon_set, 'user'); ?><?php esc_html_e('Posted by', 'ns-core'); ?> <?php echo '<a href="'.get_author_posts_url($author_id).'">'.$author_display_name.'</a>'; ?> <?php esc_html_e('in', 'ns-core'); ?> <?php the_category(', '); ?></li>
                <li class="blog-post-details-comments"><?php echo ns_core_get_icon($icon_set, 'comment', 'bubble-dots', 'pencil'); ?><?php comments_number(); ?></li>
                <?php do_action('ns_core_after_post_meta'); ?>
            </ul>
                
            <?php 
            if(is_single()) { 
                the_content(); 
                wp_link_pages();
            } else { ?>
                <p><?php if(!empty($excerpt_length)) { echo wp_trim_words(get_the_excerpt(), $excerpt_length); } else { echo get_the_excerpt(); } ?></p>
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
<?php
$icon_set = ns_core_load_theme_options('ns_core_icon_set');
 ?>

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
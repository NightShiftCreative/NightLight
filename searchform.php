<form class="search-form" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="text" name="s" id="search" placeholder="<?php esc_html_e( 'Search...', 'rypecore' ); ?>" value="<?php the_search_query(); ?>" />
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
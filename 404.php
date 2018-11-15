<?php get_header() ?>

<?php get_template_part('template_parts/subheader'); ?>

<section class="module module-main page-not-found">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
        		<h2><?php esc_html_e( '404', 'ns-core' ); ?></h2>
                <h3><?php esc_html_e( 'Page not found.', 'ns-core' ); ?></h3>
        		<p><?php esc_html_e( 'Oops! The page you are looking for does not exist.', 'ns-core' ); ?></p>

                <?php get_search_form(); ?>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button button-icon"><i class="fa fa-angle-left"></i> <?php esc_html_e( 'Go Back Home', 'ns-core' ); ?></a>
            </div>
        </div>

    </div><!-- end container -->
</section>

<?php get_footer() ?>
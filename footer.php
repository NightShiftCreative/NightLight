<?php
    $hide_footer_widget_area = ns_core_load_theme_options('ns_core_hide_footer_widget_area');
    $footer_bg = ns_core_load_theme_options('ns_core_footer_bg');
    $footer_bg_display = ns_core_load_theme_options('ns_core_footer_bg_display');
    $display_bottombar = ns_core_load_theme_options('ns_core_display_bottombar');
    $bottom_bar_text = ns_core_load_theme_options('ns_core_bottom_bar_text', false, false);
?>

<?php if($hide_footer_widget_area != "true") { ?>
<footer id="footer" <?php if(!empty($footer_bg)) { echo 'class="'.ns_core_bgDisplay($footer_bg_display).'"'; } ?>>
    
    <?php do_action('ns_core_before_footer'); ?>

    <div class="container">
        <div class="row">
            <?php if ( dynamic_sidebar(esc_html__( 'Footer', 'ns-core' )) && is_active_sidebar(esc_html__( 'Footer', 'ns-core' )) ) : else : endif; ?>
        </div><!-- end row -->
    </div><!-- end footer container -->

    <?php do_action('ns_core_after_footer'); ?>

</footer>
<?php } ?>

<?php if($display_bottombar == "true") { ?>
<div class="bottom-bar">
	<div class="container">
		<?php if(!empty($bottom_bar_text)) { ?><span><?php echo wp_kses_post($bottom_bar_text); ?></span><?php } ?>
	</div>
</div>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
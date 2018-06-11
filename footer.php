<?php
	$hide_footer_widget_area = esc_attr(get_option('rypecore_hide_footer_widget_area'));
    $footer_bg = esc_attr(get_option('rypecore_footer_bg'));
    $footer_bg_display = esc_attr(get_option('rypecore_footer_bg_display'));
	$display_bottombar = esc_attr(get_option('rypecore_display_bottombar', 'true'));
    $sitelink = 'http://rypecreative.com/';
    $bottom_bar_text_default = get_bloginfo('title').' | Theme by <a href="'.$sitelink.'" target="_blank">Rype Creative</a> | &copy; '. date('Y');
	$bottom_bar_text = get_option('rypecore_bottom_bar_text', $bottom_bar_text_default);
?>

<?php if($hide_footer_widget_area != "true") { ?>
<footer id="footer" <?php if(!empty($footer_bg)) { echo 'class="'.rypecore_bgDisplay($footer_bg_display).'"'; } ?>>
    <div class="container">
        <div class="row">
            <?php if ( dynamic_sidebar(esc_html__( 'Footer', 'rypecore' )) && is_active_sidebar(esc_html__( 'Footer', 'rypecore' )) ) : else : endif; ?>
        </div><!-- end row -->
    </div><!-- end footer container -->
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
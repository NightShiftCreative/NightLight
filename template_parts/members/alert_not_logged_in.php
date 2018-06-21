<?php $members_login_page = esc_attr(get_option('rypecore_members_login_page')); ?>

<div class="alert-box info">
    <p><?php esc_html_e( 'You must be logged in to view this page.', 'rypecore' ); ?></p>
    <?php if(!empty($members_login_page)) { ?><a class="button small" href="<?php echo $members_login_page; ?>"><?php esc_html_e( 'Login', 'rypecore' ); ?></a><?php } ?>
</div>
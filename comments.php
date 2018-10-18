<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ns-core'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'ns-core') ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'ns-core') ); ?></div>
		</nav>
	<?php endif; ?>

	<div class="widget comment-list">
        <div class="module-header module-header-left">
            <h4 class="comments-title">
                <span>
                    <?php printf( _n( 'Comments', 'Comments <span class="button grey">%1$s</span>', get_comments_number(), 'ns-core'), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
                </span> 
            </h4>
            <div class="widget-divider"><div class="bar"></div></div>
        </div>
		<ul>
			<?php wp_list_comments('type=comment&callback=ns_core_comment_list&max_depth=3') ?>
		</ul>
	</div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ns-core'); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'ns-core') ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'ns-core') ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ns-core'); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<div class="widget">
		<?php 
            $comment_notes_allowed = array('abbr' => array('title' => array()));
            comment_form( array(
				'title_reply' => '<div class="module-header module-header-left"><h4><span>Leave a Comment</span></h4><div class="widget-divider"><div class="bar"></div></div></div>',
				'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( wp_kses(__( 'View Available <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes %s:', 'ns-core' ), $comment_notes_allowed), ' <br/><code>' . allowed_tags() . '</code>' ) . '</p>'
			)); 
		?>
	</div>

</div><!-- #comments -->

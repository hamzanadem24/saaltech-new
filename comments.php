<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to ivan_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package ivan_framework
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$commentsClass = '';

if( '0' != get_comments_number() )
	$commentsClass = ' has-comments';
?>

<div id="comments" class="comments-area <?php echo esc_attr($commentsClass); ?>">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				echo wp_kses_post( sprintf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'bomby' ),
					number_format_i18n( get_comments_number() ) ) );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="hidden"><?php esc_html_e( 'Comment navigation', 'bomby' ); ?></h1>
			<div class="row">
				<div class="col-md-6 nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'bomby' ) ); ?></div>
				<div class="col-md-6 nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'bomby' ) ); ?></div>
			</div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use ivan_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define ivan_comment() and that will be used instead.
				 * See ivan_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'ivan_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="hidden"><?php esc_html_e( 'Comment navigation', 'bomby' ); ?></h1>
			<div class="row">
				<div class="col-xs-6 col-md-6 nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'bomby' ) ); ?></div>
				<div class="col-xs-6 col-md-6 nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'bomby' ) ); ?></div>
			</div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bomby' ); ?></p>
	<?php endif; ?>

	<?php comment_form( array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'comment_field' =>  '<div class="comment-form-field comment-form-comment">
		<label for="comment">' . esc_html__('Your Comment', 'bomby') . '<span>*</span></label>
		<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
	)); ?>

</div><!-- #comments -->

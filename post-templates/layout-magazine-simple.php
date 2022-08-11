<?php
/**
 * The template part for displaying blog posts with large posts in full width size
 *
 * @package ivan_framework
 */

wp_enqueue_script( 'wpb_composer_front_js' );

$containerCols = apply_filters('ivan_blog_container', 'col-md-10 col-md-offset-1');
?>

<?php
	// Used to print another 
	do_action('ivan_blog_before');
?>

<div class="<?php echo esc_attr($containerCols); ?>">
	
	<?php do_action('ivan_before_post_loop'); ?>

	<?php if ( have_posts() ) : 
	?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post();

		?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'post-templates/magazine-simple/content', get_post_format() );
			?>

		<?php endwhile; ?>

		<?php 
		if (ivan_get_option('blog-disable-pagination') != 1):
			ivan_paging_nav(null, 'style2');
		endif; ?>

	<?php else : ?>

		<?php get_template_part( 'post-templates/content', 'none' ); ?>

	<?php endif; ?>

</div>

<?php
	do_action('ivan_blog_after');
?>
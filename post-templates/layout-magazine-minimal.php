<?php
/**
 * The template part for displaying blog posts with large posts in full width size
 *
 * @package ivan_framework
 */

wp_enqueue_script( 'wpb_composer_front_js' );

$containerCols = apply_filters('ivan_blog_container', 'col-md-12');
?>

<?php
	// Used to print another 
	do_action('ivan_blog_before');
?>

<div class="<?php echo esc_attr($containerCols); ?>">
	
	<?php do_action('ivan_before_post_loop'); ?>

	<div class="ivan-custom-wrapper theme_default">
		<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
	
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
					get_template_part( 'post-templates/magazine-minimal/content', get_post_format() );
				?>

			<?php endwhile; ?>
			
			<?php 
			if (ivan_get_option('blog-disable-pagination') != 1):
				ivan_paging_nav(null,'style2');
			endif; ?>

		<?php else : ?>

			<?php get_template_part( 'post-templates/content', 'none' ); ?>

		<?php endif; ?>
	
		</div> 
		<div class="vc_row-full-width"></div>
	</div> <!-- .ivan-custom-wrapper -->

</div>

<?php
	do_action('ivan_blog_after');
?>
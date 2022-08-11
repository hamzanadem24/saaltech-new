<?php
/**
 * @package ivan_framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-inner">

		<header class="entry-header">
			
			<?php
			// Meta
			get_template_part('post-templates/parts/part', 'meta-small'); ?>

			<?php
			// Title
			get_template_part('post-templates/parts/part', 'title'); ?>

		</header><!-- .entry-header -->

		<?php
		// Content
		get_template_part('post-templates/parts/part', 'content'); ?>	

	</div><!-- .entry-inner -->
	
	<?php
	// Thumbnail - displays thumbnail if exists and considering the Post Format being used
	do_action( 'ivan_display_thumbnail', 'image' ); 
	?>

</article><!-- #post-## -->
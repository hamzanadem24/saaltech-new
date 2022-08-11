<?php
/**
 * @package ivan_framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
		$ivan_current_post = $oArgs -> get('ivan_current_post');

		$ivan_current_post['content'] = get_the_content( '' );

		$oArgs -> set('ivan_current_post', $ivan_current_post);

		// Displays thumbnail if exists and considering the Post Format being used
		do_action( 'ivan_display_thumbnail', 'gallery' ); 

		$ivan_current_post = $oArgs -> get('ivan_current_post');
	?>

	<div class="entry-inner">
		
		<svg class="hidden">
			<defs>
				<symbol id="icon-prev" viewBox="0 0 100 50">
					<title>prev</title>
					<polygon points="5.4,25 18.7,38.2 22.6,34.2 16.2,27.8 94.6,27.8 94.6,22.2 16.2,22.2 22.6,15.8 18.7,11.8"/>
				</symbol>
				<symbol id="icon-next" viewBox="0 0 100 50">
					<title>next</title>
					<polygon points="81.3,11.8 77.4,15.8 83.8,22.2 5.4,22.2 5.4,27.8 83.8,27.8 77.4,34.2 81.3,38.2 94.6,25 "/>
				</symbol>
				<clipPath id="polygon-clip-rhomboid" clipPathUnits="objectBoundingBox">
					<polygon points="0 1, 0.3 0, 1 0, 0.7 1" />
				</clipPath>
			</defs>
		</svg>
		
		<?php
		// Date Block
		get_template_part('post-templates/parts/part', 'date-block'); ?>

		<div class="entry-infos-holder">

			<header class="entry-header">

				<?php
				// Title
				get_template_part('post-templates/parts/part', 'title'); ?>


			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				echo apply_filters( 'the_content', $ivan_current_post['content'] ); // Replaces the_content function call ?>
			</div><!-- .entry-content -->
		
			<?php
			// Meta
			get_template_part('post-templates/parts/part', 'meta-clean'); ?>

			<?php
			// Read More
			get_template_part('post-templates/parts/part', 'read-more'); ?>

		</div> <!-- .entry-infos-holder -->

	</div><!-- .entry-inner -->

</article><!-- #post-## -->
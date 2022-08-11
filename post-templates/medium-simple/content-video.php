<?php
/**
 * @package ivan_framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<div class="col-md-12 post-left-area">
			<?php
				$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
				$ivan_current_post = $oArgs -> get('ivan_current_post');

				$ivan_current_post['content'] = get_the_content( esc_html__( 'Continue reading', 'bomby' ).' <span class="meta-nav">&rarr;</span>' );

				$oArgs -> set('ivan_current_post', $ivan_current_post);

				// Displays thumbnail if exists and considering the Post Format being used
				do_action( 'ivan_display_thumbnail', 'video' ); 

				$ivan_current_post = $oArgs -> get('ivan_current_post');
			?>
			
			<div class="entry-inner">

				<header class="entry-header">
					
					<?php
					// Meta
					get_template_part('post-templates/parts/part', 'meta'); ?>


					<?php
					// Title
					get_template_part('post-templates/parts/part', 'title'); ?>

				</header><!-- .entry-header -->	

				<?php
				// Read More
				get_template_part('post-templates/parts/part', 'read-more'); ?>

			</div><!-- .entry-inner -->

		</div>

	</div><!-- row -->

</article><!-- #post-## -->
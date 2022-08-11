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
			get_template_part('post-templates/parts/part', 'meta-date'); ?>

		</header><!-- .entry-header -->

		<div class="entry-content">

			<i class="status-mark fa fa-twitter pull-left"></i>

			<div class="status-main">
				<?php the_content(); ?>
				<?php if( '' != get_the_title() ) : ?>
					<cite><a href="https://twitter.com/<?php the_title(); ?>" target= "_blank">@<?php the_title(); ?></a></cite>
				<?php endif; ?>
			</div>
		</div><!-- .entry-content -->

	</div><!-- .entry-inner -->

</article><!-- #post-## -->
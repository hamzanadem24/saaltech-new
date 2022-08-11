<?php
if( true == ivan_get_option('single-post-nav') ) :
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( '' != $next OR '' != $previous ) {
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="hidden"><?php esc_html_e( 'Post navigation', 'bomby' ); ?></h1>
		<div class="row nav-links">

			<div class="col-xs-6 col-md-6 next-link">
				<?php if( '' != $next ) : ?>
				<span><?php esc_html_e('Next', 'bomby'); ?></span>
				<h4><a href="<?php echo esc_url(get_permalink( $next->ID )); ?>"><?php echo esc_html($next->post_title); ?></a></h4>
				<?php endif; ?>
			</div>

			<div class="col-xs-6 col-md-6 previous-link">
				<?php if( '' != $previous ) : ?>
				<span><?php esc_html_e('Previous', 'bomby'); ?></span>
				<h4><a href="<?php echo esc_url(get_permalink( $previous->ID )); ?>"><?php echo esc_html($previous->post_title); ?></a></h4>
				<?php endif; ?>
			</div>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
	}
endif;
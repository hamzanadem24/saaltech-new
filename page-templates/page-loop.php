<?php
	if( !is_archive() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'page-templates/content', 'page' ); ?>
		
		<?php
		if( true == ivan_get_option('page-comments-switch') || !class_exists( 'ReduxFramework' ) ) :
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		endif;
		?>

	<?php endwhile; // end of the loop. ?>
<?php
	else :

		$custom_args = array(
			'post_type' => 'page'
		);
		$customQuery = new WP_Query( $custom_args );

		while( $customQuery->have_posts() ) {
			$customQuery->the_post();
			
			the_content();
		}

		wp_reset_postdata();

	endif; ?>
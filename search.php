<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package ivan_framework
 */

get_header(); ?>

	<?php

	$_classes = '';

	// Title Logic
	if( ( false == ivan_get_option('archives-disable-title') && false == ivan_get_option('blog-boxed-page') )
		OR true == ivan_get_option('header-negative-height') ) :
		do_action( 'ivan_title_wrapper' );
	else :
		
		echo apply_filters('ivan_blog_divider', '<div class="title-wrapper-divider blog-version"></div>');

		$_classes .= ' no-title-wrapper';
	endif;

	do_action( 'ivan_content_before' ); 
	?>

	<div class="<?php echo apply_filters( 'iv_content_wrapper_classes', 'iv-layout content-wrapper search ', 'blog' ); ?><?php echo esc_attr($_classes); ?>">
		<div class="container">

			<?php
			// Boxed Page Logic
			if( true == ivan_get_option('blog-boxed-page') ) : ?>
			<div class="boxed-page-wrapper">
				
				<?php
				// Adds Title
				if( false == ivan_get_option('archives-disable-title') && true == ivan_get_option('blog-boxed-page')
					&& false == ivan_get_option('header-negative-height') ) :
					do_action( 'ivan_title_wrapper' );
				endif; ?>

				<div class="boxed-page-inner">
			<?php endif; ?>

				<div class="row">

					<div class="col-md-9 site-main sidebar-enabled sidebar-right" role="main">

						<?php if ( have_posts() ) : 

							$_perPage = get_query_var('posts_per_page');
							
							if( get_query_var('paged') <= 0 )
								$_paged = 1;
							else
								$_paged = get_query_var('paged');

							$_search_number = 1 + ($_perPage * ($_paged - 1) );

							$oThemeArguments = Ivan_ThemeArguments::getInstance( 'search' );
							$oThemeArguments -> set( '_search_number', $_search_number );
							?>

							<div class="search-panel">

								<?php
								global $wp_query;
								$total_results = $wp_query->found_posts;
								?>

								<h4><?php esc_html_e('Displaying results to', 'bomby'); ?> "<?php echo get_search_query(); ?>". <?php echo intval($total_results); ?> <?php esc_html_e('Results.', 'bomby'); ?></h4>

								<?php get_search_form(); ?>

							</div>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'post-templates/content', 'search' ); ?>

								<?php $_search_number++; 
								$oThemeArguments -> set( '_search_number', $_search_number );
								?>

							<?php endwhile; ?>

							<?php ivan_paging_nav(); ?>

						<?php else : ?>

							<?php get_template_part( 'post-templates/content', 'none' ); ?>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			<?php
			// Boxed Page Logic
			if( true == ivan_get_option('blog-boxed-page') ) : ?>
				</div><!-- .boxed-page-inner -->
			</div><!-- .boxed-page-wrapper -->
			<?php endif; ?>
			
		</div>
	</div>

	<?php
	do_action( 'ivan_content_after' ); 
	?>

<?php get_footer(); ?>
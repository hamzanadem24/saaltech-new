<div class="col-md-9 site-main sidebar-enabled sidebar-left" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>

</div>

<?php get_sidebar('product'); ?>
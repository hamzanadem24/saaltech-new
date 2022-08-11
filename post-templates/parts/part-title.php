<h1 class="entry-title"><?php 
if( is_sticky() && !is_singular() ) :
	echo '<span class="sticky-post-holder"><span class="inner-sticky-txt">' . esc_html__("Featured", 'bomby') .'</span><i class="fa fa-bolt"></i></span>';
endif;
?><a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
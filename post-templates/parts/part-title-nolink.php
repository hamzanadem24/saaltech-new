<h1 class="entry-title"><?php 
if( is_sticky() && !is_singular() ) :
	echo '<span class="sticky-post-holder"><span class="inner-sticky-txt">' . esc_html__("Featured", 'bomby') .'</span><i class="fa fa-bolt"></i></span>';
endif;
?><?php the_title(); ?></h1>
<div class="entry-meta">

	<span class="date"><?php echo get_the_date(); ?></span>

	<span class="author"><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>

	<span class="cats"><?php the_category(', '); ?></span>
	
	<span><?php echo ivan_getPostLikeLink( get_the_ID() ); ?></span>

</div><!-- .entry-meta -->
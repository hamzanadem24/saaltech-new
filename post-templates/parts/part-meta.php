<div class="entry-meta">

	<span class="date"><?php echo get_the_date(); ?></span>

	<a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>

	<span class="cats"><?php the_category(', '); ?></span>

	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments"><a href="<?php comments_link(); ?>"><span class="icon-reply xbig"></span> <?php comments_number( esc_html__('No Comments', 'bomby'), esc_html__('1 Comment', 'bomby'), esc_html__('% Comments', 'bomby') ); ?></a></span>
	<?php endif; ?>
	
	<span class="pull-right"><?php echo ivan_getPostLikeLink( get_the_ID() ); ?></span>

</div><!-- .entry-meta -->
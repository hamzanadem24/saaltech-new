<div class="entry-meta">

	<a href="<?php echo esc_url(get_permalink()); ?>"><span class="date"><?php echo get_the_date(); ?></span></a>

	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>

		
		<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('No Comments', 'bomby'), esc_html__('1 Comment', 'bomby'), esc_html__('% Comments', 'bomby') ); ?></a></span>
	<?php endif; ?>


	<?php echo ivan_getPostLikeLink( get_the_ID() ); ?>

</div><!-- .entry-meta -->
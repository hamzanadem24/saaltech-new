<?php
/**
 * @package ivan_framework
 */
?>
	
<article class="post minimal-fullwidth hover-dir">
	<div class="hover-dir-el"></div>
	<div class="container reveal">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<header>
					<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
					<div class="meta">
						<span>
							<?php esc_html_e('Posted On', 'bomby');?> 
							<?php
							$time_string = '<time datetime="%1$s">%2$s</time>';
							echo sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								get_the_time(get_option('date_format'))
							); ?>
						</span>
						<span><?php printf( esc_html__('by %s', 'bomby'), '<a href="'.esc_url( get_author_posts_url(get_the_author_meta( 'ID' )) ).'">'. get_the_author().'</a>'); ?></span>
						<span class="category"><?php esc_html_e("In", 'bomby'); ?> <?php the_category(', '); ?></span>
						<span><?php echo ivan_getPostLikeLink( get_the_ID() ); ?></span>
					</div><!-- /meta -->
				</header>
				<div class="post-content">
					<p><?php the_excerpt(); ?></p>
				</div><!-- /post-content -->
				<a href="<?php echo esc_url(get_permalink()); ?>" class="read-more"><?php esc_html_e('Read More', 'bomby'); ?> <i class="fa fa-long-arrow-right"></i></a>
			</div><!-- /col-md-8 -->
		</div><!-- /row -->
	</div>
</article>
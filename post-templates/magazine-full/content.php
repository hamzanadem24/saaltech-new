<?php
/**
 * @package ivan_framework
 */

$attachment_id = get_post_thumbnail_id( get_the_ID() );

$image_url = '';
$image_url_arr = wp_get_attachment_image_src( $attachment_id, 'bomby_blog_magazine' );
if (is_array($image_url_arr) && isset($image_url_arr[0])) {
	$image_url = $image_url_arr[0];
}

?>
<article class="post modern-fullwidth style2 <?php echo ( ivan_get_wp_query_var('current_post') == 0 ? 'featured' : ''); ?> panr-active">
	<a class="overlay-link" href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php the_title_attribute(); ?>"></a>
	<figure class="featured-image panr-element" style="background-image: url(<?php echo esc_url($image_url); ?>);">
		<?php the_post_thumbnail( ivan_get_wp_query_var('current_post') == 0 ? 'bomby_blog_magazine' : 'bomby_blog_large', array('title' => get_the_title(), 'class' => '') ); ?>
	</figure>
	<div class="content">
		<div class="content-inner">
			<div>
				<header>
					<?php $cats = get_the_category_list( '</li><li>' );?>
					<?php if ($cats): ?>
						<ul class="categories">
							<?php echo '<li>'.$cats.'</li>'; ?>
						</ul>
					<?php endif; ?>
					<h2><a href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</header>
				<div class="meta">
					<?php
					$time_string = '<span><time datetime="%1$s">%2$s</time></span>';
					echo sprintf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						get_the_time(get_option('date_format'))
					); ?>
					<span><?php printf( esc_html__('Posted by %s', 'bomby'), '<a href="'.esc_url( get_author_posts_url(get_the_author_meta( 'ID' )) ).'">'. get_the_author().'</a>'); ?> </span>	
					<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
						<span><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('No Comments', 'bomby'), esc_html__('1 Comment', 'bomby'), esc_html__('% Comments', 'bomby') ); ?></a></span>
					<?php endif; ?>
				</div><!-- /meta -->
			</div>
		</div><!-- /content-inner -->
	</div><!-- /content -->
</article>
<div class="share-icons">
	<?php
	$pinImg = '';
	if(has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
		$pinImg = $image[0];
	}

	$permalink = urlencode( get_permalink() );
	$title = urlencode( get_the_title() ) ;

	?>
	<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="http://twitter.com/home?status=<?php echo esc_attr($title); ?> - <?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
	<a href="https://plus.google.com/share?url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
	<a href="http://linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
	<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink); ?>&media=<?php echo urlencode($pinImg); ?>&description=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
	<a href="mailto:?subject=<?php echo esc_attr($title); ?>&body=<?php echo esc_attr($permalink); ?>"><i class="fa fa-envelope"></i></a>
</div>
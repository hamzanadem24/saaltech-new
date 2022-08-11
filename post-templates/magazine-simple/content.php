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

if (!empty($image_url)): ?>
	<div class="ivan-custom-wrapper theme_default">
		<div class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
			<div class="featured-image">
				<figure style="background-image: url(<?php echo esc_url($image_url); ?>);" data-stellar-ratio="0.7">
					<?php the_post_thumbnail( 'bomby_blog_magazine', array('title' => get_the_title(), 'class' => '') ); ?>
				</figure>
			</div>
			<article id="post-<?php the_ID(); ?>" <?php post_class('post modern-fullwidth'); ?>>
	<header>			
		<div class="meta">
			<?php
			$time_string = '<time datetime="%1$s">%2$s</time>';
			echo sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_time(get_option('date_format'))
			); ?>
			<span><?php printf( esc_html__('Posted by %s', 'bomby'), '<a href="'.esc_url( get_author_posts_url(get_the_author_meta( 'ID' )) ).'">'. get_the_author().'</a>'); ?> </span>
		</div><!-- /meta -->
		<h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="post-content">
		<?php the_content( '' ); ?>
	</div><!-- /post-content -->
	<div class="links-container">
		<a href="<?php echo esc_url(get_permalink()); ?>" class="read-more"><?php esc_html_e('Read More', 'bomby'); ?> <i class="fa fa-long-arrow-right"></i></a>
		<a href="<?php echo esc_url(get_permalink()); ?>" class="view-post"><?php esc_html_e('View Post', 'bomby'); ?> <i class="fa fa-long-arrow-right"></i></a>
	</div>
</article>
		</div><!-- /featured-image -->
		<div class="vc_row-full-width"></div>
	</div><!-- /ivan-custom-wrapper -->
<?php endif; ?>
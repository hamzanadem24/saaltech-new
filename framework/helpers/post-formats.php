<?php
/**
 * Helper Post Formats
 *
 * Provides functions that will be used to display the correct
 * Post Format markup to post listing or single posts
 *
 * @package   IvanFramework
 */

/**
 * Called by our templates to display the thumbnail
 *
 * @param string $format with the format to be displayed
 * @param string $content with post content used to filter video, audio and galleries for example
 */
function ivan_display_thumbnail($format = 'standard') {

	if( ( is_home() OR is_archive() ) && ivan_get_option('blog-disable-thumb') )
		return;

	if( ( is_singular('post') ) && ivan_get_option('single-disable-thumb') )
		return;

	if( 'standard' == $format || '' == $format ) :
		ivan_display_thumbnail_standard();
	elseif( 'aside' == $format ) :
		ivan_display_thumbnail_standard();
	elseif( 'gallery' == $format ) :
		ivan_display_thumbnail_gallery();
	elseif( 'link' == $format ) :
		ivan_display_thumbnail_link();
	elseif( 'image' == $format ) :
		ivan_display_thumbnail_image();
	elseif( 'video' == $format ) :
		ivan_display_thumbnail_video();
	elseif( 'audio' == $format ) :
		ivan_display_thumbnail_audio();
	endif;

}
add_action('ivan_display_thumbnail', 'ivan_display_thumbnail', 10, 2);

/**
 * Filter Thumbnail Sizes to Blog and Single
 *
 */
function ivan_custom_thumb_size( $size ) {

	// Return Blog Custom Size
	if( ( is_home() OR is_archive() ) && ivan_get_option('blog-thumb-size') != '' )
		$size = ivan_get_option('blog-thumb-size');

	// Return Single Custom Size
	if( ( is_singular('post') ) && ivan_get_option('single-thumb-size') != '' )
		$size = ivan_get_option('single-thumb-size');

	return $size;
}
add_filter('ivan_thumb_size', 'ivan_custom_thumb_size');

 /**
 * Display standard thumbnail
 *
 */
function ivan_display_thumbnail_standard() {
	
	if( has_post_thumbnail() ) :

		if(is_singular('post')) {
			ivan_display_thumbnail_image();
			return;
		}

		$size = 'bomby_blog_medium';

		if( is_home() ) {
			if ( false == ivan_get_option('blog-sidebar-right') && false == ivan_get_option('blog-sidebar-left') )
				$size = 'bomby_blog_large_crop';
		}
		else if( is_archive() ) {
			if( false == ivan_get_option('blog-sidebar-right') && false == ivan_get_option('blog-sidebar-left') )
				$size = 'bomby_blog_large_crop';
		}
		else if( is_single() ) {
			if( false == ivan_get_option('single-sidebar-right') && false == ivan_get_option('single-sidebar-left'))
				$size = 'bomby_blog_large_crop';
		}

		if( defined('IVAN_CUSTOM_POST_FORMAT') )
			$size = IVAN_CUSTOM_POST_FORMAT;

		$_classes = '';

		if(true == ivan_get_option('blog-gray-thumb'))
			$_classes .= ' gray-hover';

	?>	

		<?php
		if(false == ivan_get_option('blog-hover-thumb')) : ?>
			<div class="thumbnail thumbnail-main<?php echo esc_attr( $_classes ); ?>">
				<a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( apply_filters('ivan_thumb_size', $size), array('title' => get_the_title(), 'class' => '') ); ?>
				</a>
			</div>
		<?php else : ?>
			<div class="thumbnail thumbnail-main thumbnail-hover<?php echo esc_attr( $_classes ); ?>">
				<div>
					<?php the_post_thumbnail( apply_filters('ivan_thumb_size', $size), array('title' => get_the_title(), 'class' => '') ); ?>
				</div>
				<a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title(); ?>" class="overlay"></a><?php echo apply_filters('ivan_thumb_more_icon', '<span class="thumb-cross"></span>'); ?>
			</div>
		<?php endif; ?>

	<?php endif;
}

/**
 * Display standard thumbnail
 *
 */
function ivan_display_thumbnail_gallery() {

	wp_enqueue_script( 'owl_carousel' );
	wp_enqueue_style( 'owl_carousel' );

	$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
	$ivan_current_post = $oArgs -> get('ivan_current_post');

	// Get the first [ivan_gallery] or [gallery] shortcode
	preg_match("!\[(?:ivan_)?gallery.+?\]!", $ivan_current_post['content'], $match_gallery);

	// If found the shortcode...
	if(!empty($match_gallery)) {

		$_classes = '';

		if(true == ivan_get_option('blog-gray-thumb'))
			$_classes .= ' gray-hover';

		$gallery = $match_gallery[0];
			
		// Change shortcode prefix
		if(strpos($gallery, 'ivan_') === false)
			$gallery = str_replace("gallery", 'gallery', $gallery);

		// Display Gallery
		if(false == ivan_get_option('blog-hover-thumb')) :
			echo '<div class="thumbnail thumbnail-main'.$_classes.'">';
				echo do_shortcode($gallery);
			echo '</div>';
		else :
			echo '<div class="thumbnail thumbnail-main thumbnail-hover'.$_classes.'"">';
				echo do_shortcode($gallery);
			echo '</div>';
		endif;

		// Removes gallery shortcode from original content
		$ivan_current_post['content'] = str_replace( $match_gallery[0], "", $ivan_current_post['content'] );
	}

	$oArgs -> set('ivan_current_post', $ivan_current_post);
}

/**
 * Display Link Format
 *
 */
function ivan_display_thumbnail_link() {

	$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
	$ivan_current_post = $oArgs -> get('ivan_current_post');
	
	// Will store the link found at post content
	$link = "";

	// Used to find any address at content start
	$pattern_url = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';

	// Try find URL at start of content and extract it
	preg_match($pattern_url, $ivan_current_post['content'], $link);
	if( !empty( $link[0] ) ) {

		// Define link as being the first URL found
		$link = $link[0];
		
		// Define title URL as being the extracted URL
		$ivan_current_post['title_href'] = $link;
		// Remove link from content
		$ivan_current_post['content'] = str_replace( $link, "", $ivan_current_post['content'] );
	}

	$oArgs -> set('ivan_current_post', $ivan_current_post);
}

/**
 * Display image format that is the thumbnail with the large image inside lightbox
 *
 */
function ivan_display_thumbnail_image() {
	
	if( has_post_thumbnail() ) :

		$size = 'bomby_blog_medium';

		if( is_home() ) {
			if ( false == ivan_get_option('blog-sidebar-right') && false == ivan_get_option('blog-sidebar-left') )
				$size = 'bomby_blog_large_crop';
		}
		else if( is_archive() ) {
			if( false == ivan_get_option('blog-sidebar-right') && false == ivan_get_option('blog-sidebar-left') )
				$size = 'bomby_blog_large_crop';
		}
		else if( is_single() ) {
			if( false == ivan_get_option('single-sidebar-right') && false == ivan_get_option('single-sidebar-left'))
				$size = 'bomby_blog_large_crop';
		}

		if( defined('IVAN_CUSTOM_POST_FORMAT') )
			$size = IVAN_CUSTOM_POST_FORMAT;

		$largeImage = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

		$_classes = '';

		if(true == ivan_get_option('blog-gray-thumb'))
			$_classes .= ' gray-hover';
	?>	

		<?php
		if(false == ivan_get_option('blog-hover-thumb')) : ?>
			<div class="thumbnail thumbnail-main<?php echo esc_attr($_classes); ?>">
				<a href="<?php echo esc_url($largeImage); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( apply_filters('ivan_thumb_size', $size), array('title' => get_the_title(), 'class' => '') ); ?>
				</a>
			</div>
		<?php else : ?>
			<div class="thumbnail thumbnail-main thumbnail-hover<?php echo ivan_sanitize_html_classes($_classes); ?>">
				<div>
					<?php the_post_thumbnail( apply_filters('ivan_thumb_size', $size), array('title' => get_the_title(), 'class' => '') ); ?>
				</div>
				<a href="<?php echo esc_url($largeImage); ?>" title="<?php the_title_attribute(); ?>" class="overlay"></a><?php echo apply_filters('ivan_thumb_more_icon', '<span class="thumb-cross"></span>'); ?>
			</div>
		<?php endif; ?>

	<?php endif;
}

/**
 * Display Video Format
 *
 */
function ivan_display_thumbnail_video() {

	$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
	$ivan_current_post = $oArgs -> get('ivan_current_post');
	
	// Wraps video URLs in [embed] tags
	$ivan_current_post['content'] = preg_replace( '|^\s*(https?://[^\s"]+)\s*$|im', "[embed]$1[/embed]", $ivan_current_post['content'] );

	// Find a [embed] or [video] shortcode in the content and extract it
	preg_match("!\[embed.+?\]|\[video.+?\]\[\/video\]|\[playlist.+?\]!", $ivan_current_post['content'], $match_video);

	// If found a video inside content, take the first and extract
	if( !empty($match_video) ) {
			
		global $wp_embed;
		$video = $match_video[0];
		
		// Display Video
		echo '<div class="thumbnail thumbnail-main">';
			echo '<div class="video-container-thumb">'. do_shortcode($wp_embed->run_shortcode($video)) . '</div>';
		echo '</div>';
		
		// Removes video from content
		$ivan_current_post['content'] = str_replace( $match_video[0], "", $ivan_current_post['content'] );
	}

	$oArgs -> set('ivan_current_post', $ivan_current_post);
}

/**
 * Display Audio Format
 *
 */
function ivan_display_thumbnail_audio() {

	$oArgs = Ivan_ThemeArguments::getInstance('ivan_current_post');
	$ivan_current_post = $oArgs -> get('ivan_current_post');
	
	// Wraps audio URLs in [embed] tags
	$ivan_current_post['content'] = preg_replace( '|^\s*(https?://[^\s"]+)\s*$|im', "[embed]$1[/embed]", $ivan_current_post['content'] );

	// Find a [embed] or [audio] shortcode in the content and extract it
	preg_match("!\[embed.+?\]|\[audio.+?\]\[\/audio\]|\[playlist.+?\]!", $ivan_current_post['content'], $match_audio);

	// If found a video inside content, take the first and extract
	if( !empty($match_audio) ) {
			
		global $wp_embed;
		$audio = $match_audio[0];
		
		// Display Video
		echo '<div class="thumbnail thumbnail-main">';
			echo do_shortcode($wp_embed->run_shortcode($audio));
		echo '</div>';
		
		// Removes video from content
		$ivan_current_post['content'] = str_replace( $match_audio[0], "", $ivan_current_post['content'] );
	}

	$oArgs -> set('ivan_current_post', $ivan_current_post);
}

/*  Add responsive container to embeds
/* ------------------------------------ */ 
function ivan_embed_html( $html, $url ) {
 
    $pattern    = '/^https?:\/\/(www\.)?twitter\.com/';
    $is_twitter = preg_match( $pattern, $url );
     
    if ( 1 === $is_twitter ) {
        return $html;
    }
 
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'ivan_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'ivan_embed_html' ); // Jetpack
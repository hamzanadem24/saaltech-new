<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 */

if ( ! function_exists( "ivan_sanitize_html_classes" ) && function_exists( "sanitize_html_class" ) ) {
	/**
	 * Sanitize many classes at once. Useful when we can't use sanitize_html_class on a string with 
	 * many classes separated by spaces.
	 *
	 * @uses   sanitize_html_class
	 * @param  (mixed: string/array) $class   "blue hedgehog goes shopping" or array("blue", "hedgehog", "goes", "shopping")
	 * @param  (mixed) $fallback Anything you want returned in case of a failure
	 * @return (mixed: string / $fallback )
	 */
	function ivan_sanitize_html_classes( $class, $fallback = null ) {

		// Explode it, if it's a string
		if ( is_string( $class ) ) {
			$class = explode(" ", $class);
		} 

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map("sanitize_html_class", $class);
			return implode(" ", $class);
		}
		else { 
			return sanitize_html_class( $class, $fallback );
		}
	}
}

/**
 * Check if WooCommerce plugin is activated.
 *
 * @return bool
 */
if ( ! function_exists( 'ivan_is_woocommerce_activated' ) ) {
	function ivan_is_woocommerce_activated() {
		if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }
	}
}


function ivan_get_wp_query_var( $variable = '') {

	global $wp_query;

	if ( !empty( $variable ) && isset( $wp_query )) {

		return $wp_query->{$variable};
	}
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function ivan_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'ivan_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ivan_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'ivan_body_classes' );

/* WPML Compatibility added to home URL used in logo */
function ivan_get_home_url() {
	// Adds WPML compatibility to logo URL
	if( function_exists('icl_get_home_url') )
		return icl_get_home_url();
	else
		return home_url('/');
}

/* Display Flag Selectors */
function ivan_language_selector_flags(){
	if( function_exists('icl_get_languages') ) : 
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			foreach($languages as $l){
				if(!$l['active']) echo '<a href="'.esc_url($l['url']).'">';
				echo '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" />';
				if(!$l['active']) echo '</a>';
			}
		}
	endif;
}

function ivan_language_selector_flags_return(){
	$output = '';
	if( function_exists('icl_get_languages') ) : 
		$languages = icl_get_languages('skip_missing=0&orderby=code');
		if(!empty($languages)){
			foreach($languages as $l){
				if(!$l['active']) $output .= '<a href="'.esc_url($l['url']).'">';
				$output .= '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" />';
				if(!$l['active']) $output .= '</a>';
			}
		}
	endif;

	return $output;
}

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function ivan_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'ivan_setup_author' );

/**
 *
 * Hex to Rgba
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'ivan_hex2rgba' ) ) {
  function ivan_hex2rgba( $hexcolor, $opacity = 1 ) {

    $hex    = str_replace( '#', '', $hexcolor );

    if( strlen( $hex ) == 3 ) {
      $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
      $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
      $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
    } else {
      $r    = hexdec( substr( $hex, 0, 2 ) );
      $g    = hexdec( substr( $hex, 2, 2 ) );
      $b    = hexdec( substr( $hex, 4, 2 ) );
    }

    return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;
  }
}

/**
 * Get shortened string to words limit
 *
 * @param $text string
 * @param $word_limit
 * @return string cut to x words
 */
function ivan_get_shortened_string($text,$word_limit)
{
	$words = explode(' ', $text, ($word_limit + 1));
	if(count($words) > $word_limit)
	{
		array_pop($words);
		return implode(' ', $words)."...";
	}
	else
	{
		return implode(' ', $words);
	}
}

/**
 * Get shortened string by letters
 *
 * @param $text string
 * @param $letters_limit
 * @param $at_space
 * @param $add
 * @return string cut to x characters
 */
function ivan_get_shortened_string_by_letters($text,$letters_limit, $at_space = true, $add = '...')
{
	if(strlen($text) > $letters_limit)
	{
		if ($at_space) {
			$pos = strpos($text, ' ', $letters_limit);

			if (!$pos) {
				return $text;
			}
			return substr($text, 0, $pos).$add;
		}
		return substr($text, 0, $letters_limit).$add;
	}
	else
	{
		return $text;
	}
}


/**
 * Prevents from creating different image sizes than default thumbnail, medium, large
 * Images are created on demand
 * @global array $_wp_additional_image_sizes
 * @param type $out
 * @param int $id
 * @param string $size
 * @return boolean|array
 */
add_filter('image_downsize', 'ivan_media_downsize', 10, 3);
function ivan_media_downsize($out, $id, $size) {
	// If image size exists let WP serve it like normally
	$imagedata = wp_get_attachment_metadata($id);
	
	if (!is_string($size)) {
		return false;
	}
	
	if (is_array($imagedata) && isset($imagedata['sizes'][$size])) {
		return false;
	}

	// Check that the requested size exists, or abort
	global $_wp_additional_image_sizes;
	if (!isset($_wp_additional_image_sizes[$size])) {
		return false;
	}

	// Make the new thumb
	if (!$resized = image_make_intermediate_size(
		get_attached_file($id),
		$_wp_additional_image_sizes[$size]['width'],
		$_wp_additional_image_sizes[$size]['height'],
		$_wp_additional_image_sizes[$size]['crop']
	))
		return false;

	// Save image meta, or WP can't see that the thumb exists now
	$imagedata['sizes'][$size] = $resized;
	wp_update_attachment_metadata($id, $imagedata);

	// Return the array for displaying the resized image
	$att_url = wp_get_attachment_url($id);
	return array(dirname($att_url) . '/' . $resized['file'], $resized['width'], $resized['height'], true);
}

/**
 * Prevent resize on upload
 * @param array $sizes
 * @return array
 */
function ivan_media_prevent_resize_on_upload($sizes) {
	// Removing these defaults might cause problems, so we don't
	return array(
		'thumbnail' => $sizes['thumbnail'],
		'medium' => $sizes['medium'],
		'large' => $sizes['large']
	);
}
add_filter('intermediate_image_sizes_advanced', 'ivan_media_prevent_resize_on_upload');

/**
 * Conntect WP_Filesystem
 * @global type $wp_filesystem
 * @param type $url
 * @param type $method
 * @param type $context
 * @param type $fields
 * @return boolean
 */
function ivan_connect_fs($url, $method, $context, $fields = null) {
	global $wp_filesystem;

	require_once(ABSPATH . 'wp-admin/includes/file.php');

	if (false === ($credentials = request_filesystem_credentials($url, $method, false, $context, $fields))) {
		return false;
	}

	//check if credentials are correct or not.
	if (!WP_Filesystem($credentials)) {
		request_filesystem_credentials($url, $method, true, $context);
		return false;
	}

	return true;
}
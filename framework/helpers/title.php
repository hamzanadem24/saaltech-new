<?php
/**
 * Function used to display title wrapper
 *
 */

function ivan_display_title() {
	$tag = apply_filters('ivan_display_title_tag', 'h2');
	$wrap = apply_filters('ivan_display_title_wrap', 'span');
	$title = '';

	// Default Latest Posts page
	if( is_home() || ( is_singular('post') && class_exists( 'ReduxFramework' ) ) ) :
		$title = ivan_get_option('title-text-blog');

	// Singular
	elseif( is_singular() ) :
		$title = get_the_title();

	// Search
	elseif( is_search() ) :
		global $wp_query;
		$total_results = $wp_query->found_posts;
		$prefix = '';

		if( $total_results == 1 ){
			$prefix = esc_html__('1 search result for', 'bomby');
		}
		else if( $total_results > 1 ) {
			$prefix = $total_results . ' ' . esc_html__('search results for', 'bomby');
		}
		else {
			$prefix = esc_html__('Search results for', 'bomby');
		}
		//$title = $prefix . ': ' . get_search_query();
		$title = $prefix . ':</span><span>' . get_search_query();

	// Category and other Taxonomies
	elseif ( is_category() ) :
		$title = single_cat_title('Category</span><span>', false);

	elseif ( is_tag() ) :
		$title = single_tag_title('Tag</span><span>', false);

	elseif ( is_author() ) :
		$title = sprintf( esc_html__( 'Author %s', 'bomby' ), '</span><span class="vcard">' . get_the_author() . '' );

	elseif ( is_day() ) :
		$title = sprintf( esc_html__( 'Day %s', 'bomby' ), '</span><span>' . get_the_date() . '</span>' );

	elseif ( is_month() ) :
		$title = sprintf( esc_html__( 'Month %s', 'bomby' ), '</span><span>' . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'bomby' ) ) . '</span>' );

	elseif ( is_year() ) :
		$title = sprintf( esc_html__( 'Year %s', 'bomby' ), '</span><span>' . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'bomby' ) ) . '</span>' );

	elseif( is_tax() ) :
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
		$title = $term->name;

	elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
		$title = esc_html__( 'Asides', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
		$title = esc_html__( 'Galleries', 'bomby');

	elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
		$title = esc_html__( 'Images', 'bomby');

	elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
		$title = esc_html__( 'Videos', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
		$title = esc_html__( 'Quotes', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
		$title = esc_html__( 'Links', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
		$title = esc_html__( 'Statuses', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
		$title = esc_html__( 'Audios', 'bomby' );

	elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
		$title = esc_html__( 'Chats', 'bomby' );

	elseif( is_404() ) :
		$title = esc_html__( '404', 'bomby' );

	else :
		$title = esc_html__( 'Archives', 'bomby' );
	endif;

	// Display Title
	echo '<'. $tag .'>' . '<'. $wrap .'>' . $title . '</'. $wrap .'>' . '</'. $tag .'>';
}
add_action('ivan_display_title', 'ivan_display_title', 10);
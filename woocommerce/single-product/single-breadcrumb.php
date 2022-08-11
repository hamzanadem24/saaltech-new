<?php
/**
 * Single Product breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

$shop_page_id = wc_get_page_id( 'shop' );
$shop_page    = get_post( $shop_page_id );
$delimiter = '<span>/</span>';
$home = esc_html__('Home', 'bomby');
$before = '';
$after = '';
$prepend = $before;

$output = '';

if ( ! empty( $home ) ) {
	$output .= $before . '<a class="home" href="' . esc_url( apply_filters( 'woocommerce_breadcrumb_home_url', home_url('/') ) ) . '">' . $home . '</a>' . $after . $delimiter;
}

$output .= $prepend;

if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {

	$main_term = $terms[0];

	$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );

	$ancestors = array_reverse( $ancestors );

	foreach ( $ancestors as $ancestor ) {
		$ancestor = get_term( $ancestor, 'product_cat' );

		if ( ! is_wp_error( $ancestor ) && $ancestor )
			$output .= $before . '<a href="' . esc_url( get_term_link( $ancestor->slug, 'product_cat' ) ). '">' . $ancestor->name . '</a>' . $after . $delimiter;
	}

	$output .= $before . '<a href="' . esc_url( get_term_link( $main_term->slug, 'product_cat' ) ) . '">' . $main_term->name . '</a>' . $after . $delimiter;

}

echo '<div class="breadcrumb">'.$output.'</div>';
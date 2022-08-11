<?php
/**
 * WooCommerce plugin configuration
 *
 * Define WooCommerce configuration, filters and everything necessary
 *
 * @package ivan_framework
 */

// Remove default styles and add theme support
if ( ! function_exists( 'ivan_woo_setup' ) ) :
function ivan_woo_setup() {

	//Disable Woo styles (will use customized compiled copy)
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	//Enable WooCommerce Support
	add_theme_support( 'woocommerce' );
}
endif; // flatsome_setup
add_action( 'after_setup_theme', 'ivan_woo_setup' );

// Remove default WooCommerce Filters

	// Archives
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

	add_action( 'woocommerce_display_sorting', 'woocommerce_result_count', 20 );
	add_action( 'woocommerce_display_sorting', 'woocommerce_catalog_ordering', 30 );

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
	
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); // removes stars from product display


	remove_action( 'woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10 );
	remove_action( 'woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
   	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// Before/After Shop Loop
add_action( 'woocommerce_before_shop_loop', 'ivan_before_shop_loop', 10);
function ivan_before_shop_loop() {
	?>
	<div class="row">
	<?php
}

add_action( 'woocommerce_after_shop_loop', 'ivan_after_shop_loop', 10);
function ivan_after_shop_loop() {
	?>
	</div>
	<?php
}

// Products per Page
$ivan_woo_products_per_page = ivan_get_option('woo-per-page');

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
$cols = $ivan_woo_products_per_page;
return $cols;
}

// Products Columns
add_filter('loop_shop_columns', 'ivan_woo_product_columns');
function ivan_woo_product_columns() {
	global $woocommerce;

	// Columns used by default
	$columns = ivan_get_option('woo-shop-columns');
	if(!$columns){
		$columns = '4';
	}
	// In Product Listing...
	if ( is_product_category() ) :
		$columns = $columns; 
	endif;
		
	// In Related Products...
	if ( is_product() ) :
		$columns = 1;
	endif;

	return $columns; 
}

// Enqueue scripts and styles
function ivan_woo_load_scripts() {

	// Defines prefix based in DEBUG constant to theme assets
	$prefix = '';
	if( false == IVAN_DEBUG ) {
		$prefix = '.min';
	}

	/**
	* Enqueue WooCommerce Styles and Scripts
	*/

	// Enqueue Custom Theme Styles
	wp_enqueue_style( 'ivan-woocommerce-layout', get_template_directory_uri() . '/css/woocommerce/css/woocommerce-layout'.$prefix.'.css', '', WC_VERSION, 'all' );

	wp_enqueue_style( 'ivan-woocommerce-smallscreen', get_template_directory_uri() . '/css/woocommerce/css/woocommerce-smallscreen'.$prefix.'.css', 'woocommerce-layout', WC_VERSION, 
		'only screen and (max-width: ' . apply_filters( 'woocommerce_style_smallscreen_breakpoint', $breakpoint = '768px' ) . ')' );

	wp_enqueue_style( 'ivan-woocommerce-general', get_template_directory_uri() . '/css/woocommerce/css/woocommerce'.$prefix.'.css', '', WC_VERSION, 'all' );

	// Enqueue Custom Theme Scripts

	/* remove woocommerce add-to-cart variation.js. Its added in theme.js */

	wp_enqueue_script( 'owl_carousel' );
	wp_enqueue_style( 'owl_carousel' );

	wp_enqueue_script( 'ivan-woo-scripts', get_template_directory_uri() . '/js/woocommerce/woo-scripts'.$prefix.'.js', array( 'jquery' ), '1', true );

	wp_localize_script( 'ivan-woo-scripts', 'wc_add_to_cart_variation_params', apply_filters( 'wc_add_to_cart_variation_params', array(
		'i18n_no_matching_variations_text' => esc_attr__( 'Sorry, no products matched your selection. Please choose a different combination.', 'bomby' ),
		'i18n_unavailable_text'			=> esc_attr__( 'Sorry, this product is unavailable. Please choose a different combination.', 'bomby' )
		) )
	);

	// Remove Currency Switcher default style
	wp_deregister_style('currency-switcher');

}
add_action( 'wp_enqueue_scripts', 'ivan_woo_load_scripts', 150 );

// Quick View AJAX action
add_action('wp_ajax_ivan_woo_quick_view', 'ivan_woo_quick_view');
add_action('wp_ajax_nopriv_ivan_woo_quick_view', 'ivan_woo_quick_view');

function ivan_woo_quick_view() {
	global $product, $woocommerce, $post;

	$product_id = $_POST["product"];
	
	$post = get_post( $product_id );

	$product = get_product( $product_id );

	// After set global product and post, we start to output...
	ob_start();
	?>

	<?php
	// Call our template to display the product infos
	wc_get_template( 'content-single-product-quick-view.php'); 
	?>

	<?php
	$output = ob_get_contents();
	ob_end_clean();
	
	// Display buffer content
	echo '<div class="ivan-product-popup-inner">'.$output.'</div>';

	// Bye bye :)
	die();
}

// Actions to style Quick View Content properly
add_action( 'woocommerce_single_product_quick_view_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_quick_view_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_quick_view_summary', 'woocommerce_template_loop_add_to_cart', 30 );

//Cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10);

// Single Products Hooks Organization
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );

// Add Stacked thumbnail support
if( true == ivan_get_option('woo-thumbnail-stacked') ) {
	add_filter( 'ivan_woo_single_product_thumb_area', 'ivan_woo_stacked_thumbnail');
	add_filter( 'ivan_woo_single_product_summary_area', 'ivan_woo_stacked_thumbnail');
}

function ivan_woo_stacked_thumbnail( $col ) {
	return 'col-xs-12 col-sm-12 col-md-12 stacked';
}

if( true == ivan_get_option('woo-list-layout') ) {
	add_filter('ivan_woo_shop_template', 'ivan_woo_shop_list_template');
}
function ivan_woo_shop_list_template( $template ) {
	return 'product-list';
}

// Change Cross Sells at Cart - Columns
add_filter('woocommerce_cross_sells_columns', 'ivan_woo_cross_sells_columns');
function ivan_woo_cross_sells_columns( $cols ) {
	return 1;
}

// Change Cross Sells at Cart - Columns
add_filter('woocommerce_cross_sells_total', 'ivan_woo_cross_sells_total');
function ivan_woo_cross_sells_total( $items ) {
	return 12;
}

// Category Custom Header
if( true == ivan_get_option('woo-category-image') ) {
	add_action( 'custom_woocommerce_archive_description', 'ivan_woo_category_header', 2 );
}

function ivan_woo_category_header() {
	if ( is_product_category() ) :

		$_image = ivan_woo_get_category_image();

		if( false != $_image ) :

			echo '<div class="category-header">';
				echo do_shortcode( $_image );
			echo '</div>';

		endif;

	endif;
}

function ivan_woo_get_category_image() {
	global $wp_query;
	$cat_id = $wp_query->get_queried_object_id();
	$desc = term_description( $cat_id, 'product_cat' );

	if ( $desc != '' ) {
		return $desc;
	}

	return false;
}

// Share Product
add_action('woocommerce_share', 'ivan_woo_custom_share', 10);
function ivan_woo_custom_share() {

	global $post, $product;
	?>

	<div class="share-icons">
		<?php
			$pinImg = '';
			if(has_post_thumbnail( $post->ID ) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				$pinImg = $image[0];
			}

			$permalink = urlencode( get_permalink() ) ;
			$title = urlencode( get_the_title() ) ;

			?>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<a href="http://twitter.com/home?status=<?php echo esc_attr($title); ?> - <?php echo esc_attr($permalink); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			<a href="https://plus.google.com/share?url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<a href="http://linkedin.com/shareArticle?mini=true&url=<?php echo esc_attr($permalink); ?>&title=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($permalink); ?>&media=<?php echo urlencode($pinImg); ?>&description=<?php echo esc_attr($title); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
			<a href="mailto:?subject=<?php echo esc_attr($title); ?>&body=<?php echo esc_attr($permalink); ?>"><i class="fa fa-envelope"></i></a>

	</div>

	<?php
}

// Remove default Woo Cat thumbnail
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );

// Catalog Mode WooCommerce

if( true == ivan_get_option('woo-catalog-mode') ) {
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
	add_action('woocommerce_single_product_summary', 'ivan_woo_catalog_mode_msg', 30);

	remove_action('woocommerce_single_product_quick_view_summary', 'woocommerce_template_single_add_to_cart', 30);
	add_action('woocommerce_single_product_quick_view_summary', 'ivan_woo_catalog_mode_msg', 30);
}

function ivan_woo_catalog_mode_msg() {
	?>
	<div class="woo-catalog-mode">
		<div class="catalog-msg">
			<?php echo do_shortcode( ivan_get_option('woo-catalog-mode-text') ); ?>
		</div>
	</div>
	<?php
}

// Apply row class to shortcodes
add_filter('ivan_woo_loop_start', 'ivan_woo_loop_start_add_class');
function ivan_woo_loop_start_add_class($classes) {

	if( !is_shop() && !is_product_category() && !is_product() && !is_cart() && !is_checkout())
		$classes .= ' row';

	return $classes;
}

// AJAX Cart markup
add_filter('add_to_cart_fragments', 'ivan_woocommerce_header_add_to_cart_fragment');
function ivan_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		<?php echo '<span class="cart-total">'.wp_kses_post($woocommerce->cart->get_cart_total()).'</span>'; ?>
		<div class="basket-wrapper">
			<div class="top"></div>
			<div class="basket"><i class="icon-bag xbig"></i><span><?php echo intval($woocommerce->cart->cart_contents_count); ?></span></div>
			<div class="header-cart-total"><?php esc_html_e('Cart', 'bomby'); ?> <span class="header-cart-total-value"><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span></div>
		</div>
	</a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}

// Disable Social Sharing and Related Products areas of Single Product
if( ivan_get_option('woo-disable-social-share') == true ) :

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

endif;

if( ivan_get_option('woo-disable-related-products') == true ) :

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

endif;
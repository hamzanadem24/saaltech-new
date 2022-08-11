<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

if ( empty( $woocommerce_loop['local_loop'] ) )
	$woocommerce_loop['local_loop'] = 0;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

$woocommerce_loop['current_columns'] = $woocommerce_loop['columns'];
	
// Increase loop count
$woocommerce_loop['loop']++;
$woocommerce_loop['local_loop']++; 
		
// Extra post classes
$classes = array();

$woo_shop_one_less = false;
if (!is_page() && ivan_get_option('woo-shop-one-less')) {
	$woo_shop_one_less = true;
	
} else if (isset($woocommerce_loop['shortcode_woo_shop_one_less']) && $woocommerce_loop['shortcode_woo_shop_one_less'] == true) {
	$woo_shop_one_less = true;
}


//show one less on the first row	
if ($woo_shop_one_less && $woocommerce_loop['current_columns'] > 1) {
	$woocommerce_loop['one_less'] = true;
	if ($woocommerce_loop['loop'] < $woocommerce_loop['current_columns']) {
		$woocommerce_loop['current_columns'] --;
	}
}

if (isset($woocommerce_loop['prev_columns']) 
	&& !empty($woocommerce_loop['prev_columns'])
	&& $woocommerce_loop['prev_columns'] != $woocommerce_loop['current_columns']
) {
	$woocommerce_loop['local_loop'] = 1;
}
	
$woocommerce_loop['prev_columns'] = $woocommerce_loop['current_columns'];
	
if ( 0 == ( $woocommerce_loop['local_loop'] - 1 ) % $woocommerce_loop['current_columns'] || 1 == $woocommerce_loop['current_columns'] ) {
	$classes[] = 'first';
}

if ( 0 == $woocommerce_loop['local_loop'] % $woocommerce_loop['current_columns'] ) {
	$classes[] = 'last';
}

$attachment_ids = $product->get_gallery_image_ids();

// Bootstrap Column
$bootstrapColumn = round( 12 / $woocommerce_loop['current_columns'] );
$classes[] = 'col-xs-12 col-sm-'. $bootstrapColumn .' col-md-' . $bootstrapColumn;

if(is_admin())
	$classes[] = 'product';

?>

<li <?php post_class( $classes ); ?>>
	<div class="col-wrapper">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="main-link">

		<div class="product-thumbnail">

			<div class="frontal-image">
				<?php echo get_the_post_thumbnail( $post->ID, 'shop_catalog') ?>
			</div>

			<?php
			// Display Back Image of Product
			if( $attachment_ids && false == ivan_get_option('woo-disable-front-back') ) :

				$counter = 0;				
				
				// Loop in attachment	
				foreach ( $attachment_ids as $attachment_id ) {
					
					// Get attachment image URL
					$image_link = wp_get_attachment_url( $attachment_id );
					
					// If isn't a URL we go to next attachment
					if ( !$image_link )
						continue;
								
					$counter++;

					?>
						<div class="back-image"><?php echo wp_get_attachment_image( $attachment_id, 'shop_catalog' ); ?></div>
					<?php	
					
					// If we found any image, we stop the loop
					if ($counter == 1) 
						break;	
				}

			endif; ?>
			
			<?php if(false == ivan_get_option('woo-disable-quick-view') && false == ivan_get_option('woo-catalog-mode') ) : ?>
				<div class="quick-view" data-product-id="<?php echo esc_attr( $post->ID ); ?>"><?php esc_html_e( 'Quick View', 'bomby'); ?></div>
			<?php endif; ?>
		
		</div><!--.product-thumbnail-->

		<div class="product-info">

			<h3><?php the_title(); ?></h3>

			<?php
				// Product Category
				$prod_cats = get_the_terms( $product->get_id(), 'product_cat' );
				$counter = 0;

				if( is_array( $prod_cats ) ) {
					foreach ($prod_cats as $single_cat) {
						if( $counter == 0 ) {
							echo '<div class="product-single-cat">' . $single_cat->name . '</div>';

							$counter++;
						} else {
							break;
						}
					}
					
				}
			?>

			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>

		</div><!--.product-info-->

	</a>

	<?php wc_get_template( 'loop/sale-flash.php' ); ?>

	</div><!--.col-wrapper-->
</li>

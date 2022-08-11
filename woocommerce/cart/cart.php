<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

<div class="row">
	<div class="col-md-8">
		<div class="col-wrapper">

			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<table class="shop_table cart" cellspacing="0">
				<thead>
					<tr>
						<th class="product-name" colspan="2"><?php esc_html_e( 'Product', 'bomby' ); ?></th>
						<th class="product-thumbnail">&nbsp;</th>
						
						<th class="product-price"><?php esc_html_e( 'Price', 'bomby' ); ?></th>
						<th class="product-quantity"><?php esc_html_e( 'Quantity', 'bomby' ); ?></th>
						<th class="product-subtotal"><?php esc_html_e( 'Total', 'bomby' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							?>
							<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

								<td class="product-remove">
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'bomby' ) ), $cart_item_key );
									?>
								</td>

								<td class="product-thumbnail">
									<?php
										if ( ! $_product->is_visible() )
											echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
										else
											printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ) );
									?>
								</td>

								<td class="product-name">
									<?php
										if ( ! $_product->is_visible() )
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
										else
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );

										// Meta data
										echo wc_get_formatted_cart_item_data( $cart_item );

			               				// Backorder notification
			               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
			               					echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'bomby' ) . '</p>';
									?>
								</td>

								<td class="product-price">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
								</td>

								<td class="product-quantity">
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'  => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item['quantity'],
												'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
												'min_value'   => '0'
											), $_product, false );
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
									?>
								</td>

								<td class="product-subtotal">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									?>
								</td>
							</tr>
							<?php
						}
					}

					do_action( 'woocommerce_cart_contents' );
					?>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table>

			<?php do_action( 'woocommerce_after_cart_table' ); ?>

			<?php do_action( 'woocommerce_cart_collaterals' ); ?>

		</div><!--.col-wrapper-->
	</div><!--.col-table-->

	<div class="col-md-4 cart-details-col">
		<div class="col-wrapper">

			<div class="cart-collaterals">

				<?php woocommerce_cart_totals(); ?>

				<div class="cart-actions">

					<input type="submit" class="button" name="update_cart" value="<?php esc_html_e( 'Update Cart', 'bomby' ); ?>" />

					<?php do_action( 'woocommerce_cart_actions' ); ?>
					
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>

					<div class="clearfix"></div>

				</div>

				<?php woocommerce_shipping_calculator(); ?>

				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php esc_html_e( 'Coupon', 'bomby' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_html_e( 'Coupon code', 'bomby' ); ?>" /> <input type="submit" class="button use_code" name="apply_coupon" value="<?php esc_html_e( 'Use Code', 'bomby' ); ?>" />
						<?php do_action( 'woocommerce_cart_coupon' ); ?>

						<div class="clearfix"></div>

					</div>
				<?php } ?>


				<?php //woocommerce_shipping_calculator(); ?>

			</div>

		</div><!--.col-wrapper-->
	</div><!--.col-collaterals-->
</div><!--.row-->

</form>

<?php do_action( 'woocommerce_after_cart' ); ?>
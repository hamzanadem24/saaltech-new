<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Woo_Cart_Total extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_woo_cart_total';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $classes = '' ) {
		
		if( true == ivan_is_woocommerce_activated() ) {

			global $woocommerce;
			
			$cart_layout = ivan_get_option( 'header-woo-cart-layout' );
			$cart_layout_class = '';
			if (!empty($cart_layout) && $cart_layout != 'default') {
				$cart_layout_class = 'layout-'.$cart_layout;
			} else {
				$cart_layout_class = 'layout-default';
			}

			?>
			<div class="iv-module woo-cart <?php echo esc_attr($classes); ?> <?php echo esc_attr($cart_layout_class); ?> show-total">
				<div class="centered">
					<a class="cart-contents trigger" href="<?php echo esc_url(wc_get_cart_url()); ?>">
						<span class="cart-total"><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span>
						<div class="basket-wrapper">
							<div class="top"></div>
							<div class="basket">
								<i class="icon-bag xbig"></i>
								<span><?php echo intval($woocommerce->cart->cart_contents_count); ?></span></div>
							<div class="header-cart-total"><?php esc_html_e('Cart', 'bomby'); ?> <span class="header-cart-total-value"><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span></div>
						</div>
					</a>
					<div class="inner-wrapper">
						<div class="inner-cart inner-form">
						 	<div class="widget_shopping_cart_content"></div>
						</div>
					</div>
					
				</div>
			</div>
			<?php
		}
	}

}
<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Live_Search extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_live_search';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $classes = '' ) {
		?>

		<div class="iv-module live-search <?php echo esc_attr($classes); ?>">
			<div class="centered">
				<a href="#" class="trigger"><span class="icon-search xbig"></span></a>
				<div class="inner-wrapper">
					<span class="form-close-btn thin"> ✕ </span>
					<span class="form-close-btn bold"><i class="fa fa-remove"></i></span>
					<div class="inner-form">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
								 	<form method="get" action="<?php echo ivan_get_home_url(); ?>">
								 		<label for="s"><?php esc_html_e('Type &amp; hit enter', 'bomby');?></label>
										<input type="search" name="s" id="s" placeholder="<?php echo esc_attr__('Type &amp; hit enter', 'bomby');?>" />

										<?php
										// Enable only products search if you're using a WooCommerce shop
										if( true == ivan_get_option('search-shop-switch') ) : ?>
											<input type="hidden" name="post_type" value="product" />
										<?php endif; ?>

										<a class="submit-form" href="#"><i class="fa fa-search"></i></a>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}
	
	/**
	 * Get search style class
	 * @return string
	 */
	public static function get_style_class( $label = 'top-header-search-style' ) {
		
		$style = ivan_get_option($label);
		if ($style != 'default') {
			return $style;
		}
		
		return '';
	}
}


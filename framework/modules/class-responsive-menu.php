<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Responsive_Menu extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_responsive_menu';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $menu_selector, $wrap_id ) {
		?>

		<div class="iv-module responsive-menu hidden-lg hidden-md">
			<div class="centered">
				<a class="mobile-menu-trigger" href="#" data-selector="<?php echo esc_attr($menu_selector); ?>" data-id="<?php echo esc_attr($wrap_id); ?>"><span class="icon-menu xbig"></span></a>
			</div>
		</div>

		<?php
	}

}
<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Overlay_Menu extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_responsive_menu';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $menu_selector, $wrap_id ) {
		?>

		<div class="iv-module responsive-menu">
			<div class="centered">
				<a class="overlay-menu-trigger" href="#" data-selector="<?php echo esc_attr($menu_selector); ?>" data-id="<?php echo esc_attr($wrap_id); ?>"><span class="icon-menu xbig"></span></a>
			</div>
		</div>

		<?php
	}

}
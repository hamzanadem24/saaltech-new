<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Responsive_Menu_Select extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_responsive_menu_select';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $menu_selector ) {
		?>

		<div class="iv-module responsive-menu-select hidden-lg hidden-md" data-selector="<?php echo esc_attr($menu_selector); ?>">
			<div class="centered">
				<div class="receptor">
					<span class="icon-menu xbig"></span>
				</div>
			</div>
		</div>

		<?php
	}

}
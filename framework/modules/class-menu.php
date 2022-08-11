<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Menu extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_menu';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $args = null, $apply_after_list = '') {
		$_args = array();

		if( $args != null )
			$_args = $args;

		if( is_singular() ) {

			if( null != ivan_get_post_option( 'menu-replace-' . $_args['theme_location'] ) ) {
				$_args['menu'] = ivan_get_post_option( 'menu-replace-' . $_args['theme_location'] );
			} 
		}

		$_args['fallback_cb'] = 'ivan_menu_fb';

		if( has_nav_menu( $_args['theme_location'] ) ) {
			
			$_args = apply_filters('ivan_menu_args_filter', $_args );
			
			if (isset($_args['items_wrap'])) {
				$_args['items_wrap'] .= $apply_after_list;
			}
			
			wp_nav_menu( $_args );
		} else {
			?>
			<div class="iv-module custom-text hidden-xs hidden-sm">
				<div class="centered">
						
				</div>
			</div>
			<?php
		}
	}
}
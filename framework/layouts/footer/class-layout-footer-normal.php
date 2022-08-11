<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Footer_Normal extends Ivan_Layout {

	// Layout slug used as parameters to actions and filters
	public $slug = '_footer_normal';

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		/* Define custom functionality.
		 * Refer To http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( 'ivan_footer', array( $this, 'display' ) );
		
	}

	public function display() {
		
		get_template_part( 'framework/templates/footer/part', 'normal' );
	}

}
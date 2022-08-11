<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Title_Wrapper_Normal extends Ivan_Layout {

	// Layout slug used as parameters to actions and filters
	public $slug = '_normal';

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
		add_action( 'ivan_title_wrapper', array( $this, 'display' ) );
		
	}

	public function display() {

		get_template_part( 'framework/templates/title_wrapper/part', apply_filters('ivan_title_wrapper_get_template', 'normal') );
		
	}

}
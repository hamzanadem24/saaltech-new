<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Content_Normal extends Ivan_Layout {

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
		add_action( 'ivan_before_content', array( $this, 'display_before' ) );
		add_action( 'ivan_after_content', array( $this, 'display_after' ) );

	}

	public function display_before() {
		
		?>
		
		<?php
	}

	public function display_after() {
		
		?>
		
		<?php
	}
}
<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Header_Classic_Logo_Centered extends Ivan_Layout {

	// Layout slug used as parameters to actions and filters
	public $slug = '_clasic_logo_centered';

	public function return_template_path() {
		return 'classic-logo-centered';
	}

	/**
	 * Initialize the layout defining actions, filters and any necessary function/task
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		/* Actions and Filters */
		add_action( 'ivan_header', array( $this, 'display' ), 20 );
		
	}

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public function display() {

		get_template_part( 'framework/templates/header/part', apply_filters('ivan_header_get_template', 'classic-logo-centered') );
	
	}
}
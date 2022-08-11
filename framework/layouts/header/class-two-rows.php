<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Header_Two_Rows extends Ivan_Layout {

	// Layout slug used as parameters to actions and filters
	public $slug = '_two_rows';

	public function return_template_path() {
		return 'two-rows';
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

		get_template_part( 'framework/templates/header/part', apply_filters('ivan_header_get_template', 'two-rows') );
		
	}
}
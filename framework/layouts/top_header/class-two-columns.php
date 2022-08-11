<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Layout_Top_Header_Two_Columns extends Ivan_Layout  {

	// Layout slug used as parameters to actions and filters
	public $slug = '_top_header_two_columns';

	/**
	 * Initialize the layout defining actions, filters and any necessary function/task
	 *
	 * @since     1.0.0
	 */
	public function __construct() {

		/* Actions and Filters */
		add_action( 'ivan_top_banner', array( $this, 'display' ), 5 );
		
	}

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public function display() {

		get_template_part( 'framework/templates/top_header/part', 'two-columns' );

	}
}
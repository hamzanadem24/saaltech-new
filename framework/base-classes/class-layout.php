<?php
/**
 *
 * Class used as base to create layouts that can be 
 * attached to main layouts
 *
 * @package   IvanFramework
 */

class Ivan_Layout {

	// Layout slug used as parameters to actions and filters
	public $slug = '_default_slug';

	/**
	 * Initialize the layout defining actions, filters and any necessary function/task
	 *
	 * @since     1.0.0
	 */
	public function __construct() {


	}

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public function display() {
		
	}

}
<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Sideheader_Trigger extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_sideheader_trigger';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $text = '' ) {

		echo Ivan_Module_Sideheader_Trigger::get($text);
	}
	
	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function get( $text = '' ) {

		return '
			<div class="iv-module sideheader-trigger '.(!empty($text) ? 'with-text' : '').'">
				<div class="centered">
					<a href="#sideheader">
						<span class="bars">
							<span></span>
							<span></span>
							<span></span>
						</span>
						'.esc_html($text).'
					</a>
				</div>
			</div>';
		
	}
}


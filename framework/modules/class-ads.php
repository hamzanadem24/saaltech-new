<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Ads extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_ads';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $optionID, $classes = '' ) {
		// get the right option ID
		$content = ivan_get_option( $optionID );

		if( $content != '' ) :
		?>

		<div class="iv-module ads <?php echo esc_attr($classes); ?>">
			<div class="centered">
				<?php echo wp_kses_post($content); ?>
			</div>
		</div>

		<?php
		endif;
	}

}
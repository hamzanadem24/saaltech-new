<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Social_Icons extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_social_icons';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $optionID, $classes = '' , $style = 'default') {
		
		$icons = ivan_get_option( $optionID, true );
		$icons_local = ivan_get_post_option( $optionID . '-local' );
		
		//icons_local can contain one array item but with empty url
		//it's because redux saves one record for social_select type even if we don't add anything
		if (is_array($icons_local) && count($icons_local) >= 1 && isset($icons_local[0]) && !empty($icons_local[0]['url'])) {
			$icons = $icons_local;
		}
		
		if($icons != false) {
		
			switch ($style):
				case 'ul': ?>
					<ul class="socials <?php echo ivan_sanitize_html_classes($classes); ?>">
						<?php if( !empty( $icons ) ) : ?>
							<?php foreach ($icons as $icon) : ?>
								<li><a href="<?php echo esc_url($icon['title']); ?>" target="_blank"><i class="fa fw fa-<?php echo sanitize_html_class($icon['url']); ?>"></i></a></li>
							<?php endforeach; ?>
						<?php endif; ?>
					</ul>

					<?php break;
				
				default: ?>
					<div class="iv-module social-icons <?php echo ivan_sanitize_html_classes($classes); ?>">
						<div class="centered">
							<?php if( !empty( $icons ) ) : ?>

								<?php foreach ($icons as $icon) : ?>
									<a href="<?php echo esc_url($icon['title']); ?>" target="_blank"><i class="fa fw fa-<?php echo sanitize_html_class($icon['url']); ?>"></i></a>
								<?php endforeach; ?>

							<?php endif; ?>
						</div>
					</div>
					
			<?php endswitch;
		
		} // #endif
	}

}
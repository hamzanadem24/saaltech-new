<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_WPML_Lang_Dropdown extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_wpml_lang_dropdown';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $classes = '' ) {
		if( function_exists('icl_get_languages') ) : 
		
			global $sitepress_settings;
			
			$skip_missing = 0;
			$languages = icl_get_languages('skip_missing='.$skip_missing.'&orderby=KEY&order=DIR&link_empty_to=str');

			if (is_array($languages) && count($languages) > 0):
				$active_language = null;
				foreach ($languages as $language):
					if ($language['active'] == 1):
						if (isset($sitepress_settings['icl_lso_native_lang']) && $sitepress_settings['icl_lso_native_lang'] == 1):
							$active_language = $language['native_name'];
						elseif (isset($sitepress_settings['icl_lso_display_lang']) && $sitepress_settings['icl_lso_display_lang'] == 1):
							$active_language = $language['translated_name'];
						endif;

						break;
					endif;
				endforeach; ?>
				

				<div class="iv-module wpml-lang-dropdown <?php echo esc_attr($classes); ?>">
					<div class="centered">
						<div class="language">
							<a class="trigger" href="#">
							  <?php esc_html_e('Language', 'bomby'); ?> <span><?php echo esc_html($active_language); ?></span>
							</a>

							<div class="inner-wrapper" style="opacity: 0;">
								<div class="inner-form">
									<div class="lwa">
										<ul>
											<?php
											foreach ($languages as $language): 
												$flag = '<img src="'.$language['country_flag_url'].'" />';
												
												$language_name = '';
												if (isset($sitepress_settings['icl_lso_native_lang']) && $sitepress_settings['icl_lso_native_lang'] == 1):
													$language_name = $language['native_name'];
												endif;

												if (isset($sitepress_settings['icl_lso_display_lang']) && $sitepress_settings['icl_lso_display_lang'] == 1):
													if (!empty($language_name)):
														$language_name .= ' ('.$language['translated_name'].')';
													else:
														$language_name = $language['translated_name'];
													endif;
												endif;

												?>
												<li <?php echo esc_attr($language['active'] == 1 ? 'class="active"' : ''); ?>><a href="<?php echo esc_url($language['url']); ?>" title="<?php echo esc_attr($language['native_name']); ?>"><?php echo (isset($sitepress_settings['icl_lso_flags']) && $sitepress_settings['icl_lso_flags'] == 1 ? $flag : ''); ?><?php echo esc_html($language_name); ?></a></li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div> <!-- .language -->
					</div> <!-- .centered -->	
				</div> <!-- .wpml-lang-dropdown -->
				<?php
			endif;
		endif;
	}

}
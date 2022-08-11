<?php

/**
 * Get custom sidebars list
 * @return array
 */
function ivan_get_custom_sidebars_list($add_default = true) {
	
	$sidebars = array();
	if ($add_default) {
		$sidebars['default'] = esc_html__('Default', 'bomby');
	}
	
	$options = get_option('iv_aries');
	
	if(!isset($options['custom-sidebars']) || !is_array($options['custom-sidebars'])) {
		return $sidebars;
	}

	if (is_array($options['custom-sidebars'])) {
		foreach ($options['custom-sidebars'] as $sidebar) {
			$sidebars[sanitize_title ( $sidebar )] = $sidebar; 
		}
	}
	
	return $sidebars;
}

<?php
/**
 * Functions used to return values from theme options panel
 *
 */

// Return option from theme options.
function ivan_get_option( $id, $ignore_local = false ) {
	global $iv_aries;

	if(!isset($iv_aries[$id]))
		return null;

	$value = $iv_aries[$id];
	
	// Used to overwrite a few properties defined in metabox
	if($ignore_local !== true && is_singular()) {
		$_val = ivan_get_post_option( $id . '-local' );

		//if $_val is an array we need to check if first element is not empty before we override global one
		$first_element = null;
		if (is_array($_val)) {
			$first_element = reset($_val);
			
			//slides type where empty first slide is saved on metaboxes
			//if it happens we need to ignore local
			if (is_array($first_element) && isset($first_element['image']) && empty($first_element['image']) && count($_val) == 1) {
				$first_element = false;
			}
		}
		if (is_string($_val) && (strlen($_val) > 0 || !empty($_val)) || is_array($_val) && !empty($first_element)) {
			$value = $_val;
		}
	}

	return apply_filters('ivan_get_option_filter_' . $id , $value);
}


// Return $true if option is true or $false if not.
function ivan_get_option_display( $id, $true = true, $false = false ) {
	global $iv_aries;

	if(!isset($iv_aries[$id]))
		return null;

	$value = $iv_aries[$id];

	// Used to overwrite a few properties defined in metabox
	if(is_singular()) {

		$_val = ivan_get_post_option( $id . '-local' );

		if('' != $_val && null != $_val) {
			$value = $_val;
		}
	}

	$value = apply_filters('ivan_get_option_filter_' . $id , $value);

	if( true == $value )
		return $true;
	else
		return $false;
}

// Return post option [from metaboxes]
function ivan_get_post_option( $id ) {

	global $post;
	if(!isset($post->ID))
		return null;

	if(function_exists('redux_post_meta'))
		$options = redux_post_meta(IVAN_FW_THEME_OPTS, get_the_ID());
	else
		$options = get_post_meta( get_the_ID(), IVAN_FW_THEME_OPTS, true );
	

	if( isset( $options[$id] ) )
		return apply_filters('ivan_get_post_option_filter', $options[$id], $id);
	else
		return null;
}

// Return $true if post option is true or $false if not [from metaboxes]
function ivan_get_post_option_display( $id, $true = true, $false = false ) {

	if( true == is_singular() ) :
		$opt = ivan_get_post_option( $postID, $id );

		if( $opt == true )
			return $true;
		else
			return $false;
	else :
		return null;
	endif;
}

$ivan_current_callers = array(
	'main-layout' => '',
	'layout' => '',
);

$oArgs = Ivan_ThemeArguments::getInstance('current_caller');
$oArgs -> set('ivan_current_callers', $ivan_current_callers);


// Define current caller, that is the layout being displayed in the moment.
function ivan_set_current_caller( $name, $value ) {
	
	$oArgs = Ivan_ThemeArguments::getInstance('current_caller');
	$ivan_current_callers = $oArgs -> get('ivan_current_callers');

	$ivan_current_callers[ $name ] = $value;

	$oArgs -> set('ivan_current_callers', $ivan_current_callers);
}

// Return current caller to allow know which layou is being rendered.
function ivan_get_current_caller( $name ) {

	$oArgs = Ivan_ThemeArguments::getInstance('current_caller');
	$ivan_current_callers = $oArgs -> get('ivan_current_callers');

	return $ivan_current_callers[ $name ];
}

/**
 * Get custom sidebar, returns $default if custom sidebar is not defined
 * @param string $default
 * @param string $sidebar_option_field
 * @return string
 */
function ivan_get_custom_sidebar($default = '', $sidebar_option_field = 'sidebar') {
	
	$sidebar = ivan_get_post_option($sidebar_option_field);
	
	if ($sidebar != 'default' && !empty($sidebar)) {
		return $sidebar;
	}
	return $default;
}
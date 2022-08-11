<?php
/**
 *
 * Class used as base to create modules that can be attached to layouts 
 *
 * @package   IvanFramework
 */

class Ivan_Module_Logo extends Ivan_Module {

	// Module slug used as parameters to actions and filters
	public $slug = '_logo';

	/**
	 * Calls the respective template part or markup that must be displayed
	 *
	 * @since     1.0.0
	 */
	public static function display( $avoidAlternativeLogo = false ) {

		// Default logo to be displayed if user didn't uploaded any logo at Theme Options
		$logo_sd = '';

		$logo_hd = '';

		// Standard (SD) Resolution logo
		if( null != ivan_get_option( 'logo' ) ) {
			$logo = ivan_get_option( 'logo' );
		}
		
		if( false == isset( $logo['url'] ) OR '' == $logo['url'] ) {
			$logo['url'] = get_template_directory_uri() . '/images/logo.png'; // This is the fallback logo
			$logo['width'] = '201';
			$logo['height'] = '26';
		}

		$logo_sd = '<img class="sd-res logo-normal" src="'. $logo['url'] . '" width="'. $logo['width'] .'" height="'. $logo['height'] .'" alt="'. get_bloginfo( 'name' ) .'" />';

		// High (HD) Resolution logo, displayed in Retina Display
		if( ivan_get_option( 'logo-retina') != null ) {

			$logo_hd_temp = ivan_get_option( 'logo-retina' );

			if( true == isset( $logo_hd_temp['url'] ) AND '' != $logo_hd_temp['url'] )
				$logo_hd = '<img class="hd-res logo-normal" src="'. $logo_hd_temp['url'] . '" width="'. $logo['width'] .'" height="'. $logo['height'] .'" alt="'. get_bloginfo( 'name' ) .'" />';

		}

		// Adds WPML compatibility to logo URL
		$homeURL = ivan_get_home_url();

		// Alt Logos
		$_scheme = ivan_get_option( 'header-color-scheme' );
		$logo_sd_alt = '';
		$logo_hd_alt = '';

		if( $_scheme != null && true == ivan_get_option( 'header-negative-height' ) ) {
			
			$logo_alt = null;

			// Get correct logo
			if( $_scheme == 'light' ) {
				$logo_alt = ivan_get_option( 'logo-light' );
			}
			else if( $_scheme == 'dark') {
				$logo_alt = ivan_get_option( 'logo-dark' );
			}

			if( $logo_alt != null ) {

				if( true == isset( $logo_alt['url'] ) && $logo_alt['url'] != '' ) {

					$logo_sd_alt = '<img class="sd-res logo-alt" src="'. $logo_alt['url'] . '" width="'. $logo_alt['width'] .'" height="'. $logo_alt['height'] .'" alt="'. get_bloginfo( 'name' ) .'" />';

					// High (HD) Resolution logo, displayed in Retina Display
					if( ivan_get_option( 'logo-retina-' . $_scheme ) != null ) {

						$logo_hd_temp = ivan_get_option( 'logo-retina-' . $_scheme );

						if( true == isset( $logo_hd_temp['url'] ) AND '' != $logo_hd_temp['url'] )
							$logo_hd_alt = '<img class="hd-res logo-alt" src="'. $logo_hd_temp['url'] . '" width="'. $logo_alt['width'] .'" height="'. $logo_alt['height'] .'" alt="'. get_bloginfo( 'name' ) .'" />';

					}

				}

			}

		}

		// Display Logo module markup

		$classes = '';
		$styles = '';

		if( $logo_sd_alt != '' )
			$classes = ' has-alt';

		if( $logo_hd != '' ) {
			$classes .= ' has-hd';
		}

		// Custom per Page Margin
		$margin = ivan_get_post_option('logo-spacing');

		if($margin != null ) {
			foreach ($margin as $key => $value) {
				if( $value != '' )
					$styles .= esc_attr($key) . ':' . esc_attr($value) . ';';
			}
		}

		if( false == $avoidAlternativeLogo )
			echo '<a href="'. esc_url($homeURL) .'" class="logo'. ivan_sanitize_html_classes($classes) .'" style="'. $styles .'">'. $logo_sd . $logo_hd . $logo_sd_alt . $logo_hd_alt . '</a>';
		else
			echo '<a href="'. esc_url($homeURL) .'" class="logo" style="'. $styles .'">'. $logo_sd . $logo_hd . '</a>';

	}
}
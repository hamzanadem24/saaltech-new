<?php
/**
 * Specific Theme Configurations
 *
 * This is used to more specific configurations that change often
 * from one theme to another.
 */

define( 'IVAN_THEME_CONFIGS', get_template_directory() . '/theme-configs' );

// Plugin Requirements
require IVAN_THEME_CONFIGS . '/tgm/tgm_init.php';

// Presets to Shortcodes
require IVAN_THEME_CONFIGS . '/options/vc_presets.php';

// Basic Customizer
require IVAN_THEME_CONFIGS . '/customization/customizer.php';
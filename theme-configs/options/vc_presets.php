<?php
/**
 * Add Templates to Visual Composer Modules
 *
 * This is used to create different ready styles to Visual Composer
 * Modules
 */

/**
 * Pie Charts
**/

add_filter('ivan_pie_chart_active_primary', 'ivan_custom_pie_chart_active_primary', 100);
function ivan_custom_pie_chart_active_primary( $color ) {
	return '#1cbac8';
}

/**
 * Before Social Icons in Team Member Element
**/

add_action('ivan_vc_before_socials_team_in', 'ivan_custom_vc_before_socials_team_in', 100,1);
function ivan_custom_vc_before_socials_team_in($style) {
	echo '<div class="description" '.$style.'>'. esc_html__('You can find me here', 'bomby') .'</div>';
}

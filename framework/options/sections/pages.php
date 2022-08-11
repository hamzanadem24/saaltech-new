<?php
/*
 * Pages Section
*/

$this->sections[] = array(
	'title' => esc_html__('Pages', 'bomby'),
	'desc' => esc_html__('Change pages settings.', 'bomby'),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id' => 'random-404',
			'type' => 'info',
			'desc' => esc_html__('404', 'bomby')
		),

		/* Base Layouts */
		array(
			'id'=>'404-page',
			'type' => 'select',
			'title' => esc_html__('404 Page', 'bomby'), 
			'subtitle' => esc_html__('Override 404 page.', 'bomby'),
			'data' => 'pages',
			'default' => '',
			'validate' => '',
		),
	), // #fields
);
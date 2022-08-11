<?php
/*
 * Content Section
*/

$this->sections[] = array(
	'title' => esc_html__('Content', 'bomby'),
	'desc' => esc_html__('Change the content configurations.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'=>'page-boxed-page',
			'type' => 'switch', 
			'title' => esc_html__('Display Pages/Projects Boxed?', 'bomby'),
			'subtitle'=> esc_html__('If on, the pages will be displayed in a boxed layout. Can be overloaded per page.', 'bomby'),
			"default" => 0,
		),
	),
);
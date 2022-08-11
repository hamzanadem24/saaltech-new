<?php
/*
 * Sidebars Section
*/

$this->sections[] = array(
	'title' => esc_html__('Sidebars', 'bomby'),
	'desc' => esc_html__('Define custom sidebars.', 'bomby'),
	'icon' => 'el-icon-magic',
	'fields' => array(

		array(
			'id'       => 'custom-sidebars',
			'type'     => 'multi_text',
			'title'    => esc_html__( 'Custom Sidebars', 'bomby' ),
			'subtitle' => esc_html__( 'Custom sidebars can be assigned to any page or post.', 'bomby' ),
			'desc'     => esc_html__( 'You can add as many custom sidebars as you need.', 'bomby' )
		),

		array(
				'id'=>'sidebar-primary-global-replace',
				'type' => 'select',
				'title' => esc_html__('Primary Sidebar', 'bomby'),
				'desc' => esc_html__('Select a sidebar to overwrite the sidebar location.', 'bomby'),
				'data' => 'sidebars',
				'default' => '',
			),

			array(
				'id'=>'sidebar-secondary-global-replace',
				'type' => 'select',
				'title' => esc_html__('Secondary Sidebar', 'bomby'),
				'desc' => esc_html__('Select a sidebar to overwrite the sidebar location.', 'bomby'),
				'data' => 'sidebars',
				'default' => '',
			),

	),
);
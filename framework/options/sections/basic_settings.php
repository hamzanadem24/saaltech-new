<?php

$sections[] = array(
	'title' => esc_html__('Basic Settings', 'bomby'),
	'desc' => wp_kses_post( __('Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>', 'bomby') ),
	'icon' => 'el-icon-home',
	'fields' => array(	
		array(
			'id'=>'logo',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Logo', 'bomby'),
			'desc'=> esc_html__('Logo Dimensions in our demo: ', 'bomby') . apply_filters( 'ivan_logo_dimensions', '200x100' ),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'bomby'),
			),
		array(
			'id'=>'logo_retina',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Logo Retina', 'bomby'),
			'desc'=> esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'bomby'),
			'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'bomby'),
			'required' => array( 'logo', '!=', null ),
			),
		array(
			'id'=>'logo_spacing',
			'type' => 'spacing_mod',
			'mode'=> 'margin', // absolute, padding, margin, defaults to padding
			'top'=> false, // Disable the top
			'right' => false, // Disable the right
			'bottom' => false, // Disable the bottom
			'units' => 'px', // You can specify a unit value. Possible: px, em, %
			'title' => esc_html__('Logo Margin', 'bomby'),
			'subtitle' => esc_html__('Select a custom margin to the be applied in the logo.', 'bomby'),
			'desc' => esc_html__('If not set, default margin will be applied by theme.', 'bomby'),
			'default' => array('margin-left'=> '0' ),
			'required' => array( 'logo', '!=', null ),
			),

		array(
			'id' => 'body-background',
			'type' => 'background',
			'output' => array('body'),
			'title' => esc_html__('Body Background', 'bomby'),
			'subtitle' => esc_html__('Body background with image, color, etc.', 'bomby'),
		),

	),
);
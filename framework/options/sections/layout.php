<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Layout Settings', 'bomby'),
	'desc' => esc_html__('Change the main theme\'s layout and configure it.', 'bomby'),
	'icon' => 'el-icon-adjust-alt',
	'fields' => array(

		array(
			'id'        => 'main-layout',
			'type'      => 'image_select',
			'compiler'  => true,
			'title' => esc_html__('Main Layout', 'bomby'),
			'desc' => esc_html__('See that this layout is valid to the whole website, but you can overwrite it locally in a page, for example.', 'bomby'),
			'subtitle' => esc_html__('Select the layout to be used by the website.', 'bomby'),
			'options'   => array(
				'Ivan_Main_Layout_Normal' => array(
					'alt' => 'Default Layout',
					'title' => 'Top Header',
					'img' => get_template_directory_uri() . '/framework/assets/images/main-layout-top.png'
				),
				'Ivan_Main_Layout_Aside_Left' => array(
					'alt' => 'Aside Layout',
					'title' => 'Left Header',
					'img' => get_template_directory_uri() . '/framework/assets/images/main-layout-left.png'
				),
			),
			'default'   => 'Ivan_Main_Layout_Normal',
			'validate' => 'not_empty',
		),
		
		array(
			'id' => 'main-layout-aside-background',
			'type' => 'background',
			'output' => array('.header.vertical.modern .background-container'),
			'title' => esc_html__('Aside Layout Background', 'bomby'),
			'subtitle' => esc_html__('Background image, color and other options. Usually visible only when using boxed layout.', 'bomby'),
			'required' => array('main-layout', '=', 'Ivan_Main_Layout_Aside_Left_Modern')
		),

		array(
			'id'=>'wide-boxed-switch',
			'type' => 'image_select',
			'title' => esc_html__('Template', 'bomby'),
			'desc' => esc_html__('See that this configuration is valid to the whole website, but you can overwrite it locally in a page, for example.', 'bomby'),
			'subtitle' => esc_html__('Select if the layout will be boxed or wide.', 'bomby'),
			'required' => array( 'main-layout', '=', 'Ivan_Main_Layout_Normal'),
			'options' => array(
				'wide' => array(
					'alt' => 'Wide',
					'title' => 'Wide',
					'img' => get_template_directory_uri() . '/framework/assets/images/template-wide.png'
				),
				'boxed-laterals' => array(
					'alt' => 'Boxed',
					'title' => 'Boxed',
					'img' => get_template_directory_uri() . '/framework/assets/images/template-boxed.png'
				),
				'page-framed' => array(
					'alt' => 'Framed',
					'title' => 'Framed',
					'img' => get_template_directory_uri() . '/framework/assets/images/template-framed.png'
				),
			),				
			'default' => 'wide'
		),

		array(
			'id' => 'random-layout-label',
			'type' => 'info',
			'desc' => esc_html__('Container Configuration.', 'bomby')
		),

		array(
			'id'=>'header-container-type',
			'type' => 'select',
			'title' => esc_html__('Header Container Type', 'bomby'),
			'desc' => esc_html__('Define container configuration to be used, it can be normal, expanded or compact.', 'bomby'),
			'options' => array(
					'normal' => 'Normal',
					'expanded' => 'Expanded',
					'compact' => 'Compact',
					),
			'default' => 'normal',
			'required' => array( 'main-layout', '=', 'Ivan_Main_Layout_Normal'),
		),

		array(
			'id'=>'content-container-type',
			'type' => 'select',
			'title' => esc_html__('Content Container Type', 'bomby'),
			'desc' => esc_html__('Define container configuration to be used, it can be normal, expanded or compact.', 'bomby'),
			'options' => array(
					'normal' => 'Normal',
					'expanded' => 'Expanded',
					'compact' => 'Compact',
					),
			'default' => 'normal',
			'required' => array( 'main-layout', '=', 'Ivan_Main_Layout_Normal'),
		),

		array(
			'id'=>'footer-container-type',
			'type' => 'select',
			'title' => esc_html__('Footer Container Type', 'bomby'),
			'desc' => esc_html__('Define container configuration to be used, it can be normal, expanded or compact.', 'bomby'),
			'options' => array(
					'normal' => 'Normal',
					'expanded' => 'Expanded',
					'compact' => 'Compact',
					),
			'default' => 'normal',
			'required' => array( 'main-layout', '=', 'Ivan_Main_Layout_Normal'),
		),

	),
);
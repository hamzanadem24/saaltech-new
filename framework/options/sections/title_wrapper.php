<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Title Wrapper', 'bomby'),
	'desc' => esc_html__('Change the title wrapper section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'=>'title-wrapper-enable-switch',
			'type' => 'switch', 
			'title' => esc_html__('Disable this layout part?', 'bomby'),
			'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id'=>'title-wrapper-layout',
			'type' => 'select',
			'title' => esc_html__('Title Wrapper Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the top layout to be used at title wrapper.', 'bomby'),
			'options' => apply_filters('ivan_title_wrapper_layouts', array( 
					'Ivan_Layout_Title_Wrapper_Normal' => 'Classic with Description Text',
					'Ivan_Layout_Title_Wrapper_Large' => 'Large with Description Text',
					) ),
			'default' => 'Ivan_Layout_Title_Wrapper_Large',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'title-large-align',
			'type' => 'switch', 
			'title' => esc_html__('Align Large Title to Left?', 'bomby'),
			'subtitle'=> esc_html__('If on, the large title wrapper layout will be aligned to left.', 'bomby'),
			"default" => 0,
			'required' => array( 'title-wrapper-layout', '=', array('Ivan_Layout_Title_Wrapper_Large') ),
		),

		array(
			'id'=>'title-large-opacity',
			'type' => 'switch', 
			'title' => esc_html__('Overlay', 'bomby'),
			'subtitle'=> esc_html__('Best for light photos.', 'bomby'),
			"default" => 0,
			'required' => array( 'title-wrapper-layout', '=', array('Ivan_Layout_Title_Wrapper_Large') ),
		),
		
		array(
			'id'=>'breadcrumb-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Breadcrumb?', 'bomby'),
			'subtitle'=> esc_html__('If on, a breadcrumb will be displayed aside of title wrapper.', 'bomby'),
			"default" => 1,
			'required' => array( 'title-wrapper-layout', '=', array('Ivan_Layout_Title_Wrapper_Normal') ),
		),
		array(
			'id'=>'search-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Search?', 'bomby'),
			'subtitle'=> esc_html__('If on, a search form will be displayed aside of title wrapper.', 'bomby'),
			"default" => 1,
			'required' => array( 'title-wrapper-layout', '=', array('Ivan_Layout_Title_Wrapper_Normal') ),
		),
		array(
			'id'=>'breadcrumb-proj-disable',
			'type' => 'switch', 
			'title' => esc_html__('Disable Projects Breadcrumb?', 'bomby'),
			'subtitle'=> esc_html__('If on, breadcrumbs will not be displayed in projects.', 'bomby'),
			"default" => 0,
			'required' => array( 'breadcrumb-enable', '=', true ),
		),

		array(
			'id'=>'breadcrumb-shop-disable',
			'type' => 'switch', 
			'title' => esc_html__('Disable Shop Breadcrumb?', 'bomby'),
			'subtitle'=> esc_html__('If on, breadcrumbs will not be displayed in shop pages.', 'bomby'),
			"default" => 0,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Default Titles.', 'bomby')
		),

		array(
			'id' => 'title-text-blog',
			'type' => 'text',
			'title' => esc_html__('Default Blog Title', 'bomby'),
			'subtitle' => esc_html__('Title used in index post listing.', 'bomby'),
			'default' => 'Our Blog',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'title-desc-blog',
			'type' => 'textarea',
			'title' => esc_html__('Default Blog Subtitle', 'bomby'),
			'subtitle' => esc_html__('Place any text to be displayed before blog title.', 'bomby'),
			'validate' => 'html_custom',
			'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array(),
						'target' => array(),
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				),
			'default' => '',
		),

		array(
			'id' => 'title-text-shop',
			'type' => 'text',
			'title' => esc_html__('Default Shop Title', 'bomby'),
			'subtitle' => esc_html__('Title used in single product title when avaliable.', 'bomby'),
			'default' => 'Our Shop',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'title-desc-shop',
			'type' => 'textarea',
			'title' => esc_html__('Default Shop Subtitle', 'bomby'),
			'subtitle' => esc_html__('Place any text to be displayed before shop title.', 'bomby'),
			'validate' => 'html_custom',
			'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array(),
						'target' => array(),
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				),
			'default' => '',
		),

	), // #fields
);
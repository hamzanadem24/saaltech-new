<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Bottom Footer', 'bomby'),
	'desc' => esc_html__('Change the bottom footer section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'=>'bottom-footer-enable',
			'type' => 'switch', 
			'title' => esc_html__('Disable this layout part?', 'bomby'),
			'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),
		
		array(
			'id'=>'bottom-footer-color-scheme',
			'type' => 'select',
			'title' => esc_html__('Color scheme', 'bomby'), 
			'subtitle' => esc_html__('Select footer color scheme.', 'bomby'),
			'options' => array(
				'dark' => esc_html__('Dark', 'bomby'),
				'light-alt' => esc_html__('Light', 'bomby'),
			),
			'default' => 'dark',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'bottom-footer-layout',
			'type' => 'select',
			'title' => esc_html__('Bottom Footer Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the bottom footer to be used at header.', 'bomby'),
			'options' => apply_filters('ivan_bottom_footer_layouts', array( 
				'Ivan_Layout_Bottom_Footer_Two_Columns' => 'Two Columns',
				'Ivan_Layout_Bottom_Footer_Centered' => 'Centered',
			) ),
			'default' => 'Ivan_Layout_Bottom_Footer_Two_Columns',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'bottom-footer-fullwidth',
			'type' => 'switch', 
			'title' => esc_html__('Fulll Width', 'bomby'),
			'subtitle'=> esc_html__('If on, the bottom footer will be full width.', 'bomby'),
			"default" => 0,
			'required' => array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
		),
		
		array(
			'id'=>'bottom-footer-expanded-paddings',
			'type' => 'switch', 
			'title' => esc_html__('Enable Expanded Paddings?!', 'bomby'),
			'subtitle'=> esc_html__('If on, the bottom footer will receive extra vertical padding.', 'bomby'),
			"default" => 0,
			'required' => array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
		),

		array(
			'id' => 'bottom-footer-left-width',
			'type' => 'slider',
			'title' => esc_html__('Left Area Width', 'bomby'),
			'desc' => esc_html__('Define columns number of top header left side.', 'bomby'),
			'subtitle' => esc_html__('The left and right side combined should not be greater than 12! Otherwise the layout will break.', 'bomby'),
			"default" => "6",
			"min" => "0",
			"step" => "1",
			"max" => "12",
			'required' => array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
		),

		array(
			'id' => 'bottom-footer-right-width',
			'type' => 'slider',
			'title' => esc_html__('Right Area Width', 'bomby'),
			'desc' => esc_html__('Define columns number of top header left side.', 'bomby'),
			'subtitle' => esc_html__('The left and right side combined should not be greater than 12! Otherwise the layout will break.', 'bomby'),
			"default" => "6",
			"min" => "0",
			"step" => "1",
			"max" => "12",
			'required' => array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
		),

		array(
			'id'=>'bottom-footer-menu-disable',
			'type' => 'switch', 
			'title' => esc_html__('Disable Menu?', 'bomby'),
			'subtitle'=> esc_html__('If on, menu will not be displayed.', 'bomby'),
			"default" => 1,
			'required' => array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
		),
		array(
			'id'=>'bottom-footer-logo',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Logo', 'bomby'),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the bottom footer.', 'bomby'),
		),
		array(
			'id'=>'bottom-footer-menu-left-switch',
			'type' => 'switch', 
			'title' => esc_html__('Display Menu at Left Area', 'bomby'),
			'subtitle'=> esc_html__('If on, menu will display at left side of bottom footer.', 'bomby'),
			"default" => 0,
			'required' => array(
				array('bottom-footer-layout', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
				array( 'bottom-footer-menu-disable', '=', 0)
			),
		),

		array(
			'id' => 'random-number-text-module',
			'type' => 'info',
			'desc' => esc_html__('Text Module Configuration.', 'bomby'),
		),

		array(
			'id'=>'bottom-footer-text-switch',
			'type' => 'switch', 
			'title' => esc_html__('Text Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a rich text module will be displayed.', 'bomby'),
			"default" => 1,
		),

			array(
				'id' => 'bottom-footer-text-content',
				'type' => 'editor',
				'title' => esc_html__('Text Module Content', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use [iv_separator] to add a separator in the text. Use [iv_icon icon="cogs"] to display Font Awesome icons. Use [iv_flags] to add WPML flags.', 'bomby'),
				'default' => 'All rights reserved.',
				'required' => array( 'bottom-footer-text-switch', '=', 1 ),
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Social Module Configuration.', 'bomby')
		),

		array(
			'id'=>'bottom-footer-social-switch',
			'type' => 'switch', 
			'title' => esc_html__('Social Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a social icon module will be displayed.', 'bomby'),
			"default" => 0,
		),

			array(
				'id' => 'bottom-footer-social-icons',
				'type' => 'social_select',
				'title' => esc_html__('Social Icons', 'bomby'),
				'subtitle' => esc_html__('Add and organize the icons to be displayed.', 'bomby'),
				'required' => array( 'bottom-footer-social-switch', '=', 1 ),
				'placeholder' => array(
					'title' => esc_html__('Social Media URL', 'bomby'),
				),
			),

		array(
			'id' => 'random-bottom-footer',
			'type' => 'info',
			'desc' => esc_html__('Dynamic Areas', 'bomby')
		),

		array(
			'id'=>'bottom-footer-da-before-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Dynamic Area Before Bottom Footer?', 'bomby'),
			'subtitle'=> esc_html__('If on, a dynamic area will be displayed above the layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'bottom-footer-da-before',
			'type' => 'select',
			'title' => esc_html__('Before Dynamic Content Page', 'bomby'), 
			'subtitle' => esc_html__('Select the page from where the content will be loaded and displayed.', 'bomby'),
			'data' => 'pages',
			'required' => array( 'bottom-footer-da-before-enable', '=', 1),
		),

		array(
			'id'=>'bottom-footer-da-after-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Dynamic Area After Bottom Footer?', 'bomby'),
			'subtitle'=> esc_html__('If on, a dynamic area will be displayed below the layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'bottom-footer-da-after',
			'type' => 'select',
			'title' => esc_html__('After Dynamic Content Page', 'bomby'), 
			'subtitle' => esc_html__('Select the page from where the content will be loaded and displayed.', 'bomby'),
			'data' => 'pages',
			'required' => array( 'bottom-footer-da-after-enable', '=', 1),
		),

	), // #fields
);
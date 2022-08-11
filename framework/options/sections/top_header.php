<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Top Header', 'bomby'),
	'desc' => esc_html__('Change the top header section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'=>'top-header-enable-switch',
			'type' => 'switch', 
			'title' => esc_html__('Disable this layout part?', 'bomby'),
			'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 1,
		),
		
		array(
			'id'=>'top-header-variant',
			'type' => 'select',
			'title' => esc_html__('Top Header Style', 'bomby'), 
			'subtitle' => esc_html__('Select the top syle to be used at header.', 'bomby'),
			'options' => array( 
					'default' => 'Dark',
					'alternative-dark' => 'Color',
					'alternative-light' => 'Light',
			 ),
			'default' => 'alternative-light',
			'validate' => 'not_empty',
		),
		
		array(
			'id'=>'top-header-layout',
			'type' => 'select',
			'title' => esc_html__('Top Header Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the top layout to be used at header.', 'bomby'),
			'options' => apply_filters('ivan_top_header_layouts', array( 
					'Ivan_Layout_Top_Header_Two_Columns' => 'Two Columns',
					) ),
			'default' => 'Ivan_Layout_Top_Header_Two_Columns',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'top-header-left-width',
			'type' => 'slider',
			'title' => esc_html__('Left Area Width', 'bomby'),
			'desc' => esc_html__('Define columns number of top header left side.', 'bomby'),
			'subtitle' => esc_html__('The left and right side combined should not be greater than 12! Otherwise the layout will break.', 'bomby'),
			"default" => "4",
			"min" => "1",
			"step" => "1",
			"max" => "11",
		),

		array(
			'id' => 'top-header-right-width',
			'type' => 'slider',
			'title' => esc_html__('Right Area Width', 'bomby'),
			'desc' => esc_html__('Define columns number of top header left side.', 'bomby'),
			'subtitle' => esc_html__('The left and right side combined should not be greater than 12! Otherwise the layout will break.', 'bomby'),
			"default" => "8",
			"min" => "1",
			"step" => "1",
			"max" => "11",
		),

		array(
			'id'=>'top-header-menu-disable',
			'type' => 'switch', 
			'title' => esc_html__('Disable Menu?', 'bomby'),
			'subtitle'=> esc_html__('If on, menu will not be displayed.', 'bomby'),
			"default" => 1,
		),

		array(
			'id'=>'top-header-menu-left-switch',
			'type' => 'switch', 
			'title' => esc_html__('Display Menu at Left Area', 'bomby'),
			'subtitle'=> esc_html__('If on, menu will display at left side of top header.', 'bomby'),
			"default" => 0,
			'required' => array( 'top-header-menu-disable', '=', 0),
		),

		array(
			'id'=>'top-header-v-sign-switch',
			'type' => 'switch', 
			'title' => esc_html__('Menu Arrow', 'bomby'),
			'subtitle'=> esc_html__('If on, menu items will get a arrow after text.', 'bomby'),
			"default" => 0,
			'required' => array( 'top-header-menu-disable', '=', 0),
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Woo Cart Module Configuration.', 'bomby')
		),

		array(
			'id'=>'top-header-woo-cart-switch',
			'type' => 'switch', 
			'title' => esc_html__('Woo Cart', 'bomby'),
			'subtitle'=> esc_html__('If on, a WooCommerce cart will be displayed. Requires WooCommerce plugin activated.', 'bomby'),
			"default" => 0,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Login AJAX Module Configuration.', 'bomby')
		),

		array(
			'id'=>'top-header-login-ajax-switch',
			'type' => 'switch', 
			'title' => esc_html__('Login AJAX', 'bomby'),
			'subtitle'=> esc_html__('If on, a Login AJAX will be displayed. Requires Login With Ajax plugin activated.', 'bomby'),
			"default" => 1,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Search Module Configuration.', 'bomby')
		),

		array(
			'id'=>'top-header-search-switch',
			'type' => 'switch', 
			'title' => esc_html__('Search', 'bomby'),
			'subtitle'=> esc_html__('If on, a search module will be displayed.', 'bomby'),
			"default" => 0,
		),
		
		array(
			'id'=>'top-header-search-style',
			'type' => 'select',
			'title' => esc_html__('Search Style', 'bomby'), 
			'subtitle' => esc_html__('Select the search style.', 'bomby'),
			'options' => array( 
					'default' => 'Default',
					'search-top-style' => 'Top',
					'search-full-screen-style' => 'Full Screen',
					'search-full-screen-alt-style' => 'Full Screen Alternative',
			 ),
			'default' => 'search-full-screen-style',
			'validate' => 'not_empty',
			'required' => array( 'top-header-search-switch', '=', 1 ),
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Text Module Configuration.', 'bomby')
		),

		array(
			'id'=>'top-header-text-switch',
			'type' => 'switch', 
			'title' => esc_html__('Text Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a rich text module will be displayed.', 'bomby'),
			"default" => 0,
		),

			array(
				'id' => 'top-header-text-content',
				'type' => 'editor',
				'title' => esc_html__('Text Module Content', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use [iv_separator] to add a separator in the text. Use [iv_icon icon="cogs"] to display Font Awesome icons. Use [iv_flags] to add WPML flags.', 'bomby'),
				'default' => '[iv_icon icon="phone"] 9854-888-021 [iv_separator] [iv_icon icon="home"] New York, NY',
				'required' => array( 'top-header-text-switch', '=', 1 ),
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Social Module Configuration.', 'bomby')
		),

		array(
			'id'=>'top-header-social-switch',
			'type' => 'switch', 
			'title' => esc_html__('Social Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a social icon module will be displayed.', 'bomby'),
			"default" => 0,
		),

			array(
				'id' => 'top-header-social-icons',
				'type' => 'social_select',
				'title' => esc_html__('Social Icons', 'bomby'),
				'subtitle' => esc_html__('Add and organize the icons to be displayed.', 'bomby'),
				'required' => array( 'top-header-social-switch', '=', 1 ),
				'placeholder' => array(
					'title' => esc_html__('Social Media URL', 'bomby'),
				),
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('WPML Modules', 'bomby')
		),

			array(
				'id'=>'top-header-wpml-lang-switch',
				'type' => 'switch', 
				'title' => esc_html__('WPML Language Flags', 'bomby'),
				'subtitle'=> esc_html__('If on, the avaliable languages flags will be displayed. Only works with WPML activated.', 'bomby'),
				"default" => 0,
			),

			array(
				'id'=>'top-header-wpml-currency-switch',
				'type' => 'switch', 
				'title' => esc_html__('WPML Shop Currencies', 'bomby'),
				'subtitle'=> esc_html__('If on, the avaliable currencies flags will be displayed. Only works with WPML + WooCommerce Multilingual activated.', 'bomby'),
				"default" => 0,
			),

	), // #fields
);
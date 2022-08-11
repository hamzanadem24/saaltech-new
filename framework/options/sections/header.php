<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Header', 'bomby'),
	'desc' => esc_html__('Change the header section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		// Disabled Header layout in the website
		array(
			'id' => 'header-enable-switch',
			'type' => 'switch', 
			'title' => esc_html__('Disable header?', 'bomby'),
			'subtitle' => esc_html__('If on, this layout part will not be displayed in website.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),

		array(
			'id'=>'header-layout',
			'type' => 'select',
			'title' => esc_html__('Header Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used at header.', 'bomby'),
			'options' => apply_filters('ivan_header_layouts', array( 
					'Ivan_Layout_Header_Horizontal_With_Sidebar' => 'Default',
					'Ivan_Layout_Header_Simple_Right_Menu' => 'Classic',
					'Ivan_Layout_Header_Two_Rows_Style2' => 'Modern Style',
					'Ivan_Layout_Overlay_Menu' => 'Overlay Menu',
					'Ivan_Layout_Header_Classic_Right_Area' => 'Logo and Modules + Menu Below',
					'Ivan_Layout_Header_Classic_Logo_Centered' => 'Logo Centered, Menu Below without Modules',
						) ),
			'default' => 'Ivan_Layout_Header_Simple_Right_Menu',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'header-overlay-bottom-border',
			'type' => 'switch', 
			'title' => esc_html__('Bottom Border', 'bomby'),
			'subtitle' => esc_html__('If on, this border will displayed.', 'bomby'),
			'default' => 1,
			'required' => array(
				array('header-layout', '=', 'Ivan_Layout_Overlay_Menu'),
			),
		),
		
		array(
			'id'=>'header-menu-color',
			'type' => 'color', 
			'title' => esc_html__('Menu Color', 'bomby'),
			'required' => array(
				array('header-layout', '=', 'Ivan_Layout_Header_Horizontal_With_Sidebar'),
			),
			'output' => array(
				'color' => '
					.header.style6 .mega_main_menu .mega_main_menu_ul > li > .item_link
			'),
			'validate' => 'color',
		),

		array(
			'id'=>'header-menu-position',
			'type' => 'switch', 
			'title' => esc_html__('Align Menu to  Right', 'bomby'),
			'subtitle' => esc_html__('If on, the menu will be aligned to right.', 'bomby'),
			'default' => 0,
			'required' => array(
				array('header-layout', '=', 'Ivan_Layout_Header_Simple_Right_Menu'),
			),
		),
		
		// Enable Fixed Header effect in website
		array(
			'id'=>'header-fixed-switch',
			'type' => 'switch', 
			'title' => esc_html__('Fixed Header', 'bomby'),
			'subtitle'=> esc_html__('If on, the header will be fixed at screen top on page scroll.', 'bomby'),
			'default' => 1,
		),
		
		array(
			'id'=>'header-fixed-hide-upper-on-scroll',
			'type' => 'switch', 
			'title' => esc_html__('Hide upper header part on scroll', 'bomby'),
			'subtitle'=> esc_html__('If on, the upper part of header will be hidden on scroll down.', 'bomby'),
			'default' => 0,
			'required' => array(
				array('header-fixed-switch', '=', '1'),
				array('header-layout', '=', 'Ivan_Layout_Header_Two_Rows_Style2'),
			)
		),
		
		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Header Layout Configuration.', 'bomby')
		),

		// Enables Negative Height Header
		array(
			'id'=>'header-negative-height',
			'type' => 'switch', 
			'title' => esc_html__('Negative Height', 'bomby'),
			'subtitle'=> esc_html__('If on, header will not have height and content will be showed behind it.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'header-bg-type',
			'type' => 'select',
			'title' => esc_html__('Header Background Type', 'bomby'), 
			'subtitle' => esc_html__('Select the type of background to be applied in header.', 'bomby'),
			'options' => array( 
					'transparent-bg' => 'Transparent',
					'semi-transparent-bg' => 'Semi Transparent / Gradient',
					),
			'default' => 'transparent-bg',
			'validate' => 'not_empty',
			'required' => array('header-negative-height', 'equals', 1),
		),

		array(
			'id' => 'header-color-scheme',
			'type' => 'select',
			'title' => esc_html__('Alternative Color Scheme', 'bomby'),
			'subtitle' => esc_html__('Select an alternative color scheme to header items.', 'bomby'),
			'options' => array( 'standard' => 'Standard', 'light' => 'Light (great to dark backgrounds)', 'dark' => 'Dark (great to light backgrounds)' ),
			'default' => 'standard',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'header-top-margin',
			'type' => 'spacing_mod',
			'mode'=> 'margin', // absolute, padding, margin, defaults to padding
			'right' => false, // Disable the right
			'bottom' => false, // Disable the bottom
			'left' => false, // Disable the left
			'units' => 'px', // You can specify a unit value. Possible: px, em, %
			'title' => esc_html__('Header Top Margin', 'bomby'),
			'subtitle' => esc_html__('Select a custom margin to the be applied to header top.', 'bomby'),
			'desc' => esc_html__('If not set, default margin will be applied by theme.', 'bomby'),
			'default' => array(),
			'required' => array('header-negative-height', 'equals', 1),
			'output' => array('.iv-layout.header'), // Our theme generates custom output for this field...
		),

		array(
			'id' => 'random-number-mod',
			'type' => 'info',
			'desc' => esc_html__('General Modules Configuration.', 'bomby'),
		),

		// Option to pull menu to left in avaliable layouts
		array(
			'id'=>'header-menu-pull-left-switch',
			'type' => 'switch', 
			'title' => esc_html__('Pull Menu to Left Side', 'bomby'),
			'subtitle'=> esc_html__('If on and avaliable in the layout, the menu will be placed at left. Works with "Normal Layout", "Logo at left and Menu + Modules Aside" and "Logo at left and Menu + Modules Aside -Style 2" only.', 'bomby'),
			'default' => 0,
			'required' => array(
				array('main-layout', 'equals', 'Ivan_Main_Layout_Normal'),
				array('header-layout', 'equals', array(
					'Ivan_Layout_Header_Simple_Right_Menu',
					'Ivan_Layout_Header_Style3_Right_Menu',
					'Ivan_Layout_Header_Style4_Right_Menu',
				) ),
			),
		),

		array(
			'id'=>'header-menu-pull-center-switch',
			'type' => 'switch', 
			'title' => esc_html__('Centralized Menu', 'bomby'),
			'subtitle'=> esc_html__('If on, menu will be centralized. Note that this option does not work with all layouts.', 'bomby'),
			'default' => 0,
			'required' => array(
				array('main-layout', 'equals', 'Ivan_Main_Layout_Normal'),
				array('header-layout', 'equals', 
					array(
						'Ivan_Layout_Header_Classic_Right_Area', 
						'Ivan_Layout_Header_Classic_Logo_Centered', 
						'Ivan_Layout_Header_Only_Menu'
					) 
				),
			),
		),

		array(
			'id'=>'header-aside-menu-centered-switch',
			'type' => 'switch', 
			'title' => esc_html__('Center Align Aside Menu Items', 'bomby'),
			'subtitle'=> esc_html__('If on the menu items will be centered, else default alignment left/right will be used.', 'bomby'),
			'default' => 1,
			'required' => array(
				array('main-layout', 'equals', array('Ivan_Main_Layout_Aside_Left', 'Ivan_Main_Layout_Aside_Right') ),
			),
		),

		// Adds V sign after menu items
		array(
			'id'=>'header-v-sign-switch',
			'type' => 'switch', 
			'title' => esc_html__('Menu Arrow', 'bomby'),
			'subtitle'=> esc_html__('If on, menu items will get a arrow after text.', 'bomby'),
			'default' => 0,
			'required' => array('header-layout', '!=', 'Ivan_Layout_Overlay_Menu'),
		),

		// Use responsive menu in select mode
		array(
			'id'=>'header-select-menu-switch',
			'type' => 'switch', 
			'title' => esc_html__('Use select responsive menu instead default?', 'bomby'),
			'subtitle'=> esc_html__('If on and avaliable, responsive menu will be displayed in a select instead default.', 'bomby'),
			'desc' => esc_html__('Useful to single page layouts or small menus.', 'bomby'),
			'default' => 0,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Logo Module Configuration.', 'bomby')
		),

		array(
			'id'=>'logo',
			'type' => 'media', 
			'url' => true,
			'title' => esc_html__('Logo', 'bomby'),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'bomby'),
		),

			array(
				'id'=>'logo-retina',
				'type' => 'media', 
				'url'=> true,
				'title' => esc_html__('Logo Retina', 'bomby'),
				'desc'=> esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'bomby'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'bomby'),
				'required' => array( 'logo', '!=', null ),
				),

			//Overwrite logo margins if user wants
			array(
				'id'=>'header-logo-spacing',
				'type' => 'spacing_mod',
				'output' => array('.logo'), // Our theme uses custom output for this field
				'mode'=> 'margin', // absolute, padding, margin, defaults to padding
				'right' => false, // Disable the right
				'units' => 'px', // You can specify a unit value. Possible: px, em, %
				'title' => esc_html__('Logo Margin', 'bomby'),
				'subtitle' => esc_html__('Select a custom margin to the be applied in the logo.', 'bomby'),
				'desc' => esc_html__('If not set, default margin will be applied by theme.', 'bomby'),
				'default' => array(),
				'required' => array( 'logo', '!=', null ),
			),

		array(
			'id'=>'header-logo-light-switch',
			'type' => 'switch', 
			'title' => esc_html__('Light Logo', 'bomby'),
			'subtitle'=> esc_html__('Turn on to upload a light version of logo used in dark backgrounds.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'logo-light',
			'type' => 'media', 
			'url' => true,
			'title' => esc_html__('Logo (light)', 'bomby'),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'bomby'),
			'required' => array( 'header-logo-light-switch', '=', 1 ),
		),

			array(
				'id'=>'logo-retina-light',
				'type' => 'media', 
				'url'=> true,
				'title' => esc_html__('Logo Retina (light)', 'bomby'),
				'desc'=> esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'bomby'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'bomby'),
				'required' => array( 'logo-light', '!=', null ),
				),

		array(
			'id'=>'header-logo-dark-switch',
			'type' => 'switch', 
			'title' => esc_html__('Dark Logo', 'bomby'),
			'subtitle'=> esc_html__('Turn on to upload a dark version of logo used in light backgrounds.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'logo-dark',
			'type' => 'media', 
			'url' => true,
			'title' => esc_html__('Logo (dark)', 'bomby'),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'bomby'),
			'required' => array( 'header-logo-dark-switch', '=', 1 ),
		),

			array(
				'id'=>'logo-retina-dark',
				'type' => 'media', 
				'url'=> true,
				'title' => esc_html__('Logo Retina (dark)', 'bomby'),
				'desc'=> esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'bomby'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'bomby'),
				'required' => array( 'logo-dark', '!=', null ),
				),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Logo Dimensions', 'bomby')
		),

		array(
			'id' => 'header-logo-lg',
			'type' => 'slider',
			'title' => esc_html__('Logo Columns (Large)', 'bomby'),
			'desc' => esc_html__('Define how many columns of header is occupied by the logo in larger devices. More than 1200px.', 'bomby'),
			'subtitle' => esc_html__('Do not use too big values because this can break the layout.', 'bomby'),
			"default" => "2",
			"min" => "1",
			"step" => "1",
			"max" => "8",
		),

		array(
			'id' => 'header-logo-md',
			'type' => 'slider',
			'title' => esc_html__('Logo Columns (Medium)', 'bomby'),
			'desc' => esc_html__('Define how many columns of header is occupied by the logo in normal devices. More than 991px.', 'bomby'),
			'subtitle' => esc_html__('Do not use too big values because this can break the layout.', 'bomby'),
			"default" => "2",
			"min" => "1",
			"step" => "1",
			"max" => "8",
		),

		array(
			'id' => 'header-logo-sm',
			'type' => 'slider',
			'title' => esc_html__('Logo Columns (Tablets)', 'bomby'),
			'desc' => esc_html__('Define how many columns of header is occupied by the logo in tablet devices. Smaller than 991px. ', 'bomby'),
			'subtitle' => esc_html__('Do not use too big values because this can break the layout.', 'bomby'),
			"default" => "2",
			"min" => "1",
			"step" => "1",
			"max" => "8",
		),

		array(
			'id' => 'header-logo-xs',
			'type' => 'slider',
			'title' => esc_html__('Logo Columns (Mobile)', 'bomby'),
			'desc' => esc_html__('Define how many columns of header is occupied by the logo in small mobile devices. Smaller than 768px.', 'bomby'),
			'subtitle' => esc_html__('Do not use too big values because this can break the layout.', 'bomby'),
			"default" => "4",
			"min" => "1",
			"step" => "1",
			"max" => "8",
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Woo Cart Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-woo-cart-switch',
			'type' => 'switch', 
			'title' => esc_html__('Woo Cart', 'bomby'),
			'subtitle'=> esc_html__('If on, a WooCommerce cart will be displayed. Requires WooCommerce plugin activated.', 'bomby'),
			'default' => 1,
		),
		
		array(
			'id'=>'header-woo-cart-total-switch',
			'type' => 'switch', 
			'title' => esc_html__('Woo Cart Total', 'bomby'),
			'subtitle'=> esc_html__('If on, a WooCommerce cart will be displayed with total value of products in the cart. Requires WooCommerce plugin activated.', 'bomby'),
			'default' => 0,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Login AJAX Module Configuration.', 'bomby')
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Search Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-search-switch',
			'type' => 'switch', 
			'title' => esc_html__('Search', 'bomby'),
			'subtitle'=> esc_html__('If on, a search module will be displayed.', 'bomby'),
			'default' => 1,
		),
		
		array(
			'id'=>'header-search-style',
			'type' => 'select',
			'title' => esc_html__('Search Style', 'bomby'), 
			'subtitle' => esc_html__('Select the search style.', 'bomby'),
			'options' => array( 
					'search-top-style' => 'Top',
					'search-full-screen-alt-style' => 'Full Screen',
			 ),
			'default' => 'search-top-style',
			'validate' => 'not_empty',
			'required' => array( 'header-search-switch', '=', 1 ),
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Text Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-text-switch',
			'type' => 'switch', 
			'title' => esc_html__('Text Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a rich text module will be displayed.', 'bomby'),
			'default' => 0,
		),

			array(
				'id' => 'header-text-content',
				'type' => 'editor',
				'title' => esc_html__('Text Module Content', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use [iv_separator] to add a separator in the text. Use [iv_icon icon="cogs"] to display Font Awesome icons. Use [iv_flags] to add WPML flags.', 'bomby'),
				'default' => '[iv_icon icon="phone"] 9854-888-021 <br />[iv_icon icon="home"] New York, NY',
				'required' => array( 'header-text-switch', '=', 1 ),
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Social Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-social-switch',
			'type' => 'switch', 
			'title' => esc_html__('Social Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a social icon module will be displayed.', 'bomby'),
			'default' => 0,
		),

			array(
				'id' => 'header-social-icons',
				'type' => 'social_select',
				'title' => esc_html__('Social Icons', 'bomby'),
				'subtitle' => esc_html__('Add and organize the icons to be displayed.', 'bomby'),
				'required' => array( 'header-social-switch', '=', 1 ),
				'placeholder' => array(
					'title' => esc_html__('Social Media URL', 'bomby'),
				),
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Menu Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-menu-module-switch',
			'type' => 'switch', 
			'title' => esc_html__('Header Menu Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a additional menu will be displayed together with modules.', 'bomby'),
			'default' => 0,
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Ads Module Configuration.', 'bomby')
		),

		array(
			'id'=>'header-ads-switch',
			'type' => 'switch', 
			'title' => esc_html__('Ads Module', 'bomby'),
			'subtitle'=> esc_html__('If on, a ads module will be displayed. Note that it is not avaliable to all layouts.', 'bomby'),
			'default' => 0,
		),

			array(
				'id' => 'header-ads-content',
				'type' => 'textarea',
				'title' => esc_html__('Ads Module Content', 'bomby'),
				'subtitle' => esc_html__('Place your Ads code, it supports HTML code as well or even JavaScript.', 'bomby'),
				'default' => '',
				'required' => array( 'header-ads-switch', '=', 1 ),
				'validate' => false,
			),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('WPML Modules', 'bomby')
		),
		array(
			'id'=>'header-wpml-lang-dropdown',
			'type' => 'switch', 
			'title' => esc_html__('WPML Language Dropdown', 'bomby'),
			'subtitle'=> esc_html__('If on, the avaliable languages will be displayed. Only works with WPML activated.', 'bomby'),
			"default" => 0,
			'required' => array(
				array( 'header-layout', '=','Ivan_Layout_Header_Two_Rows' ),
				array( 'header-layout', '=','Ivan_Layout_Header_Two_Rows_Style2' )
			),
		),
		
		array(
			'id' => 'random-number-sideheader',
			'type' => 'info',
			'desc' => esc_html__('Sidebar Switcher Module Configuration.', 'bomby'),
			'required' => array('header-layout','=', 'Ivan_Layout_Header_Horizontal_With_Sidebar')
		),
		
		array(
			'id'=>'header-disable-main-sidebar-switcher',
			'type' => 'switch', 
			'title' => esc_html__('Disable Sidebar Switcher', 'bomby'),
			'subtitle'=> esc_html__('If on, a sidebar switcher will not be displayed. Note that it is not avaliable to all layouts.', 'bomby'),
			'default' => 0,
			'required' => array('header-layout','=', 'Ivan_Layout_Header_Horizontal_With_Sidebar')
		),
		
		array(
			'id' => 'random-number-textareas',
			'type' => 'info',
			'desc' => esc_html__('Text areas used for Dark Menu', 'bomby'),
			'required' => array('header-layout','=','Ivan_Layout_Dark_Menu')
		),
		array(
			'id' => 'header-text-area-1',
			'type' => 'textarea',
			'title' => esc_html__('Textarea 1', 'bomby'),
			'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
			'default' => '',
			'required' => array('header-layout','=','Ivan_Layout_Dark_Menu')
		),

		array(
			'id' => 'header-text-area-2',
			'type' => 'textarea',
			'title' => esc_html__('Textarea 2', 'bomby'),
			'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
			'default' => '',
			'required' => array('header-layout','=','Ivan_Layout_Dark_Menu')
		),

		array(
			'id' => 'header-text-area-3',
			'type' => 'textarea',
			'title' => esc_html__('Textarea 3', 'bomby'),
			'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
			'default' => '',
			'required' => array('header-layout','=','Ivan_Layout_Dark_Menu')
		),
		array(
			'id'=>'header-text-area-icons-color',
			'type' => 'color', 
			'title' => esc_html__('Icons Color', 'bomby'),
			'required' => array(
				array('header-layout', '=', 'Ivan_Layout_Dark_Menu'),
			),
			'output' => array(
				'color' => '
					.header.style5 .mid-header .contact-info-container .contact-info .icon-container
			'),
			'validate' => 'color',
		),


	), // #fields
);
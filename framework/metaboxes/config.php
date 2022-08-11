<?php

// INCLUDE THIS BEFORE you load your ReduxFramework object config file.

// The metabox opt name should be the same as our main theme options
// name to allow it overwrite the values.
$redux_opt_name = IVAN_FW_THEME_OPTS;

if ( !function_exists( "ivan_redux_add_metaboxes" ) ) :
	function ivan_redux_add_metaboxes($metaboxes) {

	// Variable used to store the configuration array of metaboxes
	$metaboxes = array();
	$boxSections = array();

	// Metabox used to overwrite theme options by page
	// Get default patterns
	$default_patterns_path = get_template_directory() . '/images/patterns/';
	$default_patterns_url = get_template_directory_uri() . '/images/patterns/';
	$default_patterns = array();

	if (is_dir($default_patterns_path)) :

		if ($default_patterns_dir = opendir($default_patterns_path)) :
			$default_patterns = array();

			while (( $default_patterns_file = readdir($default_patterns_dir) ) !== false) {

				if (stristr($default_patterns_file, '.png') !== false || stristr($default_patterns_file, '.jpg') !== false) {
					$name = explode(".", $default_patterns_file);
					$name = str_replace('.' . end($name), '', $default_patterns_file);
					$default_patterns[] = array('alt' => $name, 'img' => $default_patterns_url . $default_patterns_file);
				}
			}
		endif;
	endif;

	$boxSections[] = array(
		'title' => esc_html__('Layout Settings', 'bomby'),
		'desc' => esc_html__('Change the main theme\'s layout and configure it.', 'bomby'),
		'icon' => 'el-icon-adjust-alt',
		'fields' => array(

			array(
				'id'=>'main-layout-local',
				'type' => 'select',
				'title' => esc_html__('Main Layout', 'bomby'),
				'desc' => esc_html__('See that this layout is valid to the whole website, but you can overwrite it locally in a page, for example.', 'bomby'),
				'subtitle' => esc_html__('Select the layout to be used by the website.', 'bomby'),
				'options' => apply_filters('ivan_main_layouts', array( 
						'Ivan_Main_Layout_Normal' => 'Normal Layout',
						'Ivan_Main_Layout_Aside_Left' => 'Aside Layout',
						) ),
				'default' => ''
			),
			
			array(
				'id' => 'main-layout-aside-background',
				'type' => 'background',
				'output' => array('.header.vertical.modern .background-container'),
				'title' => esc_html__('Aside Layout Background', 'bomby'),
				'subtitle' => esc_html__('Background image, color and other options. Usually visible only when using boxed layout.', 'bomby'),
				'required' => array('main-layout-local', '=', 'Ivan_Main_Layout_Aside_Left_Modern')
			),

			// Enable Fixed Height Header effect in website
			array(
				'id'=>'layout-header-fixed-height-local',
				'type'	 => 'button_set_mod',
				'title' => esc_html__('Fixed Height Header', 'bomby'),
				'subtitle'=> esc_html__('If on, the header will be fixed at screen top not scrolling together with page.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array( 'main-layout-local', '!=', array('Ivan_Main_Layout_Normal') ),
			),

			// Disable Widget Area below header
			array(
				'id'=>'layout-header-widget-area-local',
				'type'	 => 'button_set_mod',
				'title' => esc_html__('Disable Widget Area?', 'bomby'),
				'subtitle'=> esc_html__('If on, the header will not show the widget area below menu. Useful when you are using Fixed Height Header.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
				'required' => array( 'main-layout-local', '!=', array('Ivan_Main_Layout_Normal') ),
			),

			array(
				'id'=>'wide-boxed-switch-local',
				'type' => 'select',
				'title' => esc_html__('Template', 'bomby'),
				'desc' => esc_html__('See that this configuration is valid to the whole website, but you can overwrite it locally in a page, for example.', 'bomby'),
				'subtitle' => esc_html__('Select if the layout will be boxed or wide.', 'bomby'),
				'options' => array(
						'wide' => 'Wide',
						'boxed' => 'Boxed',
						'boxed-laterals' => 'Boxed only Lateral Margins',
						'page-framed'    => 'Framed',
						),
				'default' => ''
			),

			array(
				'id' => 'layout-body-bg',
				'type' => 'background',
				'output' => array('.content-wrapper'),
				'title' => esc_html__('Content Wrapper Background', 'bomby'),
				'subtitle' => esc_html__('Page Background.', 'bomby'),
			),
			
			array(
				'id' => 'layout-header-bg2',
				'type' => 'background',
				'output' => array('.iv-layout.header.not-stuck'),
				'title' => esc_html__('Header Background', 'bomby'),
				'subtitle' => esc_html__('Configuration used as background of header. Does not work with Negative Height Header.', 'bomby'),
			),

		),
	);

	$boxSections[] = array(
		'title' => esc_html__('Header', 'bomby'),
		'desc' => esc_html__('Change the header section configuration.', 'bomby'),
		'icon' => 'el-icon-cog',
		'fields' => array(

			// Disabled Header layout in the website
			array(
				'id'=>'header-enable-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Disable header?', 'bomby'),
				'subtitle' => esc_html__('If on, this layout part will not be displayed in website.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
			),

			array(
				'id'=>'header-layout-local',
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
				'default' => '',
			),

			array(
				'id'=>'header-overlay-bottom-border-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Bottom Border', 'bomby'),
				'subtitle' => esc_html__('If on, this border will displayed.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('header-layout-local', '=', 'Ivan_Layout_Overlay_Menu'),
				)
			),
			
			array(
				'id'=>'header-menu-color-local',
				'type' => 'color', 
				'title' => esc_html__('Menu Color', 'bomby'),
				'required' => array(
					array('header-layout-local', '=', 'Ivan_Layout_Header_Horizontal_With_Sidebar'),
				),
				'output' => array(
					'color' => '
						.header.style6 .mega_main_menu .mega_main_menu_ul > li > .item_link
				'),
				'validate' => 'color',
			),
			
			array(
				'id'=>'header-menu-position-local',
				'type' => 'switch', 
				'title' => esc_html__('Align Menu to  Right', 'bomby'),
				'subtitle' => esc_html__('If on, the menu will be aligned to right.', 'bomby'),
				'default' => 0,
				'required' => array(
					array('header-layout-local', '=', 'Ivan_Layout_Header_Simple_Right_Menu'),
				),
			),

			// Enable Fixed Header effect in website
			array(
				'id'=>'header-fixed-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Fixed Header', 'bomby'),
				'subtitle'=> esc_html__('If on, the header will be fixed at screen top on page scroll.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),
			
			array(
				'id'=>'header-fixed-hide-upper-on-scroll-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Hide upper header part on scroll', 'bomby'),
				'subtitle'=> esc_html__('If on, the upper part of header will be hidden on scroll down.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('header-fixed-switch-local', '=', '1'),
					array('header-layout-local', '=', 'Ivan_Layout_Header_Two_Rows_Style2'),
				)
			),

			array(
				'id' => 'random-number',
				'type' => 'info',
				'desc' => esc_html__('Header Layout Configuration.', 'bomby')
			),

			// Enables Negative Height Header
			array(
				'id'=>'header-negative-height-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Negative Height', 'bomby'),
				'subtitle'=> esc_html__('If on, header will not have height and content will be showed behind it.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

			// Enables Boxed Header Layout
			array(
				'id'=>'header-boxed-layout-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enabled Boxed Layout?', 'bomby'),
				'subtitle'=> esc_html__('If on, header will look boxed in the website even when the layout is wide.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-negative-height-local', 'equals', 1),
			),

			array(
				'id'=>'header-bg-type-local',
				'type' => 'select',
				'title' => esc_html__('Header Background Type', 'bomby'), 
				'subtitle' => esc_html__('Select the type of background to be applied in header.', 'bomby'),
				'options' => array( 
						'' => 'Theme Default',
						'transparent-bg' => 'Transparent',
						'semi-transparent-bg' => 'Semi Transparent',
						'solid' => 'Solid',
						),
				'default' => '',
				'required' => array('header-negative-height-local', 'equals', 1),
			),

			array(
				'id' => 'header-color-scheme-local',
				'type' => 'select',
				'title' => esc_html__('Alternative Color Scheme', 'bomby'),
				'subtitle' => esc_html__('Select an alternative color scheme to header items.', 'bomby'),
				'options' => array( '' => 'Theme Default', 'standard' => 'Standard', 'light' => 'Light (great to dark backgrounds)', 'dark' => 'Dark (great to light backgrounds)' ),
				'default' => '',
				'required' => array('header-negative-height-local', 'equals', 1),
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
				'required' => array('header-negative-height-local', 'equals', 1),
				'output' => array('.iv-layout.header'),
			),

			// Enables Boxed Header Layout
			array(
				'id'=>'header-after-fold-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Display Header after Page Fold?', 'bomby'),
				'subtitle'=> esc_html__('If on, header will be displayed after user scroll until page fold.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('header-negative-height-local', 'equals', 1),
					array('header-layout-local', '!=', 'Ivan_Layout_Overlay_Menu')
				)
			),

				array(
					'id'=>'header-after-fold-logo-local',
					'type' => 'button_set', 
					'title' => esc_html__('Keep showing logo before fold?', 'bomby'),
					'subtitle'=> esc_html__('If on, only the logo will be showed before page fold.', 'bomby'),
					'options' => array(
						'1' => 'On',
						'' => 'Default',
						'0' => 'Off',
					),
					"default" => '',
					'required' => array(
						array('header-after-fold-local', 'equals', 1),
						array('header-layout-local', '!=', 'Ivan_Layout_Overlay_Menu'),
						),
				),

			array(
				'id' => 'random-number',
				'type' => 'info',
				'desc' => esc_html__('General Modules Configuration.', 'bomby')
			),

			// Option to pull menu to left in avaliable layouts
			array(
				'id'=>'header-menu-pull-left-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Pull Menu to Left Side', 'bomby'),
				'subtitle'=> esc_html__('If on and avaliable in the layout, the menu will be placed at left.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('header-layout-local', '=', array(
						'Ivan_Layout_Header_Simple_Right_Menu',
						'Ivan_Layout_Header_Style3_Right_Menu',
						'Ivan_Layout_Header_Style4_Right_Menu',
					))
				),
			),
			
			array(
				'id'=>'header-menu-pull-center-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Centralized Menu', 'bomby'),
				'subtitle'=> esc_html__('If on, menu will be centralized. Note that this option does not work with all layouts.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('header-layout-local', 'equals', 
						array(
							'Ivan_Layout_Header_Classic_Right_Area', 
							'Ivan_Layout_Header_Classic_Logo_Centered', 
							'Ivan_Layout_Header_Only_Menu'
						) 
					),
				),
			),

			array(
				'id'=>'header-aside-menu-centered-switch-local',
				'type' => 'button_set', 
				'title' => esc_html__('Center Align Aside Menu Items', 'bomby'),
				'subtitle'=> esc_html__('If on the menu items will be centered, else default alignment left/right will be used.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array(
					array('main-layout-local', 'equals', array('Ivan_Main_Layout_Aside_Left', 'Ivan_Main_Layout_Aside_Right') ),
				),
			),

			// Adds Lateral Lines to Modules
			array(
				'id'=>'header-lateral-lines-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Lateral Lines', 'bomby'),
				'subtitle'=> esc_html__('If on, modules will have lateral lines to separate them.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local', '!=', 'Ivan_Layout_Overlay_Menu'),
			),

			// Adds V sign after menu items
			array(
				'id'=>'header-v-sign-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Menu Arrow', 'bomby'),
				'subtitle'=> esc_html__('If on, menu items will get a arrow after text.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local', '!=', 'Ivan_Layout_Overlay_Menu'),
			),

			// Use responsive menu in select mode
			array(
				'id'=>'header-select-menu-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Use select responsive menu instead default?', 'bomby'),
				'subtitle'=> esc_html__('If on and avaliable, responsive menu will be displayed in a select instead default.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),
			
			array(
				'id' => 'random-number-logo-local',
				'type' => 'info',
				'desc' => esc_html__('Logo Module Configuration.', 'bomby')
			),

			array(
				'id'=>'logo-local',
				'type' => 'media', 
				'url' => true,
				'title' => esc_html__('Logo', 'bomby'),
				'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'bomby'),
			),

			array(
				'id'=>'logo-retina-local',
				'type' => 'media', 
				'url'=> true,
				'title' => esc_html__('Logo Retina', 'bomby'),
				'desc'=> esc_html__('The same logo image but with twice dimensions, e.g. your logo is 100x100, then your retina logo must be 200x200.', 'bomby'),
				'subtitle' => esc_html__('Optional retina version displayed in devices with retina display (high resolution display).', 'bomby'),
				'required' => array( 'logo-local', '!=', null ),
				),
			
			array(
				'id' => 'random-number',
				'type' => 'info',
				'desc' => esc_html__('Modules Configuration.', 'bomby')
			),

			array(
				'id'=>'header-woo-cart-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Woo Cart', 'bomby'),
				'subtitle'=> esc_html__('If on, a WooCommerce cart will be displayed. Requires WooCommerce plugin activated.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-woo-cart-total-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Woo Cart Total', 'bomby'),
				'subtitle'=> esc_html__('If on, a WooCommerce cart will be displayed with total value of products in the cart. Requires WooCommerce plugin activated.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-woo-cart-layout-local',
				'type' => 'select',
				'title' => esc_html__('Woo Cart Layout', 'bomby'),
				'desc' => esc_html__('Cart layout.', 'bomby'),
				'subtitle' => esc_html__('Select the cart layout to be used in the header and top header', 'bomby'),
				'options' => array( 
					'default' => 'Default',
					'alternative' => 'Alternative',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-login-ajax-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Login AJAX', 'bomby'),
				'subtitle'=> esc_html__('If on, a Login AJAX will be displayed. Requires Login With AJAX plugin activated.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),

			array(
				'id'=>'header-search-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Search', 'bomby'),
				'subtitle'=> esc_html__('If on, a search module will be displayed.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-search-style-local',
				'type' => 'select',
				'title' => esc_html__('Search Style', 'bomby'), 
				'subtitle' => esc_html__('Select the search style.', 'bomby'),
				'options' => array( 
						'search-top-style' => 'Top',
						'search-full-screen-alt-style' => 'Full Screen',
				 ),
				'default' => '',
				'required' => array( 'header-search-switch-local', '=', 1 ),
			),

			array(
				'id'=>'header-text-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Text Module', 'bomby'),
				'subtitle'=> esc_html__('If on, a rich text module will be displayed.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),

				array(
					'id' => 'header-text-content-local',
					'type' => 'editor',
					'title' => esc_html__('Text Module Content', 'bomby'),
					'subtitle' => esc_html__('Place any text or shortcode to be displayed in header. Use [iv_separator] to add a separator in the text. Use [iv_icon icon="cogs"] to display Font Awesome icons. Use [iv_flags] to add WPML flags.', 'bomby'),
					'default' => '',
					'required' => array( 'header-text-switch-local', '=', 1 ),
				),
			

			array(
				'id'=>'header-social-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Social Module', 'bomby'),
				'subtitle'=> esc_html__('If on, a social icon module will be displayed.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
				array(
					'id' => 'header-social-icons-local',
					'type' => 'social_select',
					'title' => esc_html__('Social Icons', 'bomby'),
					'subtitle' => esc_html__('Add and organize the icons to be displayed.', 'bomby'),
					'required' => array( 'header-social-switch', '=', 1 ),
					'placeholder' => array(
						'title' => esc_html__('Social Media URL', 'bomby'),
					),
					'required' => array('header-social-switch-local','=','1')
				),
			
			array(
				'id'=>'header-menu-module-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Header Menu Module', 'bomby'),
				'subtitle'=> esc_html__('If on, a additional menu will be displayed together with modules.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),

			array(
				'id'=>'header-ads-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Ads Module', 'bomby'),
				'subtitle'=> esc_html__('If on, a ads module will be displayed. Note that it is not avaliable to all layouts.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','!=','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-wpml-lang-dropdown-local',
				'type'	 => 'button_set',
				'title' => esc_html__('WPML Language Dropdown', 'bomby'),
				'subtitle'=> esc_html__('If on, the avaliable languages will be displayed. Only works with WPML activated.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array( 'header-layout-local', '=', array('Ivan_Layout_Header_Two_Rows', 'Ivan_Layout_Header_Two_Rows_Style2') ),
			),
			
			array(
				'id'=>'header-disable-main-sidebar-switcher-local',
				'type' => 'button_set', 
				'title' => esc_html__('Disable Main Sidebar Switcher', 'bomby'),
				'subtitle'=> esc_html__('If on, an main sidebar switcher will be displayed. Note that it is not avaliable to all layouts.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','=', 'Ivan_Layout_Header_Horizontal_With_Sidebar')
			),
			
			array(
				'id'=>'header-sidebar-switcher-local',
				'type' => 'button_set', 
				'title' => esc_html__('Alternative Sidebar Switcher', 'bomby'),
				'subtitle'=> esc_html__('If on, a sidebar switcher will be displayed. Note that it is not avaliable to all layouts.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('header-layout-local','=', 'Ivan_Layout_Header_Horizontal_With_Sidebar')
			),

			array(
				'id' => 'header-sidebar-switcher-text-local',
				'type' => 'text',
				'title' => esc_html__('Alternative Sidebar Switcher Text', 'bomby'),
				'subtitle' => esc_html__('Place any text to be displayed as sidebar switcher link anchor text.', 'bomby'),
				'default' => '',
				'required' => array(
					array('header-sidebar-switcher-local','=', 1),
					array('header-layout-local','=', 'Ivan_Layout_Header_Horizontal_With_Sidebar')
				)
			),

			array(
				'id' => 'header-text-area-1-local',
				'type' => 'textarea',
				'title' => esc_html__('Textarea 1', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
				'default' => '',
				'required' => array('header-layout-local','equals','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id' => 'header-text-area-2-local',
				'type' => 'textarea',
				'title' => esc_html__('Textarea 2', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
				'default' => '',
				'required' => array('header-layout-local','equals','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id' => 'header-text-area-3-local',
				'type' => 'textarea',
				'title' => esc_html__('Textarea 3-local', 'bomby'),
				'subtitle' => esc_html__('Place any text or shortcode to be displayed in header eg. [ivan_contact_info icon="home" title="..." subtitle="..." link="..."]. ', 'bomby'),
				'default' => '',
				'required' => array('header-layout-local','equals','Ivan_Layout_Dark_Menu')
			),
			
			array(
				'id'=>'header-text-area-icons-color-local',
				'type' => 'color', 
				'title' => esc_html__('Icons Color', 'bomby'),
				'subtitle' => esc_html__('Custom color for icons generated with [ivan_contact_info] shortcode.', 'bomby'),
				'required' => array(
					array('header-layout-local', '=', 'Ivan_Layout_Dark_Menu'),
				),
				'output' => array(
					'color' => '
						.header.style5 .mid-header .contact-info-container .contact-info .icon-container
				'),
				'validate' => 'color',
			),
			
			array(
				'id' => 'random-header',
				'type' => 'info',
				'desc' => esc_html__('Dynamic Areas', 'bomby')
			),

			array(
				'id'=>'header-da-after-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Dynamic Area After Header?', 'bomby'),
				'subtitle'=> esc_html__('If on, a dynamic area will be displayed after header.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

		), // #fields
	);

	$boxSections[] = array(
		'title' => esc_html__('Title Wrapper', 'bomby'),
		'desc' => esc_html__('Change the title wrapper section configuration.', 'bomby'),
		'icon' => 'el-icon-cog',
		'fields' => array(

			array(

				'id'=>'title-wrapper-enable-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Disable this layout part?', 'bomby'),
				'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
			),

			array(
				'id'=>'title-wrapper-layout-local',
				'type' => 'select',
				'title' => esc_html__('Title Wrapper Layout', 'bomby'), 
				'subtitle' => esc_html__('Select the top layout to be used at title wrapper.', 'bomby'),
				'options' => apply_filters('ivan_title_wrapper_layouts', array( 
					'Ivan_Layout_Title_Wrapper_Normal' => 'Classic with Description Text',
					'Ivan_Layout_Title_Wrapper_Large' => 'Large with Description Text',
						) ),
				'default' => '',
			),

			array(
				'id'=>'title-large-align-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Align Large Title to Left?', 'bomby'),
				'subtitle'=> esc_html__('If on, the large title wrapper layout will be aligned to left. Only works wiht Large with Description Text.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

			array(
				'id'=>'title-large-opacity-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Overlay', 'bomby'),
				'subtitle'=> esc_html__('Best for light photos.', 'bomby'),
				//Must provide key => value pairs for options
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

			array(
				'id'=>'breadcrumb-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Breadcrumb?', 'bomby'),
				'subtitle'=> esc_html__('If on, a breadcrumb will be displayed aside of title wrapper. Only works with Classic with Description Text.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array( 'title-wrapper-layout-local', '=', array('Ivan_Layout_Title_Wrapper_Normal') ),
			),
			array(
				'id'=>'search-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Search?', 'bomby'),
				'subtitle'=> esc_html__('If on, a search form will be displayed aside of title wrapper. Only works with Classic with Description Text.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array( 'title-wrapper-layout-local', '=', array('Ivan_Layout_Title_Wrapper_Normal') ),
			),

			array(
				'id' => 'title-sub-text',
				'type' => 'textarea',
				'title' => esc_html__('Title Optional Subtitle', 'bomby'),
				'subtitle' => esc_html__('You can use a, strong, br, em and strong HTML tags.', 'bomby'),
				'description' => esc_html__('Use this field to display an optional text below main page title.', 'bomby'),
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
				'id' => 'title-wrapper-bg',
				'type' => 'background',
				'output' => array('#iv-layout-title-wrapper.wrapper-background, #iv-layout-title-wrapper figure.title-wrapper-bg'),
				'title' => esc_html__('Title Wrapper Background', 'bomby'),
			),

			array( 
				'id'       => 'title-wrapper-border',
				'type'     => 'border_mod',
				'title'    => esc_html__('Title Wrapper Border', 'bomby'),
				'all' => false,
				'left' => false,
				'right' => false,
				'style' => false,
				'output' => array('#iv-layout-title-wrapper'),
				'default'  => array(
					'border-bottom' => '',
					'border-top' => '',
				)
			),

			array(
				'id' => 'title-wrapper-color-scheme-local',
				'type' => 'select',
				'title' => esc_html__('Alternative Color Scheme', 'bomby'),
				'subtitle' => esc_html__('Select an alternative color scheme to title wrapper.', 'bomby'),
				'options' => array( '' => 'Theme Default', 'standard' => 'Standard', 'light' => 'Light (great to dark backgrounds)', 'dark' => 'Dark (great to light backgrounds)' ),
				'default' => '',
			),

			array(
				'id'=>'title-wrapper-padding',
				'type' => 'spacing_mod',
				'mode'=> 'padding', // absolute, padding, margin, defaults to padding
				'right' => false, // Disable the right
				'left' => false, // Disable the left
				'units' => 'px', // You can specify a unit value. Possible: px, em, %
				'title' => esc_html__('Title Wrapper Padding', 'bomby'),
				'default' => array(),
				'output' => array('#iv-layout-title-wrapper'),
			),
			
			array(
				'id'        => 'title-wrapper-separator-color-local',
				'type'      => 'color',
				'title'     => esc_html__('Separator Color', 'bomby'),
				'default'   => '',
				'output'    => array('border-left-color' => '.iv-layout.title-wrapper.title-wrapper-normal .ivan-breadcrumb'),
				'required'	=> array('breadcrumb-enable-local', '=', '1')
			),

			array(
				'id' => 'title-wrapper-font',
				'type' => 'typography',
				'title' => esc_html__('Title Typography', 'bomby'),
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true, // Select a backup non-google font in addition to a google font
				'font-style'=> true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => true, // Only appears if google is true and subsets not set to false
				'font-size'=> true,
				'line-height'=> false,
				'word-spacing'=> true, // Defaults to false
				'letter-spacing'=> true, // Defaults to false
				'color'=> true,
				'font-weight' => true,
				'text-align' => true,
				'text-transform' => true,
				'output' => array('#iv-layout-title-wrapper h2'),
			),

			array(
				'id' => 'title-wrapper-desc-font',
				'type' => 'typography',
				'title' => esc_html__('Title Description Typography', 'bomby'),
				'subtitle' => esc_html__('Typography to optional description used in pages.', 'bomby'),
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true, // Select a backup non-google font in addition to a google font
				'font-style'=> true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => true, // Only appears if google is true and subsets not set to false
				'font-size'=> true,
				'line-height'=> false,
				'word-spacing'=> true, // Defaults to false
				'letter-spacing'=> true, // Defaults to false
				'color'=> true,
				'font-weight' => true,
				'text-align' => true,
				'text-transform' => true,
				'output' => array('#iv-layout-title-wrapper p, .iv-layout.title-wrapper.title-wrapper-large.modern h6'),
				'default' => array(),
				'desc' => '<div style="height: 200px"></div>'
			),
			
		), // #fields
	);

	$boxSections[] = array(
	'title' => esc_html__('Content', 'bomby'),
	'desc' => esc_html__('Change the content section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

			array(
				'id'=>'page-boxed-page-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Display Page/Project inside Box?', 'bomby'),
				'subtitle'=> esc_html__('If on, this page will be displayed inside a box.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),
		
			array(
				'id' => 'layout-content-bg',
				'type' => 'background',
				'output' => array('#all-site-wrapper .content-wrapper'),
				'title' => esc_html__('Content Wrapper Background', 'bomby'),
				'subtitle' => esc_html__('Configuration used as background of content wrapper.', 'bomby'),
			),

			array(
				'id' => 'layout-boxed-content-bg',
				'type' => 'background',
				'output' => array('.page .content-wrapper.page-boxed-style, .single-ivan_vc_projects .content-wrapper.page-boxed-style'),
				'title' => esc_html__('Pages: Boxed Content Background', 'bomby'),
				'subtitle' => esc_html__('Configuration used as background of boxed pages and projects.', 'bomby'),
			),

			array(
				'id' => 'layout-boxed-patterns-local',
				'type' => 'select_image',
				'tiles' => false,
				'title' => esc_html__('Boxed Content Background Pattern', 'bomby'),
				'subtitle' => esc_html__('Select a predefined background pattern. Usually visible only when using content boxed style.', 'bomby'),
				'options' => $default_patterns,
			),

		), // #fields
	);

	$boxSections[] = array(
	'title' => esc_html__('Top Header', 'bomby'),
	'desc' => esc_html__('Change the top header section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

			array(
				'id'=>'top-header-enable-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Disable this layout part?', 'bomby'),
				'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
			),
			array(
				'id'=>'top-header-variant-local',
				'type' => 'select',
				'title' => esc_html__('Top Header Style', 'bomby'), 
				'subtitle' => esc_html__('Select the top syle to be used at header.', 'bomby'),
				'options' => array( 
						'default' => 'Dark',
						'alternative-dark' => 'Color',
						'alternative-light' => 'Light',
				),
				'default' => ''
			),
		), // #fields
	);
	
	$boxSections[] = array(
	'title' => esc_html__('Footer', 'bomby'),
	'desc' => esc_html__('Change the footer section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

			array(
				'id'=>'footer-enable-switch-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Disable this layout part?', 'bomby'),
				'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
			),
		
			array(
				'id'=>'footer-sticky-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Sticky footer?', 'bomby'),
				'subtitle'=> esc_html__('If on, this layout part will be sticky.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),
		
			array(
				'id'=>'footer-color-scheme-local',
				'type' => 'select',
				'title' => esc_html__('Color scheme', 'bomby'), 
				'subtitle' => esc_html__('Select footer color scheme.', 'bomby'),
				'options' => array(
					'dark' => esc_html__('Dark', 'bomby'),
				),
				'default' => '',
			),
		
			array(
				'id'        => 'footer-sidebar-1-local',
				'type'      => 'select',
				'title'     => esc_html__('Sidebar 1', 'bomby'),
				'subtitle'  => esc_html__('Select custom sidebar', 'bomby'),
				'options'   => ivan_get_custom_sidebars_list(),
				'default'   => '',
			),
		
			array(
				'id'        => 'footer-sidebar-2-local',
				'type'      => 'select',
				'title'     => esc_html__('Sidebar 2', 'bomby'),
				'subtitle'  => esc_html__('Select custom sidebar', 'bomby'),
				'options'   => ivan_get_custom_sidebars_list(),
				'default'   => '',
			),
		
			array(
				'id'        => 'footer-sidebar-3-local',
				'type'      => 'select',
				'title'     => esc_html__('Sidebar 3', 'bomby'),
				'subtitle'  => esc_html__('Select custom sidebar', 'bomby'),
				'options'   => ivan_get_custom_sidebars_list(),
				'default'   => '',
			),
		
			array(
				'id'        => 'footer-sidebar-4-local',
				'type'      => 'select',
				'title'     => esc_html__('Sidebar 4', 'bomby'),
				'subtitle'  => esc_html__('Select custom sidebar', 'bomby'),
				'options'   => ivan_get_custom_sidebars_list(),
				'default'   => '',
			),
		
			array(
				'id'        => 'footer-sidebar-5-local',
				'type'      => 'select',
				'title'     => esc_html__('Sidebar 5', 'bomby'),
				'subtitle'  => esc_html__('Select custom sidebar', 'bomby'),
				'options'   => ivan_get_custom_sidebars_list(),
				'default'   => '',
			),

			array(
				'id' => 'random-footer',
				'type' => 'info',
				'desc' => esc_html__('Dynamic Areas', 'bomby')
			),

			array(
				'id'=>'footer-da-before-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Dynamic Area Before Footer?', 'bomby'),
				'subtitle'=> esc_html__('If on, a dynamic area will be displayed above the layout.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

			array(
				'id'=>'footer-da-after-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Dynamic Area After Footer?', 'bomby'),
				'subtitle'=> esc_html__('If on, a dynamic area will be displayed below the layout.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

		), // #fields
	);

	$boxSections[] = array(
	'title' => esc_html__('Bottom Footer', 'bomby'),
	'desc' => esc_html__('Change the bottom footer section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

			array(
				'id'=>'bottom-footer-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Disable this layout part?', 'bomby'),
				'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
				'options' => array(
					'1' => 'Disable',
					'' => 'Default',
					'0' => 'Enable',
				),
				'default' => '',
			),
			
			array(
				'id'=>'bottom-footer-layout-local',
				'type' => 'select',
				'title' => esc_html__('Bottom Footer Layout', 'bomby'), 
				'subtitle' => esc_html__('Select the bottom footer to be used at header.', 'bomby'),
				'options' => apply_filters('ivan_bottom_footer_layouts', array( 
					'Ivan_Layout_Bottom_Footer_Two_Columns' => 'Two Columns',
					'Ivan_Layout_Bottom_Footer_Centered' => 'Centered',
				) ),
				'default' => '',
				'validate' => '',
			),
		
			array(
				'id'=>'bottom-footer-color-scheme-local',
				'type' => 'select',
				'title' => esc_html__('Color scheme', 'bomby'), 
				'subtitle' => esc_html__('Select footer color scheme.', 'bomby'),
				'options' => array(
					'dark' => esc_html__('Dark', 'bomby'),
					'light-alt' => esc_html__('Light', 'bomby'),
				),
				'default' => '',
			),
		
			array(
				'id'=>'bottom-footer-fullwidth-local',
				'type' => 'button_set', 
				'title' => esc_html__('Fulll Width', 'bomby'),
				'subtitle'=> esc_html__('If on, the bottom footer will be full width.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
				'required' => array('bottom-footer-layout-local', '=', 'Ivan_Layout_Bottom_Footer_Two_Columns'),
			),
		
			array(
			'id'=>'bottom-footer-logo-local',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Logo', 'bomby'),
			'subtitle' => esc_html__('Upload the logo that will be displayed in the bottom footer.', 'bomby'),
		),
		
			array(
				'id' => 'random-bottom-footer',
				'type' => 'info',
				'desc' => esc_html__('Dynamic Areas', 'bomby')
			),

			array(
				'id'=>'bottom-footer-da-before-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Dynamic Area Before Bottom Footer?', 'bomby'),
				'subtitle'=> esc_html__('If on, a dynamic area will be displayed above the layout.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

			array(
				'id'=>'bottom-footer-da-after-enable-local',
				'type'	 => 'button_set',
				'title' => esc_html__('Enable Dynamic Area After Bottom Footer?', 'bomby'),
				'subtitle'=> esc_html__('If on, a dynamic area will be displayed below the layout.', 'bomby'),
				'options' => array(
					'1' => 'On',
					'' => 'Default',
					'0' => 'Off',
				),
				'default' => '',
			),

		), // #fields
	);

	$boxSections[] = array(
		'title' => esc_html__('Menus/Sidebars', 'bomby'),
		'desc' => esc_html__('Replace the menus and sidebars to be displayed in the avaliable areas.', 'bomby'),
		'icon' => 'el-icon-magic',
		'fields' => array(

			array(
				'id'=>'menu-replace-primary',
				'type' => 'select',
				'title' => esc_html__('Primary Menu', 'bomby'),
				'desc' => esc_html__('Select a menu to overwrite the header menu location.', 'bomby'),
				'data' => 'menus',
				'default' => '',
			),

			array(
				'id'=>'menu-replace-primary_module',
				'type' => 'select',
				'title' => esc_html__('Module Menu', 'bomby'),
				'desc' => esc_html__('Select a menu to overwrite the module menu location.', 'bomby'),
				'data' => 'menus',
				'default' => '',
			),

			array(
				'id'=>'menu-replace-secondary',
				'type' => 'select',
				'title' => esc_html__('Secondary Menu', 'bomby'),
				'desc' => esc_html__('Select a menu to overwrite the top header menu location.', 'bomby'),
				'data' => 'menus',
				'default' => '',
			),

			array(
				'id'=>'menu-replace-bottom_footer',
				'type' => 'select',
				'title' => esc_html__('Bottom Footer Menu', 'bomby'),
				'desc' => esc_html__('Select a menu to overwrite the bottom footer menu location.', 'bomby'),
				'data' => 'menus',
				'default' => '',
			),

			array(
				'id' => 'random-number',
				'type' => 'info',
				'desc' => esc_html__('Sidebars', 'bomby')
			),

			array(
				'id'=>'sidebar-primary-replace',
				'type' => 'select',
				'title' => esc_html__('Primary Sidebar', 'bomby'),
				'desc' => esc_html__('Select a sidebar to overwrite the sidebar location.', 'bomby'),
				'data' => 'sidebars',
				'default' => '',
			),

			array(
				'id'=>'sidebar-secondary-replace',
				'type' => 'select',
				'title' => esc_html__('Secondary Sidebar', 'bomby'),
				'desc' => esc_html__('Select a sidebar to overwrite the sidebar location.', 'bomby'),
				'data' => 'sidebars',
				'default' => '',
			),

		), // #fields
	);

	$boxSections[] = array(
		'title' => esc_html__('Custom JS/CSS', 'bomby'),
		'desc' => esc_html__('Easily add custom JS and CSS to your website.', 'bomby'),
		'icon' => 'el-icon-wrench',
		'fields' => array(

			array(
				'id'	   => 'css_editor_local',
				'type'	 => 'ace_editor',
				'title'	=> esc_html__('CSS Code', 'bomby'),
				'subtitle' => esc_html__('Insert your custom CSS code right here. It will be displayed globally in the website.', 'bomby'),
				'mode'	 => 'css',
				'theme'	=> 'monokai',
				'desc'	 => '',
				'default'  => ""
			),

			array(
				'id'	   => 'js_editor_local',
				'type'	 => 'ace_editor',
				'title'	=> esc_html__('JS Code', 'bomby'),
				'subtitle' => esc_html__('Insert your custom JS code right here. It will be displayed globally in the website.', 'bomby'),
				'mode'	 => 'javascript',
				'theme'	=> 'monokai',
				'desc'	 => 'You can add custom JS code here, like your Google Analytics code or whatever you want.',
				'default'  => ""
			),

			array(
				'id'	   => 'link_editor_local',
				'type'	 => 'ace_editor',
				'title'	=> esc_html__('Link Tags', 'bomby'),
				'subtitle' => esc_html__('Insert your custom &lt;link&gt; tags to be displayed in the head, e.g. Google Fonts link tags and others.', 'bomby'),
				'mode'	 => 'html',
				'theme'	=> 'monokai',
				'desc'	 => '',
				'default'  => ""
			),

		),
	);


	$metaboxes[] = array(
		'id' => 'ivan-theme-options',
		'title' => esc_html__('Theme Options', 'bomby'),
		'post_types' => array('page'),
		'position' => 'normal', // normal, advanced, side
		'priority' => 'high', // high, core, default, low
		'sections' => $boxSections
	);

	// Removes main layout options only to projects
	unset($boxSections[0]['fields'][0]);
	unset($boxSections[0]['fields'][1]);
	unset($boxSections[0]['fields'][2]);
	unset($boxSections[0]['fields'][3]);

	$boxSections[0]['fields'][] = array(
			'id'=>'project-nav-local',
			'type'	 => 'button_set',
			'title' => esc_html__('Display Navigation in Projects?', 'bomby'),
			'subtitle'=> esc_html__('If on, next and previous project will be displayed in single project pages.', 'bomby'),
			'options' => array(
				'1' => 'On',
				'' => 'Default',
				'0' => 'Off',
			),
			//'default' => 1,
		);

	$boxSections[0]['fields'][] = array(
			'id'=>'project-related-local',
			'type'	 => 'button_set',
			'title' => esc_html__('Display Related Projects?', 'bomby'),
			'subtitle'=> esc_html__('If on, the related projects will be displayed below project contents.', 'bomby'),
			'options' => array(
				'1' => 'On',
				'' => 'Default',
				'0' => 'Off',
			),
		);

	$metaboxes[] = array(
		'id' => 'ivan-theme-options',
		'title' => esc_html__('Theme Options', 'bomby'),
		'post_types' => array('ivan_vc_projects'),
		'position' => 'normal', // normal, advanced, side
		'priority' => 'high', // high, core, default, low
		'sections' => $boxSections
	);

	// Filter to child themes
	$metaboxes = apply_filters( 'ivan_redux_metabox_filter', $metaboxes );

	return $metaboxes;
  }

  add_action('redux/metaboxes/'.IVAN_FW_THEME_OPTS.'/boxes', 'ivan_redux_add_metaboxes');

endif;

// The loader will load all of the extensions automatically based on your $redux_opt_name
require_once(get_template_directory().'/framework/metaboxes/loader.php');
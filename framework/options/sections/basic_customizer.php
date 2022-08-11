<?php
/*
 * Customizer
*/

$this->sections[] = array(
	'title' => esc_html__('Customizer', 'bomby'),
	'desc' => esc_html__('Check child sections to style properly the correct area of the theme.', 'bomby'),
	'icon' => 'el-icon-wrench',
	'fields' => array(

		array(
			'id'=>'remove-default-fonts',
			'type' => 'switch', 
			'title' => esc_html__('Remove default fonts?', 'bomby'),
			'description'=> esc_html__('If on, the theme will not include the default fonts linked. This can be used after customize the font sections and if you are not using the default fonts, you should check this option to improve performance.', 'bomby'),
			"default" => 0,
		),

	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Backgrounds', 'bomby'),
	'desc' => esc_html__('Body background and accent color configuration', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'layout-body-bg',
			'type' => 'background',
			'output' => array('body, .live-search.search-top-style .inner-wrapper .inner-form, .iv-layout.header .live-search .submit-form, .iv-layout.top-header .live-search .submit-form, #sideheader'),
			'title' => esc_html__('Body Background', 'bomby'),
			'subtitle' => esc_html__('Body background with image, color and other options. Usually visible only when using boxed layout.', 'bomby'),
		),

		array(
			'id' => 'layout-patterns',
			'type' => 'select_image',
			'tiles' => false,
			'title' => esc_html__('Body Background Pattern', 'bomby'),
			'subtitle' => esc_html__('Select a predefined background pattern. Usually visible only when using boxed layout.', 'bomby'),
			'options' => $default_patterns,
		),
		
		array(
			'id' => 'layout-content-bg',
			'type' => 'background',
			'output' => array('.content-wrapper'),
			'title' => esc_html__('Content Wrapper Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of content wrapper.', 'bomby'),
		),
		
		array(
			'id' => 'layout-header-bg2',
			'type' => 'background',
			'output' => array('.iv-layout.header.not-stuck'),
			'title' => esc_html__('Header Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of header. Does not work with Negative Height Header.', 'bomby'),
		),

		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Boxed Content Background', 'bomby')
		),

		array(
			'id' => 'layout-boxed-content-bg',
			'type' => 'background',
			'output' => array('.page .content-wrapper.page-boxed-style, .single-ivan_vc_projects .content-wrapper.page-boxed-style'),
			'title' => esc_html__('Pages: Boxed Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of boxed pages and projects.', 'bomby'),
		),

		array(
			'id' => 'layout-boxed-patterns',
			'type' => 'select_image',
			'tiles' => false,
			'title' => esc_html__('Boxed Content Background Pattern', 'bomby'),
			'subtitle' => esc_html__('Select a predefined background pattern. Usually visible only when using content boxed style.', 'bomby'),
			'options' => $default_patterns,
		),

		array(
			'id' => 'blog-boxed-content-bg',
			'type' => 'background',
			'output' => array('.index.content-wrapper.page-boxed-style, .index.content-wrapper.page-boxed-style.boxed-style, .archives.content-wrapper.page-boxed-style, .search.content-wrapper.page-boxed-style'),
			'title' => esc_html__('Blog: Boxed Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of boxed blog and archives.', 'bomby'),
		),

		array(
			'id' => 'single-boxed-content-bg',
			'type' => 'background',
			'output' => array('.single-post.content-wrapper.page-boxed-style, .single-post.content-wrapper.page-boxed-style.boxed-style'),
			'title' => esc_html__('Single Post: Boxed Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of boxed single posts.', 'bomby'),
		),

		array(
			'id' => 'shop-boxed-content-bg',
			'type' => 'background',
			'output' => array('.shop-wrapper.content-wrapper.page-boxed-style, .single-product-wrapper.content-wrapper.page-boxed-style'),
			'title' => esc_html__('Shop: Boxed Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background of boxed at shop and single product.', 'bomby'),
		),

		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Blog/Single Backgrounds', 'bomby')
		),

		array(
			'id' => 'blog-special-content-bg',
			'type' => 'background',
			'output' => array('.blog-mansory, .blog-full, .index.content-wrapper.boxed-style, .index.content-wrapper.boxed-style .boxed-page-inner, .blog-mansory .boxed-page-inner, .blog-full .boxed-page-inner'),
			'title' => esc_html__('Blog: Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background to blogs with boxed style activated or mansory and full layouts.', 'bomby'),
		),

		array(
			'id' => 'single-special-content-bg',
			'type' => 'background',
			'output' => array('.single-post.content-wrapper.boxed-style, .single-post.content-wrapper.boxed-style .boxed-page-inner'),
			'title' => esc_html__('Single: Content Background', 'bomby'),
			'subtitle' => esc_html__('Configuration used as background to blogs with boxed style activated for single.', 'bomby'),
		),

	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Content', 'bomby'),
	'desc' => esc_html__('Configure general content styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'ivan-custom-accent',
			'type'	 => 'color',
			'title'	=> esc_html__('Main Color', 'bomby'), 
			'subtitle' => esc_html__('Pick an accent color to overwrite the default from the theme.', 'bomby'),
			'transparent' => false,
			'validate' => 'color',
		),

		array(
			'id' => 'ivan-custom-accent-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Second Color', 'bomby'), 
			'subtitle' => esc_html__('Pick an accent color that fits with the main color.', 'bomby'),
			'transparent' => false,
			'validate' => 'color',
		),

		array(
			'id' => 'ivan-link-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Link Color', 'bomby'), 
			'subtitle' => esc_html__('Color used in links in normal state.', 'bomby'),
			'transparent' => false,
			'validate' => 'color',
		),

		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Typography', 'bomby')
		),

		array(
			'id' => 'base-font',
			'type' => 'typography',
			'title' => esc_html__('Base Font', 'bomby'),
			'subtitle' => esc_html__('Font used in the content in general, usually overwrite by local layout fonts, but used in paragraphs, lists and others.', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> true,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> true,
			'font-weight' => true,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('
				body,
				.ivan-staff-wrapper .infos .description,
				.ivan-testimonial .testimonial-meta .author-desc'
			),
		),

		array(
			'id' => 'heading-font',
			'type' => 'typography',
			'title' => esc_html__('Heading Font', 'bomby'),
			'subtitle' => esc_html__('Font used in heading elements and a few others.', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => false,
			'text-align' => false,
			'text-transform' => true,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('h1, h2, h3, h4, h5, h6, 
				.woocommerce table.shop_table th, .woocommerce-page table.shop_table th,
				.woocommerce .cart-collaterals .cart_totals h2, .woocommerce-page .cart-collaterals .cart_totals h2,
				.woocommerce .coupon label, .woocommerce-page .coupon label,
				.woocommerce .shipping-calculator-button, .woocommerce-page .shipping-calculator-button,
				.ivan-staff-wrapper .infos .name,
				.blog-large.style-aside-date .entry-meta,
				.blog-large.style-aside-date .date-block,
				.paging-navigation a,
				.paging-navigation span,
				.widget_recent_entries li a,
				.sidebar .widget .post-date,
				.content-wrapper .wpb_widgetised_column .widget .post-date,
				.iv-layout.header .woo-cart .cart_list li a,
				.btn, .button, button,
				.iv-layout.header .woo-cart .buttons a,
				#sideheader .widget .widgettitle,
				#sideheader .widget .widget-title,
				.ivan-button, .block-btn, .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header, .ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs .wpb_tabs_nav li a, .ivan-staff-wrapper .name, .ivan-pricing-table .month, .ivan-icon-box .icon-box-link-holder a, .ivan-testimonial .testimonial-meta .author-name, .ivan-pricing-table .signup, .post-nav-fixed .nl-infos,
				.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li,
				.woocommerce table.shop_attributes th, .woocommerce-page table.shop_attributes th,
				button[type="submit"], input[type="submit"],
				.woocommerce table.cart .product-name a, .woocommerce-page table.cart .product-name a,
				.woocommerce .cart-collaterals .cart_totals a.button.alt, .woocommerce-page .cart-collaterals .cart_totals a.button.alt,
				.woocommerce .cart-actions .button, .woocommerce-page .cart-actions .button,
				.woocommerce form .form-row label, .woocommerce-page form .form-row label,
				.ivan-vc-filters-wrapper, .ivan-pricing-table.small-desc .top-section .month,
				.ivan-posts .ivan-post.default-style .entry .post-read-more,
				.ivan-testimonial .testimonial-meta .author-infos,
				.bottom-footer .mega_main_menu .mega_main_menu_ul > li,
				.latest-post time,
				.latest-post .read-more,
				.ivan-pricing-table .price-inner, .pie-chart-counter,
				.pricing-table .top-section .plan-infos,
				.pricing-table p,
				.pricing-table .signup,
				.ivan-testimonial .testimonial-content,
				.ivan-counter-wrapper h2,
				.blog-masonry.style-simple .format-status .status-main p,
				.blog-masonry.style-simple .format-quote .quote-main p,
				blockquote, label,
				.woocommerce div.product form.cart .button, .woocommerce-page div.product form.cart .button,
				.woocommerce div.product div.summary .product_meta, .woocommerce-page div.product div.summary .product_meta,
				select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .iv-layout.header .live-search input[type="search"],
				.header .mega_main_menu .mega_main_menu_ul > li > .item_link, .woo-cart .basket-wrapper .header-cart-total, .iv-mobile-menu-wrapper ul li .item_link
			'),
		),

		array(
			'id' => 'ivan-heading-weight',
			'type' => 'select',
			'title' => esc_html__('Headings Weight', 'bomby'),
			'subtitle' => esc_html__('Not all listed weight are avaliable to the font you select. Usually normal and bold are avalible to almost all fonts, check Google Fonts details to see avaliable weights to your font.', 'bomby'),
			'options' => array( 
				'' => 'Theme Default',
				'100' => 'Thin 100',
				'200' => 'Extra Light 200',
				'300' => 'Light 300',
				'400' => 'Normal 400',
				'500' => 'Medium 500',
				'600' => 'Semi-Bold 600',
				'700' => 'Bold 700',
				'800' => 'Extra-Bold 800',
				'900' => 'Ultra-Bold 900',
				),
			'default' => '',
		),

		array(
			'id' => 'ivan-side-title-heading-weight',
			'type' => 'select',
			'title' => esc_html__('Widget Title and Post Title Weight', 'bomby'),
			'subtitle' => esc_html__('Not all listed weight are avaliable to the font you select. Usually normal and bold are avalible to almost all fonts, check Google Fonts details to see avaliable weights to your font.', 'bomby'),
			'options' => array( 
				'' => 'Theme Default',
				'100' => 'Thin 100',
				'200' => 'Extra Light 200',
				'300' => 'Light 300',
				'400' => 'Normal 400',
				'500' => 'Medium 500',
				'600' => 'Semi-Bold 600',
				'700' => 'Bold 700',
				'800' => 'Extra-Bold 800',
				'900' => 'Ultra-Bold 900',
				),
			'default' => '',
		),

		array(
			'id' => 'secondary-font',
			'type' => 'typography',
			'title' => esc_html__('Secondary Font', 'bomby'),
			'subtitle' => esc_html__('Optional: Font used when a smoother font is necessary, used in entry meta at blog, product title and price.', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => true,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.post .entry-meta,
				.woocommerce div.product div.summary span.price, .woocommerce-page div.product div.summary span.price, 
				.woocommerce div.product div.summary p.price, .woocommerce-page div.product div.summary p.price,
				.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
				.ivan-title-wrapper .title-wrapper .sub, .ivan-counter-wrapper .counter-wrapper .sub, .subtitle,
				.latest-post time, .latest-post .read-more, .ivan-projects .entry-inner .categories,
				.ivan-progress .progress-title-holder, .ivan-staff-wrapper .job-title, .ivan-promo-box p,
				.portfolio.style2 .filters-wrapper ul li, .iv-layout.title-wrapper p, .blog-masonry.style-simple .entry-meta,
				.blog-masonry.style-simple .format-status .status-main cite, .blog-masonry.style-simple .format-quote .quote-main cite,
				.entry-author-meta .author-meta, .archive.author .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .archive.category .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .archive.tag .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .archive.date .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .search.search-results .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .search.search-no-results .iv-layout.title-wrapper.title-wrapper-large h2 span:first-child, .woocommerce .woo-sorting-options .woocommerce-result-count, .woocommerce-page .woo-sorting-options .woocommerce-result-count, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce div.product div.summary .breadcrumb, .woocommerce-page div.product div.summary .breadcrumb, .woocommerce ul.products li.product .quick-view, .woocommerce-page ul.products li.product .quick-view, .iv-layout.title-wrapper.title-wrapper-large .scroll-to-content, .header .mega_main_menu.light-submenu .default_dropdown > ul .item_link, .header .mega_main_menu.light-submenu .default_dropdown li > ul .item_link, .header .mega_main_menu.light-submenu .multicolumn_dropdown > ul .item_link, .header .mega_main_menu .default_dropdown > ul .item_link, .header .mega_main_menu .default_dropdown li > ul .item_link, .header .mega_main_menu.light-submenu .widgets_dropdown > ul .item_link, .iv-layout.header .woo-cart .cart_list li, .woo-cart .total
				'),
		),

	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Title Wrapper', 'bomby'),
	'desc' => esc_html__('Configure Title Wrapper styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

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
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Title Style', 'bomby'),
		),

		array(
			'id' => 'title-wrapper-color-scheme',
			'type' => 'select',
			'title' => esc_html__('Alternative Color Scheme', 'bomby'),
			'subtitle' => esc_html__('Select an alternative color scheme to title wrapper.', 'bomby'),
			'options' => array( 'standard' => 'Standard', 'light' => 'Light (great to dark backgrounds)', 'dark' => 'Dark (great to light backgrounds)' ),
			'default' => 'standard',
			'validate' => 'not_empty',
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
		),
		
		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Breadcrumbs', 'bomby')
		),
		
		array(
			'id' => 'title-wrapper-breadcrumbs-font',
			'type' => 'typography',
			'title' => esc_html__('Breadcrumbs Typography', 'bomby'),
			'subtitle' => '',
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
			'text-align' => false,
			'text-transform' => true,
			'output' => array('
				.iv-layout.title-wrapper .breadcrumbs li,
				.iv-layout.title-wrapper .breadcrumbs li a,
				.iv-layout.title-wrapper .breadcrumbs li span,
				.iv-layout.title-wrapper.dark .breadcrumbs li,
				.iv-layout.title-wrapper.dark .breadcrumbs li a,
				.iv-layout.title-wrapper.dark .breadcrumbs li span
			'),
			'default' => array(),
		),
		
		array(
			'id'        => 'title-wrapper-separator-color',
			'type'      => 'color',
			'title'     => esc_html__('Separator Color', 'bomby'),
			'default'   => '',
			'output'    => array('border-left-color' => '.iv-layout.title-wrapper.title-wrapper-normal .ivan-breadcrumb')
		),
		
		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Search Form', 'bomby')
		),
		
		array(
			'id'        => 'title-wrapper-search-border-color',
			'type'      => 'color',
			'title'     => esc_html__('Border & Icon Color', 'bomby'),
			'default'   => '',
			'output'    => array(
				'border-color' => '.iv-layout.title-wrapper.title-wrapper-normal .search-form-title input[type="text"]',
				'border-right-color' => '.iv-layout.title-wrapper.title-wrapper-normal .search-form-title .iconic-submit:before',
				'color' => '.iv-layout.title-wrapper.title-wrapper-normal .search-form-title .iconic-submit'
			)
		),
		
		array(
			'id'        => 'title-wrapper-search-border-color-focus',
			'type'      => 'color',
			'title'     => esc_html__('Border Focus Color', 'bomby'),
			'default'   => '',
			'output'    => array(
				'border-color' => '.iv-layout.title-wrapper.title-wrapper-normal .search-form-title input[type="text"]:focus',
			)
		),
		
		array(
			'id'        => 'title-wrapper-search-text-color',
			'type'      => 'color',
			'title'     => esc_html__('Text Color', 'bomby'),
			'default'   => '',
			'output'    => array(
				'color' => '.iv-layout.title-wrapper.title-wrapper-normal .search-form-title input[type="text"], .iv-layout.title-wrapper.title-wrapper-normal .search-form-title input[type="text"]:focus',
			)
		),
		
		array(
			'id'        => 'title-wrapper-search-placeholder-color',
			'type'      => 'color',
			'title'     => esc_html__('Placeholder Text Color', 'bomby'),
			'default'   => '',
		),
		
		array(
			'id' => 'random-customizer-label',
			'type' => 'info',
			'desc' => esc_html__('Specific Title Wrappers', 'bomby')
		),

		array(
			'id' => 'blog-title-wrapper-bg',
			'type' => 'background',
			'output' => array('.blog #iv-layout-title-wrapper, .archives #iv-layout-title-wrapper'),
			'title' => esc_html__('Blog: Title Wrapper Background', 'bomby'),
			'subtitle' => esc_html__('Overwrite title wrapper at blog and archives.', 'bomby'),
		),

		array(
			'id' => 'single-title-wrapper-bg',
			'type' => 'background',
			'output' => array('.single-post #iv-layout-title-wrapper'),
			'title' => esc_html__('Single Post: Title Wrapper Background', 'bomby'),
			'subtitle' => esc_html__('Overwrite title wrapper at single post.', 'bomby'),
		),

		array(
			'id' => 'shop-title-wrapper-bg',
			'type' => 'background',
			'output' => array('#iv-layout-title-wrapper.title-wrapper-shop'),
			'title' => esc_html__('Shop: Title Wrapper Background', 'bomby'),
			'subtitle' => esc_html__('Overwrite title wrapper at shop and single products when possible (header is usually hidden in single products).', 'bomby'),
		),
		
	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Header', 'bomby'),
	'desc' => esc_html__('Configure header styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'header-font',
			'type' => 'typography',
			'title' => esc_html__('Header Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => false,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('
				.iv-layout.header,
				.two-rows-style2 .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.style4-right-menu.classic-style .mega_main_menu .mega_main_menu_ul > li > .item_link,				

				.header .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.header .mega_main_menu .multicolumn_dropdown > ul li.section_header_style > .item_link,
				.header .mega_main_menu .multicolumn_dropdown > ul .item_link,
				
				.header .mega_main_menu.light-submenu .default_dropdown > ul .item_link,
				.header .mega_main_menu.light-submenu .default_dropdown li > ul .item_link,
				.header .mega_main_menu.light-submenu .multicolumn_dropdown > ul .item_link,
				.header .mega_main_menu .default_dropdown > ul .item_link,
				.header .mega_main_menu .default_dropdown li > ul .item_link,
				.header .mega_main_menu.light-submenu .widgets_dropdown > ul .item_link,
				
				.header .mega_main_menu.light-submenu .default_dropdown > ul .widgettitle,
				.header .mega_main_menu.light-submenu .default_dropdown li > ul .widgettitle,
				.header .mega_main_menu.light-submenu .multicolumn_dropdown > ul .widgettitle,
				.header .mega_main_menu.light-submenu .widgets_dropdown > ul .widgettitle,
				.header .mega_main_menu.light-submenu .default_dropdown > ul li.section_header_style > .item_link,
				.header .mega_main_menu.light-submenu .default_dropdown li > ul li.section_header_style > .item_link,
				.header .mega_main_menu.light-submenu .multicolumn_dropdown > ul li.section_header_style > .item_link,
				.header .mega_main_menu.light-submenu .widgets_dropdown > ul li.section_header_style > .item_link,
				
				.header.style5 .mid-header .contact-info-container .contact-info .contact-details h4,
				.header.style5 .mid-header .contact-info-container .contact-info .contact-details p,
				.header.style5 .bottom-header .main-nav > ul > li > .item_link,
				
				.header .mega_main_menu.dark-submenu .default_dropdown > ul .widgettitle,
				.header .mega_main_menu.dark-submenu .default_dropdown li > ul .widgettitle,
				.header .mega_main_menu.dark-submenu .multicolumn_dropdown > ul .widgettitle,
				.header .mega_main_menu.dark-submenu .widgets_dropdown > ul .widgettitle,
				.header .mega_main_menu.dark-submenu .default_dropdown > ul li.section_header_style > .item_link,
				.header .mega_main_menu.dark-submenu .default_dropdown li > ul li.section_header_style > .item_link,
				.header .mega_main_menu.dark-submenu .multicolumn_dropdown > ul li.section_header_style > .item_link,
				.header .mega_main_menu.dark-submenu .widgets_dropdown > ul li.section_header_style > .item_link,
				
				.header .mega_main_menu.dark-submenu .default_dropdown > ul .item_link,
				.header .mega_main_menu.dark-submenu .default_dropdown li > ul .item_link,
				.header .mega_main_menu.dark-submenu .multicolumn_dropdown > ul .item_link,
				.header .mega_main_menu.dark-submenu .widgets_dropdown > ul .item_link,
				
				.woo-cart .basket-wrapper .header-cart-total
			'),
		),

		array(
			'id' => 'aside-header-bg',
			'type' => 'background',
			'output' => array('.ivan-main-layout-aside.aside-header-wrapper.ivan-main-layout-aside-right, .ivan-main-layout-aside.aside-header-wrapper.ivan-main-layout-aside-left'),
			'title' => esc_html__('Aside: Header Background', 'bomby'),
			'subtitle' => esc_html__('Works only in aside header styles. Do not forget to upload a correct logo that works better with the new background.', 'bomby'),
		),

		array(
			'id' => 'aside-header-color-scheme',
			'type' => 'select',
			'title' => esc_html__('Aside: Alternative Color Scheme', 'bomby'),
			'subtitle' => esc_html__('Select an alternative color scheme to aside header items. Works only in aside header styles.', 'bomby'),
			'options' => array( 'standard' => 'Standard', 'light' => 'Light (great to dark backgrounds)', 'dark' => 'Dark (great to light backgrounds)' ),
			'default' => 'standard',
		),

		array(
			'id'=>'aside-header-logo-spacing',
			'type' => 'spacing_mod',
			'output' => array('.simple-left-right .logo'), // Our theme uses custom output for this field
			'mode'=> 'padding', // absolute, padding, margin, defaults to padding
			'units' => 'px', // You can specify a unit value. Possible: px, em, %
			'title' => esc_html__('Aside: Logo Margin', 'bomby'),
			'subtitle' => esc_html__('Select a custom margin padding) to the be applied in the logo in aside layouts.', 'bomby'),
			'desc' => esc_html__('If not set, default margin will be applied by theme.', 'bomby'),
			'default' => array(),
			'required' => array( 'logo', '!=', null ),
		),

		array(
			'id'=>'aside-header-remove-border',
			'type' => 'switch', 
			'title' => esc_html__('Aside: Remove Border', 'bomby'),
			'subtitle'=> esc_html__('If on, a small border of aside header layout will be removed.', 'bomby'),
			"default" => 0,
		),


	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Menu Color', 'bomby'),
	'desc' => esc_html__('Configure menu item color', 'bomby'),
	'subsection' => true,
	'fields' => array(
		
		array(
			'id' => 'menu-active-link-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Link Color', 'bomby'), 
			'subtitle' => esc_html__('Menu item link color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '
				.header .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.iv-layout.header.light .mega_main_menu .mega_main_menu_ul > li > .item_link,
				.woo-cart .basket-wrapper .header-cart-total .amount
			'),
			'validate' => 'color',
		),
		
		array(
			'id' => 'menu-hover-link-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Hover Link color', 'bomby'), 
			'subtitle' => esc_html__('Menu hover link color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '
				.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
				.iv-layout.header.light .mega_main_menu .mega_main_menu_ul > li:hover > .item_link
			'),
			'validate' => 'color',
		),
		
		array(
			'id' => 'menu-current-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Current Link color', 'bomby'), 
			'subtitle' => esc_html__('Menu current link color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '
				.iv-layout.header.light .mega_main_menu .mega_main_menu_ul > li.current-menu-ancestor > .item_link,
				.iv-layout.header.light .mega_main_menu .mega_main_menu_ul > li.current-menu-item > .item_link,
				.iv-layout.header.light .mega_main_menu .mega_main_menu_ul > li:hover > .item_link
			'),
			'validate' => 'color',
		),

		array(
			'id' => 'border-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Border color', 'bomby'), 
			'subtitle' => esc_html__('Menu border color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
				'background-color' => '
					.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link .link_text:before',
			),
			'validate' => 'color',
		),

	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Top Header', 'bomby'),
	'desc' => esc_html__('Configure top header styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'top-header-font',
			'type' => 'typography',
			'title' => esc_html__('Top Header Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => false,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.iv-layout.top-header'),
		),
		
		array(
			'id' => 'top-header-background-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Background color', 'bomby'), 
			'subtitle' => esc_html__('Background color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
				'background-color' => '.iv-layout.top-header'),
			'validate' => 'color',
		),
		
		array(
			'id' => 'top-header-text-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Text color', 'bomby'), 
			'subtitle' => esc_html__('Text color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
				'color' => '.iv-layout.top-header, .iv-layout.top-header a',
				'border-top-color' => '.iv-layout.top-header .woo-cart .basket-wrapper .top',
				'border-color' => '.iv-layout.top-header .woo-cart .basket-wrapper .basket',
			),
			'validate' => 'color',
		),

		array(
			'id' => 'search-box-bg',
			'type'	 => 'color',
			'title'	=> esc_html__('Search Box Submit Color', 'bomby'), 
			'subtitle' => esc_html__('Color for search box settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
				'background-color' => '.iv-layout.header .live-search .submit-form, .iv-layout.top-header .live-search .submit-form'),
			'validate' => 'color',
		),

	),
); // End Customizer Section


$this->sections[] = array(
	'title' => esc_html__('Product', 'bomby'),
	'desc' => esc_html__('Configure product item color', 'bomby'),
	'subsection' => true,
	'fields' => array(
		
		array(
			'id' => 'quick-view-bg',
			'type'	 => 'color',
			'title'	=> esc_html__('Quick View Button Background Color', 'bomby'), 
			'subtitle' => esc_html__('Quick view background color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'background' => '.woocommerce ul.products li.product .quick-view,
							.woocommerce-page ul.products li.product .quick-view'),
			'validate' => 'color',
		),

		array(
			'id' => 'quick-view-bg-hover',
			'type'	 => 'color',
			'title'	=> esc_html__('Quick View Button Background Hover Color', 'bomby'), 
			'subtitle' => esc_html__('Quick view background hover color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'background' => '.woocommerce ul.products li.product .quick-view:hover,
							.woocommerce-page ul.products li.product .quick-view:hover'),
			'validate' => 'color',
		),

		array(
			'id' => 'quick-view-text-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Quick View Text Color', 'bomby'), 
			'subtitle' => esc_html__('Quick view text color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '.woocommerce ul.products li.product .quick-view, .woocommerce-page ul.products li.product .quick-view'),
			'validate' => 'color',
		),

		array(
			'id' => 'add-to-cart-bg',
			'type'	 => 'color',
			'title'	=> esc_html__('Add Cart Button Background Color', 'bomby'), 
			'subtitle' => esc_html__('Add cart background settings.', 'bomby'),
			'transparent' => false,
			'important'	=> true,
			'validate' => 'color',
		),

		array(
			'id' => 'add-to-cart-bg-hover',
			'type'	 => 'color',
			'title'	=> esc_html__('Add Cart Button Background Hover Color', 'bomby'), 
			'subtitle' => esc_html__('Add cart background hover settings.', 'bomby'),
			'transparent' => false,
			'important'	=> true,
			'validate' => 'color',
		),

		array(
			'id' => 'view-cart-bg',
			'type'	 => 'color',
			'title'	=> esc_html__('View Cart Button Background Color', 'bomby'), 
			'subtitle' => esc_html__('View cart background settings.', 'bomby'),
			'transparent' => false,
			'validate' => 'color',
		),

		array(
			'id' => 'view-cart-bg-hover',
			'type'	 => 'color',
			'title'	=> esc_html__('View Cart Button Background Hover Color', 'bomby'), 
			'subtitle' => esc_html__('View cart background hover settings.', 'bomby'),
			'transparent' => false,
			'important'	=> true,
			'validate' => 'color',
		),

	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Footer', 'bomby'),
	'desc' => esc_html__('Configure footer styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'layout-footer-bg',
			'type' => 'background',
			'output' => array('.iv-layout.footer'),
			'title' => esc_html__('Footer Background', 'bomby'),
			'subtitle' => esc_html__('Footer background settings.', 'bomby'),
		),

		array(
			'id' => 'footer-font',
			'type' => 'typography',
			'title' => esc_html__('Footer Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => false,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.iv-layout.footer'),
		),

		array(
			'id' => 'footer-widget-font',
			'type' => 'typography',
			'title' => esc_html__('Footer Widget Title Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'text-align' => false,
			'text-transform' => true,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.iv-layout.footer .widget .widget-title'),
		),
		
		array(
			'id' => 'random-floating-customizer',
			'type' => 'info',
			'desc' => esc_html__('Floating Contact Form', 'bomby')
		),
		
		array(
			'id' => 'footer-floating-contact-form-bg',
			'type' => 'background',
			'output' => array('.floated-contact-form .form-container, .floated-contact-form .form-container:after'),
			'title' => esc_html__('Background', 'bomby'),
			'subtitle' => esc_html__('Floating contact form background settings.', 'bomby'),
		),
		
		array(
			'id' => 'footer-floating-contact-form-header-font',
			'type' => 'typography',
			'title' => esc_html__('Header Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> true,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> true,
			'font-weight' => true,
			'text-align' => true,
			'text-transform' => true,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.floated-contact-form .form-container h6'),
		),

		array(
			'id' => 'footer-floating-contact-form-description-font',
			'type' => 'typography',
			'title' => esc_html__('Description Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> true,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> true,
			'font-weight' => true,
			'text-align' => true,
			'text-transform' => true,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.floated-contact-form .form-container > p'),
		),
		
		array(
			'id' => 'footer-floating-contact-form-notice-font',
			'type' => 'typography',
			'title' => esc_html__('Notice Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> true,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> true,
			'font-weight' => true,
			'text-align' => true,
			'text-transform' => true,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.floated-contact-form #ff-notice'),
		),
		
		array(
			'id' => 'footer-floating-contact-form-inputs-bg',
			'type' => 'color',
			'output' => array('background-color' => '.floated-contact-form .form-container form input, .floated-contact-form .form-container form textarea'),
			'title' => esc_html__('Form Fields Background Color', 'bomby'),
			'subtitle' => '',
		),
		
		array(
			'id' => 'footer-floating-contact-form-button-text-color',
			'type' => 'color',
			'output' => array('color' => '.floated-contact-form .form-container form input[type=submit]'),
			'title' => esc_html__('Button Text Color', 'bomby'),
			'subtitle' => '',
		),
		
		array(
			'id' => 'footer-floating-contact-form-button-text-hover-color',
			'type' => 'color',
			'output' => array('color' => '.floated-contact-form .form-container form input[type=submit]:hover'),
			'title' => esc_html__('Button Hover Text Color', 'bomby'),
			'subtitle' => '',
		),
		
		array(
			'id' => 'footer-floating-contact-form-button-color',
			'type' => 'color',
			'output' => array('background-color' => '.floated-contact-form .form-container form #ff-submit'),
			'title' => esc_html__('Button Background Color', 'bomby'),
			'subtitle' => '',
		),
		
		array(
			'id' => 'footer-floating-contact-form-button-hover-color',
			'type' => 'color',
			'output' => array('background-color' => '.floated-contact-form .form-container form #ff-submit:hover'),
			'title' => esc_html__('Button Background Hover Color', 'bomby'),
			'subtitle' => '',
		),
	),
); // End Customizer Section

$this->sections[] = array(
	'title' => esc_html__('Bottom Footer', 'bomby'),
	'desc' => esc_html__('Configure bottom footer styles', 'bomby'),
	'subsection' => true,
	'fields' => array(

		array(
			'id' => 'layout-bottom-footer-bg',
			'type' => 'background',
			'output' => array('.iv-layout.bottom-footer'),
			'title' => esc_html__('Bottom Footer Background', 'bomby'),
			'subtitle' => esc_html__('Bottom Footer background settings.', 'bomby'),
		),

		array(
			'id' => 'bottom-footer-font',
			'type' => 'typography',
			'title' => esc_html__('Bottom Footer Typography', 'bomby'),
			'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'font-style'=> false, // Includes font-style and weight. Can use font-style or font-weight to declare
			'subsets' => false, // Only appears if google is true and subsets not set to false
			'font-size'=> false,
			'line-height'=> false,
			'word-spacing'=> false, // Defaults to false
			'letter-spacing'=> false, // Defaults to false
			'color'=> false,
			'font-weight' => false,
			'text-align' => false,
			'text-transform' => false,
			'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
			'output' => array('.iv-layout.bottom-footer'),
		),

		array(
			'id' => 'bottom-footer-social-icon-background',
			'type'	 => 'background',
			'title'	=> esc_html__('Bottom Footer Social Color', 'bomby'), 
			'subtitle' => esc_html__('Bottom footer social icons color settings.', 'bomby'),
			'transparent' => false,
			'background-image' => false,
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-size' => false,
			'output' => array(
			'color' => '.bottom-footer.two-columns .social-icons a'),
			'validate' => 'background',
		),
		
		array(
			'id' => 'bottom-footer-social-icon-color',
			'type'	 => 'color',
			'title'	=> esc_html__('Bottom Footer Social Background', 'bomby'), 
			'subtitle' => esc_html__('Bottom footer social icons color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '.bottom-footer.two-columns .social-icons a'),
			'validate' => 'color',
		),		

		array(
			'id' => 'bottom-footer-social-icon-background-hover',
			'type'	 => 'background',
			'title'	=> esc_html__('Bottom Footer Social Hover Background', 'bomby'), 
			'subtitle' => esc_html__('Bottom footer social icons hover color settings.', 'bomby'),
			'transparent' => false,
			'background-image' => false,
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-size' => false,
			'output' => array(
			'color' => '.bottom-footer.two-columns .social-icons a:hover'),
			'validate' => 'background',
		),
		
		array(
			'id' => 'bottom-footer-social-icon-color-hover',
			'type'	 => 'color',
			'title'	=> esc_html__('Bottom Footer Social Hover Color', 'bomby'), 
			'subtitle' => esc_html__('Bottom footer social icons hover color settings.', 'bomby'),
			'transparent' => false,
			'output' => array(
			'color' => '.bottom-footer.two-columns .social-icons a:hover'),
			'validate' => 'color',
		),
		


	),
); // End Customizer Section
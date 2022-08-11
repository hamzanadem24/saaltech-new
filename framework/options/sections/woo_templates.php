<?php
/*
 * WooCommerce Section
*/

$this->sections[] = array(
	'title' => esc_html__('Shop', 'bomby'),
	'desc' => esc_html__('Change shop templates and configurations.', 'bomby'),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id' => 'random-woo-templates',
			'type' => 'info',
			'desc' => esc_html__('General Configuration.', 'bomby')
		),

		array(
			'id'=>'woo-shop-layout',
			'type' => 'select',
			'title' => esc_html__('Shop Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used in shop.', 'bomby'),
			'options' => array( 
				'left' => 'Sidebar at Left',
				'right' => 'Sidebar at Right',
				'full' => 'Without Sidebar (Wide)',
				),
			'default' => 'left',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'woo-per-page',
			'type' => 'text',
			'title' => esc_html__('Products per Page', 'bomby'),
			'subtitle' => esc_html__('Define the number of products displayed per page.', 'bomby'),
			'default' => '8',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'woo-shop-columns',
			'type' => 'slider',
			'title' => esc_html__('Columns', 'bomby'),
			'subtitle' => esc_html__('Define columns number at shop.', 'bomby'),
			"default" => "3",
			"min" => "1",
			"step" => "1",
			"max" => "4",
		),
		
		array(
			'id' => 'woo-shop-one-less',
			'type' => 'switch',
			'title' => esc_html__('One less on first row', 'bomby'),
			'subtitle' => esc_html__('Show one less product on first row.', 'bomby'),
			"default" => "0",
		),

		array(
			'id'=>'woo-list-layout',
			'type' => 'switch', 
			'title' => esc_html__('Display Products in List', 'bomby'),
			'subtitle'=> esc_html__('If on, products will be displayed as list instead thumbs at shop.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'woo-catalog-mode',
			'type' => 'switch', 
			'title' => esc_html__('Enable Catalog Mode?', 'bomby'),
			'subtitle'=> esc_html__('If on, Add to Cart buttons will not be displayed to users.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'woo-catalog-mode-text',
			'type' => 'textarea', 
			'title' => esc_html__('Catalog Mode Text', 'bomby'),
			'subtitle'=> esc_html__('What will be displayed instead default Add to Cart button.', 'bomby'),
			'default' => 'Get in <a href="#">touch</a> to more details.',
			'required' => array( 'woo-catalog-mode', '=', 1 ),
		),	

		array(
			'id'=>'woo-category-image',
			'type' => 'switch', 
			'title' => esc_html__('Enable Category Image?', 'bomby'),
			'subtitle'=> esc_html__('If on, the uploaded image will be displayed above the products in shop listing.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'woo-display-sorting',
			'type' => 'switch', 
			'title' => esc_html__('Enable Sorting Options?', 'bomby'),
			'subtitle'=> esc_html__('If on, the sorting options will be displayed in the shop, this way users can order by price or others.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'woo-disable-quick-view',
			'type' => 'switch', 
			'title' => esc_html__('Disable Quick View Feature?', 'bomby'),
			'subtitle'=> esc_html__('If on, the quick view feature will not be avaliable.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),

		array(
			'id'=>'woo-disable-front-back',
			'type' => 'switch', 
			'title' => esc_html__('Disable Front/Back Feature?', 'bomby'),
			'subtitle'=> esc_html__('If on, the front and back images will not be avaliable.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),

		array(
			'id'=>'woo-disable-title',
			'type' => 'switch', 
			'title' => esc_html__('Disable Title Wrapper?', 'bomby'),
			'subtitle'=> esc_html__('If on, title wrapper will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id' => 'random-woo-templates',
			'type' => 'info',
			'desc' => esc_html__('Single Product Configuration.', 'bomby')
		),

		array(
			'id'=>'woo-product-layout',
			'type' => 'select',
			'title' => esc_html__('Product Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used in single products.', 'bomby'),
			'options' => array( 
				'left' => 'Sidebar at Left',
				'right' => 'Sidebar at Right',
				'full' => 'Without Sidebar (Wide)',
				),
			'default' => 'full',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'woo-thumbnail-stacked',
			'type' => 'switch', 
			'title' => esc_html__('Display Wide Thumbnail', 'bomby'),
			'subtitle'=> esc_html__('If on, instead two columns in single products, they will appear as one column.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'woo-product-tabs-layout',
			'type' => 'select',
			'title' => esc_html__('Product Tabs Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used in single products tabs.', 'bomby'),
			'options' => array( 
				'default' => 'Horizontal Tabs',
				'vertical' => 'Vertical Tabs',
				'block' => 'Without Tabs (blocks)',
				),
			'default' => 'default',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'woo-product-extra-tab',
			'type' => 'switch', 
			'title' => esc_html__('Enable Extra Tab?', 'bomby'),
			'subtitle'=> esc_html__('If on, an additional global tab will be displayed in products tabs.', 'bomby'),
			'default' => 0,
		),

			array(
				'id' => 'woo-product-extra-tab-title',
				'type' => 'text',
				'title' => esc_html__('Extra Tab Title', 'bomby'),
				'subtitle' => esc_html__('Define the extra tab title.', 'bomby'),
				'default' => 'Extra Tab',
				'validate' => 'not_empty',
				'required' => array('woo-product-extra-tab', '=', 1),
			),

			array(
				'id' => 'woo-product-extra-tab-content',
				'type' => 'editor',
				'title' => esc_html__('Extra Tab Content', 'bomby'),
				'subtitle' => esc_html__('Define the extra tab content.', 'bomby'),
				'default' => 'Content',
				'validate' => 'not_empty',
				'required' => array('woo-product-extra-tab', '=', 1),
			),

		array(
			'id'=>'woo-disable-breadcrumb',
			'type' => 'switch', 
			'title' => esc_html__('Disable Breadcrumb?', 'bomby'),
			'subtitle'=> esc_html__('If on, breadcrumb above product title will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),

		array(
			'id'=>'woo-disable-social-share',
			'type' => 'switch', 
			'title' => esc_html__('Disable Social Share?', 'bomby'),
			'subtitle'=> esc_html__('If on, social share icons below product details will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),

		array(
			'id'=>'woo-disable-related-products',
			'type' => 'switch', 
			'title' => esc_html__('Disable Related Products?', 'bomby'),
			'subtitle'=> esc_html__('If on, related products will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			'default' => 0,
		),


		array(
			'id' => 'random-woo-templates',
			'type' => 'info',
			'desc' => esc_html__('Shop and Product Settings.', 'bomby')
		),

		array(
			'id'=>'shop-boxed-page',
			'type' => 'switch', 
			'title' => esc_html__('Display Shop/Products Boxed?', 'bomby'),
			'subtitle'=> esc_html__('If on, the shop and products will be displayed in a boxed layout.', 'bomby'),
			"default" => 0,
		),
	), // #fields
);
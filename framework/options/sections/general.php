<?php
/*
 * General Section
*/

$this->sections[] = array(
	'title' => esc_html__('General Settings', 'bomby'),
	'desc' => esc_html__('Configure easily the basic theme\'s settings.', 'bomby'),
	'icon' => 'el-icon-magic',
	'fields' => array(

		array(
			'id'=>'page-comments-switch',
			'type' => 'switch', 
			'title' => esc_html__('Enable Comments in Pages?', 'bomby'),
			'subtitle'=> esc_html__('If on, the comment form will be avaliable in all pages.', 'bomby'),
			'default' => 1,
		),
		
		array(
			'id'=>'search-shop-switch',
			'type' => 'switch', 
			'title' => esc_html__('Enable Shop Search instead default Search?', 'bomby'),
			'subtitle'=> esc_html__('If on, the search forms of Live Search modules will be for shop products instead default.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'enable-preloader',
			'type' => 'switch', 
			'title' => esc_html__('Enable Loader Effect?', 'bomby'),
			'subtitle'=> esc_html__('If on, a loader will appear before loading the page.', 'bomby'),
			'default' => 1,
		),
		
		array(
			'id'=>'preloader-style',
			'type' => 'select', 
			'title' => esc_html__('Loader Style', 'bomby'),
			'subtitle'=> esc_html__('Select loader style.', 'bomby'),
			'options' => array(
				'default' => esc_html__('Default', 'bomby'),
			),
			'default' => 'default',
			'required' => array('enable-preloader','=',	1)
		),
		array(
			'id'=>'preloader-background-color',
			'type' => 'color', 
			'title' => esc_html__('Loader Background Color', 'bomby'),
			'subtitle'=> esc_html__('Background color of the loder overlay.', 'bomby'),
			'output' => array('background-color' => '#page-loader.page-loader-style2'),
			'default' => '',
			'required' => array('preloader-style','=', array('style2') )
		),
		array(
			'id'=>'preloader-text',
			'type' => 'text', 
			'title' => esc_html__('Loader Text', 'bomby'),
			'subtitle'=> esc_html__('Text displayed inside loader.', 'bomby'),
			'default' => '',
			'required' => array('preloader-style','=','style2')
		),
		array(
			'id'=>'disable-responsiveness',
			'type' => 'switch', 
			'title' => esc_html__('Disable Responsive Layout?', 'bomby'),
			'subtitle'=> esc_html__('If on, the website will not adapt in smaller devices like tablets or smartphones.', 'bomby'),
			'default' => 0,
		),

		array(
			'id'=>'clear-static-files',
			'type' => 'switch', 
			'title' => esc_html__('Clear Static Files Query String', 'bomby'),
			'subtitle'=> esc_html__('If enabled qeury string variable "ver" will be removed from query string for JS and CSS files.', 'bomby'),
			'default' => 0,
		),

		array(
 			'id'=>'character-sets',
 			'type' => 'checkbox',
 			'title' => esc_html__('Additional Google Fonts character sets', 'bomby'),
 			'subtitle'=> esc_html__('Choose the character sets you want to download from Google Fonts.', 'bomby'),
 			'options' => array(
				'cyrillic' => esc_html__('Cyrillic','bomby'),
				'cyrillic-ext' => esc_html__('Cyrillic Extended','bomby'),
				'greek' => esc_html__('Greek','bomby'),
				'greek-ext' => esc_html__('Greek Extended','bomby'),
				'latin-ext' => esc_html__('Latin Extended','bomby'),
				'vietnamese' => esc_html__('Vietnamese','bomby'),
			),
			'default' => '',
			'validate' => '',
 		),
	),
);
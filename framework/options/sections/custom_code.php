<?php
/*
 * Custom Code
*/

$this->sections[] = array(
	'title' => esc_html__('Custom JS/CSS', 'bomby'),
	'desc' => esc_html__('Easily add custom JS and CSS to your website.', 'bomby'),
	'icon' => 'el-icon-wrench',
	'fields' => array(

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Custom CSS', 'bomby')
		),

		array(
		    'id'       => 'css_editor',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__('CSS Code', 'bomby'),
		    'subtitle' => esc_html__('Insert your custom CSS code right here. It will be displayed globally in the website.', 'bomby'),
		    'mode'     => 'css',
		    'theme'    => 'monokai',
		    'desc'     => '',
		    'default'  => ""
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Custom JS', 'bomby')
		),

		array(
		    'id'       => 'js_editor',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__('JS Code', 'bomby'),
		    'subtitle' => esc_html__('Insert your custom JS code right here. It will be displayed globally in the website.', 'bomby'),
		    'mode'     => 'javascript',
		    'theme'    => 'monokai',
		    'desc'     => 'You can add custom JS code here, like your Google Analytics code or whatever you want.',
		    'default'  => ""
		),

		array(
			'id' => 'random-number',
			'type' => 'info',
			'desc' => esc_html__('Google Fonts and Favicon', 'bomby')
		),

		array(
		    'id'       => 'link_editor',
		    'type'     => 'ace_editor',
		    'title'    => esc_html__('Link Tags', 'bomby'),
		    'description' => esc_html__('You can insert aside link tags from Google Fonts, favicon code. We recommend this website to generate optimal markup:', 'bomby') . ' <a href="http://realfavicongenerator.net/" target="_blank">Real Favicon Generator</a>', 
		    'subtitle' => esc_html__('Insert your custom <link> tags to be displayed in the head, e.g. Google Fonts link tags and others.', 'bomby'),
		    'mode'     => 'html',
		    'theme'    => 'monokai',
		    'desc'     => '',
		    'default'  => ""
		),

	),
);
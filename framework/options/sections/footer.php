<?php
/*
 * Layout Section
*/

$this->sections[] = array(
	'title' => esc_html__('Footer', 'bomby'),
	'desc' => esc_html__('Change the footer section configuration.', 'bomby'),
	'icon' => 'el-icon-cog',
	'fields' => array(

		array(
			'id'=>'footer-enable-switch',
			'type' => 'switch', 
			'title' => esc_html__('Disable this layout part?', 'bomby'),
			'subtitle'=> esc_html__('If on, this layout part will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),
		
		array(
			'id'=>'footer-sticky',
			'type' => 'switch', 
			'title' => esc_html__('Sticky footer?', 'bomby'),
			'subtitle'=> esc_html__('If on, this layout part will be sticky.', 'bomby'),
			"default" => 0,
		),
		
		array(
			'id'=>'footer-color-scheme',
			'type' => 'select',
			'title' => esc_html__('Color scheme', 'bomby'), 
			'subtitle' => esc_html__('Select footer color scheme.', 'bomby'),
			'options' => array(
				'dark' => esc_html__('Default', 'bomby'),
			),
			'default' => 'dark',
			'validate' => 'not_empty',
		),

		array(
			'id'=>'footer-layout',
			'type' => 'select',
			'title' => esc_html__('Footer Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the footer layout to be used.', 'bomby'),
			'options' => apply_filters('ivan_footer_layouts', array( 
					'Ivan_Layout_Footer_Normal' => 'Customizable Columns',
					) ),
			'default' => 'Ivan_Layout_Footer_Normal',
			'validate' => 'not_empty',
		),

		array(
			'id' => 'footer-column-1',
			'type' => 'slider',
			'title' => esc_html__('#1 Column Width', 'bomby'),
			'desc' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'bomby'),
			'subtitle' => esc_html__('The four columns width combined should be equal to 12! Otherwise the layout will break.', 'bomby'),
			"default" => "3",
			"min" => "0",
			"step" => "1",
			"max" => "12",
		),

		array(
			'id' => 'footer-column-2',
			'type' => 'slider',
			'title' => esc_html__('#2 Column Width', 'bomby'),
			'desc' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'bomby'),
			'subtitle' => esc_html__('The four columns width combined should be equal to 12! Otherwise the layout will break.', 'bomby'),
			"default" => "3",
			"min" => "0",
			"step" => "1",
			"max" => "12",
		),

		array(
			'id' => 'footer-column-3',
			'type' => 'slider',
			'title' => esc_html__('#3 Column Width', 'bomby'),
			'desc' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'bomby'),
			'subtitle' => esc_html__('The four columns width combined should be equal to 12! Otherwise the layout will break.', 'bomby'),
			"default" => "3",
			"min" => "0",
			"step" => "1",
			"max" => "12",
		),

		array(
			'id' => 'footer-column-4',
			'type' => 'slider',
			'title' => esc_html__('#4 Column Width', 'bomby'),
			'desc' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'bomby'),
			'subtitle' => esc_html__('The four columns width combined should be equal to 12! Otherwise the layout will break.', 'bomby'),
			"default" => "3",
			"min" => "0",
			"step" => "1",
			"max" => "12",
		),
		
		array(
			'id' => 'footer-column-5',
			'type' => 'slider',
			'title' => esc_html__('#5 Column Width', 'bomby'),
			'desc' => esc_html__('Define column width, max is 12 parts, set as 0 to disable this area.', 'bomby'),
			'subtitle' => esc_html__('The four columns width combined should be equal to 12! Otherwise the layout will break.', 'bomby'),
			"default" => "0",
			"min" => "0",
			"step" => "1",
			"max" => "12",
		),

		array(
			'id' => 'random-footer',
			'type' => 'info',
			'desc' => esc_html__('Dynamic Areas', 'bomby')
		),

		array(
			'id'=>'footer-da-before-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Dynamic Area Before Footer?', 'bomby'),
			'subtitle'=> esc_html__('If on, a dynamic area will be displayed above the layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'footer-da-before',
			'type' => 'select',
			'title' => esc_html__('Before Dynamic Content Page', 'bomby'), 
			'subtitle' => esc_html__('Select the page from where the content will be loaded and displayed.', 'bomby'),
			'data' => 'pages',
			'required' => array( 'footer-da-before-enable', '=', 1),
		),

		array(
			'id'=>'footer-da-after-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Dynamic Area After Footer?', 'bomby'),
			'subtitle'=> esc_html__('If on, a dynamic area will be displayed below the layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'footer-da-after',
			'type' => 'select',
			'title' => esc_html__('After Dynamic Content Page', 'bomby'), 
			'subtitle' => esc_html__('Select the page from where the content will be loaded and displayed.', 'bomby'),
			'data' => 'pages',
			'required' => array( 'footer-da-after-enable', '=', 1),
		),
		
		array(
			'id' => 'random-floating',
			'type' => 'info',
			'desc' => esc_html__('Floating Contact Form', 'bomby')
		),

		array(
			'id'=>'footer-floating-contact-form',
			'type' => 'switch', 
			'title' => esc_html__('Enable Floating Contact Form', 'bomby'),
			'subtitle'=> esc_html__('If on, a floating contact form will be displayed in the right bottom corner.', 'bomby'),
			'desc' => sprintf(esc_html__('If you don\'t receive emails please check your email server settings. Most servers doesn\'t allow to send emails without smtp authentication. This little plugin can be helpful %s', 'bomby'), '<a href="https://wordpress.org/plugins/webriti-smtp-mail/">Easy SMTP Mail</a>'),
			"default" => 0,
		),
		
		array(
			'id' => 'footer-floating-contact-form-recaptcha',
			'type' => 'switch',
			'title' => esc_html__('Enable reCaptcha', 'bomby'),
			'subtitle' => esc_html__('If on, reCaptcha will be activated.', 'bomby'),
			'description' => sprintf(esc_html__('Register your site here %s and get you site and secret key.', 'bomby'),'<a href="https://www.google.com/recaptcha">https://www.google.com/recaptcha</a>'),
			"default" => 0,
			'required' => array( 'footer-floating-contact-form', '=', 1 ),
		),
		
		array(
			'id' => 'footer-floating-contact-form-recaptcha-site-key',
			'type' => 'text',
			'title' => esc_html__('reCaptcha Site Key', 'bomby'),
			'subtitle' => esc_html__('Site key', 'bomby'),
			'default' => '',
			'required' => array( 'footer-floating-contact-form-recaptcha', '=', 1 ),
		),
		
		array(
			'id' => 'footer-floating-contact-form-recaptcha-secret-key',
			'type' => 'text',
			'title' => esc_html__('reCaptcha Secret Key', 'bomby'),
			'subtitle' => esc_html__('Secret key', 'bomby'),
			'default' => '',
			'required' => array( 'footer-floating-contact-form-recaptcha', '=', 1 ),
		),
		
		array(
			'id'=>'footer-floating-contact-form-recaptcha-theme',
			'type' => 'select',
			'title' => esc_html__('reCaptcha Theme', 'bomby'), 
			'subtitle' => esc_html__('Select the theme to be used for reCaptcha.', 'bomby'),
			'options' => apply_filters('ivan_footer_layouts', array( 
				'light' => 'Light',
				'dark' => 'Dark',
			) ),
			'default' => 'light',
			'validate' => 'not_empty',
			'required' => array( 'footer-floating-contact-form-recaptcha', '=', 1 ),
		),
		
		
		
		array(
			'id' => 'footer-floating-contact-form-email',
			'type' => 'text',
			'title' => esc_html__('Email', 'bomby'),
			'subtitle' => esc_html__('Destination email address', 'bomby'),
			'default' => '',
			'required' => array( 'footer-floating-contact-form', '=', 1 ),
		),
		
		array(
			'id' => 'footer-floating-contact-form-header',
			'type' => 'text',
			'title' => esc_html__('Form Header', 'bomby'),
			'subtitle' => esc_html__('Header of the form', 'bomby'),
			'default' => '',
			'required' => array( 'footer-floating-contact-form', '=', 1 ),
			'validate' => false,
		),
		
		array(
			'id' => 'footer-floating-contact-form-description',
			'type' => 'textarea',
			'title' => esc_html__('Form Description', 'bomby'),
			'subtitle' => esc_html__('Short text displayed below the form header', 'bomby'),
			'default' => '',
			'required' => array( 'footer-floating-contact-form', '=', 1 ),
			'validate' => false,
		),
		

	), // #fields
);
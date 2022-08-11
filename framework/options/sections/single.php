<?php
/*
 * Templates Section
*/

$this->sections[] = array(
	'title' => esc_html__('Single', 'bomby'),
	'desc' => esc_html__('Change single post templates.', 'bomby'),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Single Post.', 'bomby')
		),

		/* Base Layouts */
		array(
			'id'=>'single-layout',
			'type' => 'select',
			'title' => esc_html__('Base Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used in blog.', 'bomby'),
			'options' => apply_filters('ivan_single_base_layouts', array( 
				'large' => 'Large',
				) ),
			'default' => 'large',
			'validate' => 'not_empty',
		),

			/* Sub Layouts > Large */
			array(
				'id'=> 'single-sub-large',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_single_large_layouts', array( 
					'simple' => "Simple",
					) ),
				'default' => 'simple',
				'required' => array( 'single-layout', '=', array('large') ),
			),

		array(
			'id'=>'single-reduced-width',
			'type' => 'switch', 
			'title' => esc_html__('Use Reduced Width?', 'bomby'),
			'subtitle'=> esc_html__('If on, the post will use reduced width. Recommended to full single layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'single-sidebar-right',
			'type' => 'switch', 
			'title' => esc_html__('Enable Sidebar at Right?', 'bomby'),
			'subtitle'=> esc_html__('If on, sidebar will be displayed in the specified location.', 'bomby'),
			"default" => 1,
		),

		array(
			'id'=>'single-sidebar-left',
			'type' => 'switch', 
			'title' => esc_html__('Enable Sidebar at Left?', 'bomby'),
			'subtitle'=> esc_html__('If on, sidebar will be displayed in the specified location.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'single-disable-title',
			'type' => 'switch', 
			'title' => esc_html__('Disable Title Wrapper?', 'bomby'),
			'subtitle'=> esc_html__('If on, title wrapper will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id'=>'single-boxed-page',
			'type' => 'switch', 
			'title' => esc_html__('Display Single Boxed?', 'bomby'),
			'subtitle'=> esc_html__('If on, the single will be displayed in a boxed layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Effects/Additional Styles', 'bomby')
		),

		array(
			'id'=>'single-disable-thumb',
			'type' => 'switch', 
			'title' => esc_html__('Disable Thumbnails?', 'bomby'),
			'subtitle'=> esc_html__('If on, thumbnails will not be displayed in single post.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Components', 'bomby')
		),

		array(
			'id'=>'single-post-nav',
			'type' => 'switch', 
			'title' => esc_html__('Enable Post Navigation?', 'bomby'),
			'subtitle'=> esc_html__('If on, navigation will be displayed below content.', 'bomby'),
			"default" => 1,
		),

		array(
			'id'=>'single-author-box',
			'type' => 'switch', 
			'title' => esc_html__('Enable author box?', 'bomby'),
			'subtitle'=> esc_html__('If on, the author box with details and social icons will be displayed.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'single-related',
			'type' => 'switch', 
			'title' => esc_html__('Enable Related Posts?', 'bomby'),
			'subtitle'=> esc_html__('If on, the related posts box will be displayed.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'single-tags',
			'type' => 'switch', 
			'title' => esc_html__('Enable Tags after Content?', 'bomby'),
			'subtitle'=> esc_html__('If on, the tags will be displayed after post content.', 'bomby'),
			"default" => 1,
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Single Project', 'bomby')
		),

		array(
			'id'=>'project-nav',
			'type' => 'switch', 
			'title' => esc_html__('Display Navigation in Projects?', 'bomby'),
			'subtitle'=> esc_html__('If on, next and previous project will be displayed in single project pages.', 'bomby'),
			"default" => 1,
		),

		array(
			'id'=>'project-related',
			'type' => 'switch', 
			'title' => esc_html__('Display Related Projects?', 'bomby'),
			'subtitle'=> esc_html__('If on, the related projects will be displayed below project contents.', 'bomby'),
			"default" => 1,
		),

		array(
			'id' => 'random-single',
			'type' => 'info',
			'desc' => esc_html__('Dynamic Area', 'bomby')
		),

		array(
			'id'=>'single-da-after-enable',
			'type' => 'switch', 
			'title' => esc_html__('Enable Dynamic Area After Post Content?', 'bomby'),
			'subtitle'=> esc_html__('If on, a dynamic area will be displayed after post contents. Great to a newsletter form!', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'single-da-after',
			'type' => 'select',
			'title' => esc_html__('After Content Dynamic Content Page', 'bomby'), 
			'subtitle' => esc_html__('Select the page from where the content will be loaded and displayed.', 'bomby'),
			'data' => 'pages',
			'required' => array( 'single-da-after-enable', '=', 1),
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Advanced Configuration', 'bomby')
		),

		array(
			'id'=>'single-thumb-size',
			'type' => 'text',
			'title' => esc_html__('Custom Single Thumbnail Size', 'bomby'), 
			'subtitle' => esc_html__('Select a custom thumbnail size to your blog.', 'bomby'),
			'description' => 'Type the thumbnail name like "full", "medium" or a custom size defined.',
			'default' => '',
		),

	), // #fields
);
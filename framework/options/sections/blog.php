<?php
/*
 * Templates Section
*/

$this->sections[] = array(
	'title' => esc_html__('Blog', 'bomby'),
	'desc' => esc_html__('Change blog and archives templates.', 'bomby'),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Main Blog.', 'bomby')
		),

		/* Base Layouts */
		array(
			'id'=>'blog-layout',
			'type' => 'select',
			'title' => esc_html__('Base Layout', 'bomby'), 
			'subtitle' => esc_html__('Select the layout to be used in blog.', 'bomby'),
			'options' => apply_filters('ivan_blog_base_layouts', array( 
				'large' => 'Default',
				'masonry' => 'Masonry',
				'medium' => 'Medium',
				) ),
			'default' => 'large',
			'validate' => 'not_empty',
		),

			/* Sub Layouts > Large */
			array(
				'id'=> 'blog-sub-large',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_blog_large_layouts', array( 
					'simple' => "Simple",
					'bottom-meta' => "Meta at Bottom",
					'aside-date' => "Aside Date",
					) ),
				'default' => 'simple',
				'required' => array( 'blog-layout', '=', array('large') ),
			),

			/* Sub Layouts > Medium */
			array(
				'id'=> 'blog-sub-medium',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_blog_medium_layouts', array( 
					'simple' => "Simple",
					) ),
				'default' => 'simple',
				'required' => array( 'blog-layout', '=', array('medium') ),
			),

			/* Sub Layouts > Masonry */
			array(
				'id'=> 'blog-sub-masonry',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_blog_masonry_layouts', array( 
					'simple' => "Simple",
					) ),
				'default' => 'simple',
				'required' => array( 'blog-layout', '=', array('masonry') ),
			),

			/* Sub Layouts > Masonry */
			array(
				'id'=> 'blog-sub-full',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_blog_full_layouts', array( 
					'polaroid' => "Polaroid",
					) ),
				'default' => 'polaroid',
				'required' => array( 'blog-layout', '=', array('full') ),
			),
		
			/* Sub Layouts > Magazine */
			array(
				'id'=> 'blog-sub-magazine',
				'type' => 'select',
				'title' => esc_html__('Layout Style', 'bomby'), 
				'subtitle' => esc_html__('Select the layout style to be applied in the blog posts.', 'bomby'),
				'options' => apply_filters('ivan_blog_magazine_layouts', array( 
					'simple' => "Simple",
					'minimal' => "Minimal",
					'full' => "Full",
					) ),
				'default' => 'simple',
				'required' => array( 'blog-layout', '=', array('magazine') ),
			),
		
		
		array(
			'id'=>'blog-disable-pagination',
			'type' => 'switch', 
			'title' => esc_html__('Disable Pagination', 'bomby'),
			'subtitle'=> esc_html__('If on, pagintion will not be displayed.', 'bomby'),
			"default" => 0,
			'required' => array( 'blog-layout', '=', array('magazine') ),
		),
		
		array(
			'id' => 'blog-columns',
			'type' => 'slider',
			'title' => esc_html__('Columns', 'bomby'),
			'desc' => esc_html__('Define the columns numbers to be used in the blog.', 'bomby'),
			"default" => "3",
			"min" => "1",
			"step" => "1",
			"max" => "4",
			'required' => array( 'blog-layout', '=', array('masonry') ),
		),

		array(
			'id'=>'blog-no-container',
			'type' => 'switch', 
			'title' => esc_html__('Disable blog items container?', 'bomby'),
			'subtitle'=> esc_html__('If on, content will be full width.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),
		
		array(
			'id'=>'blog-sidebar-right',
			'type' => 'switch', 
			'title' => esc_html__('Enable Sidebar at Right?', 'bomby'),
			'subtitle'=> esc_html__('If on, sidebar will be displayed in the specified location.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'blog-sidebar-left',
			'type' => 'switch', 
			'title' => esc_html__('Enable Sidebar at Left?', 'bomby'),
			'subtitle'=> esc_html__('If on, sidebar will be displayed in the specified location.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'blog-disable-title',
			'type' => 'switch', 
			'title' => esc_html__('Disable Title Wrapper?', 'bomby'),
			'subtitle'=> esc_html__('If on, title wrapper will not be displayed.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id'=>'blog-boxed-page',
			'type' => 'switch', 
			'title' => esc_html__('Display Blog Boxed?', 'bomby'),
			'subtitle'=> esc_html__('If on, the blog will be displayed in a boxed layout.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'blog-first-featured',
			'type' => 'switch', 
			'title' => esc_html__('First Post Featured?', 'bomby'),
			'subtitle'=> esc_html__('If on, the first post will receive a different template.', 'bomby'),
			"default" => 0,
			'required' => array( 'blog-layout', '=', array('masonry') ),
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Effects/Additional Styles', 'bomby')
		),

		array(
			'id'=>'blog-boxed-style',
			'type' => 'switch', 
			'title' => esc_html__('Enable boxed style?', 'bomby'),
			'subtitle'=> esc_html__('If on, posts will be displayed in a boxed style. Useful when using custom background colors.', 'bomby'),
			"default" => 0,
			'required' => array( 'blog-layout', '!=', array('masonry') ),
		),

		array(
			'id'=>'blog-disable-thumb',
			'type' => 'switch', 
			'title' => esc_html__('Disable Thumbnails?', 'bomby'),
			'subtitle'=> esc_html__('If on, thumbnails will not be displayed in the blog.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id'=>'blog-hover-thumb',
			'type' => 'switch', 
			'title' => esc_html__('Enable Hover Effect in Thumbnail?', 'bomby'),
			'subtitle'=> esc_html__('If on, the effect will be displayed in thumbnail images.', 'bomby'),
			"default" => 0,
		),

		array(
			'id'=>'blog-gray-thumb',
			'type' => 'switch', 
			'title' => esc_html__('Enable Grayscale Effect in Thumbnail?', 'bomby'),
			'subtitle'=> esc_html__('If on, the effect will be displayed in thumbnail images.', 'bomby'),
			"default" => 0,
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Archives', 'bomby')
		),

		array(
			'id'=>'archives-disable-title',
			'type' => 'switch', 
			'title' => esc_html__('Disable Title Wrapper?', 'bomby'),
			'subtitle'=> esc_html__('If on, title wrapper will not be displayed in archives pages.', 'bomby'),
			'on' => 'Disable',
			'off' => 'Enable',
			"default" => 0,
		),

		array(
			'id' => 'random-templates',
			'type' => 'info',
			'desc' => esc_html__('Advanced Configuration', 'bomby')
		),

		array(
			'id'=>'blog-thumb-size',
			'type' => 'text',
			'title' => esc_html__('Custom Blog Thumbnail Size', 'bomby'), 
			'subtitle' => esc_html__('Select a custom thumbnail size to your blog.', 'bomby'),
			'description' => 'Type the thumbnail name like "full", "medium" or a custom size defined.',
			'default' => '',
		),
		
	), // #fields
);
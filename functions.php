<?php
/**
 * Main functions and definitions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 */
load_theme_textdomain( 'bomby', get_template_directory() . '/languages' );

/**
 * Set Google Fonts API KEY to use web fonts in the panel.
 */
define( 'IVAN_GFONTS_API_KEY', 'AIzaSyDJZ--QexTX-NAgc__L5oBS68SU6urdCds' );
define( 'IVAN_USING_THEME', true ); // used by a few plugins provided by us... do not modify.
define( 'IVAN_DEBUG', true );

/**
 * Include Ivan Framework main init file.
 */
require get_template_directory() . '/framework/ivan-framework.php';

if ( ! function_exists( 'ivan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ivan_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'infinite-scroll', array(
		'container' => 'post-list',
		'type' => 'click',
		'wrapper' => false,
		'render' => 'ivan_custom_render_infine',
		) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('bomby_blog_quad', 400, 400, true);
	add_image_size('bomby_blog_medium', 900, 900, false);
	add_image_size('bomby_blog_medium_crop', 900, 900, true);
	add_image_size('bomby_blog_large', 1200, 800, false);
	add_image_size('bomby_blog_large_crop', 1200, 800, true);
	add_image_size('bomby_blog_related', 360, 170, true);
	add_image_size('bomby_widget_thumb', 40, 40, true);
	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	$ivan_menu_locations = ivan_get_menu_locations();

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( $ivan_menu_locations );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );

}
endif; // ivan_setup
add_action( 'after_setup_theme', 'ivan_setup' );

function ivan_get_menu_locations() {

	return array(
		'primary' => esc_html__( 'Primary Menu', 'bomby' ),
		'primary_module' => esc_html__( 'Header Module Menu', 'bomby' ),
		'secondary' => esc_html__( 'Secondary Menu', 'bomby' ),
		'bottom_footer' => esc_html__( 'Bottom Footer Menu', 'bomby' ),
	);
}


add_filter('ivan_megamenu_get_option', 'ivan_megamenu_get_option', 10, 2);
function ivan_megamenu_get_option($key, $return) {
	if('mega_menu_locations' == $key) {
		$return[] = 'primary';
		$return[] = 'primary_module';
		$return[] = 'secondary';
		$return[] = 'bottom_footer';
	}

	return $return;
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function ivan_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'bomby' ),
		'description'   => esc_html__( 'Widgets displayed at right side of content.', 'bomby' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	if (class_exists('ReduxFramework')) {

		register_sidebar( array(
			'name'          => esc_html__( 'Secondary Sidebar', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at left side of content when the layout supports it.', 'bomby' ),
			'id'            => 'sidebar-secondary',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Aside Sidebar', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at aside layout left or right.', 'bomby' ),
			'id'            => 'sidebar-aside',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Side Header Sidebar', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at header style Horizontal With Sidebar.', 'bomby' ),
			'id'            => 'sidebar-side-header',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar #1', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at footer.', 'bomby' ),
			'id'            => 'widgets-footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar #2', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at footer.', 'bomby' ),
			'id'            => 'widgets-footer-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar #3', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at footer.', 'bomby' ),
			'id'            => 'widgets-footer-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar #4', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at footer.', 'bomby' ),
			'id'            => 'widgets-footer-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar #5', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at footer.', 'bomby' ),
			'id'            => 'widgets-footer-5',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at shop.', 'bomby' ),
			'id'            => 'shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Product Sidebar', 'bomby' ),
			'description'   => esc_html__( 'Widgets displayed at single product.', 'bomby' ),
			'id'            => 'product-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	
	}
	
	//adding custom sidebars defined in theme options
	$custom_sidebars =  ivan_get_option('custom-sidebars');

	if (is_array($custom_sidebars) && !empty($custom_sidebars[0])) {
		foreach ($custom_sidebars as $sidebar) {
			register_sidebar ( array (
                'name' => $sidebar,
                'id' => sanitize_title($sidebar),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
            ) );
		}
	}

}
add_action( 'widgets_init', 'ivan_widgets_init' );

add_filter('cs_sidebar_params', 'ivan_adjust_new_sidebars');
function ivan_adjust_new_sidebars($sidebar) {

	$sidebar['before_widget'] = '<div id="%1$s" class="widget %2$s">';
	$sidebar['after_widget']  = '</div>';
	$sidebar['before_title'] = '<h3 class="widget-title">';
	$sidebar['after_title']  = '</h3>';

	return $sidebar;
}

define('IVAN_CUSTOM_SIDEBAR_DISABLE_METABOXES', true);


/**
 * Prepare google fonts array
 */
function ivan_prepare_google_fonts_url() {

	/* Translators: If there are characters in your language that are not
	* supported by Montserrat, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$montserrat = esc_html_x( 'on', 'Source Sans Pro font: on or off', 'bomby' );

	/* Translators: If there are characters in your language that are not
	* supported by Raleway, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$raleway = esc_html_x( 'on', 'Lora font: on or off', 'bomby' );

	
	if ($montserrat !== 'off' || $raleway !== 'off') {
		$font_families = array();
	}
	
	if ( $montserrat !== 'off' ) { 
		$font_families[] = 'Varela Round:400';
	}

	if ( $raleway !== 'off' ) { 
		$font_families[] = 'Quicksand:400';
	}

	$character_sets = ivan_get_option('character-sets');
	
	$sets = array('latin');
	if (is_array($character_sets)) {
		foreach ($character_sets as $set => $val) {
			if ($val == 1) {
				$sets[] = $set;
			}
		}
	}
	
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( implode( ',', $sets ) ),
	);
	
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue google fonts
 */
function ivan_google_fonts() {
	
	/**
	* Enqueue theme default WebFonts
	*/
	if( false == ivan_get_option('remove-default-fonts') ) :

		wp_enqueue_style( 'ivan-fonts', ivan_prepare_google_fonts_url(), array(), null ); 

	endif;

	
}
add_action( 'wp_enqueue_scripts', 'ivan_google_fonts' );

/**
 * Enqueue scripts and styles.
 */
function ivan_scripts() {

	$prefix = '';
	
	$protocol = is_ssl() ? 'https://' : 'http://';

	/**
	* Local Owl Carousel Version
	**/
	wp_register_script( 'owl_carousel', get_template_directory_uri() . '/css/libs/owl-carousel/owl.carousel'.$prefix.'.js', array('jquery'), '1.0', true );
	wp_register_style( 'owl_carousel', get_template_directory_uri() . '/css/libs/owl-carousel/owl.carousel'.$prefix.'.css' );

	wp_register_script( 'media-element', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', array(), '0.9.9' );
		
	

	/**
	* Enqueue theme stylesheets
	*/

		// Register Font Awesome and enqueue it.
		// Source: http://fortawesome.github.io/Font-Awesome/
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/libs/font-awesome-css/font-awesome.min.css', array(), '4.1.0' );
		
		// Register Elegant Icons Set 2 and enqueue it.
		// Source: http://fortawesome.github.io/Font-Awesome/
		wp_enqueue_style( 'elegantfont-icons', get_template_directory_uri() . '/css/libs/elegantfont-icons/el-style.css', array(), '1.0' );
		
		// Register Elegant Icons and enqueue it.
		// Infos: 100 icons
		wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/css/libs/elegant-icons/elegant-icons.min.css', array(), '1.0' );
		
		// Register Magnific Popup and enqueue it.
		// Source: http://github.com/dimsemenov/Magnific-Popup
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/libs/magnific-popup/magnific-popup.min.css', array(), '0.9.9' );
		
		wp_register_style( 'mediaelementplayer', get_template_directory_uri() . '/css/mediaelementplayer.css', array(), '4.1.0' );
		wp_register_style( 'mejs-skins', get_template_directory_uri() . '/css/mejs-skins.css', array(), '4.1.0' );


		// Enqueue Dashicons font family used in Post Formats.
		// Only post formats icons are used by our theme
		if( true == is_home() OR true == is_archive() OR true == is_single() ) { // Only enqueue it when the blog is being displayed
			wp_enqueue_script( 'owl_carousel' );
			wp_enqueue_style( 'owl_carousel' );
		}

		// Register main theme styles and enqueue it.
		// Hint: you can unregister it and replace by your own compiled version in a child theme.
		wp_enqueue_style( 'ivan-theme-styles', get_template_directory_uri() . '/css/theme-styles'.$prefix.'.css', array(), '1' );
		
		wp_enqueue_style( 'ivan-theme-styles', get_template_directory_uri() . '/css/responsive.css'.$prefix.'.css', array(), '1' );

		wp_enqueue_style( 'ivan-theme-shortcodes', get_template_directory_uri() . '/css/theme-shortcodes'.$prefix.'.css', array(), '1' );

		// Enqueue default style.css stylesheet.
		// Hint: use it to create a child theme or add simple custom rules.
		wp_enqueue_style( 'ivan-default-style', get_stylesheet_uri() );

		// Enqueue IE conditional styles
		global $wp_styles;
		wp_enqueue_style('ivan-ie-theme-styles', get_template_directory_uri() . '/css/ie.css', array(), null);
		$wp_styles->add_data( 'ivan-ie-theme-styles', 'conditional', 'IE' );

		/**
		* Enqueue theme scripts
		*/
						
		wp_enqueue_script( 'ivan-plugins', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '1', true );
		
		// Register theme scripts and enqueue it.
		wp_register_script( 'ivan-theme-scripts', get_template_directory_uri() . '/js/theme-scripts'.$prefix.'.js', array( 'jquery', 'ivan-plugins' ), '1', true );
		
		// Localize Args
		$localizeArgs = array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ), 
			'nonce' => wp_create_nonce( 'ajax-nonce' ),
			'preload' => false,
			'fill_all_required_fields' => esc_html__('Fill all required fields!', 'bomby'),
			'sending' => esc_html__('Sending', 'bomby'),
			'sending' => esc_html__('Sending', 'bomby'),
		);
		
		if(true == ivan_get_option('enable-preloader'))
			$localizeArgs['preload'] = true;

		wp_localize_script( 'ivan-theme-scripts', 'ivan_theme_scripts', $localizeArgs );

		 if (ivan_get_option('footer-floating-contact-form')) {
			 
			wp_enqueue_script( 'recaptcha-api', 'https://www.google.com/recaptcha/api.js', array(), 1, true);
			 
			// Localize Args
			$langArgs = array( 
				'fill_all_required_fields' => esc_html__('Fill all required fields!', 'bomby'),
				'sending' => esc_html__('Sending...', 'bomby'),
				'send' => esc_html__('Send', 'bomby'),
				'sent' => esc_html__('Sent', 'bomby'),
				'form_already_submitted' => esc_html__('Form already submitted!', 'bomby'),
				'thank_you' => esc_html__('Thank you!', 'bomby'),
				'failed_config_error' => esc_html__('Sending failed. Configuration error!', 'bomby'),
				'failed_server_error' => esc_html__('Sending failed. Server error!', 'bomby'),
			);
			wp_localize_script( 'ivan-theme-scripts', 'ivan_lang', $langArgs );
		}

		wp_enqueue_script( 'ivan-theme-scripts' );
		
		// Enqueue reply comment default script in single posts, if possible.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
}
add_action( 'wp_enqueue_scripts', 'ivan_scripts', 99 );

/**
 * Enqueue scripts and styles.
 */
function ivan_styles_rtl() {

	// RTL Only: Enqueue rtl.css stylesheet if locale is RTL
	if( true == is_rtl() ) {
		wp_enqueue_style( 'ivan-theme-styles-rtl', get_template_directory_uri() . '/css/rtl.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'ivan_styles_rtl', 200 );

function ivan_megamenu_fonts() {
	// Register Font Awesome and enqueue it.
	// Source: http://fortawesome.github.io/Font-Awesome/
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/libs/font-awesome-css/font-awesome.min.css', array(), '4.1.0' );

	// Register Elegant Icons and enqueue it.
	// Infos: 100 icons
	wp_register_style( 'elegant-icons', get_template_directory_uri() . '/css/libs/elegant-icons/elegant-icons.min.css', array(), '1.0' );
	
	// Register Elegant Icons Set 2 and enqueue it.
	wp_enqueue_style( 'elegantfont-icons', get_template_directory_uri() . '/css/libs/elegantfont-icons/el-style.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'ivan_megamenu_fonts');

// Ensures Ivan Visual Composer use Local CSS Files
define('IVAN_VC_LOCAL_GRID', true);
define('IVAN_VC_LOCAL_STYLES', true);
define('IVAN_VC_LOCAL_FONTS', true);
define('IVAN_VC_LOCAL_OWL', true);

// Ivan VC Container
add_filter('ivan_vc_container_selector', 'ivan_vc_container_selector_theme');
function ivan_vc_container_selector_theme($container) {

	if(false == ivan_get_option('page-boxed-page'))
		$container = '.content-wrapper';
	else
		$container = '.boxed-page-wrapper';

	return $container;
}

function ivan_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'ivan_comments_off' );

/**
 * Override 404 page
 */
function ivan_404_page() {
	
	if (is_404()) {
	
		//override 404 page with page
		$page_id = ivan_get_option('404-page');
		if (!empty($page_id)) {

			$args = array(
				'page_id' => $page_id
			);
			query_posts( $args );
			the_post();

			if (is_page()) {
				rewind_posts();
			} else {
				wp_reset_postdata();
			}
		}
	}
}
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
add_action( 'wp', 'ivan_404_page', 99);

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function ivan_import_files() {
  return array(
    array(
      'import_file_name'             => esc_html__( 'Demo Import', 'bomby' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'theme-configs/dummy_importer/demos/default/data.xml',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'theme-configs/dummy_importer/demos/default/redux.json',
          'option_name' => 'iv_aries',
        ),
      ),
      'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'bomby' ),
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'ivan_import_files' );
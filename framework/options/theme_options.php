<?php
/**
 * Theme Configuration built with Redux Framework
 * NOTICE: You should not remove this file, keep updating only /ReduxFramework folder
 * */

if (!class_exists("Redux_Framework_Ivan_Config")) {

	class Redux_Framework_Ivan_Config {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if ( !class_exists("ReduxFramework" ) ) {
				return;
			}	

			$this->initSettings();
		}

		public function initSettings() {
			
			// Just for demo purposes. Not needed per say.
			$this->theme = wp_get_theme();

			// Set the default arguments
			$this->setArguments();

			// Set a few help tabs so you can see how it's done

			// Create the sections and fields
			$this->setSections();

			if (!isset($this->args['opt_name'])) { // No errors please
				return;
			}

			
			// Change the arguments after they've been declared, but before the panel is created
			add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

			add_filter( "redux/".$this->args['opt_name']."/field/class/social_select", array( $this, "overload_social_select_field_path" ) );
			add_filter( "redux/".$this->args['opt_name']."/field/class/spacing_mod", array( $this, "overload_spacing_mod_field_path" ) );
			add_filter( "redux/".$this->args['opt_name']."/field/class/button_set_mod", array( $this, "overload_button_set_mod_field_path" ) );
			add_filter( "redux/".$this->args['opt_name']."/field/class/border_mod", array( $this, "overload_border_mod_field_path" ) );

			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
		}

		/**
		*
		*  This is a test function that will let you see when the compiler hook occurs.
		*  It only runs if a field	set with compiler=>true is changed.
		*
		 * */
		function compiler_action($options, $css) {
			
		}

		/**
		*
		*  Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
		*
		 * */
		function change_arguments($args) {
			
			$args['dev_mode'] = false;

			return $args;
		}

		/**
		*
		*  Filter hook for filtering the default value of any given field. Very useful in development mode.
		*
		 * */
		function change_defaults($defaults) {
			$defaults['str_replace'] = "Testing filter hook!";

			return $defaults;
		}

		public function setSections() {

			ob_start();

			$ct = wp_get_theme();
			$this->theme = $ct;
			$item_name = $this->theme->get('Name');
			$tags = $this->theme->Tags;
			$screenshot = $this->theme->get_screenshot();
			$class = $screenshot ? 'has-screenshot' : '';

			$customize_title = sprintf(esc_html__('Customize &#8220;%s&#8221;', 'bomby'), $this->theme->display('Name'));
			?>
			<div id="current-theme" class="<?php echo esc_attr($class); ?>">
			<?php if ($screenshot) : ?>
				<?php if (current_user_can('edit_theme_options')) : ?>
						<a href="<?php echo esc_url(wp_customize_url()); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
							<img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'bomby'); ?>" />
						</a>
				<?php endif; ?>
					<img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview', 'bomby'); ?>" />
			<?php endif; ?>

				<h4>
			<?php echo esc_html($this->theme->display('Name')); ?>
				</h4>

				<div>
					<ul class="theme-info">
						<li><?php printf(esc_html__('By %s', 'bomby'), $this->theme->display('Author')); ?></li>
						<li><?php printf(esc_html__('Version %s', 'bomby'), $this->theme->display('Version')); ?></li>
						<li><?php echo '<strong>' . esc_html__('Tags', 'bomby') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
					</ul>
					<p class="theme-description"><?php echo wp_kses_post($this->theme->display('Description')); ?></p>
				</div>

			</div>

			<?php
			$item_info = ob_get_contents();

			ob_end_clean();

			// GET PATTENRS AVALIABLE TO THIS THEME
			
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

			do_action('ivan_before_theme_opts');

			// ACTUAL DECLARATION OF SECTIONS

			include_once(get_template_directory().'/framework/options/sections/general.php' );

			include_once(get_template_directory().'/framework/options/sections/layout.php');

			include_once(get_template_directory().'/framework/options/sections/header.php');

			include_once(get_template_directory().'/framework/options/sections/title_wrapper.php');

			include_once(get_template_directory().'/framework/options/sections/content.php');

			include_once(get_template_directory().'/framework/options/sections/top_header.php');

			include_once(get_template_directory().'/framework/options/sections/footer.php');

			include_once(get_template_directory().'/framework/options/sections/bottom_footer.php');
			
			include_once(get_template_directory().'/framework/options/sections/sidebars.php');

			$this->sections[] = array(
				'type' => 'divide',
			);

			include_once(get_template_directory().'/framework/options/sections/blog.php');
			include_once(get_template_directory().'/framework/options/sections/single.php');

			include_once(get_template_directory().'/framework/options/sections/woo_templates.php');
			include_once(get_template_directory().'/framework/options/sections/pages.php');

			$this->sections[] = array(
				'type' => 'divide',
			);
			
			
			include_once(get_template_directory().'/framework/options/sections/basic_customizer.php');

			include_once(get_template_directory().'/framework/options/sections/favicon.php');

			include_once(get_template_directory().'/framework/options/sections/custom_code.php');

			if( IVAN_DEBUG == true ) :

				$theme_info = '<div class="redux-framework-section-desc">';
				$theme_info .= '<p class="redux-framework-theme-data description theme-uri"><strong>' . esc_html__('Theme URL:', 'bomby') . ' </strong><a href="' . esc_url($this->theme->get('ThemeURI')) . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-author"><strong>' . esc_html__('Author:', 'bomby') . ' </strong>' . $this->theme->get('Author') . '</p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-version"><strong>' . esc_html__('Version:', 'bomby') .' </strong>'. $this->theme->get('Version') . '</p>';
				$theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
				$tabs = $this->theme->get('Tags');
				if (!empty($tabs)) {
					$theme_info .= '<p class="redux-framework-theme-data description theme-tags"><strong>' . esc_html__('Tags:', 'bomby') . ' </strong>' . implode(', ', $tabs) . '</p>';
				}
				$theme_info .= '</div>';

				
				$this->sections[] = array(
					'type' => 'divide',
				);

				$this->sections[] = array(
					'icon' => 'el-icon-info-sign',
					'title' => esc_html__('Theme Information', 'bomby'),
					'desc' => '<p class="description">'.esc_html__('This is the Description. Again HTML is allowed', 'bomby').'</p>',
					'fields' => array(
						array(
							'id' => 'raw_new_info',
							'type' => 'raw',
							'content' => $item_info,
						)
					),
				);

			endif; // endif IVAN_DEBUG
		}

		public function setHelpTabs() {

			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$this->args['help_tabs'][] = array(
				'id' => 'redux-opts-1',
				'title' => esc_html__('Theme Information 1', 'bomby'),
				'content' => '<p>'.esc_html__('This is the tab content, HTML is allowed.', 'bomby').'</p>'
			);

			$this->args['help_tabs'][] = array(
				'id' => 'redux-opts-2',
				'title' => esc_html__('Theme Information 2', 'bomby'),
				'content' => '<p>'.esc_html__('This is the tab content, HTML is allowed.', 'bomby').'</p>'
			);

			// Set the help sidebar
			$this->args['help_sidebar'] = '<p>'.esc_html__('This is the sidebar content, HTML is allowed.', 'bomby').'</p>';
		}

		/**
		*
		*  All the possible arguments for Redux.
		*  For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		*
		 * */
		public function setArguments() {

			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire
				'opt_name' => IVAN_FW_THEME_OPTS, // This is where your data is stored in the database and also becomes your global variable name.
				'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
				'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
				'menu_type' => 'submenu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu' => true, // Show the sections below the admin menu item or not
				'menu_title' => esc_html__('Theme Options', 'bomby'),
				'page_title' => esc_html__('Theme Options', 'bomby'),
				// You will need to generate a Google API key to use this feature.
				// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
				'dev_mode' => IVAN_DEBUG, // Show the time the page took to load, etc
				'customizer' => false, // Enable basic customizer support
				// OPTIONAL Give you extra features
				'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
				'menu_icon' => '', // Specify a custom URL to an icon
				'last_tab' => '', // Force your panel to always open to a specific tab (by id)
				'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
				'page_slug' => '_options', // Page slug used to denote the panel
				'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
				'default_show' => false, // If true, shows the default value next to each field that is not the default value.
				'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
				// CAREFUL -> These options are for advanced use only
				'transient_time' => 60 * MINUTE_IN_SECONDS,
				'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'show_import_export' => true, // REMOVE
				'system_info' => IVAN_DEBUG, // REMOVE
				'help_tabs' => array(),
				'help_sidebar' => '', //
			);

		}

		public function overload_social_select_field_path( $field ) {
			return get_template_directory().'/framework/options/fields/social_select/field_social_select.php';
		}

		public function overload_spacing_mod_field_path( $field ) {
			return get_template_directory().'/framework/options/fields/spacing_mod/field_spacing_mod.php';
		}

		public function overload_button_set_mod_field_path( $field ) {
			return get_template_directory().'/framework/options/fields/button_set_mod/field_button_set_mod.php';
		}

		public function overload_border_mod_field_path( $field ) {
			return get_template_directory().'/framework/options/fields/border_mod/field_border.php';
		}


	}

	new Redux_Framework_Ivan_Config();
}
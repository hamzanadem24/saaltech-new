<?php
/**
 *
 * Template Part called at class Ivan_Layout_Vertical_Header_Modern
 *
 * @package   IvanFramework
 */

	wp_enqueue_script( 'dlmenu' );

	// Variable used to display additional classes in the layout.
	$_classes = '';
	$_class_color_scheme = '';
	
	// If header has negative height
	if( true == ivan_get_option( 'header-negative-height' ) ) :

		// Apply color scheme to header
		$_class_color_scheme = ivan_get_option( 'header-color-scheme' );
		$_classes .= ' ' . ivan_get_option( 'header-color-scheme' );

	endif;

	// Locally Disabled Modules
	$disabled_items = ivan_get_post_option( 'header-local-disabled-modules' );
	if( $disabled_items == null )
		$disabled_items = array();

	$enabled_items = ivan_get_post_option( 'header-local-enabled-modules' );
	if( $enabled_items == null )
		$enabled_items = array();

	$_classes = esc_attr( $_classes ); // escape classes to attribute

?>
<div class="iv-layout header style7 <?php echo ivan_sanitize_html_classes($_class_color_scheme); ?>">
	<div class="container">
		<div class="nav-trigger">
			<a class="dl-trigger" href="#">
				<span class="bars">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
		</div><!-- /nav-trigger -->
	</div><!-- /container -->
	<div class="menu-items-container">
		
			<?php
				$menu_args = array(
					'theme_location' => 'primary',
					'container' => 'div',
					'container_id' => 'dl-menu',
					'container_class' => 'menu-items dl-menuwrapper',
					'menu_id' => 'menu-primary-menu',
					'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' dl-menu',
					'menu_holder' => 'centered',
				);

				Ivan_Module_Menu::display( $menu_args ); 
			?>
		
	</div><!-- /menu-items-container -->
</div><!-- /header -->

<div class="<?php apply_filters('iv_aside_container', 'ivan-ml-aside-container'); ?>">
	<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header vertical modern ps-container '. $_classes ); ?>">
		<div class="background-container"></div>
		<div id="particles-js"></div>
		<div class="menu-bar clearfix">
			<div class="nav-trigger">
				<a class="dl-trigger" href="#">
					<span class="bars">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
			</div><!-- /nav-trigger -->
			
			<div class="logo-container">
				<?php Ivan_Module_Logo::display(); ?>
			</div><!-- /logo-container -->
		</div><!-- /menu-bar -->
		<div class="content">
			<?php do_action('ivan_display_title'); // Display Title ?>
			<?php // Display optional description of home
			if( is_home() || is_singular('post') ) :
				if( ivan_get_option('title-desc-blog') != '' ) : ?>
						<h5><?php echo nl2br(ivan_get_option('title-desc-blog')); ?></h5>
				<?php 
				endif;

			 // Display optional description to pages or projects, for example
			elseif( is_singular() ) :
				if( ivan_get_post_option('title-sub-text') != '' ) : ?>
					<h5>
						<?php echo nl2br(ivan_get_post_option('title-sub-text')); ?>
					</h5>
				<?php 
				endif;
			endif;
			?>
		</div><!-- /content -->
		<div class="bottom-sec">
			<?php
				if( ivan_get_option( 'header-social-switch' ) || in_array('social_icons', $enabled_items) == true ) :
						if( in_array('social_icons', $disabled_items) == false )
							Ivan_Module_Social_Icons::display( 'header-social-icons', 'hidden-xs hidden-sm' ); // @todo: replace 'option_id' by the correct option ID
						endif;
			?>

			<div class="iv-module custom-text hidden-xs hidden-sm">
				<div class="centered">
					<?php
					if( ivan_get_option( 'bottom-footer-text-switch' ) ) :	
						Ivan_Module_Custom_Text::display( 'bottom-footer-text-content', 'footer-compact-text' );
					endif;
					?>
					
				</div>
			</div>
		</div>
	</div><!-- /header -->
</div><!-- /ivan-ml-aside-container -->
<?php
/**
 *
 * Template Part called at class Ivan_Layout_Header_Horizontal_With_Sidebar
 *
 * @package   IvanFramework
 */

?>


<?php
	// Variable used to display additional classes in the layout.
	$_classes = '';

	// Check if Fixed Header option is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-fixed-switch', ' header-fixed', '' );

	// Check if Lateral Lines in modules is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-lateral-lines-switch', ' lateral-lines', '' );

	// Check if Negative Height is enabled and output the respective class.
	$_classes .= ivan_get_option_display( 'header-negative-height', ' negative-height', '' );

	// If header has negative height
	if( true == ivan_get_option( 'header-negative-height' ) ) :

		// Display After Fold
		$_classes .= ivan_get_option_display( 'header-after-fold', ' show-after-fold display-after-fold', '' );

		// Used to keep showing the logo even before the page fold
		$_classes .= ivan_get_option_display( 'header-after-fold-logo', ' keep-logo-before-fold', '' );

		// Apply background type to header
		$_classes .= ' ' . ivan_get_option( 'header-bg-type' );

		// Apply color scheme to header
		$_classes .= ' ' . ivan_get_option( 'header-color-scheme' );

		// Apply boxed layout to header
		$_classes .= ivan_get_option_display( 'header-boxed-layout', ' simple-boxed-menu', '' );

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
<div class="sticky-wrapper header-sticky-wrapper">
	<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header style6'. $_classes ); ?>">
		<div class="row">
			<div class="col-lg-9 col-md-10 header-left-area">

				<?php Ivan_Module_Logo::display(); ?>
				
					<?php
						// Check the responsive menu type to be used...
						if( true != ivan_get_option('header-select-menu-switch') ) :
							Ivan_Module_Responsive_Menu::display('.header', 'header-menu-wrap');
						else:
							// Display responsive menu in a select
							Ivan_Module_Responsive_Menu_Select::display('.header .menu');
						endif;
					?>

					<?php

					$menu_args = array(
						'theme_location' => 'primary',
						'container' => 'div',
						'container_class' => 'hidden-xs hidden-sm iv-module-menu menu-wrapper' . ivan_get_option_display( 'header-menu-pull-center-switch', ' centralized-menu', ' pull-left' ),
						'menu_id' => 'menu-primary-menu',
						'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu' . ' height-fixed',
						'menu_holder' => 'centered',
					);

					Ivan_Module_Menu::display( $menu_args ); 
					?>

					<?php
					$switcher = '';
					if( ivan_get_option( 'header-sidebar-switcher' ) || in_array('sidebar_switcher', $enabled_items) == true ) :
						if( in_array('sidebar_switcher', $disabled_items) == false ):
							Ivan_Module_Sideheader_Trigger::display(ivan_get_option( 'header-sidebar-switcher-text' ));
						endif;
					endif; ?>
			</div>
			<div class="col-lg-3 col-md-2 header-right-area">
				<?php 
				if( !ivan_get_option( 'header-disable-main-sidebar-switcher' ) || in_array('alt_sidebar_switcher', $enabled_items) == true ) :
					if( in_array('alt_sidebar_switcher', $disabled_items) == false )
						Ivan_Module_Sideheader_Trigger::display();
				endif;
				?>

				<?php
					if( ivan_get_option( 'header-woo-cart-switch' ) || in_array('woo_cart', $enabled_items) == true ) :
						if( in_array('woo_cart', $disabled_items) == false )
							Ivan_Module_Woo_Cart::display();
					endif;
				?>

				<?php
				if( ivan_get_option( 'header-search-switch' ) || in_array('live_search', $enabled_items) == true ) :
					if( in_array('live_search', $disabled_items) == false ):
						$style = Ivan_Module_Live_Search::get_style_class('header-search-style');
						Ivan_Module_Live_Search::display($style);
					endif;
				endif; ?>
			</div>
		</div>
	</div>
</div>

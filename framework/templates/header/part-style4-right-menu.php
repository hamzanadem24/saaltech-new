<?php
/**
 *
 * Template Part called at class Ivan_Layout_Header_Style4_Right_Menu
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

<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header style4-right-menu apply-height '. $_classes ); ?>">
	<div class="row">

		<div class="col-xs-4 col-sm-2 col-md-3 col-lg-2 header-left-area">
			<?php Ivan_Module_Logo::display(); ?>
		</div>
		
		<div class="col-xs-8 col-sm-10 col-md-9 col-lg-10 header-right-area">

			<?php
			//determine where to put left border
			$border_left = false;
			if( ivan_get_option( 'header-woo-cart-switch' ) || in_array('woo_cart', $enabled_items) == true ) :
				if( in_array('woo_cart', $disabled_items) == false )
					$border_left = 'woo_cart';
			endif;
			if( ivan_get_option( 'header-woo-cart-total-switch' ) || in_array('woo_cart_total', $enabled_items) == true ) :
				if( in_array('woo_cart_total', $disabled_items) == false )
					$border_left = 'woo_cart_total';
			endif;
			if( ivan_get_option( 'header-search-switch' ) || in_array('live_search', $enabled_items) == true ) :
				if( in_array('live_search', $disabled_items) == false )
					$border_left = 'live_search';
			endif;
			if( ivan_get_option( 'header-login-ajax-switch' ) || in_array('login_ajax', $enabled_items) == true ) :
				if( in_array('login_ajax', $disabled_items) == false )	
					$border_left = 'login_ajax';
			endif;
			if( ivan_get_option( 'header-social-switch' ) || in_array('social_icons', $enabled_items) == true ) :
				if( in_array('social_icons', $disabled_items) == false )
					$border_left = 'social_icons';
			endif;
			if( ivan_get_option( 'header-text-switch' ) || in_array('text_module', $enabled_items) == true ) :
				if( in_array('text_module', $disabled_items) == false )	
					$border_left = 'text_module';
			endif;
			?>
			
			<?php
				if( ivan_get_option( 'header-woo-cart-switch' ) || in_array('woo_cart', $enabled_items) == true ) :
					if( in_array('woo_cart', $disabled_items) == false )
						Ivan_Module_Woo_Cart::display(($border_left == 'woo_cart' ? 'border-left' : ''));
				endif;
			?>
			
			<?php
				if( ivan_get_option( 'header-woo-cart-total-switch' ) || in_array('woo_cart_total', $enabled_items) == true ) :
					if( in_array('woo_cart_total', $disabled_items) == false )
						Ivan_Module_Woo_Cart_Total::display(($border_left == 'woo_cart_total' ? 'border-left' : ''));
				endif;
			?>

			<?php
			if( ivan_get_option( 'header-search-switch' ) || in_array('live_search', $enabled_items) == true ) :
				if( in_array('live_search', $disabled_items) == false ):
					$style = Ivan_Module_Live_Search::get_style_class('header-search-style');
					Ivan_Module_Live_Search::display(($border_left == 'live_search' ? 'border-left' : '').' '.$style);
				endif;
			endif; ?>

			<?php
				if( ivan_get_option( 'header-login-ajax-switch' ) || in_array('login_ajax', $enabled_items) == true ) :
					if( in_array('login_ajax', $disabled_items) == false )	
						Ivan_Module_Login_Ajax::display(($border_left == 'login_ajax' ? 'border-left' : ''));
				endif;
			?>

			<?php
				if( ivan_get_option( 'header-social-switch' ) || in_array('social_icons', $enabled_items) == true ) :
							if( in_array('social_icons', $disabled_items) == false )
								Ivan_Module_Social_Icons::display( 'header-social-icons', 'hidden-xs hidden-sm' ); // @todo: replace 'option_id' by the correct option ID
							endif;
			?>

			<?php
			if( ivan_get_option( 'header-text-switch' ) || in_array('text_module', $enabled_items) == true ) :
				if( in_array('text_module', $disabled_items) == false )	
					Ivan_Module_Custom_Text::display( 'header-text-content', 'hidden-xs hidden-sm '.($border_left == 'text_module' ? 'border-left' : '') );
			endif;
			?>

			<?php
			if( true == ivan_get_option('header-menu-module-switch') || in_array('menu_module', $enabled_items) == true ) :

				if( in_array('menu_module', $disabled_items) == false ) {
					$menu_args = array(
						'theme_location' => 'primary_module',
						'container' => 'div',
						'container_class' => 'hidden-xs hidden-sm iv-module-menu menu-wrapper',
						'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu',
						'menu_holder' => 'centered'
						);

					Ivan_Module_Menu::display( $menu_args );

					// Check the responsive menu type to be used...
					if( true != ivan_get_option('header-select-menu-switch') ) :
						Ivan_Module_Responsive_Menu::display('.header .primary_module', 'header-menu-module-wrap');
					else:
						// Display responsive menu in a select
						Ivan_Module_Responsive_Menu_Select::display('.header .primary_module .menu');
					endif;
				}

			endif;
			?>

			<?php
				// Check the responsive menu type to be used...
				if( true != ivan_get_option('header-select-menu-switch') ) :
					Ivan_Module_Responsive_Menu::display('.header .primary', 'header-menu-wrap');
				else:
					// Display responsive menu in a select
					Ivan_Module_Responsive_Menu_Select::display('.header .primary .menu');
				endif;
			?>

			<?php 
			$menu_args = array(
				'theme_location' => 'primary',
				'container' => 'div',
				'container_class' => 'light-submenu hidden-xs hidden-sm iv-module-menu menu-wrapper' . ivan_get_option_display( 'header-menu-pull-left-switch', ' pull-left', '' ),
				'menu_class' => ''.ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu' . '',
				'menu_holder' => 'centered'
				);

			Ivan_Module_Menu::display( $menu_args ); 
			?>
		</div>

	</div>
</div>
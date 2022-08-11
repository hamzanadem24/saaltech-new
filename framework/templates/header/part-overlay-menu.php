<?php
/**
 *
 * Template Part called at class Ivan_Layout_Overlay_Menu
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

	//var_dump($enabled_items);
	if( $enabled_items == null )
		$enabled_items = array();

	$_classes = esc_attr( $_classes ); // escape classes to attribute

?>

<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header simple-right-menu apply-height '. $_classes ); ?>">
	<div class="container">
		<div class="row">

			<div class="<?php ivan_header_dimensions('logo', 2); ?> header-left-area">
				<?php Ivan_Module_Logo::display(); ?>
			</div>
			
			<div class="<?php ivan_header_dimensions('modules', 2); ?>  header-right-area">

				<?php
					// Check the responsive menu type to be used...
					if( true != ivan_get_option('header-select-menu-switch') ) :
						Ivan_Module_Overlay_Menu::display('.header .primary', 'header-menu-wrap');
					else:
						// Display responsive menu in a select
						Ivan_Module_Responsive_Menu_Select::display('.header .primary .menu');
					endif;
				?>

				<?php 
				$menu_args = array(
					'theme_location' => 'primary',
					'container' => 'div',
					'container_class' => 'hidden-xs hidden-sm hidden-md hidden-lg iv-module-menu menu-wrapper' . ivan_get_option_display( 'header-menu-pull-left-switch', ' pull-left', '' ),
					'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu' . '',
					'menu_holder' => 'centered'
					);

				Ivan_Module_Menu::display( $menu_args ); 
				?>
			</div>

		</div>					
	</div>
</div>
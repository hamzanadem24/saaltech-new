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

	// Locally Disabled Modules
	$disabled_items = ivan_get_post_option( 'header-local-disabled-modules' );
	if( $disabled_items == null )
		$disabled_items = array();

	$enabled_items = ivan_get_post_option( 'header-local-enabled-modules' );
	if( $enabled_items == null )
		$enabled_items = array();

	$_classes = esc_attr( $_classes ); // escape classes to attribute

?>

<div class="<?php echo apply_filters( 'iv_header_classes', 'iv-layout header vertical'. $_classes ); ?>">
	<div class="logo-container">
		<?php Ivan_Module_Logo::display(); ?>
	</div><!-- /logo-container -->
	<div class="menu-items">
		<?php
		$menu_args = array(
			'theme_location' => 'primary',
			'container' => 'div',
			'container_class' => 'menu-items',
			'menu_id' => 'menu-primary-menu',
			'menu_class' => ivan_get_option_display( 'header-v-sign-switch', ' with-arrow', '' ) . ' menu' . ' height-fixed',
			'menu_holder' => 'centered',
		);

		Ivan_Module_Menu::display( $menu_args ); 
		?>
	</div><!-- /menu-items -->
	<div class="bottom-sec">

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
		if( ivan_get_option( 'header-social-switch' ) || in_array('social_icons', $enabled_items) == true ) :
			if( in_array('social_icons', $disabled_items) == false )
				Ivan_Module_Social_Icons::display( 'header-social-icons', 'hidden-xs hidden-sm' ); // @todo: replace 'option_id' by the correct option ID
		endif;
		?>
		
		<?php
		if( ivan_get_option( 'header-text-switch' ) || in_array('text_module', $enabled_items) == true ) :
			if( in_array('text_module', $disabled_items) == false )	
				echo '<p>';
				Ivan_Module_Custom_Text::display( 'header-text-content', 'hidden-xs hidden-sm' );
				echo '</p>';
				
		endif;
		?>
	</div><!-- /bottom-sec -->
</div><!-- /header -->

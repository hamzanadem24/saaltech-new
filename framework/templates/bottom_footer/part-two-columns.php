<?php
/**
 *
 * Template Part called at class Ivan_Layout_Bottom_Footer_Two_Columns
 *
 * @package   IvanFramework
 */

?>

<?php
	$_classes = '';

	$menu_args = array(
		'theme_location' => 'bottom_footer',
		'container' => 'div',
		'container_class' => 'hidden-xs hidden-sm iv-module-menu menu-wrapper',
		'menu_class' => 'menu',
		'menu_holder' => 'centered',
		'depth' => 1,
	);
?>

<?php if( true == ivan_get_option('bottom-footer-da-before-enable') ) : ?>
<div class="<?php echo apply_filters('iv_dynamic_footer_classes', 'iv-layout dynamic-area dynamic-footer dynamic-bottom-footer-top'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

			<?php
				$_id = ivan_get_option('bottom-footer-da-before');
				ivan_display_dynamic_area( $_id );
			?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php
//Check if layout is not disabled - this check is being made here because Dynamic Areas should still be visible even
// without footer enabled...
if( true != ivan_get_option('bottom-footer-enable') ) :

	if( true == ivan_get_option('bottom-footer-expanded-paddings') ) {
		$_classes .= ' expanded-paddings';
	}
	
	if( 'light' == ivan_get_option('bottom-footer-color-scheme') ) {
		$_classes .= ' light';
	} else if( 'light-alt' == ivan_get_option('bottom-footer-color-scheme') ) {
		$_classes .= ' light-alt';
	}

?>

	<div class="<?php echo esc_attr( apply_filters( 'iv_bottom_footer_classes', 'iv-layout bottom-footer two-columns '. $_classes ) ); ?>">
		<div class="<?php echo (true != ivan_get_option('bottom-footer-fullwidth') ? 'container' : 'full-width-footer'); ?>">
			<div class="row">

				<?php
				// Responsive Columns
				$_responsiveCols = 8;
				$_responsiveColsXS = 10;

				// If right column is 0, our big column will be 12 at mobile as well...
				if( 0 == ivan_get_option('bottom-footer-right-width') ) {
					$_responsiveCols = 12;
					$_responsiveColsXS = 12;
				}
				
				$logo = ivan_get_option( 'bottom-footer-logo' );
				$logo_class = '';
				if( isset( $logo['url'] ) && '' != $logo['url'] ) {
					$logo_class = 'logo-enabled';
				}
				?>
				<div class="col-xs-<?php echo esc_attr($_responsiveColsXS); ?> col-sm-<?php echo esc_attr($_responsiveCols); ?> col-md-<?php echo esc_attr(ivan_get_option('bottom-footer-left-width') ); ?> bottom-footer-left-area <?php echo sanitize_html_class($logo_class); ?>">

					<?php
					if( isset( $logo['url'] ) && '' != $logo['url'] ) {
						echo '<figure>';
						echo '<img src="'. esc_url($logo['url']) . '" width="'. esc_attr($logo['width']) .'" height="'. esc_attr($logo['height']) .'" alt="'. esc_attr(get_bloginfo( 'name' )) .'" />';
						echo '</figure>';
					}

					if( ivan_get_option( 'bottom-footer-text-switch' ) ) :
						Ivan_Module_Custom_Text::display( 'bottom-footer-text-content', '' );
					endif;
					?>

					<?php 
					if( ivan_get_option('bottom-footer-menu-left-switch') == true && ivan_get_option('bottom-footer-menu-disable') == false ) {
						Ivan_Module_Menu::display( $menu_args );
					}
					?>

				<?php
				// If right column is greater than 0 display the markup
				if( 0 != ivan_get_option('bottom-footer-right-width') ) : ?>
				</div><div class="col-xs-2 col-sm-4 col-md-<?php echo ivan_get_option('bottom-footer-right-width'); ?> bottom-footer-right-area">
				<?php endif; ?>

					<?php
						if( ivan_get_option('bottom-footer-menu-disable') == false ) {
							Ivan_Module_Responsive_Menu::display('.bottom-footer', 'bottom-footer-menu-wrap');
						}
					?>
					
					<?php
					if( ivan_get_option('bottom-footer-menu-left-switch') != true && ivan_get_option('bottom-footer-menu-disable') == false ) {
						Ivan_Module_Menu::display( $menu_args );
					}
					?>

					<?php
					if( ivan_get_option( 'bottom-footer-social-switch' ) ) :
						Ivan_Module_Social_Icons::display( 'bottom-footer-social-icons', 'hidden-xs' ); // @todo: replace 'option_id' by the correct option ID
					endif;
					?>

				</div>

			</div>					
		</div>
	</div>

<?php
endif; // ends footer disabled check...
?>

<?php if( true == ivan_get_option('bottom-footer-da-after-enable') ) : ?>
<div class="<?php echo apply_filters('iv_dynamic_footer_classes', 'iv-layout dynamic-area dynamic-footer dynamic-bottom-footer-bottom'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

			<?php
				$_id = ivan_get_option('bottom-footer-da-after');
				ivan_display_dynamic_area( $_id );
			?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>
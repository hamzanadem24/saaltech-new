<?php
/**
 *
 * Template Part called at class Ivan_Layout_Bottom_Footer_Centered
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
	
	$logo = ivan_get_option( 'bottom-footer-logo' );
	$logo_class = '';
	if( isset( $logo['url'] ) && '' != $logo['url'] ) {
		$logo_class = 'logo-enabled';
	}
	
	

		

?>
	<div class="iv-layout footer footer-compact <?php echo ivan_sanitize_html_classes( $_classes ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					if( isset( $logo['url'] ) && '' != $logo['url'] ):
						echo '<div class="logo-container">';
						echo '<img src="'. esc_url($logo['url']) . '" width="'. esc_attr($logo['width']) .'" height="'. esc_attr($logo['height']) .'" alt="'. esc_attr(get_bloginfo( 'name' )) .'" />';
						echo '</div><!-- /logo-container -->';
					endif;
					
					if ( 'light-alt' == ivan_get_option('bottom-footer-color-scheme') ):
						if( ivan_get_option( 'bottom-footer-social-switch' ) ) :
							Ivan_Module_Social_Icons::display( 'bottom-footer-social-icons', '', 'ul' ); // @todo: replace 'option_id' by the correct option ID
						endif;
						
						if( ivan_get_option( 'bottom-footer-text-switch' ) ) :
							Ivan_Module_Custom_Text::display( 'bottom-footer-text-content', 'footer-compact-text' );
						endif;
												
					else:
						if( ivan_get_option( 'bottom-footer-text-switch' ) ) :
							Ivan_Module_Custom_Text::display( 'bottom-footer-text-content', 'footer-compact-text' );
						endif;
						
						if( ivan_get_option( 'bottom-footer-social-switch' ) ) :
							Ivan_Module_Social_Icons::display( 'bottom-footer-social-icons', '', 'ul' ); // @todo: replace 'option_id' by the correct option ID
						endif;
						
					endif; ?>
				</div><!-- /col-md-12 -->
			</div><!-- /row -->
		</div><!-- /container -->
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
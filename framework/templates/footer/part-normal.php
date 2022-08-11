<?php
/**
 *
 * Template Part called at class Ivan_Layout_Footer_Normal
 *
 * @package   IvanFramework
 */

$_classes = '';

?>

<?php if( true == ivan_get_option('footer-da-before-enable') ) : ?>
<div class="<?php echo apply_filters('iv_dynamic_footer_classes', 'iv-layout dynamic-area dynamic-footer dynamic-footer-top'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

			<?php
				$_id = ivan_get_option('footer-da-before');
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
if( true != ivan_get_option('footer-enable-switch') ) :
	
	if( 'light' == ivan_get_option('footer-color-scheme') ) {
		$_classes .= ' light';
	}
	
?>

	<div class="<?php echo esc_attr( apply_filters( 'iv_footer_classes', 'iv-layout footer footer-normal '. $_classes ) ); ?>">
		<div class="container">
			<div class="row">
				<?php
				if(0 != ivan_get_option('footer-column-1')) : ?>
					<div class="col-sm-6 col-md-<?php echo ivan_get_option('footer-column-1'); ?> widget-col widget-col-1">
						<?php if ( is_active_sidebar( ivan_get_custom_sidebar('widgets-footer-1', 'footer-sidebar-1-local') ) ): ?>
							<?php dynamic_sidebar( ivan_get_custom_sidebar('widgets-footer-1', 'footer-sidebar-1-local') ); ?>
						<?php endif;?>
					</div>
				<?php endif; ?>

				<?php
				if(0 != ivan_get_option('footer-column-2')) : ?>
					<div class="col-sm-6 col-md-<?php echo ivan_get_option('footer-column-2'); ?> widget-col widget-col-2">
						<?php if ( is_active_sidebar( ivan_get_custom_sidebar('widgets-footer-2', 'footer-sidebar-2-local') ) ): ?>
							<?php dynamic_sidebar( ivan_get_custom_sidebar('widgets-footer-2', 'footer-sidebar-2-local') ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php
				if(0 != ivan_get_option('footer-column-3')) : ?>
					<div class="col-sm-6 col-md-<?php echo ivan_get_option('footer-column-3'); ?> widget-col widget-col-3">
						<?php if ( is_active_sidebar( ivan_get_custom_sidebar('widgets-footer-3', 'footer-sidebar-3-local') ) ): ?>
							<?php dynamic_sidebar( ivan_get_custom_sidebar('widgets-footer-3', 'footer-sidebar-3-local') ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php
				if(0 != ivan_get_option('footer-column-4')) : ?>
					<div class="col-sm-6 col-md-<?php echo ivan_get_option('footer-column-4'); ?> widget-col widget-col-4">
						<?php if ( is_active_sidebar( ivan_get_custom_sidebar('widgets-footer-4', 'footer-sidebar-4-local') ) ): ?>
							<?php dynamic_sidebar( ivan_get_custom_sidebar('widgets-footer-4', 'footer-sidebar-4-local') ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				
				<?php
				if(0 != ivan_get_option('footer-column-5')) : ?>
					<div class="col-sm-6 col-md-<?php echo ivan_get_option('footer-column-5'); ?> widget-col widget-col-5">
						<?php if ( is_active_sidebar( ivan_get_custom_sidebar('widgets-footer-5', 'footer-sidebar-5-local') ) ): ?>
							<?php dynamic_sidebar( ivan_get_custom_sidebar('widgets-footer-5', 'footer-sidebar-5-local') ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>					
		</div>
	</div>

<?php
endif; // ends footer disabled check...
?>

<?php if( true == ivan_get_option('footer-da-after-enable') ) : ?>
<div class="<?php echo apply_filters('iv_dynamic_footer_classes', 'iv-layout dynamic-area dynamic-footer dynamic-footer-bottom'); ?>">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">

			<?php
				$_id = ivan_get_option('footer-da-after');
				ivan_display_dynamic_area( $_id );
			?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php
/**
 *
 * Template Part called at class Ivan_Layout_Title_Wrapper_Normal
 *
 * @package   IvanFramework
 */

$_classes = '';

// Alternative Color Schemes
if( ivan_get_option('title-wrapper-color-scheme') != null ) {
	$_classes .= ' ' . ivan_get_option('title-wrapper-color-scheme');
}

// Left Align
if( ivan_get_option('title-large-align') == true ) {
	$_classes .= ' align-left';
}

// Overlay
if( ivan_get_option('title-large-opacity') == true ) {
	$_classes .= ' add-overlay-opacity';
}

$_classes = esc_attr( $_classes ); // escape classes to attribute

?>

<div id="iv-layout-title-wrapper" class="<?php echo apply_filters( 'iv_title_wrapper_classes', 'iv-layout title-wrapper title-wrapper-large wrapper-background '. $_classes ); ?>">
	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12">
				<?php // Display optional description of home
				if( is_home() || is_singular('post') ) :
					if( ivan_get_option('title-desc-blog') != '' ) : ?>
						<div class="title-description">
							<p><?php echo nl2br(ivan_get_option('title-desc-blog')); ?></p>
						</div>
					<?php 
					endif;

				// Display optional description to pages or projects, for example
				elseif( is_singular() ) :
					if( ivan_get_post_option('title-sub-text') != '' ) : ?>
						<div class="title-description">
							<p><?php echo nl2br(ivan_get_post_option('title-sub-text')); ?></p>
						</div>
					<?php 
					endif;
				endif;
				?>
				
				<?php do_action('ivan_display_title'); // Display Title ?>
			</div>

		</div>
	</div>
	<div id="content-anchor" class="scroll-to-content"><a href="#content-anchor"><?php _e('Scroll', 'bomby'); ?><span></span></a></div>
</div>
<?php
/**
 *
 * Template Part called at class Ivan_Layout_Title_Wrapper_Large_With_Background
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

$_classes = esc_attr( $_classes ); // escape classes to attribute

$background = ivan_get_option('title-wrapper-bg');

?>
<div id="iv-layout-title-wrapper" class="<?php echo apply_filters( 'iv_title_wrapper_classes', 'iv-layout title-wrapper title-wrapper-large modern '. $_classes ); ?>">
	<div id="particles-js"></div>
	<?php if (isset($background['background-image'])): ?>
		<div class="title-wrapper-bg-container" data-stellar-ratio="0.8">
			<figure class="title-wrapper-bg">
				<img src="<?php echo esc_url($background['background-image']); ?>" alt="<?php the_title_attribute(); ?>">
			</figure>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<?php do_action('ivan_display_title'); // Display Title ?>
					<?php // Display optional description of home
					if( is_home() || is_singular('post') ) :
						if( ivan_get_option('title-desc-blog') != '' ) : ?>
							<h6 class="title-description"><?php echo nl2br(ivan_get_option('title-desc-blog')); ?></h6>
						<?php 
						endif;

					 // Display optional description to pages or projects, for example
					elseif( is_singular() ) :
						if( ivan_get_post_option('title-sub-text') != '' ) : ?>
							<h6 class="title-description"><?php echo nl2br(ivan_get_post_option('title-sub-text')); ?></h6>
						<?php 
						endif;
					endif;
					?>
				</div><!-- /content -->
			</div>
		</div>
	</div>
	<a href="#" class="move-down"><?php esc_html_e('Move Down', 'bomby'); ?></a>
</div>
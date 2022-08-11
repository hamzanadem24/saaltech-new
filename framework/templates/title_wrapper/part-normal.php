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

$_classes = esc_attr( $_classes ); // escape classes to attribute

?>

<div id="iv-layout-title-wrapper" class="<?php echo apply_filters( 'iv_title_wrapper_classes', 'iv-layout title-wrapper title-wrapper-normal wrapper-background '. $_classes ); ?>">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-8 col-sm-7 ivan-title-inner">
				<?php do_action('ivan_display_title'); // Display Title ?>

				<?php if( ivan_get_option('breadcrumb-enable') ) : ?>
					<?php get_template_part('framework/templates/title_wrapper/part', 'breadcrumb'); ?>
				<?php endif; ?>

			</div>

			<div class="col-lg-4 col-md-4 col-sm-5">
				<?php if ( ivan_get_option('search-enable') ) : ?>
					<form role="search" method="get" class="search-form-title" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" class="search-field" placeholder="<?php echo esc_attr__( 'Search &hellip;', 'bomby' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
						<div class="iconic-submit">
							<input type="submit" value="">
							<i class="fa fa-search"></i>
						</div>
					</form>
				<?php endif; ?>
			</div>

		</div>
	</div>
</div>
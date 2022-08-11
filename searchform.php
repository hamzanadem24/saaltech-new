<?php
/**
 * The template for displaying search forms in _s
 *
 * @package ivan_framework
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search &hellip;', 'bomby' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<input type="submit" class="search-submit" value="<?php echo esc_attr__( 'Search', 'bomby' ); ?>">
</form>
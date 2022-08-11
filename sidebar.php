<?php
/**
 * Primary Sidebar - displayed at right of content
 * The Sidebar containing the main widgets.
 *
 * @package ivan_framework
 */
?>
	<div class="col-md-3 sidebar" role="complementary">
		<div class="sidebar-inner">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( apply_filters('ivan_replace_sidebars', 'sidebar-primary' ) ) ) : ?>
				<?php dynamic_sidebar( apply_filters('ivan_replace_sidebars', 'sidebar-primary' ) ); ?>
			<?php else: ?>
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php esc_html_e( 'Archives', 'bomby' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php esc_html_e( 'Meta', 'bomby' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			<?php endif; // end sidebar widget area ?>
		</div>
	</div>

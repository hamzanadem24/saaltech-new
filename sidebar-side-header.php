<?php
/**
 * Side Header Sidebar - displays on header style Horizontal With Sidebar
 *
 * @package ivan_framework
 */
?>
<div id="sideheader">
	<div class="sidebar" role="complementary">
		<div class="sidebar-inner">
			<?php if ( is_active_sidebar( 'sidebar-side-header' ) ): ?>
				<?php dynamic_sidebar( 'sidebar-side-header' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
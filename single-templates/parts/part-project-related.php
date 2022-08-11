<?php

$filters = get_the_terms(get_the_ID(), apply_filters('ivan_project_filters', "ivan_vc_projects_cats") );
if ( $filters && ! is_wp_error( $filters ) ) {
	$cats = array();
	foreach ( $filters as $filter ) {
		$cats[] = $filter->slug;
	}

	$categories = implode( ",", $cats);

	if('' != $categories) :
	?>
		<h3 class="project-related-heading"><?php esc_html_e('Related Work', 'bomby'); ?></h3>

		<div class="project-related">
			<?php

				$related_cover = ' cover-entry';

				echo do_shortcode('[ivan_projects rel_id="'.get_the_ID().'" rel_tags="'.$categories.'" ivan_posts_per_page="4" ivan_img_size="ivan_project_crop" ivan_columns="3" ivan_type="carousel" ivan_carousel_nav="no" ivan_cover="'.$related_cover.'"]');
			?>
		</div>
	<?php
	endif; // $categories
}
<?php

// Check if is singular project and if it's enabled...
if( is_singular('ivan_vc_projects') && ivan_get_option('breadcrumb-proj-disable') == true ) {
	return;
}

?>

<div class="ivan-breadcrumb">
	<?php

	$separator = '<li class="separator"> / </li>';

	echo '<ul class="breadcrumbs">';

	
	if (!is_home()) {

		echo '<li typeof="v:Breadcrumb"><a href="';
		echo esc_url(ivan_get_home_url());
		echo '" property="v:title">';
		echo esc_html__('Home', 'bomby');
		echo '</a></li>'. $separator .'';

		if (is_single()) {
			
			$cats = get_the_category();

			if( isset($cats[0]) ) :
				echo '<li typeof="v:Breadcrumb"><a href="'. esc_url(get_category_link( $cats[0]->term_id )) .'">'. $cats[0]->cat_name.'</a></li>' . $separator;
			endif;

			if (is_single()) {
				echo '<li typeof="v:Breadcrumb">';
				the_title();
				echo '</li>';
			}
		} elseif( is_category() ) {

			$cats = get_the_category();

			if( isset($cats[0]) ) :
				echo '<li typeof="v:Breadcrumb">'.single_cat_title('', false).'</li>';
			endif;

		} elseif (is_page()) {

			$post = get_post();

			if($post->post_parent){
				$anc = get_post_ancestors( get_the_ID() );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li typeof="v:Breadcrumb"><a href="'.esc_url(get_permalink($ancestor)).'" title="'.get_the_title($ancestor).'"  property="v:title">'.get_the_title($ancestor).'</a></li> ' . $separator;
				}
				echo wp_kses_post($output);
				echo '<li typeof="v:Breadcrumb"><span title="'.esc_attr($title).'"> '.$title.'</span></li>';
			} else {
				echo '<li typeof="v:Breadcrumb"><span> '.get_the_title().'</span></li>';
			}
		}
		elseif (is_tag()) { echo '<li typeof="v:Breadcrumb">'.single_cat_title('', false).'</li>'; }
		elseif (is_day()) {echo'<li typeof="v:Breadcrumb">'. esc_html__('Archive for', 'bomby').' '; echo get_the_date('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo '<li typeof="v:Breadcrumb">'. esc_html__('Archive for', 'bomby').' '; echo get_the_date('M Y'); echo'</li>';}
		elseif (is_year()) {echo '<li typeof="v:Breadcrumb">'. esc_html__('Archive for', 'bomby').' '; echo get_the_date('Y'); echo'</li>';}
		elseif (is_author()) {echo '<li typeof="v:Breadcrumb">'. esc_html__('Author Archive', 'bomby').''; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li typeof="v:Breadcrumb">'.esc_html__('Blog Archives', 'bomby').''; echo'</li>';}
		elseif (is_search()) {echo '<li typeof="v:Breadcrumb">'. esc_html__('Search Results', 'bomby'); echo'</li>';}
	}
	elseif (is_home()) { echo '<li typeof="v:Breadcrumb">'. esc_html__('Home', 'bomby') .'</li>'; }

	echo '</ul>';
	?>
</div><!-- .ivan-breadcrumb -->
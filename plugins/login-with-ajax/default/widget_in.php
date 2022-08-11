<?php 
/*
 * This is the page users will see logged in. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<div class="lwa">
	<?php 
		$current_user = wp_get_current_user();
	?>
	<div class="lwa-title with-image">
		<div class="lwa-avatar">
			<?php echo get_avatar( $current_user->ID, $size = '50' );  ?>
		</div>
		<span><?php echo esc_html__( 'Howdy,', 'bomby' ) . " " . $current_user->display_name  ?></span>
		<div class="clearfix"></div>
	</div>
	<div class="lwa-in">
		

		<div class="lwa-info">
			<ul>
			<?php

				//WooCommerce My Account
				if( true == ivan_is_woocommerce_activated() ) {
					?>
					<li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e('My Account', 'bomby'); ?></a></li>
					<?php
				}

				//Admin URL
				if ( $lwa_data['profile_link'] == '1' ) {
					if( function_exists('bp_loggedin_user_link') ){
						?>
						<li><a href="<?php bp_loggedin_user_link(); ?>"><?php esc_html_e('Profile','bomby') ?></a></li>
						<?php	
					} else{
						?>
						<li><a href="<?php echo esc_url(trailingslashit(get_admin_url())); ?>profile.php"><?php esc_html_e('Profile', 'bomby') ?></a></li>
						<?php	
					}
				}
					//Logout URL
				?>
				<li><a id="wp-logout" href="<?php echo esc_url(wp_logout_url()); ?>"><?php esc_html_e( 'Log Out', 'bomby') ?></a></li>
				<?php
				//Blog Admin
				if( current_user_can('list_users') ) {
					?>
					<li><a href="<?php echo esc_url(get_admin_url()); ?>"><?php esc_html_e("Dashboard", 'bomby'); ?></a></li>
					<?php
				}
			?>
			</ul>
		</div>

		<div class="clearfix"></div>

	</div><!-- .lwa-in -->
</div>
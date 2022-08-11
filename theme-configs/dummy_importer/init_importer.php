<?php
require IVAN_THEME_CONFIGS . '/dummy_importer/importer.php';

/**
 * Register the settings page
 */
function ivan_importer_settings_menu() {
	add_theme_page(esc_html__( 'Import Dummy Content', 'bomby' ), esc_html__( 'Import Dummy Content', 'bomby' ), 'manage_options', 'ivan_importer_settings', 'ivan_importer_settings_page');
}
add_action( 'admin_menu', 'ivan_importer_settings_menu' );

/**
 * Render the settings page
 */
function ivan_importer_settings_page() {
 ?>
	<div class="wrap">
		<h2><?php esc_html_e('Import Dummy Content','bomby'); ?></h2>

		<div class="metabox-holder">
 
			<div class="postbox">
				<h3><span><?php esc_html_e( 'Import Dummy Demo','bomby' ); ?></span></h3>
				<div class="inside">
					<p>Import the theme dummy content and settings. <strong>The process can be really long, don't close or refresh the page!!!</strong></p>
					<div>
						<p><label>Select Demo</label></p>
						<p><select class="iv-demo-path">
							<option value="default">default</option>
						</select>
						</p>
					</div>
					<?php if (ivan_check_if_wordpress_importer_activated()): ?>
						<p>
							<a id="xt-importer-button" href="#" class="button button-primary">Import Dummy Content</a>
							<?php if ( get_option('ivan_import_started') == 1 ): ?>
								<span id="reset-importer-status" class="button button-primary">Reset Status</span>
							<?php endif; ?>
						</p>

					<?php else: ?>
						<p><strong>Wordpress Importer plugin must be installed and activated perform import action.</strong></p>

					<?php endif; ?>
					
					
					<div id="import-sample-data-log" class="hidden"><div>

				</div><!-- .inside -->
			</div><!-- .postbox -->
		</div><!-- .metabox-holder -->

		<script type="text/javascript">
		jQuery(document).ready( function($) {

			var import_url = '<?php echo admin_url('import.php?import_sample_data='.wp_create_nonce( 'importer_sample_data' )); ?>';


			var $ts_refresh_it = 0;
			var $ts_import_completed = false;
			var $ts_import_error = false;
			var $ts_stop_refreshing = false;
			
			var ts_import_log = function(msg) {
				$('#import-sample-data-log').append(msg);
				$('#import-sample-data-log').animate({"scrollTop": $('#import-sample-data-log')[0].scrollHeight}, "fast");
			}
			
			/**
			 * Refresh import log
			 */
			var ts_refresh_import_log = function() {
				
				$ts_refresh_it++;
				
				if ($ts_stop_refreshing) {
					return;
				}
				
				//finish refreshing log window after 600 seconds
				if ($ts_refresh_it > 600) {
					ts_import_log('Import doesn\'t respond.');
					return;
				}
				
				$.ajax({
					url: ajaxurl,
					data: {
						action : 'refresh_import_log'
					},
					success:function(data) {
						
						if (data.search("ERROR") != -1) {
							$ts_import_error = true;
						}
						
						$('#import-sample-data-log').html(data);
						$('#import-sample-data-log').animate({"scrollTop": $('#import-sample-data-log')[0].scrollHeight}, "fast");
						
						if ($ts_import_error) {
							$ts_stop_refreshing = true;
							ts_import_log('Import error!');
							return;
						}
						
						if ($ts_import_completed) {
							$ts_stop_refreshing = true;
							ts_import_log('Import successful!');
							return;
						}
					},
					error: function(errorThrown) {
						console.log(errorThrown);
					}
				}).done( function() { 
					
					setTimeout(ts_refresh_import_log, 1000) 
				} );
			};

			var ts_init_import = function(){

				$.ajax({
					url: import_url,
					data: {
						template : $('.iv-demo-path').val(),
					},
					success:function(data) {
						
						if (data) { //data is not empty only if php error occured
							console.dir(data);
						}
						//nothing to do
					},
					error: function(errorThrown) {
						console.log(errorThrown);
					}
				}).done(function() { $ts_import_completed = true; console.dir('Import completed!'); });
			};
			
			var $import_sample_data_initialized = false;
			
			//Import sample data
			$('#xt-importer-button').click( function() {
				
				if ($import_sample_data_initialized) {
					return;
				}
				
				$import_sample_data_initialized = true;
				
				if (confirm( 'Do you want to continue? Your data will be lost!' ) ) {
					
					$('#import-sample-data-log').slideDown();

					ts_init_import();
					setTimeout(ts_refresh_import_log, 2000);
					
				}
			});
			
			$('#reset-importer-status').click( function() {
				if (confirm( 'Do you want to continue? If you already imported sample data some theme features WILL NOT WORK CORRECTLY for imported post, pages, portfolio and other items!' )) {
					$this = $(this);
					
					$.ajax({
						url: ajaxurl,
						data: {
							action : 'reset_importer_status'
						},
						success:function(data) {
							$this.html( 'Done!' );
							setTimeout(function() { $this.remove() }, 1000);
						},
						error: function(errorThrown) {
							console.log(errorThrown);
						}
					});
				}
			});

		});
		</script>
 
	</div><!--end .wrap-->
	<?php
}
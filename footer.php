<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ivan_framework
 */
?>
		<?php 
		do_action( 'ivan_footer_section' ); 
		?>

	<?php
	do_action( 'ivan_after' ); 
	?>

</div><!-- #all-site-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
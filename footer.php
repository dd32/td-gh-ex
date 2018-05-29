<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency Lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer clear">
		<div class="agency-lite-container">
			<?php 
			do_action('agency_lite_footer_section_page');
			?>
		<div class = "agency-lite-footer-all clear">
		<?php 
			do_action('agency_lite_footer_nav_menu');
			do_action('agency_lite_after_footer');
		?>
		</div>
	</div>
	<?php 
	do_action('agency_lite_footer_copyright_fn');
	 ?>
	
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

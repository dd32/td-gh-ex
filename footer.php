<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agensy
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer clear">
		<div class="agensy-container">
		<?php 
		do_action('agensy_footer_section_page_roles');
		?>
	<div class = "agensy-footer-all clear">
	<?php 
		do_action('agensy_footer_nav_menu_role');
		do_action('agensy_after_footer');
	?>
	</div>
	</div>
	<?php 
	do_action('agensy_footer_copyright_roles');
	 ?>
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

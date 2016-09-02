<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakes_And_Cakes
 */

if(!is_page_template('template-home.php')){ echo '</div></div>'; } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="container">

			<?php 
            do_action( 'bakes_and_cakes_footer_top' );
			do_action( 'bakes_and_cakes_footer' ); ?>
		
		</div>
	
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer();?>

</body>
</html>

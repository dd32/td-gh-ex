<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adbooster
 */

?>
	</div> <!-- .col-full -->
	</div><!-- #content -->
	
	<?php do_action( 'adbooster_before_footer' ); ?>

	<footer id="colophon" class="site-footer">

		<div class="col-full">
			
			<?php
			/**
			 * Functions hooked in to adbooster_footer action
			 *
			 * @hooked adbooster_footer_widgets - 10
			 * @hooked adbooster_credit         - 20
			 */
			do_action( 'adbooster_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'adbooster_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

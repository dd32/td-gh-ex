<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Az_Authority
 */

?>


	<?php
	/**
	 * Functions hooked in to azauthority_col_full_close
	 *
	 * 
	 */		
	do_action( 'azauthority_col_full_close' );
	
	?>
	</div><!-- #content -->

	<?php do_action( 'azauthority_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to azauthority_footer action
			 *
			 * @hooked azauthority_back_to_top    - 10
			 * @hooked azauthority_footer_widgets - 20
			 * @hooked azauthority_credit         - 30
			 */
			do_action( 'azauthority_footer' ); ?>

		</div><!-- .site-inner -->
	</footer><!-- #colophon -->

	<?php do_action( 'azauthority_after_footer' ); ?>

</div><!-- #page -->

<?php if ( has_nav_menu( 'primary' ) ) { echo '<div id="lightbox"></div>'; } ?>
<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */
?>	<div style="clear:both;"></div>
	</div> <!-- #forbottom -->
	</div><!-- #main -->


	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?><?php
/* This  retrieves  admin options. */
$options = get_option('ma_options');
$mop_copyright = $options['mop_copyright'];
?>


		</div><!-- #colophon -->

		<div id="footer2">
			<div id="site-info" >
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				| <b title="Mantra 1.0" >Mantra</b> Theme designed by <a href="http://www.htx.ro" target="_blank" title="Themes, Templates and Web design" >Cryout Creations</a> | Powered by

				<?php do_action( 'mantra_credits' ); ?>
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'mantra') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'mantra'); ?>" rel="generator">
					<?php printf( __(' %s.', 'mantra'), 'WordPress' ); ?>
				</a>

			</div>

			<!-- #site-info -->
	<?php if ($mop_copyright != '') { ?><div id="site-copyright"><?php echo $mop_copyright; ?> </div> <?php } ?>
</div>

	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

</body>
</html>

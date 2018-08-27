<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.2
 */

?>

		</div>
		<div id="footer" class="site-footer">
			<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				get_template_part( 'template-parts/footer/site', 'info' );
			?>
		</div>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>

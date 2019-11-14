<?php
/**
 * The template for displaying the footer
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

?>

		</div>
		<footer id="footer" class="site-footer" role="contentinfo">
			<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );
				get_template_part( 'template-parts/footer/site', 'info' );
			?>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>

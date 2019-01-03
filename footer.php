<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic_Hub
 */

?>
		</div>
	</div><!-- #content -->
	<?php academic_hub_content_after(); ?>

	<!--footer -->
	<?php academic_hub_footer_before(); ?>
	<footer id="footer" class="footer-inverse">
		<?php academic_hub_footer(); ?>
	</footer>
	<?php academic_hub_footer_after(); ?>

</div><!-- #page -->
<?php academic_hub_body_bottom(); ?>

<?php wp_footer(); ?>

</body>
</html>

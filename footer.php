<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package HowlThemes
 */
?>

	</div><!-- #content -->
<?php howlfoot(); ?>
	
<?php wp_footer(); 
echo get_option('dt_custom_foot'); 
?>

</body>
</html>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Apprise
 */ ?>

	<div class="clear"></div>
	<div id="footer">
	<?php if ( of_get_option('footer_widgets') == '1') { ?>
		<div id="footer-wrap">
			<?php  get_sidebar('footer'); ?>
		</div><!--footer-wrap-->
	<?php } ?>
	</div><!--footer-->
	<?php get_template_part( 'copyright' ); ?>
</div><!--grid-container-->
<?php if ( of_get_option('enable_scrollup') == 1) { ?>
	<script type="text/javascript">
		var tp=jQuery.noConflict();
		tp(function () {
  			tp.scrollUp({
	    		scrollName: 'scrollUp', // Element ID
		    	topDistance: '300', // Distance from top before showing element (px)
    			topSpeed: 300, // Speed back to top (ms)
		    	animation: 'slide', // Fade, slide, none
    			animationInSpeed: 200, // Animation in speed (ms)
	    		animationOutSpeed: 200, // Animation out speed (ms)
	    		scrollText: '', // Text for element
		    	activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  			});
		});
	</script>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
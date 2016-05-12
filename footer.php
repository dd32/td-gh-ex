<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Basic Shop
 */

?>
        <?php
		  /**
		  * @hooked  
		  */
		do_action( 'igthemes_content_bottom' ); ?>
	   </div><!-- .container -->
	</div><!-- #content -->
        <?php
	       /**
	       * @hooked igthemes_footer_widgets 10
           */
	    do_action( 'igthemes_after_content' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
        <?php
            /**
            * @hooked igthemes_social_links 10
            * @hooked igthemes_site_info 20
            */
            do_action( 'igthemes_site_footer' );
        ?>
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

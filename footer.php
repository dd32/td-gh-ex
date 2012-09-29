<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Artblog
 * @author  Simon Hansen
 * @since Artblog 1.0
 */
?>
	</div><!-- #main -->


   <br class="clear-both" />
</div><!-- #wrapper -->
<div class="footer-border" ></div>
    <div id="footer" role="contentinfo">

<?php
    /* A sidebar in the footer? Yep. You can can customize
     * your footer with four columns of widgets.
     */
    get_sidebar( 'footer' );
?>




    </div><!-- #footer -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>

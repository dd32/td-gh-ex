<?php

/**

 * The template for displaying the footer

 *

 * Contains footer content and the closing of the #main and #page div elements.

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

?>

<div style="text-align: center;">
<a href="#top">Back to top</a>

</div>
</div><!-- #main -->
<div class="center">
<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
<div>
<?php dynamic_sidebar( 'sidebar-5' ); ?>
</div>
<?php endif; ?>
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
<div class="site-info">
<p>        Copyright &copy; 2014 - <?php echo date('');?><?php bloginfo('name'); ?> all rights reserved.</p>

</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- #page -->



	<?php wp_footer(); ?>

</body>

</html>
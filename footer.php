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

<div style="text-align: center;" class="navlist">

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
<div class="center">
<?php 
global $badeyes_options;
$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );
?>

<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

<?php echo $badeyes_settings['footer_copyright']; 
echo("".date('Y').", ");
    bloginfo('name');
echo "All rights reserved";
?>

</a>
</div>
</div><!-- .site-info -->

			<div id="site-generator">

				<?php do_action( 'twentyten_credits' ); ?>

                <?php if( $badeyes_settings['author_credits'] ) : ?>
<div class="center"><p>This Accessible 2014 Child Theme created by <?php echo "<a href=\"http://www.badeyes.com\">Badeyes Design &amp; Consulting</a>"; ?></p></div>
<?php endif; ?>

			</div><!-- #site-generator -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


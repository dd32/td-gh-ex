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
<p><a href="#top"><?php _e('Back to top' , 'thePriority'); ?></a></p>
</div>
</div><!-- #main -->

<div class="center">

<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>

<div>

<?php dynamic_sidebar( 'sidebar-5' ); ?>
</div>
<?php endif; ?>

</div>
<footer id="colophon" class="site-footer">

<div class="site-info">
<div class="center">
<a href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo get_theme_mod("copyright" , "Copyright Since (start date goes here)");
echo("".date('Y').", ");
    bloginfo('name');
echo "&nbsp;All rights reserved";
?></a>
</div>

</div><!-- .site-info -->

			<div id="site-generator">
<div class="center"<?php echo ( get_theme_mod( 'author_credits' ) ) ? "style='display:none;'" : "" ?>><p>This Accessible 2014 Child Theme created by <?php echo "<a href=\"http://www.badeyes.com\">Badeyes Design &amp; Consulting</a>"; ?></p>
</div>
</div><!-- #site-generator -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


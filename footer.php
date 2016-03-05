<?php
/* Writing Board's Footer
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/
?>
</div><!-- container -->
<div id="footer" class="hfback">

<div id="footer-content">


<?php
   	get_sidebar( 'footer' );
?>
</div> <!-- footer-content -->
<div id="footermenu"><?php if ( has_nav_menu( 'footer-menu' ) ) {  wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'f-menu' )); } ?></div>
<div id="creditline"><?php writingboard_creditline() ?></div>

</div> <!-- footer -->
<?php wp_footer(); ?>
</body>
</html>
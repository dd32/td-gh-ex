<?php
/* COLORFUL Theme's Footer
	Copyright: 2012, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since COLORFUL 1.0
*/
?>





<div id="footer">

<div id="footer-content">

<div id="footer-sidebar">
<?php
   	get_sidebar( 'footer' );
?>
</div>
<div id="creditline">&copy; 2012: <?php bloginfo( 'name' ); ?>, All Rights Reserved <?php colorful_credit(); ?></div>

<?php wp_footer(); ?>
</div> <!-- footer-content -->
</div> <!-- footer -->
</div><!-- container -->
</body>
</html>
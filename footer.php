<?php
/* 	Small Business Theme's Footer
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/
?>





<div id="footer">

<div id="footer-content">


<?php
   	get_sidebar( 'footer' );
?>
<div id="creditline">&copy;&nbsp;<?php echo date("Y") ?>&nbsp;<?php bloginfo( 'name' );  smallbusiness_credit(); ?></div>
</div> <!-- footer-content -->
</div> <!-- footer -->
</div><!-- container -->
<?php wp_footer(); ?>
</body>
</html>
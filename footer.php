<?php
/* 	Searchlight Theme's Footer
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/
?>
<div class="clear"></div>
<div id="footer">

<div class="versep"></div>
<div id="footer-content">
<div class="social social-link">
	  <?php foreach (range(1, 5 ) as $numslinksn) { 
	  if ( of_get_option('sl' . $numslinksn, '#') != '' ): echo '<a href="'. esc_url(of_get_option('sl' . $numslinksn, '#')) .'" target="_blank"> </a>'; endif;
	  } ?>
</div>

<?php
   	get_sidebar( 'footer' );
?>

<div id="creditline"><?php searchlight_creditline(); ?></div>

</div> <!-- footer-content -->
</div> <!-- footer -->
<a href="#" class="go-top"></a>
<div class="clear"> </div>
<?php wp_footer(); ?>
</body>
</html>
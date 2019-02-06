<?php
/* 	Selfie Theme's Footer
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/
?>
<div class="clear"></div>
<div id="footer">
<div class="social social-link">
	  <?php foreach (range(1, 5 ) as $numslinksn) { 
	  if ( selfie_get_option('sl' . $numslinksn, '#') != '' ): echo '<a href="'. esc_url(selfie_get_option('sl' . $numslinksn, '#')) .'" target="_blank"> </a>'; endif;
	  } ?>
</div>
<div id="footer-content">
<?php
   	get_sidebar( 'footer' );
?>
</div> <!-- footer-content -->
<div id="creditline"><?php selfie_creditline(); ?></div>
</div> <!-- footer -->
<a href="#" class="go-top"></a>
<div class="clear"> </div>
<?php wp_footer(); ?>
</body>
</html>
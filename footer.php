<?php
/* 	Searchlight Theme's Footer
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/
?>
<div class="clear"></div>
<div id="footer">

<div class="versep"></div>
<div id="footer-content">
<?php global $searchlight_options; ?>
<div class="social social-link">
	  <?php foreach (range(1, 5 ) as $numslinksn) { 
	  if ( $searchlight_options['social_link' . $numslinksn] != '' ): echo '<a href="'. esc_url( $searchlight_options['social_link' . $numslinksn]) .'" target="_blank"> </a>'; endif;
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
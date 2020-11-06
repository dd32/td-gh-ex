<?php
/* 	Writing Board's Front Page Right Sidebar Area
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/
?>
<div id="right-sidebar">
<div class="social social-link yes-front-page">
	  <?php foreach (range(1, 5 ) as $numslinksn) { 
	  if ( esc_url(writingboard_get_option('sl' . $numslinksn, '#')) != '' ): echo '<a href="'. esc_url(writingboard_get_option('sl' . $numslinksn, '#')) .'" target="_blank"> </a>'; endif;
	  } ?>
</div>
    <span class="yes-front-page"><?php get_search_form(); ?></span><br />		
    <?php dynamic_sidebar( 'sidebar-2' ); ?>

</div>
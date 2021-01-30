<?php
/* Easy Theme's Right Sidebar Area
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
?>
<div id="right-sidebar">
<div class="social social-link"><?php $easy_slinks = 3; foreach (range(1, $easy_slinks ) as $easy_slinksn) { if ( easy_get_option('sl' . $easy_slinksn, '')): echo '<a href="'. esc_url(easy_get_option('sl' . $easy_slinksn, '')) .'" target="_blank"> </a>'; endif; } ?></div>	
<?php get_search_form(); ?>	
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
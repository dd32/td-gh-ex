<?php
/* Writing Board's Right Sidebar Area
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/
?>
<div id="right-sidebar">
<div class="social social-link no-front-page">
	  <?php foreach (range(1, 5 ) as $numslinksn) { 
	  if ( esc_url(writingboard_get_option('sl' . $numslinksn, '#')) != '' ): echo '<a href="'. esc_url(writingboard_get_option('sl' . $numslinksn, '#')) .'" target="_blank"> </a>'; endif;
	  } ?>
</div>
<span class="no-front-page"><?php get_search_form(); ?></span><br />	
<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e('Archives', 'writing-board'); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e('Meta', 'writing-board'); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

<?php endif; // end sidebar widget area ?>
</div>
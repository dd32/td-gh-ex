<?php
/* Easy Theme's Right Sidebar Area
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
?>
<div id="right-sidebar">
<div class="social social-link"><?php $easy_slinks = 3; foreach (range(1, $easy_slinks ) as $easy_slinksn) { if ( easy_get_option('sl' . $easy_slinksn, '')): echo '<a href="'. esc_url(easy_get_option('sl' . $easy_slinksn, '')) .'" target="_blank"> </a>'; endif; } ?></div>		
<?php get_search_form(); ?>	

<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title">Archives</h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title">Meta</h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

<?php endif; // end sidebar widget area ?>
</div>
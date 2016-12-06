<?php
/**
 * The template for the custom home page.
 *
 * @package Figure/Ground
 */

// specific things for homepage
wp_enqueue_style( 'dashicons' );
wp_dequeue_style( 'genericons' );
wp_enqueue_style( 'front-page', get_template_directory_uri() . '/front-page.css' );

get_header(); 

?>
	<div id="primary" class="content-area">
		<section class="content-expanded">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/music" class="icon-link-music">Sheet Music Library</a>
			</h3>
			<div class="featured-list">
				<ul>
					<li><a href="http://celloexpressions.com/music/piece/?id=67&t=Game+of+Thrones+Theme+Song">Game of Thrones Theme Song</a></li>
					<li><a href="http://celloexpressions.com/music/piece/?id=61&t=Somebody+That+I+Used+to+Know">Somebody That I Used to Know</a></li>
					<li><a href="http://celloexpressions.com/music/piece/?id=66&t=Silent+Night+%28Duet%29">Silent Night (Duet)</a></li>
					<li><a href="http://celloexpressions.com/music/piece/?id=41&t=Let+it+Snow%21">Let it Snow!</a></li>
					<li><a href="http://celloexpressions.com/music/piece/?id=51&t=Yesterday">Yesterday</a></li>
					<li><a href="http://celloexpressions.com/music/piece/?id=60&t=Libertango+%28expanded%29">Libertango</a></li>
				</ul>
				<a href="http://celloexpressions.com/music" class="more-link">All Sheet Music</a>
		</section>
		<section class="content-expanded">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/plugins" class="icon-link-plugins">WordPress Plugins</a>
			</h3>
			<div class="featured-list">
				<ul>
					<li><a href="http://celloexpressions.com/plugins/quickshare">QuickShare</a></li>
					<li><a href="http://celloexpressions.com/plugins/custom-windows-pinned-tiles">Custom Windows Pinned Tiles</a></li>
					<li><a href="http://celloexpressions.com/plugins/fourteen-colors">Fourteen Colors</a></li>
					<li><a href="http://celloexpressions.com/plugins/floating-social-media-links">Floating Social Media Links</a></li>
					<li><a href="http://celloexpressions.com/plugins/list-custom-taxonomy-widget">List Custom Taxonomy Widget</a></li>
					<li><a href="http://celloexpressions.com/plugins/css3-transitions">CSS3 Transitions</a></li>
				</ul>
				<a href="http://celloexpressions.com/plugins" class="more-link">All WordPress Plugins</a>
			</div>
		</section>
		<section class="content-expanded">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/blog" class="icon-link-blog">Blog</a>
			</h3>
			<div class="featured-list">
				<ul>
				<?php
					$args = array( 
						'numberposts' => '6', 
						'post_status' => 'publish',
					);
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink( $recent['ID'] ) . '">' . $recent['post_title'].'</a></li>';
					}
				?>
				</ul>
				<a href="http://celloexpressions.com/blog" class="more-link">Visit Blog</a>
			</div>
		</section>
		<div class="content-collapsed">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/random" class="icon-link-random">Pseudo-random Experiments</a>
			</h3>
		</div>
		<div class="content-collapsed">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/ts" class="icon-link-ts">Geometry of the Twisted Savonius</a>
			</h3>
		</div>
		<div class="content-collapsed">
			<h3 class="icon-link">
				<a href="http://celloexpressions.com/dev" class="icon-link-dev">Web Design & Development</a>
			</h3>
		</div>
	
	</div><!-- #primary -->

<?php get_footer(); ?>


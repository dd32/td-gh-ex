<div id="sidebar2wrap">
	<div id="sidebar2">
		<h2>&nbsp;</h2>
		<h2 class="small">Search</h2>
		<ul>
			<li><?php include ('searchform.php'); ?></li>
		</ul>
		<h2 class="small">Latest Posts</h2>
		<ul>
			<?php
			$lastposts = get_posts('numberposts=5');
			foreach($lastposts as $post) :
			   setup_postdata($post);
			?>
			<li><a href="<?php the_permalink(); ?>"><small><?php the_date('M d Y'); ?></small><br /><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar2') ) : ?><?php endif; ?>
		</ul>
	</div>
</div>
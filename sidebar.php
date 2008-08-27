		<div id="sidebar-left">
			<div class="block">
	  			<a href="" title=""><img class="centered" src="<?php bloginfo('template_directory'); ?>/images/entrecard.jpg" height="148px" width="127px" alt="" /></a>
			</div>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-left') ) : ?>
			<?php else : ?>
				<div class="block">
					<h4>Widgets</h4>
					<p>The widgets which you select for sidebar-left will appear here.</p>
				</div>
			<?php endif; ?>
		</div><!--end sidebar-left-->
	</div><!--end content-container-->
	<div id="sidebar-right">
		<div class="block">
			<h4>About</h4>
			<p><img class="alignright" src="<?php bloginfo('template_directory'); ?>/images/about.jpg" />Something short about the blog and or author(s). The heading and/or photo could be linked to the about page.</p>
		</div>
		<div class="block">
			<div class="halfblock">
				<a href="" title=""><img class="centered" src="<?php bloginfo('template_directory'); ?>/images/advert.png" alt="" width="125px" height="125px" /></a>
			</div>
			<div class="halfblock">
				<a href="" title=""><img class="centered" src="<?php bloginfo('template_directory'); ?>/images/advert.png" alt="" width="125px" height="125px" /></a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="block">
			<h4>Popular Posts</h4>
			<?php query_posts('category_name=popular&showposts=3'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="inner-block">
					<h5><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
					<p><?php the_excerpt(30, '<img><a>', 'content', false, 'More...', true);?></p>
				</div>
			<?php endwhile; else : ?>
				<p>The most popular posts, which you select, appear here. This is a way of getting those old classics you wrote out of the dusty archives.</p>
			<?php endif; ?>
		</div>
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-right') ) : ?>
		<?php else : ?>
			<div class="block">
				<h4>Widgets</h4>
				<p>The widgets which you select for sidebar-right will appear here.</p>
			</div>
		<?php endif; ?>
	</div><!--end sidebar-right-->

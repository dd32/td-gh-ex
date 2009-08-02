	<div id="sidebar">
		
		<ul>
			<li class="profilebox">
      			<?php query_posts('showposts=1'); ?>
			    <?php while (have_posts()) : the_post(); ?>
					<p class="byline">By <span class="uppercase"><?php the_author_meta('first_name');Ê?> <?php the_author_meta('last_name');Ê?></span></p>
	            <?php endwhile; ?>
		    </li>
		
		<ul>			
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>


			<?php wp_list_pages('title_li=');Ê?>
			
			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>
			
			<div id="adBlock">
				
				<!--You can replace this with an ad of your choosing...-->
				<a href="<?php echo get_settings('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/AdBlock.png" alt="125x125 Ad" /></a>
				
				<p>This is just some text that I wanted to add. Talking about <a href="<?php echo get_settings('home'); ?>/">an ad</a>.</p>
				
			</div>

			<?php endif; ?>
		</ul>
	</div>


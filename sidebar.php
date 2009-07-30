	<div id="sidebar">
		
		<p class="byline">By <span class="uppercase">Jake Spurlock</span></p>
		
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
			
			<!-- IF YOU WANT ARCHIVES AND CATEGORIES, FEEL FREE TO UNCOMMENT THIS, OR USE THE WIDGETS-->
			
			<!--<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

			<?php wp_list_categories('title_li='); ?>-->

			<?php endif; ?>
		</ul>
	</div>


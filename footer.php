	<div id="footerExtended">
		<div class="container_16">
			<?php	/* Widgetized sidebar */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-1') ) : 
			?>
			<div id="footerCol-1" class="grid_3">
				<h4><span class="unibullet">&raquo;</span> archives</h4>
				<ul class="">
					<?php wp_get_archives('type=monthly&show_post_count=1&limit=3'); ?>
				</ul>
			</div><!-- /#footerCol-1 -->
			<?php endif; ?><?php	/* Widgetized sidebar */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-2') ) : 
			?>
			<div id="footerCol-2" class="grid_3">
				<h4><span class="unibullet">&raquo;</span> meta</h4>
				<ul class="">
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			</div><!-- /#footerCol-2 -->
			<?php endif; ?><?php	/* Widgetized sidebar */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-3') ) : 
			?>
			<div id="footerCol-3" class="grid_5">
				<h4><span class="unibullet">&raquo;</span> recent posts</h4>
				<ul class="">
					<?php query_posts('showposts=3'); ?>
					<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
					<li><span><a href="<?php the_permalink() ?>" title="Continue reading <?php the_title(); ?>"><?php the_title() ?></a></span></li>
					<?php endif; endwhile; ?>
				</ul>
			</div><!-- /#footerCol-3 -->
			<?php endif; ?><?php	/* Widgetized sidebar */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-4') ) : 
			?>
			<div id="footerCol-4" class="grid_5">
				<h4><span class="unibullet">&raquo;</span> recent comments</h4>
				<ul class="">
					<?php simple_recent_comments(); ?>
				</ul>
			</div><!-- /#footerCol-4 -->
			<?php endif; ?>
		</div>
		<div class="clear">&nbsp;</div>	
	</div><!-- /#footerExtended -->
	
	<div id="footer">
		<div class="container_16">
			
			<div id="copyright" class="grid_6">
				<p>&copy;2008 Overhaul Industries</p>
			</div><!-- /#copyright -->
			
			<div id="footerNav" class="grid_10">
				<p><a href="#">Sitemap</a>  | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a> | <a href="#">Terms of Service</a> | <a href="#">Privacy Statement</a></p>
			</div><!-- /#footerNav -->
			
		</div>
		<div class="clear">&nbsp;</div>	
	</div><!-- /#footer -->
	
</div><!-- /#wrapper -->
</body>
</html>
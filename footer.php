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
				<p>&copy;2008 <!-- Enter your legal name here --></p>
			</div><!-- /#copyright -->
			
			<div id="footerNav" class="grid_10">
				
				<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. --><p class="smalltype">Theme Preview is proudly powered by <a href="http://wordpress.org/">WordPress</a> <a href="http://wp-themes.com/?feed=rss2">Entries (RSS)</a> and <a href="http://wp-themes.com/?feed=comments-rss2">Comments (RSS)</a>. <br />
				<!-- Artists need credit too!! Please keep the reference to the Adept 1.0 Template by Bill Heaton - http://overhaulindustries.com/adept --><em><a href="http://wordpress.org/extend/themes/adept" target="_blank"><u>Adept</u></a> Template</em> by <a href="http://overhaulindustries.com/adept" target="_blank">Overhaul Industries</a> is licensed under <a rel="license" href="http://www.gnu.org/licenses/gpl-3.0.txt">The GNU General Public License</a>.</p>
			</div><!-- /#footerNav -->
			
		</div>
		<div class="clear">&nbsp;</div>	
	</div><!-- /#footer -->
	
</div><!-- /#wrapper -->
</body>
</html>

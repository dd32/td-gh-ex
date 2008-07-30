	<ul id="sidebar">
	
		<?php /* Support for WordPress Widgets */ if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	
			<!-- google_ad_section_start(weight=ignore) -->
			
			<?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?> 
			<li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for the <?php single_cat_title(''); ?> category.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for the day <?php the_time('l, F jS, Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for the year <?php the_time('Y'); ?>.</p>

		 	<?php /* If this is a search results page */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is some other page */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> archives.</p>

			<?php } ?>
			
			</li> <?php }?>
			
			<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>

			<?php wp_list_pages('sort_column=menu_order&title_li=<h2>Pages</h2>' ); ?>
			
			<?php if (function_exists('wp_tag_cloud')) : ?>

			<li><h2>Tag Cloud</h2>
				<ul>
					<li class="tagcloudtags">
						<?php wp_tag_cloud('smallest=8&largest=22'); ?>
					</li>
				</ul>
			</li>

			<?php endif; ?>

			<?php /* If this is the frontpage */ if ( is_home() ) { ?>
			
			<li><h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly&limit=6'); ?>
				</ul>
			</li>
			
				<?php wp_list_bookmarks('orderby=rand'); ?>
				
			<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Strict">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
				
			<?php } ?>
			
			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>
			
			<!-- google_ad_section_end -->
			
		<?php endif; ?>
		
	</ul>
			<div id="sidebar">
				<div id="siedebar-header" class="clearfix">
					<div id="side-head-search">
						<form method="get" id="searchform" action="<?php bloginfo('url');?>">
							<input type="text" value="" name="s" id="search" />
							<input type="submit" id="searchsubmit-head" value="検索" />
						</form>
					</div>
					<div id="rss-button"><a href="<?php bloginfo('rss2_url');?>">RSS</a></div>
				</div>
				<div id="sidebar-body">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>


			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2><?php _e('Author', 'auroral'); ?></h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p><?php printf(__('You are currently browsing the archives for the %s category.', 'auroral'), single_cat_title('', false)); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.', 'auroral'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('l, F jS, Y', 'auroral'))); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for %3$s.', 'auroral'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('F, Y', 'auroral'))); ?></p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.', 'auroral'), get_bloginfo('url'), get_bloginfo('name'), get_the_time('Y')); ?></p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p><?php printf(__('You have searched the <a href="%1$s/">%2$s</a> blog archives for <strong>&#8216;%3$s&#8217;</strong>. If you are unable to find anything in these search results, you can try one of these links.', 'auroral'), get_bloginfo('url'), get_bloginfo('name'), wp_specialchars(get_search_query(), true)); ?></p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives.', 'auroral'), get_bloginfo('url'), get_bloginfo('name')); ?></p>

			<?php } ?>

			</li> <?php }?>

			<?php wp_list_pages('title_li=<h2>' . __('Pages', 'auroral') . '</h2>' ); ?>

			<li><h2><?php _e('Archives', 'auroral'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>' . __('Categories', 'auroral') . '</h2>'); ?>

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2><?php _e('Meta', 'auroral'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional', 'auroral'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>', 'auroral'); ?></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="<?php _e('XHTML Friends Network', 'auroral'); ?>"><?php _e('XFN', 'auroral'); ?></abbr></a></li>
					<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'auroral'); ?>">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>

			<?php endif; ?>
					</ul>
				</div>
			</div>
			<!-- side_bar -->

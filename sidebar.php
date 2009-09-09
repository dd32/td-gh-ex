    </div><!-- end #content -->

    <aside>

      <div id="sidebar1">

<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>

				<div class="section">
					<h3>Categories</h3>
					<ul>
						<?php wp_list_categories('show_count=1&title_li='); ?>
					</ul>
				</div><!-- .section -->

				<div class="section">
					<h3>Tags</h3>
	      	<div id="tagCloud">
						<?php wp_tag_cloud('smallest=8&largest=18&number=100&orderby=name&order=ASC'); ?>
	      	</div>
				</div><!-- .section -->

				<div class="section">
					<h3>Meta</h3>
					<ul>
	          <?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div><!-- .section -->

<?php endif; ?>

<?php if ( function_exists('pixel_sitemap')) pixel_sitemap($ps_count = 100); ?>

			</div><!-- end #l-sidebar -->


			<div id="sidebar2">

<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?>

				<div class="section">
					<h3>RSS</h3>
					<ul>
						<li><a href="<?php bloginfo('rss2_url'); ?>">RSS Blog</a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">RSS Comments</a></li>
					</ul>
				</div><!-- .section -->

				<div class="section">
					<h3>Archive</h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div><!-- .section -->

				<div class="section">
					<h3>Blogroll</h3>
					<ul>
						<?php wp_list_bookmarks('categorize=0&title_li='); ?>
					</ul>
				</div><!-- .section -->

<?php endif; ?>

			</div><!-- end #r-sidebar -->

		</aside>
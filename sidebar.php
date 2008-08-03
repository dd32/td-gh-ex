    </div><!-- end #content -->

    <div id="sidebars">
      <div id="l-sidebar">

<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>

				<h2>Categories</h2>
				<ul>
					<?php wp_list_categories('show_count=1&title_li='); ?>
				</ul>

				<h2>Tags</h2>
      	<div class="tags">
					<?php wp_tag_cloud('smallest=8&largest=18&number=100&orderby=name&order=ASC'); ?>
      	</div>

				<h2>Meta</h2>
				<ul>
          <?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>

<?php endif; ?>

			</div><!-- end #l-sidebar -->


			<div id="r-sidebar">

<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?>
				<h2>RSS</h2>
				<ul>
					<li><a href="<?php bloginfo('rss2_url'); ?>">RSS Blog</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>">RSS Comments</a></li>
				</ul>

				<h2>Archive</h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>

				<h2>Blogroll</h2>
				<ul>
					<?php wp_list_bookmarks('categorize=0&title_li='); ?>
				</ul>
<?php endif; ?>

			</div><!-- end #r-sidebar -->
		</div><!-- end #sidebars -->
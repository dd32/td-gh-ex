	<!-- start of Sidebar -->
	<div id="sidebar" class="grid_4">
<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>

	<div class="widget">
	<?php wp_list_pages('depth=1&title_li=<h2>'.__('Pages', '5years').'</h2>' ); ?>
	</div>

	<div class="widget">
	<h2><?php _e("Archive", "5years"); ?></h2>
	<ul>
		<?php wp_get_archives('type=monthly&limit=12'); ?>
	</ul>
	</div>

	<div class="widget">
	<h2><?php _e("Categories", "5years"); ?></h2>
	<ul>
		<?php wp_list_categories('orderby=name&show_count=0&title_li='); ?>
	</ul>
	</div>

<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>

	<div class="widget">
		<h2><?php _e("Meta", "5years"); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>
	</div>

			<?php } ?>
<?php endif; ?>
	</div>
	<!-- end of Sidebar -->

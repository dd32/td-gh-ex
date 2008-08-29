

<?php if(!(is_page() || is_single()) ){ ?>
	<div id="pagenav">
		<?php posts_nav_link('<span class="sep none"> - </span>', '<span class="right nextposts">'.__('Next &raquo;','basic2col').'</span>', '<span class="left preciousposts">'.__('&laquo; Previous','basic2col').'</span>'); ?>
	</div>
<?php } ?>


</div>

<?php basic2col_sidebar() ?>


<div id="footer">

<ul>
<li><?php _e('Content','basic2col'); ?> &copy; <a accesskey="1" href="<?php bloginfo('url'); ?>/">
	<?php bloginfo('name'); ?></a> <?php the_time(__('Y','basic2col')) ?></li>
	<li><a href="http://validator.w3.org/check?uri=referer" title="<?php _e('Valid XHTML 1.0','basic2col'); ?>">
		xhtml 1.0</a></li>
	<li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="<?php _e('Valid CSS 2','basic2col'); ?>">
		css 2</a></li>
	<li><a href="#top" accesskey="t"><?php _e('Top','basic2col'); ?></a></li>
</ul>

<ul>
<li><a href="http://fruw.no/" title="<?php _e('Theme: Basic2Col by Kristin K. Wangen','basic2col'); ?>" rel="nofollow">Basic2Col</a></li>

<?php do_action('basic2col_credits'); ?>

<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress','basic2col'); ?>">WordPress</a></li>

	<?php if(is_basic2col_wpmu()) { global $current_site; ?>
		<li><a href="http://<?php echo $current_site->domain . $current_site->path ?>" title="<?php _e('Hosted by','basic2col'); ?> <?php echo $current_site->site_name ?>">
		<?php echo $current_site->site_name ?></a></li>
	<?php } ?>

</ul>




</div>

</div>

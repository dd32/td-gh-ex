<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
 <h2>Recent comments</h2>
 <?php include (TEMPLATEPATH . '/simple_recent_comments.php'); ?>
<?php src_simple_recent_comments(); ?>

<h2>Recent posts</h2>
<ul>
<?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul>

<h2>Pages</h2>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h2>Categories</h2>
<ul>
<?php wp_list_cats(); ?>
</ul>

<?php if ( function_exists('wp_tag_cloud') ) : ?>
<h2>Tags cloud</h2>
<ul class="taglist"><li>
<?php wp_tag_cloud('smallest=8&largest=22'); ?></li>
</ul>
<?php endif; ?>

<h2>Archives</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Blogroll</h2>
<ul>
	<?php get_links(-1, '<li>', '</li>', ' - ', 'use_desc_for_title=1'); ?>

</ul>
<h2>Meta</h2>
<ul>
<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
</ul>
 
 
        
        

<?php endif; ?>

</div>

<?php get_footer(); ?>
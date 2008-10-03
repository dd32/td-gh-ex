	<div style="float:right;margin-right:10px;">
	<h2 style="border:0px;color:#6F1402"><?php _e('Search'); ?></h2>
	<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/">
		<input type="text" name="s" id="s" class="textbox" value="<?php echo wp_specialchars($s, 1); ?>" title="Search"/>
		<input id="btnSearch" type="submit" name="submit" value="<?php _e('Go'); ?>" />
	</form>
	</div>
	<div id="sidebar1" class="sidecol">
	<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

<li>
	<h2><?php _e('Latest Posts'); ?></h2>
	<ul><?php wp_get_archives("type=postbypost&limit=20")?></ul>
</li>

  <li>
    <h2><?php _e('Monthly'); ?> </h2>
    <ul>
      <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    </ul>
  </li>
	<li>
	<?php get_links_list(); ?> 
	</li>     
<?php endif; ?>
</ul>
</div>

<div id="sidebar2" class="sidecol">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<span class='rss'><a title="RSS Feed of Posts" href="<?php bloginfo('rss2_url'); ?>">Posts RSS</a></span>
  <li>
    <h2>
      <?php _e('Categories'); ?>
    </h2>
    <ul>
      <?php wp_list_cats('optioncount=1&hierarchical=1');    ?>
    </ul>
  </li>
 
	<li>
      <h2>Meta</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>			
   </li>
    <?php endif; ?>
</ul>
</div>
<div style="clear:both;"></div>
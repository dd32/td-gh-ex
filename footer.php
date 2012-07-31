
<div class="divider"></div>




<div id="footer">

<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			

<h2>Pages</h2>
<div class="content">
<ul>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
</div>


<h2>Categories</h2>
<div class="content">
<ul>
<?php wp_list_categories('title_li=&show_count=0'); ?>
</ul>
</div>
  
<h2>Archives</h2>
<div class="content">
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>
  
  
<h2>Links</h2>
<div class="content">
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>
</div>
  
<?php endif; // end sidebar widget area ?>

<h2>Info</h2>
<div class="content"><p>
Copyright &copy; <?php echo date('Y')?> <a title="<?php bloginfo('title')?>" href="<?php echo site_url()?>"><?php bloginfo('title')?></a>
<br/><br/>
Powered by <a href="http://wordpress.org/" title="Powered by WordPress.">WordPress</a> and <a href="http://www.applianceuk.com" title="Appliance UK">Appliance UK</a></p>
</div>




</div>


</div>

<?php wp_footer()?>
</body>
</html>
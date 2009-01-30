<!--ab hier die sidebar.php-->
<div id="sidebarright">
<div id="sidebarrightinnen">
<ul id="rightsidebar">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<div class="blend">Suche innerhalb des Blogs:</div>
<li id="suche">
<h4>Search</h4>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <fieldset>
			<input value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
			<!--<input type="submit" value="Go!" id="searchbutton" name="searchbutton" />-->
		</fieldset>
</form>
</li>

 <li id="seiten">
  <h4>Pages</h4>
  <ul>
  <li><a href="<?php bloginfo('url'); ?>">Startseite</a></li>
<?php wp_list_pages('title_li=&'); ?> 
  </ul>
 </li>

 <li id="Kategorien">
  <h4>Categories</h4>
  <ul>
<?php wp_list_categories('title_li='); ?>
  </ul>
 </li>

  <li id="archiv">
  <h4>Archive</h4>
  <ul>
<?php wp_get_archives(); ?>
</ul>
 </li>

   <li id="links">
  <h4>Blogroll</h4>
  <ul>
<?php wp_list_bookmarks('title_li=&category=0&categorize=0'); ?>
  </ul>
 </li>

  <li id="meta">
  <h4>Meta</h4>
  <ul>
<li><?php wp_loginout(); ?></li>
<li><a href="<?php bloginfo_rss('rss2_url'); ?> ">Entries (RSS)</a></li>
<li><a href="<?php bloginfo_rss('comments_rss2_url'); ?> ">Comments (RSS)</a></li>

  </ul>
 </li>

<?php endif; ?>

</ul>
</div> <!---/ sidebarrightinnen-->
</div> <!---/ sidebarright-->
<!--bis hier die sidebar.php-->

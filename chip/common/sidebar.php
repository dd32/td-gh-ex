<?php if(!dynamic_sidebar('top-right-sidebar')): ?>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wppages">
  <div class="sidebarboxw1data">
  	<?php get_search_form(); ?>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wppages">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Pages</h2>
	  <ul><?php wp_list_pages('title_li='); ?></ul>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wpcategories">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Categories</h2>
	  <ul><?php wp_list_categories('title_li='); ?></ul>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wparchives">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Archives</h2>
	  <ul><?php wp_get_archives('type=monthly'); ?></ul>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wpcalendar">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Calendar</h2>
	<?php get_calendar(); ?>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wprecentposts">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Recent Posts</h2>
	  <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wptagcloud">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Tag Cloud</h2>
	<?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wpblogroll">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Blogroll</h2>
	  <ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
  </div>
</div>

<div class="sidebarbox sidebarboxw1 chipstyle3 margin10b wpmeta">
  <div class="sidebarboxw1data">
  	<h2 class="blue chipstyle3 padding5 margin10b">Meta</h2>
	  <ul>
	    <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
		<?php wp_meta(); ?>
	  </ul>
  </div>
</div>

<?php endif; ?>
<?php get_header(); ?>

   <div id="content">
	
	<div class="post-404">

<h1><?php _e('The page you requested could not be found'); ?></h1>

<p><h2><?php _e('404 Error'); ?></h2></p>

<p><?php _e('Broken link. Check your URL for errors, or try the search box below.'); ?></p>


	<?php get_search_form(); ?>

	 </div>

   </div>

<!--<?php get_sidebar(); ?>-->
<?php get_footer(); ?>
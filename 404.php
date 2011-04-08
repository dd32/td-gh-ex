<?php get_header(); ?>

<div id="center">
	
	<?php get_sidebar(); ?>
    
    <div id="content">
        <div id="label"><a href="#" title="Error 404 - Not Found">Error 404 - Not Found</a></div>
		<p>Sorry, but you are looking for something that isn&#8217;t here.</p>
        <p>The 404 or Not Found error message is a HTTP standard response code indicating that the client  was able to communicate with the server, but the server could not find what was requested. 404 errors should not be confused with "server  not found" or similar errors, in which a connection to the destination server could not be made at all. A 404 error indicates that the requested resource may be available again in the future.</p>
        <p>Try searching for what you where looking for using the search box below.</p>
		<?php get_search_form(); ?>
    </div>  

<div id="notfooter">
<p>
		<?php bloginfo('name'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a>, Theme <a href="http://schwarttzy.com/?page_id=551">Adventure</a> designed by <a href="http://schwarttzy.com/?page_id=225">Eric Schwarz</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
        <!-- Theme design by Eric Schwarz - http://schwarttzy.com/?page_id=225 -->
	</p>
</div>

</div>

<div id="endspacer">
</div>
    
<div id="bottombar">
    	
    <div id="menuz">
        <ul id="menulist">
        <?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
        <ul id="menulist"><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
        <?php endif; ?>
		</ul>
    </div>
     
	<div id="title">
    	<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
    </div>

    <div id="slogan">
    	<h2><?php bloginfo('description');?></h2>
    </div> 
    
</div>

<?php get_footer(); ?>
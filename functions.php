<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function widget_mytheme_search() {
?>
<li>
        <div class="search">
	        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="image" src="<?php bloginfo('template_url'); ?>/img/search-button.jpg" id="searchsubmit" value="Search" />
			</form>
        </div> <!-- SEARCH -->
</li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');

?>
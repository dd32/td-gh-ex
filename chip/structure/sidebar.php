<?php
/**
 * Chip Life SIDEBAR Hooks
 */

/** Chip Life Primary Sidebar */
add_action( 'chip_life_sidebar', 'chip_life_primary_sidebar_init' );
function chip_life_primary_sidebar_init() {
	
	if( ! dynamic_sidebar( 'primary-sidebar' ) ):
?>
    <div class="widget_search">
      <div class="widget-wrap">
        <?php get_search_form(); ?>
      </div>
    </div>
    
    <div class="widget_pages">
      <div class="widget-wrap">
        <h2 class="widget-title">Pages</h2>
          <ul><?php wp_list_pages('title_li='); ?></ul>
      </div>
    </div>
    
    <div class="widget_categories">
      <div class="widget-wrap">
        <h2 class="widget-title">Categories</h2>
          <ul><?php wp_list_categories('title_li='); ?></ul>
      </div>
    </div>
    
    <div class="widget_archive">
      <div class="widget-wrap">
        <h2 class="widget-title">Archives</h2>
          <ul><?php wp_get_archives('type=monthly'); ?></ul>
      </div>
    </div>
    
    <div class="widget_calendar">
      <div class="widget-wrap">
        <h2 class="widget-title">Calendar</h2>
        <?php get_calendar(); ?>
      </div>
    </div>
    
    <div class="widget_recent_entries">
      <div class="widget-wrap">
        <h2 class="widget-title">Recent Posts</h2>
          <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
      </div>
    </div>
    
    <div class="widget_tag_cloud">
      <div class="widget-wrap">
        <h2 class="widget-title">Tag Cloud</h2>
        <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
      </div>
    </div>
    
    <div class="widget_text">
      <div class="widget-wrap">
        <div class="textwidget"><p>Chip Life is an advanced and fully documented Framework intended to serve as a base for Child Themes. Chip Life theme supports 8 Widget Areas, Post Formats, Navigation Menus, Post Thumbnails, Custom Backgrounds, Custom Image Headers, and Custom Editor Style. It includes styles for the Visual Editor, special styles for for six different Post Formats, and has one-column, two-column layout. The Theme includes plug-and-play support for the WP-Pagenavi plugin. Requires WordPress 3.1 and higher.</p></div>
      </div>
    </div>
    
    <div class="widget_links">
      <div class="widget-wrap">
        <h2 class="widget-title">Blogroll</h2>
          <ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
      </div>
    </div>
    
    <div class="widget_meta">
      <div class="widget-wrap">
        <h2 class="widget-title">Meta</h2>
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
<?php
	endif;	
}
?>
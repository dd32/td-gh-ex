<ul><?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
 <li id="search" class="widget widget_search">
 		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
 </li>
 <li id="recent-posts" class="widget widget_recent_entries">
 <div id="before_title"><h1><?php _e('Recent Posts','artsavius'); ?></h1></div>
 <ul><?php wp_get_archives('type=postbypost&limit=5&format=custom&before=<li>&after=</li>'); ?> </ul>
 </li>
 <li id="calendar" class="widget widget_calendar"><div id="before_title"><h1><?php _e('Calendar','artsavius'); ?></h1></div>
 <div id="calendar_wrap">
 <?php get_calendar(); ?>
 </div>
 </li>
 <li id="archives" class="widget widget_archive"><div id="before_title"><h1><?php _e('Archives','artsavius'); ?></h1></div>
 <select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=\"\"><?php echo attribute_escape(__('Select Month','artsavius')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
  </li>
 
<?php endif; ?></ul>
<?php
/**
 * footer for our theme.
 *
 *
 * @package WordPress
 * @subpackage Raindrops
 * @since Raindrops 0.1
 */
?>
<div id="ft">
<!--footer-widget start-->
<div class="widget-wrapper clearfix">
  <ul>
	<?php if ( !dynamic_sidebar('sidebar-4') ){ ?>
	<li class="hide">
	  <div>dinamic_sidebar 4 none</div>
	</li>
	<?php } ?>
  </ul>
  <br class="clear" />
</div>
<!--footer-widget end-->
<address>
<?php 
printf(
'<small>&copy;%s %s <a href="%s" class="entry-rss">%s</a> and <a href="%s" class="comments-rss">%s</a></small>&nbsp;',
date("Y"),
get_bloginfo('name'),
get_bloginfo('rss2_url') ,
__("Entries <span>(RSS)</span>","Raindrops"),
get_bloginfo('comments_rss2_url'),
__('Comments <span>(RSS)</span>',"Raindrops")
);

printf(
'&nbsp;<small><a href="%s">%s</a></small>&nbsp;&nbsp;',
'http://www.tenman.info/wp3/raindrops',
__("Raindrops Theme","Raindrops")
);
?>
</address>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
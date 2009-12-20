<?php 
/**
  * @package WordPress
  * @subpackage A_Theme
*/
/* Template Name: Links
*/ get_header()?>
<div id="content">
  <h2 class="post-title"><?php _e('Links')?></h2>
  <ul id="links">
      <?php wp_list_bookmarks('title_before=<h2 class="widgettitle">&title_after=</h2>')?>
      
  </ul><?php edit_post_link()?>
</div>
<?php get_sidebar();get_footer()?>

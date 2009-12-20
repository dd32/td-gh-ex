<?php 
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
/* Template Name: Archives
*/ get_header()?>
<div id="content">
  <ul class="arch"><li>
    <h2 class="post-title">
      <?php _e('Categories')?></h2>  
    <ul>
      <?php wp_list_categories('show_option_all&show_count=1&feed=RSS&title_li=')?>
    </ul></li>
  </ul>
  <ul class="arch"><li>
    <h2 class="post-title">
      <?php _e('Archives')?></h2> 
    <ul>
      <?php wp_get_archives('type=weekly&show_post_count=1')?>
    </ul> </li>
  </ul>
  <?php edit_post_link()?>
</div>
<?php get_sidebar();get_footer()?>

<?php /* Template Name: Tag Cloud
*/ get_header()?>
<div id="content" class="post">
  <h2 class="post-title"><?php _e('Tags:')?></h2>
    <?php wp_tag_cloud('number=0')?>
    <br /><?php edit_post_link(__('Edit'))?>
</div>
<?php get_sidebar();get_footer()?>
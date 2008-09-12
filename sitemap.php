<?php /* Template Name: Sitemap
*/ get_header()?>
<div id="content"><div class="post">
    <ul id="mapc"><?php wp_list_categories('title_li=<h2 class="widgettitle">'.__('Categories'). '</h2>')?></ul>
    <ul id="mappa"><?php wp_list_pages('title_li=<h2 class="widgettitle">'.__('Pages').'</h2>' )?></ul>
    <h2 class="post-title"><?php _e('Posts')?></h2>
    <ul id="mapp"><?php wp_get_archives('type=postbypost')?></ul>
  </div>
</div>
<?php get_sidebar();get_footer()?>
<div id="sidebar"><div class="advert-x" ><?php  include (TEMPLATEPATH . '/scripts/advert-two.php'); ?></div>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>
<h3 class="widget">Meta</h3>
<?php wp_register(); ?> <?php wp_loginout(); ?> <?php wp_meta(); ?>
<h3 class="widget">Links</h3><ul> <?php
wp_list_bookmarks('title_li=&categorize=0'); ?> </ul><h3
class="widget">Categories</h3> <ul><?php wp_list_categories('orderby=name&show_count=0&title_li='); ?></ul><?php endif;?>	
</div>
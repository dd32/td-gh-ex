<div id="navbar"><div class="con">
<ul><?php if (is_home()) { ?><li class="current_page_item">
<a href="<?php echo get_settings('home'); ?>" title="Home">Home</a></li>
<?php }else{ ?><li class="page_item">
<a href="<?php echo get_settings('home'); ?>" title="Home">Home</a>
</li><?php } ?><?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
</ul></div>
<div class="clearbox"></div></div>	
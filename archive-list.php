<div id="archive-list"> 
<p>Look here. You will surely find what you are looking for.</p>
<div class="left-list">
<h4>Categories</h4>
<ul><?php wp_list_categories('title_li=&show_count=1&hide_empty=0'); ?></ul>
</div>
<div class="right-list">
<h4>Months</h4>
<ul><?php wp_get_archives('type=monthly&limit=&format=html&before=&after=&show_post_count=1'); ?></ul>
</div>
<div class="spacer">
</div>
</div>

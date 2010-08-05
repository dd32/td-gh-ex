<div id="r-side">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

</div>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h3>Categories</h3>
<ul>
<?php wp_list_categories('title_li=');?>
</ul>

<h3>Blogroll</h3>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0');?>
</ul>

<h3>Tags</h3>
<p><?php wp_tag_cloud();?></p>
<?php endif; ?>

</div>
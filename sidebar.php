<div id="r-side">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<label for="search"><h3>Search</h3></label>
<form method="get" id="searchform" action="<?php bloginfo('url');?>/">
<input type="text" name="s" id="s" class="tsearch" />
<input type="submit" id="find" value="Find" class="go" />
</form>

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
<div id="left">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

<h2>About This Site</h2>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
        
<h2>Categories</h2>
<ul><?php wp_list_cats('sort_column=name'); ?></ul>

<h2>Archives</h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>


<?php wp_list_bookmarks(array('title_before' => '<h2>', 'title_after' => '</h2>',	'category_before' => '', 'category_after' => '')); ?>


<?php endif; ?>


</div>


<div id="sidebar">



<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>

<h2>Categories</h2>

<ul>

<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1&children=1&hide_empty=1'); ?>

</ul>
  

<h2>Archives</h2>

<ul>

<?php wp_get_archives('type=monthly&show_post_count=1'); ?>

</ul>

<?php get_calendar(); ?>
<h2>Links</h2>
<ul>
<li><a href="http://wordpress.org">wordpress.org</a></li>
</ul>


<?php include (TEMPLATEPATH . '/searchform.php'); ?>



<?php endif; ?>



<?php wp_meta(); ?>



</div>
<?php
/*Template for displaying the sidebar for all the files.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/ 
?>
<?php get_template_part('lib/content','search');?>
<br /> <br />
<div id = "recent-posts" class = "back">
<?php 
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5');
?>
<h2 class="side-head"><u><?php _e('RECENT Posts','Afia');?></u></h2>
<?php
if($wp_query->have_posts()):
while($wp_query->have_posts()):
$wp_query->the_post();
?>
<a class = "recent-single-a" href= "<?php the_permalink(); ?>"><span class = "recent-single"><?php afia_lowercase(get_the_title(),true);?></span></a><br />
<hr />
<?php
endwhile;
else:
?>
<?php endif;
?>
</div>
<div id = "categories" class = "back">
<h2 class="side-head"><u><?php _e('Categories','Afia');?></u></h2>
<?php
 $args = array(
	'show_option_all'    => '',
	'orderby'            => 'count',
	'order'              => 'DESC',
	'style'              => 'none',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( 'Categories','Afia' ),
	'show_option_none'   => __( '','Afia'),
	'number'             => 5,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => null
    );
	?>
	<span class= "categories">
	<?php
wp_list_categories($args);
?>
</span>
</div>
<div id = "recent-comments" class = "back">
<h2 class="side-head smaller"><u><?php _e('recent comments','Afia'); ?></u></h2>
<?php 
afia_comments_aside();
?>
</div>
<?php 
$args = array(
	'posts_per_page'=>5,
	'orderby' => 'comment_count',
	'order'   => 'DESC',
);
$wp_query = new WP_Query($args);
?>
<div id = "popular-posts" class = "back">
<h2 class="side-head"><u><?php _e('Popular Posts','Afia');?></u></h2>
<?php
if($wp_query->have_posts()):
while($wp_query->have_posts()):
$wp_query->the_post();
?>
<a class = "recent-single-a" href= "<?php the_permalink(); ?>"><span class = "recent-single"><?php afia_lowercase(get_the_title(),true);?></span></a>
<hr />
<?php
endwhile;
else:
?>
<?php endif;
?>
</div>
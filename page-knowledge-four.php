<?php
/*
 * Template Name: Knowledge Base
 * Description: Template for displaying Posts from WP dashboard.
 */
?>

<?php get_header(); ?>
<div id="content-full">
<div id="categories-four">

<?php $myknowledgebase_cat_args = array(
	'hide_empty' => 0, // 0 means also list empty categories
	'orderby' => 'name', // sort categories by name
	'order' => 'asc' // list categories in ascending order
);

$myknowledgebase_cats = get_categories( $myknowledgebase_cat_args );

foreach ( $myknowledgebase_cats as $cat ) :
	echo '<ul class="cat-list-four"><li class="cat-name"><a href="' . get_category_link( $cat->cat_ID ) . '" title="' . $cat->name . '" >' . $cat->name . '</a></li>';

	$myknowledgebase_post_args = array(
		'posts_per_page' => -1, // -1 means list all posts
		'orderby' => 'date', // sort posts by date
		'order' => 'desc', // list posts in descending order
		'category__in' => $cat->cat_ID // list posts from all categories and posts from sub category will be hidden from their parent category
	);

	$myknowledgebase_posts = get_posts( $myknowledgebase_post_args ); 

	foreach( $myknowledgebase_posts AS $single_post ) :
		echo '<li class="post-name"><a href="'. get_permalink( $single_post->ID ) .'" rel="bookmark" title="'. get_the_title( $single_post->ID ) .'">'. get_the_title( $single_post->ID ) .'</a></li>'; 
	endforeach;
	
	wp_reset_postdata(); 

	?>

	<?php echo '</ul>'; ?>
<?php endforeach; ?>

</div>	
</div>	
<?php get_footer(); ?>
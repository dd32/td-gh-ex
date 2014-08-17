<?php
/*
 * Template Name: Knowledge Base
 * Description: Template for displaying Posts from WP dashboard.
 */
?>

<?php get_header(); ?>
<div id="content-full">

<div id="categories-four">

<?php  $cats = get_categories('hide_empty=0&orderby=name&order=asc');


foreach ($cats as $cat) :

	echo '<ul class="cat-list-four"><li class="cat-name"><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '" >' . $cat->name . '</a></li>';

$args = array(
	'posts_per_page' => -1, // max number of post per category
	'cat' => $cat->term_id
);

query_posts($args); 

if (have_posts()) :

	while (have_posts()) : the_post(); ?>
		<li class="post-name">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'knowledgebase'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a>
		</li>
	<?php endwhile;
endif;

wp_reset_query(); ?>

<?php echo '</ul>'; ?>

<?php endforeach; ?>

</div>	
</div>	
	
<?php get_footer(); ?>
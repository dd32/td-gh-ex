<?php
/*
 * Template Name: Knowledge Base
 * Description: Template for displaying Categories and Posts.
 */
?>

<?php get_header(); ?>
<div id="content-full">
<div id="categories-four">
	<?php if ( get_theme_mod( 'myknowledgebase_exclude' ) ) :
		$exclude = esc_attr( get_theme_mod( 'myknowledgebase_exclude' ) );
	else :
		$exclude = '';
	endif;

	$myknowledgebase_cat_args = array(
		'hide_empty' => 0,
		'exclude' => $exclude,
		'orderby' => 'name',
		'order' => 'asc'
	);

	$myknowledgebase_cats = get_categories( $myknowledgebase_cat_args );

	foreach ( $myknowledgebase_cats as $cat ) :
		echo '<ul class="cat-list"><li class="cat-name"><a href="' . get_category_link( $cat->cat_ID ) . '" title="' . $cat->name . '" >' . $cat->name . '</a></li>';

		if ( get_theme_mod( 'myknowledgebase_posts' ) ) :
			$posts_per_page = esc_attr( get_theme_mod( 'myknowledgebase_posts' ) );
		else :
			$posts_per_page = -1;
		endif;

		if ( get_theme_mod( 'myknowledgebase_order' ) == 'name' ) :
			$orderby = 'name';
			$order = 'asc';
		else :
			$orderby = 'date';
			$order = 'desc';
		endif;

		$myknowledgebase_post_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'category__in' => $cat->cat_ID
		);

		$myknowledgebase_posts = get_posts( $myknowledgebase_post_args ); 

		foreach( $myknowledgebase_posts AS $single_post ) :
			echo '<li class="post-name"><a href="'. get_permalink( $single_post->ID ) .'" rel="bookmark" title="'. get_the_title( $single_post->ID ) .'">'. get_the_title( $single_post->ID ) .'</a></li>'; 
		endforeach;
	
		echo '</ul>';
	endforeach; ?>
</div>
</div>
<?php get_footer(); ?>
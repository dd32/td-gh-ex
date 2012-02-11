<?php
/**
 * The template for displaying content in the single.php template
 *
 * @since Akyuz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php akyuz_get_post_header_bar();?>		
	
	<div class="sa-entry-meta span-15 last">
		<?php $show_sep = false; ?>
		<?php if ('post'== get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php $categories_list = get_the_category_list( __( ' - ', AKYUZ_TEXT_DOMAIN ) );
			if ( $categories_list ):
		?>
		<span class="cat-links">
			<?php printf( __( '%1$s', AKYUZ_TEXT_DOMAIN ), $categories_list );
			$show_sep = true; ?>
		</span>
		<?php endif; // End if categories ?>
		<?php endif; // End if 'post' == get_post_type() ?>

	</div>

	<div class="sa-entry-content span-15 last">
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('small-feature');
			} 
		?>
		<?php //the_post_thumbnail('themepreview-thumb'); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<?php akyuz_get_post_meta_bottom_bar();?>
	
	<?php if( function_exists('do_sociable' ) ){ ?>
	<hr class="divider span-15 last"/>
	<div class="span-14 last">
		<?php do_sociable(); ?>
	</div>
	<?php } ?>
	
	<?php 
	$orig_post = $post;
	global $post;
	$categories = get_the_category($post->ID);
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array(
			'category__in'    => $category_ids,
			'post__not_in'    => array($post->ID),
			'posts_per_page'  => 2, // Number of related posts that will be shown.
			'caller_get_posts'=> 1
		);

		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) {
			echo '<hr class="divider span-15 last"/>';
			echo '<div id="sa-entry-related_posts" class="span-15 last">';
				echo '<h3 class="span-4">Related Posts</h3>';
				echo '<ul class="content-related-post span-11 last">';
					while( $my_query->have_posts() ) {
						$my_query->the_post();?>
						<li>
							<div class="relatedcontent">
								<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
								<?php the_date() ?>
							</div>
						</li>
					<?php
					}
				echo '</ul>';
			echo '</div>';
		}
	}
	$post = $orig_post;
	wp_reset_query(); ?>
	
	<hr class="divider span-15 last"/>
	
</article><!-- #post-<?php the_ID(); ?> -->

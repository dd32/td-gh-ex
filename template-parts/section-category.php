<?php
/**
 * The template for displaying post by category
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<section class="category-section">
	 <h1><?php printf(__('Sections', 'aguafuerte')) ?></h1>
	<?php
		$categories= get_categories();
		foreach ($categories as $key => $value): ?>

			<div class="">
				<?php
					$cat_ID = $categories[$key]->cat_ID;
					//echo $cat_ID;


					// Here starts the query work.		
			$is_sticky = get_option('sticky_posts');
			$args = array(	'cat' => $cat_ID,
							'posts_per_page' => 4,
							'ignore_sticky_posts' => false,
							'post__not_in' => $is_sticky,
							'tax_query' => array( array('taxonomy' => 'post_format',
														'field' => 'slug',
														'terms' => array(	'post-format-quote',
																			'post-format-aside',
																			'post-format-status',
																			'post-format-chat',
																			'post-format-link',),
														'operator' => 'NOT IN',
														), ), );

					$query = new WP_Query( $args );

					echo $query -> the_category();
					if (have_posts()):

						printf('<h1><a href="%1$s">%2$s</a></h1>', get_category_link($cat_ID), $categories[$key]->name);
						
						while ($query -> have_posts()):$query -> the_post();
						// Shows only the posts with standard format.
							if (!get_post_format()):
								get_template_part( 'template-parts/content', 'article-1');
								else:
								get_template_part('template-parts/content', get_post_format());							
							endif;
						endwhile;

						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'aguafuerte' ),
							'next_text'          => __( 'Next page', 'aguafuerte' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
						) );


					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content', 'none' );

					endif;
					wp_reset_postdata();
				?>

			</div><!--/col-4-->
		<?php endforeach; 
	?>
	
	<div class="first-articles"></div>
	
	<footer class="section-footer"></footer>

</section><!--category-1 -->



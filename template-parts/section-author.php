<?php
/**
 * The template for displaying all the authors.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

?>
<section class="author-section">

	 <?php printf( '<h1 class=""><a href="%1$s">%2$s</a></h1>', //esto deberia ser un h2
					esc_url(get_permalink(2079) ) ,
					__('Contributors', 'aguafuerte')); ?>

	<?php 
		$authors = get_users();
		//echo '<pre>';print_r($authors); echo '</pre>'; echo '<br>';

		foreach ($authors as $key => $value):
			$author_ID = $authors[$key]->ID;
			$author_data = get_userdata($author_ID);
			$author_post_count = count_user_posts($author_ID); ?>

	<div class="contributor flex-container">
		<div class="avatar">

		<?php
			if  (get_avatar($author_data->user_email)):
				echo get_avatar($author_data->user_email, 60);
			endif;
		?>
		</div><!--/avatar--> 
		<div class="contributor-content">

		<?php printf( '<span class="entry-author"><a href="%1$s" rel="author">%2$s</a></span>', //esto deberia ser un h2
					esc_url( get_author_posts_url( $author_ID  ) ),
					$author_data->display_name); 

			// Here starts the query work.		
			$is_sticky = get_option('sticky_posts');
			$args = array(	'author' => $author_ID,
							'posts_per_page' => 2,
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

			$query = new WP_Query($args);
			//echo '<pre>';print_r($query); echo '</pre>'; echo '<br>';

			if (have_posts()):

				while ($query -> have_posts()) : $query -> the_post();					
						the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); //y esto un h3.				
				endwhile;

			else:
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

			endif;
			wp_reset_postdata();

			printf( '<div class="link_btn"><a href="%1$s" rel="author">%2$s</a></div>',
					esc_url( get_author_posts_url( $author_ID  ) ),
					__('All articles', 'aguafuerte'));
		?>
		
		</div><!--/contributor-content--> 
	</div><!--/contributor-->   
	<?php endforeach; ?>

</section><!--/author-section-->   
	

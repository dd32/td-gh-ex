<!-- Main Container -->
<div class="main-container">
	
	<?php

	// Blog Grid
	echo '<ul class="blog-grid">';
	
	if ( have_posts() ) :

		// Loop Start
		while ( have_posts() ) :

			the_post();

			// Full Width Post
			$full_width_post 		= false;
			$custom_post_class 		= '';
			$custom_post_excerpt	= 30;

			if ( $wp_query->current_post == 0 && ! is_paged() && bard_options( 'blog_page_full_width_post' ) ) {
				$custom_post_class  	= ' class="full-width-post"';
				$full_width_post 		= true;
				$custom_post_excerpt	= 110;
			}

			echo '<li'. $custom_post_class .'>';

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
				
				<?php if ( ! $full_width_post ) : ?>
				<div class="post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
					<?php the_post_thumbnail('bard-full-thumbnail'); ?>
				</div>
				<?php endif; ?>

				<header class="post-header">

			 		<?php

					$category_list = get_the_category_list( ',&nbsp;&nbsp;' );

					if ( bard_options( 'blog_page_show_categories' ) === true && $category_list ) {
						echo '<div class="post-categories">' . $category_list . ' </div>';
					}

					?>

					<?php if ( get_the_title() ) : ?>
					<h1 class="post-title">
						<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
					</h1>
					<?php endif; ?>

					<span class="border-divider"></span>

					<?php if ( $full_width_post && bard_options( 'blog_page_show_date' ) === true ) : ?>
					<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<?php endif; ?>
					
				</header>

				<?php if ( $full_width_post ) : ?>
				<div class="post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
					<?php the_post_thumbnail('bard-full-thumbnail'); ?>
				</div>
				<?php endif; ?>

				<?php if ( bard_options( 'blog_page_post_description' ) !== 'none' ) : ?>
				<div class="post-content">
					<?php
						if ( bard_options( 'blog_page_post_description' ) === 'content' ) {
							the_content('');
						} elseif ( bard_options( 'blog_page_post_description' ) === 'excerpt' ) {
							bard_excerpt( $custom_post_excerpt );
						}
					?>
				</div>
				<?php endif; ?>

				<?php if ( $full_width_post ) : ?>
				<div class="read-more">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Continue Reading','bard' ); ?></a>
				</div>
				<?php endif; ?>
				
				<footer class="post-footer">

					<?php if ( bard_options( 'blog_page_show_author' ) === true ) : ?>
					<span class="post-author">
						<?php

						if ( $full_width_post ) {
							echo '<a href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )) .'">';
								echo get_avatar( get_the_author_meta( 'ID' ), 30 );
							echo '</a>';
						} else {
							echo '<span>'. esc_html__( 'By ', 'bard' ) .'</span>';
						}

						the_author_posts_link();

						?>
					</span>
					<?php endif; ?>

					<?php
					if ( $full_width_post && bard_options( 'blog_page_show_comments' ) === true ) {
						comments_popup_link( esc_html__( 'No Comments', 'bard' ), esc_html__( '1 Comment', 'bard' ), '% '. esc_html__( 'Comments', 'bard' ), 'post-comments');
					}
					?>

					<?php if ( ! $full_width_post && bard_options( 'blog_page_show_date' ) === true ) : ?>
					<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<?php endif; ?>

				</footer>

			</article>
		
			<?php

			echo '</li>';

		endwhile; // Loop End

	else:

	?>

	<div class="no-result-found">
		<h3><?php esc_html_e( 'Nothing Found!', 'bard' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bard' ); ?></p>
		<div class="bard-widget widget_search">
			<?php get_search_form(); ?>
		</div> 
		
	</div>

	<?php
	
	endif; // have_posts()

	echo '</ul>';

	?>

	<?php get_template_part( 'templates/grid/blog', 'pagination' ); ?>

</div><!-- .main-container -->
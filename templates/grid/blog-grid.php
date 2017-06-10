
<!-- Blog Grid Wrapper -->
<div class="blog-grid-wrap">

	<!-- Blog Grid -->
	
		<?php
		echo '<ul class="blog-grid">';
		
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				echo '<li>';
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
					
					<div class="post-media">
						<?php get_template_part( 'templates/post/content', get_post_format() ); ?>
					</div>

					<header class="post-header">
				 		<?php
						$category_list = get_the_category_list( ',&nbsp;&nbsp;' );
						if ( ashe_options( 'blog_page_show_categories' ) === true && $category_list ) {
							echo '<div class="post-categories">' . $category_list . ' </div>';
						} ?>

						<h1 class="post-title">
							<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
						</h1>
						
						<?php if ( ashe_options( 'blog_page_show_date' ) === true ) : ?>
						<div class="post-date"><?php the_time( get_option('date_format') ); ?></div>
						<?php endif; ?>
						
					</header>

					<?php if ( ashe_options( 'blog_page_post_description' ) !== 'none' ) : ?>
					<div class="post-content">
						<?php
						if ( ashe_options( 'blog_page_post_description' ) === 'content' ) {
							the_content('');
						} elseif ( ashe_options( 'blog_page_post_description' ) === 'excerpt' ) {
							ashe_excerpt(  ashe_options( 'blog_page_excerpt_length' ) );
						}
						?>
					</div>
					<?php endif; ?>

					<?php if ( ashe_options( 'blog_page_show_more' ) === true ) : ?>
					<div class="read-more">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( ashe_options( 'blog_page_more_text' ) ); ?></a>
					</div>
					<?php endif; ?>
					
					<footer class="post-footer">
						<?php if ( ashe_options( 'blog_page_show_author' ) === true ) : ?>
						
						<span class="post-author">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
							</a>
							<?php the_author_posts_link(); ?>	
						</span>
						<?php endif; ?>
						
						<?php
						if ( ashe_options( 'blog_page_show_comments' ) === true && comments_open() ) {
							comments_popup_link( esc_html__( 'No Comments', 'ashe' ), esc_html__( '1 Comment', 'ashe' ), '% '.esc_html__( 'Comments', 'ashe' ), 'post-comments');
						}
						?>
					</footer>

					<!-- Related Posts -->
					<?php
					if (  substr( ashe_page_layout(), 0, 4 ) === 'col1' && ashe_options( 'blog_page_related_orderby' ) !== 'none' ) {
						ashe_related_posts( ashe_options( 'blog_page_related_title' ), ashe_options( 'blog_page_related_orderby' ) );
					}
					?>

				</article><!-- .blog-post -->
			
				<?php
				echo '</li>';
			endwhile;

		endif; // have_posts()
echo '</ul>';
		?>

	

	<!-- Blog Pagination -->
	<?php get_template_part( 'templates/grid/blog', 'pagination' ); ?>

</div><!-- .blog-grid-wrap -->
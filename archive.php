<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package altitude-lite
 */
 get_header();
?>
	 <div id="primary" class="content-area">
		 <main id="main" class="site-main">
			 <div class="container">
				 <div class="row">
					 <div class="archive-page-heading">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="archive-description">', '</div>' );
		?>
					 </div>

		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
							 <header>
								 <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							 </header>
				<?php
			endif;

			$post_count = 0;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$post_count ++;

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				if ( is_int( $post_count / 3 ) ) {
					?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
									 <div class="clearfix"></div>
					<?php
				} else {
					?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php
				}
			endwhile;
			?>
							 <div class="col-md-12">
			<?php
			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'prev_text'          => __( 'PREV', 'altitude-lite' ),
					'next_text'          => __( 'NEXT', 'altitude-lite' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'altitude-lite' ) . ' </span>',
				)
			);
			?>
						 </div>
			<?php
					 else :

							get_template_part( 'template-parts/content', 'none' );

					 endif;
						?>
				 </div>
			 </div>

		 </main><!-- #main -->
	 </div><!-- #primary -->

	<?php
	get_footer();

<?php get_header(); ?>

<?php fgymm_show_page_header_section(); ?>

<div id="main-content-wrapper">
	<div id="main-content">
		<h1 class="page-title">
			<?php
				if ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
					_e( 'Audio', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'fgymm' );

				elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
					_e( 'Galleries', 'fgymm' );

				else :
					_e( 'Archives', 'fgymm' );

				endif;
			?>
		</h1>

	<?php if ( have_posts() ) : ?>
				<?php
				// starts the loop
				while ( have_posts() ) :

					the_post();

					/*
					 * Include the post format-specific template for the content.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
	?>
				<div class="navigation">
					<?php 	global $wp_query;

							$big = 999999999; // need an unlikely integer
				  
							echo paginate_links( array (
												'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
												'format' => '?paged=%#%',
												'current' => max( 1, get_query_var('paged') ),
												'total' => $wp_query->max_num_pages,
												'prev_next' => false,
											) ); ?>
				</div>  
	<?php else :

				// if no content is loaded, show the 'no found' template
				get_template_part( 'content', 'none' );
			
		  endif;
	?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
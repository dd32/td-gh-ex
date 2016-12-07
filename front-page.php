<?php
/**
 *	The template for displaying the front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */


get_header();


if( get_option( 'show_on_front' ) == 'posts' ): ?>
	

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
			<?php
				if ( have_posts() ):
					while ( have_posts() ): 
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					wp_reset_query();
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				
				the_posts_pagination( array(
					'type'          => 'list',
					'prev_text'		=> esc_html__( 'Previous page', 'asterion' ),
					'next_text'		=> esc_html__( 'Next page', 'asterion' )
				) );
			?>
		</main>
	</div>


	<?php get_sidebar(); ?>
	

<?php
else:

	if( have_posts() ):
		while( have_posts() ): the_post();
			$static_page_content = get_the_content(); 
			if ( $static_page_content != '' ) : ?>
				<div id="primary" class="content-area">
					<main id="main" class="site-main" itemscope itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					</main>
				</div>
			<?php endif;
		endwhile;
	endif;


	for ( $i = 0; $i < 10; $i++ ) { 
		$section = get_theme_mod( 'asterion_section_order_'.$i, $i);

		if( $section ):
			asterion()->home->section( $section );
		endif;
	}

endif;

get_footer(); ?>
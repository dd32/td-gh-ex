<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Big Blue
 */

get_header(); ?>
	
    <header class="search-query-title article-header">
        <div class="blue-overlay"></div>
        <div class="container">
        	<div class="entry-detail">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'big-blue' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </div>
        </div>
    </header><!-- .search-query-title" -->
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        	<div class="inner-wrapper">
                <div class="container">
                
                    <div class="row">
                        <div class="col-md-8">
							<?php
                            if ( have_posts() ) :
                    
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                    
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', 'search' );
                    
                                endwhile;
                    
                            else :
                    
                                get_template_part( 'template-parts/content', 'none' );
                    
                            endif; ?>
                            <?php the_posts_pagination( array(
                                'mid_size' => 2,
                                'prev_text' => '<span class="fa fa-chevron-left"></span>',  
                                'next_text' => '<span class="fa fa-chevron-right"></span>'
                            ) ); 
							?>
                        </div>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
            
            	</div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();?>

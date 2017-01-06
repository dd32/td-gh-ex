<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Big Blue
 */

get_header(); ?>
	
    <header class="article-header">
        <div class="blue-overlay"></div>
        <div class="container">
        	<div class="entry-detail">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'big-blue' ); ?></h1>
            </div>
        </div>
        
    </header><!-- .entry-header -->
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        	<div class="inner-wrapper">
            
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
        
                            <section class="error-404 not-found">
                                
                                <div class="page-content">
                                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'big-blue' ); ?></p>
                
                                    <?php
                                        the_widget( 'WP_Widget_Tag_Cloud' );
                                    ?>
                
                                </div><!-- .page-content -->
                            </section><!-- .error-404 -->
        
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
get_footer();

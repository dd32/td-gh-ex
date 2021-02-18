<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 */

get_header(); ?>

	<header class="entry-header article-header">
    	<?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
        <div class="blue-overlay"></div>
        <div class="container">
        	<div class="entry-detail">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <?php $tags_list = get_the_tag_list( '', esc_html__( ', ', 'big-blue' ) ); ?>
            </div>
        </div>
        
    </header><!-- .entry-header -->
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="inner-wrapper">
                <div class="container">
                
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            while ( have_posts() ) : the_post();
                
                                get_template_part( 'template-parts/content', 'page' );
                
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                
                            endwhile; // End of the loop.
                            ?>
						</div>
					</div>
                    
				</div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

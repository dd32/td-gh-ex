<?php
/**
 * The template for displaying all single posts.
 *
 * Template Name: Left sidebar Page
 */

get_header(); ?>
<div class="content-wrapper">
    <div class="container">
	<div id="primary" class="content-area">
             <div class="row">
                 
                 <div class="col-md-4">
                     <?php get_sidebar(); ?>
                 </div>
                 
            <div class="col-md-8">
                <div class="content-bar" id="content">
		 <!-- Start the Loop. -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                        <!-- ---------------Post starts ---------------- -->
                        <div id="post-<?php the_ID(); ?>" class="post">
                            <div class="page-heading">
                                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            
                            <div class="page-content clear">
                                <?php the_content(); ?>
                                
                                 <?php wp_link_pages( );  ?>
                        
                            </div>
                        </div>
                        <?php
                    endwhile;
                else:
                    ?>
                    <div>
                        <p>
                            <?php echo BFRONT_SORRY_NO_POST_MATCHED_YOUR_CRETERIA; ?>
                        </p>
                    </div>
                <?php endif; ?>

                </div>
                 </div>               
                 </div><!-- #main -->
	</div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>


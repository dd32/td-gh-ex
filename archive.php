<?php
/*
* archive.php
* The archive template. Used when a category, author, or date is queried. Also displays tag queries.
* Note that this template will be overridden by category.php, author.php, and date.php for their respective query types. 
*/
get_header(); ?>
<div id="content-wide-page" role="main">
    <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
     
    <section class="content-area-left">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-date">
                    <a href="<?php the_permalink() ?>"><?php the_date(); ?></a>
                </div>
                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                        <div class="metadata">
                            <p><span class="authorlinks"><?php the_author() ?> @ <?php the_time() ?> </span> 
                           
                        </div>
            </header>
                <article class="entry-lead">
                    
                    <?php the_excerpt(); ?>
                                
                </article>
                     
        </div> <!-- ends post -->  
                </section><!-- ends content-area-lead -->
   
    <?php endwhile; else: ?>
        <section class="content-area-left">
            <article class="entry-lead">
                <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
            </article>
        </section><!-- ends content-left -->
           
     <?php endif; ?>
           <div id="right-sidebar-absolute">
            <?php get_sidebar(); ?>
        </div>      
 
</div>


    <?php get_footer(); ?>
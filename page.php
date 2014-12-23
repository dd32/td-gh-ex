<?php
/* 
* page.php
 * @betilu
* The page template. Used when an individual Page is queried. 
*/
get_header(); ?>
<div id="content-wide-page" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="content-area-left">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-date">
                    <a href="<?php the_permalink() ?>"><?php the_date(); ?></a>
                </div>
                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                        <div class="metadata">
                            <p><span class="authorlinks"><?php the_author() ?> @ <?php the_time() ?> </span> 
                            <?php edit_post_link(__( ' [Edit This]', 'betilu' )); ?></p> 
                        </div>
            </header>
                <article class="entry-lead">
                    <?php if ( has_post_thumbnail() ) { 
                        the_post_thumbnail(); 
                        } else {
                	echo '<div></div>';
                    } ?>
                    <?php the_content(''); ?>
                        <?php wp_link_pages(); ?>
                            <?php get_template_part( 'social', 'content' ); ?><br>
                                <?php comments_template(); ?>         
                </article>
                    <!-- <?php trackback_rdf(); ?> -->
        </div> <!-- ends post -->  
                </section><!-- ends content-area-lead -->
        
    <?php endwhile; else: ?>
        <section class="content-area-left">
            <article class="entry-lead">
                <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
            </article>
        </section><!-- ends content-left -->
           
     <?php endif; ?>

        <div id="right-sidebar">
            <?php get_sidebar(); ?>
        </div> 

</div>
    <div id="right-sidebar-breaker"></div>
    <?php get_footer(); ?>
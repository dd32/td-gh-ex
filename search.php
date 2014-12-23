<?php
/*
 * search.php
 * The Search Found (or not) template. 
 */
get_header(); ?>
            <div id="content-wide-page" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <section class="content-area-left">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_date(); ?></a></div>
                                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                                <div class="metadata">
                                    <p class="authorlinks"><?php the_author() ?> @ <?php the_time() ?> </p>
                                    <?php edit_post_link(__( 'Edit This', 'betilu' )); ?>
                                </div>
                        </header>
                            <article class="entry-lead">
                                <?php the_excerpt(); ?>
                            </article>
                                <!-- <?php trackback_rdf(); ?> -->
                    </div> <!-- ends post -->  
                </section><!-- ends content-area-lead -->
            <?php endwhile; else: ?>
                    <section class="content-area-left">
                        <article class="entry-lead">
                            <br><h2><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></h2>
                            <h3><?php _e( 'Try another search, please.', 'betilu' ); ?></h3><br>
                            <p><?php get_search_form(); ?><br>
                        </article>
                     </section><!-- ends content-left --> 
            <?php endif; ?>
                <div id="right-sidebar-absolute">
                <?php get_sidebar(); ?>
                </div> 
            </div><!-- ends content wide container -->
                   <div class="breaker"></div>      
<?php get_footer(); ?>
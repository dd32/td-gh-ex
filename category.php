<?php
/*
* category.php
* The category template. Used when a category is queried. 
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
                                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                        </header>
                            <article class="entry-lead">
                                <?php the_excerpt(); ?>
                                    <?php the_tags(); ?>
                            </article>
                    </div><!-- ends post -->                            
                </section> 
            <?php endwhile; else: ?>
                    <section class="content-area-left">
                        <article class="entry-lead">
                            <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                        </article>
                    </section><!-- ends content-left -->  
            <?php endif; ?>
                        <aside id="right-sidebar">
                           <?php get_sidebar(); ?> 
                        </aside> 
                            <div class="breaker"></div>
                          
            </div><!-- ends wide-lead --> 

<?php get_footer(); ?>

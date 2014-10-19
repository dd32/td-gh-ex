<?php
/*
* archive.php
* The archive template. Used when a category, author, or date is queried. Also displays tag queries.
* Note that this template will be overridden by category.php, author.php, and date.php for their respective query types. 
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
                                <h5 class="linkcat"><?php _e( 'Archived Categories: ', 'betilu' ); echo '<span>'; the_category(); echo '</span>'; ?></h5>
                        </header>
                            <article class="entry-lead">
                                <?php the_excerpt(); ?>
                            </article>
                    </div><!-- ends post -->                                     
                </section><!-- ends content-area-left -->
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
            </div><!-- ends wide-lead --> <div class="breaker">&nbsp;</div>
<?php get_footer(); ?>

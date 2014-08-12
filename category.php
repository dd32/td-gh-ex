<?php
/*
* category.php
* The category template. Used when a category is queried. 
*/
get_header(); ?>
            <div id="content-wide-page" role="main">
                <h1><?php the_category(); ?></h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <section class="content-area-left">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <hgroup>
                                <div class="entry-date">
                                    <a href="<?php the_permalink() ?>"><?php the_date(); ?></a>
                                </div>
                                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                            </hgroup>
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
                        <aside id="right-sidebar-absolute">
                            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                            <?php dynamic_sidebar( 'sidebar-1' ); ?>
                            <?php endif; ?> 
                        </aside>        
                          
            </div><!-- ends wide-lead -->  <div class="breaker"></div>

<?php get_footer(); ?>

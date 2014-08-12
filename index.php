<?php
/*
 * index.php
 * @betilu
 * The main template.
 */ 
get_header(); ?>
            <div id="content-wide-lead" role="main"><p>page tpl</p>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                <section class="content-area-left">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <hgroup>
                                <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_date(); ?></a></div>
                                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                            </hgroup>
                                <div class="metadata">
                                    <?php _e( 'Filed under: ', 'betilu' ); ?>
                                    <span class="linkcat"> <?php the_category(',') ?> </span> - <?php the_author() ?> @ <?php the_time() ?> 
                                    <?php edit_post_link(__( 'Edit This', 'betilu' )); ?>
                                </div>
                        </header>
                            <article class="entry-lead">
                                <?php if ( has_post_thumbnail() ) { 
                                the_post_thumbnail(); 
                                } else {
                	        echo '<div></div>';
                                    } ?>
                                    <?php the_content(__( '(more...)', 'betilu' )); ?>
                                        <p><?php the_tags(); ?></p> <?php wp_link_pages(); ?>
                                        <?php comments_template(); ?>
                            </article>
                                <!-- <?php trackback_rdf(); ?> -->

                    </div> <!-- ends post one -->   <div class="breaker"></div>
                </section><!-- ends content-area-lead -->

            <?php endwhile; ?>
          
            <?php endif; ?>
                <div>
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <div id="right-sidebar">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    </div>
                <?php endif; ?>
                          <div class="breaker"></div>
            </div>

            </div><!-- ends content wide container -->
<?php get_footer(); ?>

<?php
/*
 * Template Name: Full-Width-Page
 * @betilu
 * The full width page template.
 */ 
get_header(); ?>
            <div id="full-width" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                <section class="content-wide-content">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_date(); ?></a></div>
                                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                                <div class="metadata">
                                    <?php _e( 'Filed under: ', 'betilu' ); ?>
                                    <p class="authorlinks"><?php the_author() ?> @ <?php the_time() ?> </p>
                                    <?php edit_post_link(__( 'Edit This', 'betilu' )); ?>
                            </div>
                        </header>
                            <article class="entry-lead">
                                <?php if ( has_post_thumbnail() ) { 
                                the_post_thumbnail(); 
                                } else {
                	        echo '<div></div>';
                                    } ?>
                                    <?php the_content(''); ?>
                                        <p><?php the_tags(); ?></p> <?php wp_link_pages(); ?>
                                        <?php comments_template(); ?>
                            </article>
                                <!-- <?php trackback_rdf(); ?> -->

                    </div> <!-- ends post one -->   <div class="breaker"></div>
                </section><!-- ends content-area-lead -->

            <?php endwhile; endif; ?>
            </div><!-- ends content wide container --> <div class="breaker"></div>
<?php get_footer(); ?>

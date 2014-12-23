<?php
/*
 * content part - aka the loop!
 * Please note that trackback rdf must stay in comment for XHTML 
 * to work with HTML. Do not remove its comment element.
*/
if (have_posts()) : while (have_posts()) : the_post(); ?>
                <section class="content-left">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <div class="hgroup">
                                <div class="entry-date"><?php the_date('','<h4>','</h4>'); ?></div>
                                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                            </div>
                                <div class="metadata">
                                    <?php _e( 'Filed under: ', 'betilu' ); ?><span class="linkcat"> <?php the_category(',') ?> </span> - <?php the_author() ?> @ <?php the_time() ?> 
                                    <?php edit_post_link(__( 'Edit This', 'betilu' )); ?>
                        </header>
                            <article class="entry">
                                <?php if ( has_post_thumbnail() ) { 
                                the_post_thumbnail(); 
                                } else {
                	        echo '<div></div>';
                                } ?>
                                <?php the_content(''); ?>
                                    <?php wp_link_pages(); ?>
                                        <p><?php the_tags(); ?></p>
                            </article>  
                    <!-- <?php trackback_rdf(); ?> -->
                </section>
                    <div class="navigation">
                        <p><?php posts_nav_link(); ?></p>
                    </div>
                       <?php get_template_part( 'social', 'content' ); ?>
            <?php endwhile; else: ?>
                <section class="content-area">
                    <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                </section>            
            <?php endif; ?>
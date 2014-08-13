<?php
/*
 * home.php
 * @betilu
 * The home page template, which is the front page by default. 
 * If you use a static front page this is the template for the page with the latest posts (blog).
 */
get_header(); ?>
            <div id="content-wide-lead" role="main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php static $count = 1; 
                if ($count == "2" ) { break; }
                else { ?>
                <section class="content-area-lead">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <hgroup>
                                <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_date(); ?></a></div>
                                <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark">
                                <?php the_title(); ?></a></h1>
                            </hgroup>
                                <div class="metadata">
                                    <div class="authorlinks"><?php the_author() ?> @ <?php the_time() ?></div>
                                    
                                </div>
                        </header>
                            <article class="entry-lead">
                                <?php if ( has_post_thumbnail() ) { 
                                the_post_thumbnail(); 
                                } else {
                	        echo '<div></div>';
                                    } ?>
                                    <?php the_content(''); ?>
                                        <p class="linkcat"><?php _e( 'Filed under: ', 'betilu' ); ?> <?php the_category(', ') ?> </p> 
                                            <?php edit_post_link(__( ' Edit This', 'betilu' )); ?>
                                                <p><?php the_tags(); ?></p> 
                                                    <p class="pagination"> <?php wp_link_pages(); ?></p>
                            </article>
                                <!-- <?php trackback_rdf(); ?> -->
                                <?php comments_template(); ?>
                </section><!-- ends content-area-lead -->
                <?php $count++; } ?>
            <?php endwhile; ?>

                <?php else : ?>
                <section class="content-area">
                    <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                </section>            
            <?php endif; ?>
                    <aside class="post-right">
                        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                        <?php endif; ?>
                    </aside> 
     
            </div><!-- ends content-wide-lead --> 

                    <div class="midbar">
                        <?php $options = get_option( 'betilu_theme_options' ); ?>
                        <div class="text-add">
                            <div id="text-one"><?php echo $options['betilu_new_text']; ?>
                            </div>
                                <p><?php echo date('l, F j, Y'); ?></p>
                        </div>                               
                    </div> <!-- ends midbar -->
                        
<div class="breaker">&nbsp;</div>
            
            <!-- //secondary section with four boxes -->
                        
                <div id="content-wide" role="main">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <section class="content-area-fours">
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <hgroup>
                                        <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_time('M j, Y @ G:i'); ?></a></div>
                                        <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h1>
                                    </hgroup>
                                        <div class="metadata">
                                            <span class="authorlinks"><?php the_author() ?></span>
                                </header>
                                    <article class="entry">
                                        <?php if ( has_post_thumbnail() ) { 
                                        the_post_thumbnail(); 
                                        } else {
                	                echo '<div></div>';
                                        } ?>
                                            <?php the_excerpt(''); ?>
                                                <p class="pagination"> <?php wp_link_pages(); ?></p>  
                                                        
                                    </article>
                                    <!-- <?php trackback_rdf(); ?> -->
                                        <?php comments_template(); ?>
                            </div> <!-- ends post fours -->
                        </section> <!-- ends content-four --> 
                    <?php endwhile; ?>

                    <?php else : ?>
                        <section class="content-area-fours">
                            <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                        </section>            
                    <?php endif; ?>
                           <div class="navigation">
                               <p><?php if (!empty($prevID)) : ?><a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">Previous</a>
                                   <?php else : ?><a href="#"> &#8647; </a><?php endif; ?>
                               <span>
                                   <?php if (!empty($nextID)) : ?><a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">Next</a>
                                   <?php else : ?><a href="#"> &#8649; </a><span>
                                   <?php endif; ?>
                               </p>
                           </div>
                </div> <!-- ends content-wide --> <div class="breaker"></div>
                    <div class="midbar">
                        <?php $options = get_option( 'betilu_theme_options' ); ?>
                        <div class="text-add">
                            <div id="text-one"><?php echo $options['betilu_new_text']; ?>
                            </div>
                                <p><?php echo date('l, F j, Y'); ?></p>
                        </div>
                    </div> <!-- ends midbar -->
<div class="breaker"></div>

<?php get_footer(); ?>

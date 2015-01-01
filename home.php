<?php
/*
 * home.php
 * @betilu
 * The home page template, which is the front page by default. 
 * If you use a static front page this is the template for the page with the latest posts (blog).
 */
get_header(); ?>
    <div id="content-wide-lead" role="main">
        <?php get_template_part( 'content', 'lead' ); ?>
    </div><!-- ends content-wide-lead -->
        <div class="midbar">
            <?php $options = get_option( 'betilu_theme_options' ); ?>
            <div class="text-add">
                <div id="text-one">
                    <?php echo esc_attr( $options['betilu_new_text'] ); ?>
                </div>
                    <p class="midbar-date"><?php echo esc_attr( date('l, F j, Y') ); ?></p>
            </div>                               
        </div> <!-- ends midbar --> 
            <div class="breaker">&nbsp;</div>

               <!-- secondary section with four boxes -->
                        
                <div id="content-wide" role="main">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <section class="content-area-fours">
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <div class="entry-date"><a href="<?php the_permalink() ?>"><?php the_time('M j, Y @ G:i'); ?></a></div>
                                    <h1 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></h1>
                                    <div class="authorlinks"><?php the_author() ?></div>
                                </header>
                                    <article class="entry">
                                        <?php if ( has_post_thumbnail() ) { 
                                        the_post_thumbnail(); 
                                        } else {
                	                echo '<div></div>';
                                        } ?>
                                            <?php the_excerpt(''); ?>  
                                    </article>
                                    <!-- <?php trackback_rdf(); ?> -->
                                    <!-- <?php comments_template(); ?> -->
                            </div> <!-- ends post fours -->
                        </section> <!-- ends content-four -->
                    <?php endwhile; ?>
                    <?php else : ?>
                        <section class="content-area-fours">
                            <p><?php _e( 'No posts matched your criteria.', 'betilu' ); ?></p>
                        </section>            
                    <?php endif; ?>
                        
                            <?php betilu_numeric_posts_nav(); ?>
                         
                </div> <!-- ends content-wide --> <div class="breaker"></div>
                    <div class="midbar">
                        <?php $options = get_option( 'betilu_theme_options' ); ?>
                        <div class="text-add">
                            <div id="text-one">
                                <?php echo esc_attr( $options['betilu_new_text'] ); ?>
                            </div>
                                <p class="midbar-date"><?php echo esc_attr( date('l, F j, Y') ); ?></p>
                        </div>
                    </div> <!-- ends midbar --> 
                        <div class="breaker"></div>
<?php get_footer(); ?>
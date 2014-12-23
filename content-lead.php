<?php 
/** shows single lead article in top frame 
 *  sticky gets priority
 *  @theme betilu
 */
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php static $count = 1; 
    if ($count == "2" ) { break; }
        else { ?>
    <section class="content-area-lead">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="entry-date">
                    <a href="<?php the_permalink() ?>"><?php the_date(); ?></a>
                </div>
                    <h1 class="entry-title" id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h1>
                        <div class="authorlinks"><?php the_author() ?> @ <?php the_time() ?></div>
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
                <?php else : ?> 
                <?php the_widget('WP_Widget_Recent_Posts', array('number' => 4, 'title' => 'Latest News'), array('before_title' => '<h3>', 'after_title' => '</h3>')); ?>
            <?php endif; ?>
        </aside>
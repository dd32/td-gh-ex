<?php
/*
 * single.php
 * @betilu
 * The single post template. Used when a single post is queried. 
 * For this and all other query templates, index.php is used if the query template is not present. 
 * 
 */    
get_header(); ?>
            <div id="content-wide-page" role="main">
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
                                        <div class="pagination">
                                            <?php wp_link_pages( array(
                                                  'before' => '<p>' . __( 'Pages: &nbsp; ', 'betilu'),
                                                  'after' => '</p>' ) ); ?>
                                        </div>
                                        <br>
                                <div class="metadata"> 
                                    <span class="linkcat"><?php _e( 'Filed under: ', 'betilu' ); ?> <?php the_category(', ') ?> </span>
                                        <p class="taglink"><?php the_tags(); ?></p>
                                </div>
                                        <?php comments_template(); ?>
                       <?php get_template_part( 'social', 'content' ); ?><br>
                                        <div class="navigation">
                                            <p><?php previous_post_link(); ?><span><?php next_post_link(); ?></span></p>
                                        </div>              
                            </article>
                                <!-- <?php trackback_rdf(); ?> -->
                    </div> <!-- ends post one -->   <div class="breaker"></div>
                </section><!-- ends content-area-left -->
            <?php endwhile; endif; ?>
                <div id="right-sidebar">
                <?php get_sidebar(); ?>
                </div>
            </div><!-- ends content wide container --> <div class="breaker"></div>
<?php get_footer(); ?>
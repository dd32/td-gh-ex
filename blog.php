<?php
/*
  Template Name: Blog Page
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page_heading">
                <h1><?php appointway_breadcrumbs(); ?>
                </h1>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="page_content">
                <div class="grid_17 alpha">
                    <div class="content_bar">
                        <?php
                        $limit = get_option('posts_per_page');
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        // The Query                      
                        $the_query = new WP_Query();
                        $the_query->query( 'showposts='.$limit.'&paged='.$paged );
                        ?>                      
                        <!-- Start the Loop. -->
                        <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <!--Start post-->
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                        <div class="postimg">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                        <?php
                                    } 
                                    ?> 					
                                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                    <div class="post_content"> 
                                        <ul class="post_meta">
                                            <li class="posted_by"><span>&nbsp;<?php the_author_posts_link(); ?></span></li>
                                            <li class="posted_in">&nbsp;&nbsp;<?php the_category(', '); ?></li>
                                            <li class="post_date"><span>on&nbsp;<?php echo get_the_time('M, d, Y') ?></span></li>
                                            <li class="postc_comment"><span>&nbsp;<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></span></li>
                                        </ul>
                                        <?php the_excerpt(); ?>
                                        <a class="read-more" href="<?php the_permalink() ?>">Read More</a>
                                    </div>
                                </div>
                                <div class="clear"></div>                          
                                <?php endwhile;
                            ?>
                            <nav id="nav-single"> <span class="nav-previous">
                                    <?php next_posts_link(__('&larr; Older posts','appointway'), $the_query->max_num_pages) ?>
                                </span> <span class="nav-next">
                                    <?php previous_posts_link(__('Newer posts &rarr;', 'appointway')); ?>
                                </span> </nav>
                            <?php
                        else:
                            ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <p>
                                    <?php _e('Sorry, no posts matched your criteria.', 'appointway'); ?>
                                </p>
                            </div>
                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>  
                    </div>
                </div>
                <div class="grid_7 omega">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>
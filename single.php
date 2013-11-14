<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
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
                        <!-- Start the Loop. -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <!--Start post-->
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="post_thumbnail"><?php the_post_thumbnail(); ?></div>
                                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                    <div class="post_content"> 
                                        <ul class="post_meta">
                                            <li class="posted_by"><span>&nbsp;<?php the_author_posts_link(); ?></span></li>
                                            <li class="posted_in">&nbsp;&nbsp;<?php the_category(', '); ?></li>
                                            <li class="post_date"><span>on&nbsp;<?php echo get_the_time('M, d, Y') ?></span></li>
                                            <li class="postc_comment"><span>&nbsp;<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></span></li>
                                        </ul>
                                        <?php the_content(); ?>
                                        <div class="clear"></div>
                                        <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'appointway') . '</span>', 'after' => '</div>')); ?>
                                        <?php if (has_tag()) { ?>
                                            <div class="tag">
                                                <?php the_tags(__('Post Tagged with ', ', ', '')); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endwhile;
                        else:
                            ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <p>
    <?php _e('Sorry, no posts matched your criteria.', 'appointway'); ?>
                                </p>
                            </div>
<?php endif; ?>
                        <div class="clear"></div>
                        <!--End post-->
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span> Previous Post ', 'appointway')); ?>
                            </span> <span class="nav-next">
<?php next_post_link('%link', __('Next Post <span class="meta-nav">&rarr;</span>', 'appointway')); ?>
                            </span> </nav>
                        <!--Start Comment box-->
<?php comments_template(); ?>
                        <!--End Comment box-->
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

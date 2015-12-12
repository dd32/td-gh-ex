<?php
/**
  /**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 *
 */
get_header();
?>
<!-- ----------------------------------------------- -->
<!-- ---------------Archive template ------------------ -->
<!-- ----------------------------------------------- -->
<div class="content-wrapper">
<div class="container">
<div id="primary" class="content-area">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-md-8">
                <div class="content-bar">
                <!-- ----------------Archives loop starts --------------------- -->

                <?php if (have_posts()): ?>

                    <?php
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                    /* Run the loop for the archives page to output the posts.
                     * If you want to overload this in a child theme then include a file
                     * called loop-archives.php and that will be used instead.
                     */
                    

 if (have_posts()) : while (have_posts()) : the_post(); ?>  
        <!-- ---------------Post starts ---------------- -->
        <div id="post-<?php the_ID(); ?>" class="blog-post">
            
            <div class="blog-date">
                <span class="blog-day"><?php echo esc_html( get_the_date('j') ) ?></span>
                <span class="blog-month-year"><?php echo esc_html( get_the_date('M Y') ) ?></span>
            </div>
            
            <div class="thumb clear">
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( array(710, 380) ); ?>  </a>
                    <?php
                } else {
                  }
                ?>	
            </div>
            
            <div class="post-heading">
                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div class="post-meta">
                <ul>
                    <li class="meta-admin"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></li>
                    <li class="meta-cat"><i class="fa fa-folder-open"></i>  <?php the_category(', '); ?></li>
                    <li class="meta-tag"><i class="fa fa-tag"></i> <?php the_tags(''); ?></li>
                    <li class="meta-comm"><i class="fa fa-comment"></i> <?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></li>
                </ul>
            </div>

            <div class="post-content clear">
                <?php echo the_excerpt(); ?>
                <?php wp_link_pages(); ?>
            </div>
            
            <div class="post-readmore">
                <a href="<?php the_permalink() ?>" class="wpanch"><?php echo sprintf(
                    esc_html__( 'Continue reading..%s', 'bfront' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                   ) ; ?>
                </a>
            </div>    
            
        </div>
        <?php
    endwhile;
else:
    ?>
    <div>
        <p>
            <?php _e('Sorry no post matched your criteria', 'bfront'); ?>
        </p>
    </div>
<?php endif; ?>
<!--End Loop-->
                    

                    <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(BFRONT_OLDER_POSTS); ?>
                        </span> <span class="nav-next">
                            <?php previous_posts_link(BFRONT_NEWER_POSTS); ?>
                        </span> </nav>
                <?php endif; ?>
                <!-- ------------------Archives loop ends----------------------- -->
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>    
<?php get_footer(); ?>

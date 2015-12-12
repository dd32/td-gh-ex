<?php
/**
 * The template for displaying Author pages.
 *
 */
get_header();
?>
<!-- *** Single Post Starts *** -->
<div class="content-wrapper">
<div class="container">
<div id="primary" class="content-area">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-md-8">
                <div class="content-bar">
                        <?php if (have_posts()) : the_post(); ?>
                            <h4><?php printf(BFRONT_AUTHOR_ARCHIVES,
                                "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); ?></h4>
                            <?php
                            // If a user has filled out their description, show a bio on their entries.
                            if (get_the_author_meta('description')) :
                                ?>
        <?php echo get_avatar(get_the_author_meta('user_email'),
                apply_filters('bfront_author_bio_avatar_size',
                        60)); ?>
                                <h5 class="auth-title"><?php printf(BFRONT_ABOUT_AUTHOR,
                                get_the_author()); ?></h5>
                                <p class="auth-desc"><?php the_author_meta('description'); ?></p>
                        <?php endif; ?>
                        
                        <?php
                        /* Since we called the_post() above, we need to
                         * rewind the loop back to the beginning that way
                         * we can run the loop properly, in full.
                         */
                        rewind_posts();
                        /* Run the loop for the author archive page to output the authors posts
                         * If you want to overload this in a child theme then include a file
                         * called loop-author.php and that will be used instead.
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
                        

                       
                <?php endif; ?>

                    <!-- *** Post loop ends*** -->
                    </div><?php bfront_numeric_posts_nav() ?>
                    </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>

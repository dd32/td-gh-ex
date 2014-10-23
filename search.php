<?php get_header(); ?>

<div class="full-width-container blog-section individual-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="archive-title">
                    <span>
                        <!-- search title -->
                        <?php if ( is_search() ) :	?>
                            <?php _e('Search Results for', THEMEORA_THEME_NAME); ?> 
                            '<?php the_search_query() ?>'
                        <?php endif; ?>

                        <!-- tag title -->
                        <?php if ( is_tag() ) :	?>
                            <?php single_tag_title(); ?>
                        <?php endif; ?>

                        <!-- category title -->
                        <?php if ( is_category() ) :	?>
                            <?php single_cat_title(); ?>
                        <?php endif; ?>
                    </span>
                </h1>

                <!-- page content -->
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser styled-box'); ?>>
                            <?php themeora_post_media( $post->ID, 'themeora-thumbnail-span-8' ); ?>
                            <div class="content">
                                <h2 class="title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php themeora_entry_meta(); ?>
                            </div>
                        </article><!-- end post-teaser -->
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php _e('Sorry, nothing was found. Please try again.', THEMEORA_THEME_NAME); ?>
                <?php endif; ?>
    			<!-- end page content -->
			</div><!-- end span8 -->

            <?php get_sidebar(); ?>

        </div><!-- end row -->
    </div> <!-- end container -->
</div><!-- end main-content-area -->

<?php get_footer(); ?>
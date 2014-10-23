<?php get_header(); ?>

<div class="full-width-container blog-section blog-single-post individual-page">
	<div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ( have_posts() ) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php themeora_load_content($post->ID) ?>
                        <!-- begin meta area -->
                        <div class="meta-space">
                            <?php 
                            //load post navigation
                            themeora_post_nav();
                            //load post tags
                            themeora_post_tags();
                            //load post author function
                            themeora_post_author_meta(); 
                            ?>
                        </div>
                        <!-- end meta-space area -->

                        <!-- begin comments -->
                        <div class="blog-comments styled-box mobile-stack">
                            <?php comments_template(); ?>
                        </div>
                        <!-- end comments -->
                    <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- end col-md-8 -->
            
            <?php get_sidebar(); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end full-width-container -->

<?php get_footer(); ?>
<?php get_header(); ?>

<section class="full-width-container blog-section">
    <div class="container">
        <h1 class="archive-title"><?php
            if ( is_day() ) :
                printf( __( 'Posts for %s', THEMEORA_THEME_NAME ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'Posts for %s', THEMEORA_THEME_NAME ), get_the_date( _x( 'F Y', 'monthly archives date format', 'themeora' ) ) );
            elseif ( is_year() ) :
                printf( __( 'Posts for %s', THEMEORA_THEME_NAME ), get_the_date( _x( 'Y', 'yearly archives date format', 'themeora' ) ) );
            else :
                _e( 'Post Archive', THEMEORA_THEME_NAME );
            endif;
        ?></h1>
	    <div class="row">
            <div class="col-md-8">
                <!-- page content -->
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php themeora_load_content($post->ID) ?>
                    <?php endwhile; ?>
                <?php endif; ?>
    			<!-- end page content -->

                <?php themeora_paging(); ?>                
            </div>

            <?php include 'includes/sidebar.php'; ?>

        </div><!-- end row -->
    </div><!-- end Container -->
</section><!-- end full-width-container -->


<?php get_footer(); ?>
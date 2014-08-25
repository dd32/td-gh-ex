<?php 
get_header(); 

?>

<div class="full-width-container blog-section individual-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="content">
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
</div><!-- end full-width-container -->

<?php get_footer(); ?>
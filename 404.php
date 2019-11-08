<?php get_header(); ?>

<section class="full-width-container main-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php if ( ! have_posts() ) : ?>
                    <h1 class="title">
                        <i class="fa fa-exclamation-circle"></i>
                        <?php _e('Sorry! We cant find that page!', 'atwood'); ?>
                    </h1>
                    <div class="well">
                        <p><?php _e( 'Why not try searching for the page you want?', 'atwood' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end content -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end full-width-container -->

<?php get_footer(); ?>
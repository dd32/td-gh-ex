<?php
/**
 *  404 page
 */

get_header(); ?>

    <section class="content-wrapper">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="eight columns">
                        
                        <section class="error-404 not-found">

                            <header class="page-header">
                                <h1 class="page-title">
                                    <?php echo __( 'Oops! page not found.', "bnw-theme" ); ?>
                                </h1>
                            </header>

                            <div class="page-content">
                                <p>
                                    <?php echo __( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', "bnw-theme" ); ?>
                                </p>

                                <?php get_search_form(); ?>

                            </div>
                            
                        </section>
                    </div>
                    <div class="four columns">

                        <?php get_sidebar(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

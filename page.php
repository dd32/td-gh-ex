<?php
/**
 *  Page
 */

get_header(); ?>

    <section class="content-wrapper">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="twelve columns">

                        <?php if ( have_posts() ) : ?>
                            <header class="page-header page-header-page">
                                <?php                                    
                                    the_title( '<h1 class="page-header-title">', '</h1>' );
                                ?>
                            </header>
                        <?php endif; ?>

                        <div class="entry-wrapper-page">

                            <?php while ( have_posts() ): ?>

                                <?php the_post(); ?>
                                
                                <?php get_template_part( 'template-parts/page/content', 'page' ); ?>

                                <?php get_template_part( 'template-parts/extra/author'); ?>

                                <div class="entry-post-navigation">
                                    <?php //the_post_navigation(); ?>
                                </div>
                                
                                <div class="comment-wrapper">
                                    <?php 
                                        if( comments_open() ){
                                            comments_template();
                                        }
                                    ?>
                                </div>

                            <?php endwhile; ?>
                        
                        </div>
                    </div>
                    <!--
                    <div class="four columns">
                        Sidebar
                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

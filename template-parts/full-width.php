<?php 
/*
Template Name: Full Width
*/
get_header(); ?>
<!--/////START Blog Title/////-->
<div class="blog-title-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="title-blog-area">
                   <h1 class="heading-title"> 
                      <?php  the_title(); ?>
                    </h1>
                    <div class="title-divider">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="main-breadcrumb">                    
                <?php if (function_exists('best_classifieds_custom_breadcrumbs')) best_classifieds_custom_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/////START Blog Title/////-->
<!--/////START Latest Blog Section/////-->
<div class="blog-page-wrap">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="main-blog-section">
                <?php if ( have_posts() ) :?>                                      
                    <?php while ( have_posts() ) : the_post(); ?>   
                        <?php if(has_post_thumbnail()): the_post_thumbnail( 'full'); endif; ?>
                        <div class="blog-post-content">                                   
                           <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>                   
                    <!-- Pagination Start -->            
                    <div class="nav-pagination">                                    
                        <?php
                        wp_link_pages( array(
                            'before'      => esc_html__( 'Pages:', 'best-classifieds' ),
                            'after'       => '',
                            'link_before' => '',
                            'link_after'  => '',
                            'pagelink'    => esc_html__( 'Page', 'best-classifieds' ),
                            'separator'   => '/',
                        ) ); ?>
                    </div>                        
                    <!-- Pagination End -->
                <?php endif; ?>
                </div>
            </div>            
        </div>
    </div>
</div>
<!--/////END Latest Blog Section/////-->
<?php get_footer();
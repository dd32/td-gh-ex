<?php
/**
 * The template for displaying single posts
 * @package Best Classifieds
 */
get_header();
$sidebar_style = get_theme_mod('single_sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12'; ?>
<!--/////START Blog Title/////-->
<div class="blog-title-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="title-blog-area">
                   <h1 class="heading-title"><?php the_title(); ?></h1>
                    <div class="title-divider">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="main-breadcrumb single-page-breadcrumb"> 
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
                <?php if($sidebar_style == 'left_sidebar'){ get_sidebar(); } ?>
                <div class="<?php echo esc_attr($column_classes); ?>">
                    <div class="main-blog-section">
                        <div class="row">
                            <?php if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); ?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="main-blog-area">
                                    <?php if(has_post_thumbnail()):?>                                        
                                    <div class="blog-post-img">
                                        <?php the_post_thumbnail( 'best-classifieds-blog-image', array('class' => '') ); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="blog-post-content">
                                        <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date()); ?></span>                                    
                                       <?php the_content(); 
                                        wp_link_pages( array(
                                            'before'      => esc_html__( 'Pages:', 'best-classifieds' ),
                                            'after'       => '','link_before' => '','link_after'  => '',
                                            'pagelink'    => esc_html__( 'Page', 'best-classifieds' ),
                                            'separator'   => '/',
                                        ) ); ?>
                                    </div>
                                    <div class="blog-post-bottom">
                                        <div class="blog-post-entry-meta blog-post-author">
                                           <ul> 
                                            <?php best_classifieds_entry_meta(); ?>
                                            </ul> 
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <?php endwhile;?>                            
                            
                            <!-- Pagination Start -->                        
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="nav-pagination">                                    
                                    <?php the_post_navigation( array(
                                        'prev_text'          => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>  Previous',
                                        'next_text'          => 'Next <i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                                        'screen_reader_text'        => ' ',
                                    ) ); ?>       
                                </div>
                            </div>
                            <!-- Pagination End -->
                            <?php  endif;?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php comments_template();?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar-start -->
                <?php if($sidebar_style == 'right_sidebar'){ get_sidebar(); } ?>
                <!-- sidebar End -->
            </div>
        </div>
    </div>
    <!--/////END Latest Blog Section/////-->
<?php get_footer();
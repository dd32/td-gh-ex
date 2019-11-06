<?php
/**
 * The template for displaying single page
 * @package Best Classifieds
 */
get_header(); 
$sidebar_style = get_theme_mod('singlepage__sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12';?>
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
            <?php if($sidebar_style == 'left_sidebar'){ get_sidebar(); } ?>
            <div class="<?php echo esc_attr($column_classes); ?>">
                <div class="main-blog-section">
                <?php if ( have_posts() ) :?>
                    <div class="row">                        
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 col-xs-12'); ?>>                        
                            <div class="main-blog-area">
                                <?php if(has_post_thumbnail()): the_post_thumbnail( 'full'); endif; ?>
                                <div class="blog-post-content">                                   
                                   <?php the_content(); ?>
                                </div>                                
                            </div>
                        </div>
                    <?php endwhile; ?>                            
                    </div>
                    <!-- Pagination Start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>
                    <!-- Pagination End -->
                <?php endif; ?>
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
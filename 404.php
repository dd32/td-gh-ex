<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Best Classifieds
 */

get_header(); 
$sidebar_style = get_theme_mod('sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12'; ?>
<!--/////START Blog Title/////-->
<div class="blog-title-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="title-blog-area">
                   <h1 class="heading-title"><?php printf(/* translator: %s is query sting.*/esc_html__('Error 404 : %s', 'best-classifieds'), esc_html(get_search_query()) );  ?></h1>
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
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            	<h2><?php esc_html_e( "Oops! That page can't be found.", 'best-classifieds' ); ?></h2>
                              <p><?php  esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'best-classifieds');
                                get_search_form(); ?></p>
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
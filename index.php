<?php
/**
 * The template for displaying blog
 * @package Best Classifieds
 */
get_header();
$sidebar_style = get_theme_mod('sidebar_style','right_sidebar');
$column_classes =($sidebar_style == 'no_sidebar')?'col-md-10 col-sm-12 col-xs-12 col-md-offset-1':'col-md-8 col-sm-8 col-xs-12';
$divider =2;  ?>
<!--/////START Blog Title/////-->
<div class="blog-title-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="title-blog-area">
                   <h1 class="heading-title"> <?php $pagefor_post=get_option( 'page_for_posts' ); if(!empty($pagefor_post) ):
                        echo esc_html(get_the_title($pagefor_post));
                    else:
                        esc_html_e('BLOG','best-classifieds');
                    endif; ?></h1>
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
                            <?php if ( have_posts() ) : $iCounter=0;
                            while ( have_posts() ) : the_post();  ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="main-blog-area">
                                    <?php if(!get_theme_mod('blog_post_image',false) && has_post_thumbnail()):?>
                                        <a href="<?php the_permalink(); ?>" class="blog-post-img">
                                        <?php the_post_thumbnail( 'best-classifieds-blog-image', array('class' => '') ); ?>
                                        </a>
                                    <?php endif; ?>   
                                                 
                                    <div class="blog-post-content">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date()); ?></span>
                                       <?php the_excerpt(); ?>
                                    </div>
									<?php if(!get_theme_mod('blog_meta_tag',false) || !get_theme_mod('blog_post_readmore',false)):?>
                                    <div class="blog-post-bottom">
                                        <?php if(!get_theme_mod('blog_meta_tag',false)):?>
                                        <div class="blog-post-entry-meta blog-post-author">
                                           <ul> 
                                            <?php best_classifieds_entry_meta(); ?>
                                            </ul> 
                                        </div>
                                    <?php endif; if(!get_theme_mod('blog_post_readmore',false)): ?>
                                        <div class="blod-post-read-more">
                                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','best-classifieds'); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                        </div>
                                         <?php endif; ?>
                                    </div>
									 <?php endif; ?>
                                </div>
                            </div>
                        <?php  $iCounter++; echo ($iCounter % $divider)?'':'<div class="clearfix"></div>';
                        endwhile;?>                            
                        </div>
                        <!-- Pagination Start -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="nav-pagination">                                    
                                    <?php the_posts_pagination( array(
                                        'type'  => 'list',
                                        'screen_reader_text' => ' ',
                                        'prev_text'          => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'.esc_html__(' Previous','best-classifieds'),
                                        'next_text'          => esc_html__('Next','best-classifieds').' <i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                                    ) ); ?>       
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                        <?php  endif;?>
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
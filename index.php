<?php
/**
 * The main template file
 * */
get_header();
$advent_options = get_option('advent_theme_options');
?>
<section>
    <!--Breadcrumb  Part Start-->
    <div class="breadcumb-bg">
        <div class="webpage-container container">
            <div class="site-breadcumb">
                <h1><?php _e('Blog', 'advent') ?></h1>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li>
                        <?php if (function_exists('advent_custom_breadcrumbs')) advent_custom_breadcrumbs(); ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>    
    <!--Breadcrumb Part End-->
    <!-- Blog Posts start -->
    <div class="webpage-container">
        <div class="blog-main">
            <div class="col-md-9 col-sm-8">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-details ">
                        <div class="blog-head">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
                            <ul><?php advent_entry_meta(); ?></ul>
                        </div>
                        <?php $advent_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'large'); ?>
                        <?php if ($advent_image[0] != "") { ?>
                            <div class="blog-img">
                                <img src="<?php echo esc_url($advent_image[0]); ?>" width="<?php echo $advent_image[1]; ?>" height="<?php echo $advent_image[2]; ?>" alt="<?php echo get_the_title(); ?>" class="img-responsive" />
                            </div>
                        <?php } ?>
                        <div class="blog-info">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php endwhile; ?> 
                <div class="post-pagination col-md-12 no-padding">
                    <div class="page-links">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous', 'advent'),
                            'next_text' => '&nbsp;&nbsp;' . __(' Next', 'advent')
                        ));
                        ?></div>
                </div>
            </div>	
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- Blog Posts End -->
</section>
<?php get_footer(); ?>

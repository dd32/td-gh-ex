<?php
/**
 * Template Name: Left Sidebar
 * */
get_header();
?>
<section>

    <!--Breadcrumb Start-->
    <div class="breadcrumb-bg">
        <div class="royals-container container">
            <div class="site-breadcumb">
                <h1><?php the_title(); ?></h1>
                <ol class="breadcrumb breadcrumb-menubar">
                    <?php if (function_exists('avocation_custom_breadcrumbs')) avocation_custom_breadcrumbs(); ?>                             
                </ol>
            </div>  
        </div>
    </div>
    <!--Breadcrumb End-->   


    <!--Our-Blog  Start-->
    <div class="avocation-container  container"> 

        <div class="blog-wrap">
            <?php get_sidebar(); ?>

            <div class="blog-page col-md-offset-1 col-md-8 col-sm-8">                        
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-box">
                        <div class="item">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-box-img">
                                    <?php the_post_thumbnail('avocation-latest-post', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo get_permalink(); ?>" class="blog-title"><?php esc_attr(the_title()); ?></a>  
                        <?php avocation_entry_meta(); ?> 
                        <div class="our-blog-details">
                            <?php the_content(); ?>

                        </div>
                    </div> 
                <?php endwhile; ?>   

                <div class="comments-article">
                    <?php comments_template('', true); ?>
                </div>


            </div>



        </div>
    </div>
</div>
<!--Our-Blog End-->

</section>

<?php get_footer(); ?>

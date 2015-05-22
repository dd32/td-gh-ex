<?php
/* Template Name: Homepage */

?>
<?php get_header(); ?>

<!--==============================Section start=================================-->
<section>
	
    <!--Slider Start-->
    <?php  $avocation_soliloquy = get_theme_mod( 'avocation_soliloquy' );
			if(!empty($avocation_soliloquy)){
				if ( function_exists( 'soliloquy' ) ) { soliloquy( $avocation_soliloquy ); }
			}
    ?>
<!--Slider End-->   

<!--Purpose-Business  Start-->
    <div class="business-wrap">
        <span class="mask-overlay"></span>
        <div class="avocation-container  container business-box"> 
<?php $purpose_check = get_theme_mod( 'avocation_purposetitle' );
    if(!empty($purpose_check)) {?>
            <h2><?php echo esc_attr( get_theme_mod('avocation_purposetitle', '') ); ?></h2> <?php } ?>
            <?php $purposeinfo_check = get_theme_mod( 'avocation_purposeinfo' );
    if(!empty($purposeinfo_check)) {?>
            <p><?php echo esc_textarea( get_theme_mod('avocation_purposeinfo', '') ); ?></p> <?php } ?>


        </div>
    </div>
<!--Purpose-Business End-->

<!--Our-Blog  Start-->

<div class="avocation-container  container"> 
    <div class="blog-wrap">
        <div class="title-box">
           <?php $blog_check = get_theme_mod( 'avocation_blog-title' );
    if(!empty($blog_check)) {?>
                <h2 class="content-heading"><?php  echo esc_attr( get_theme_mod('avocation_blog-title', '') ); ?></h2><?php }
                 else { ?><h2 class="content-heading"> <?php echo _e('Our Blog', 'avocation'); ?> </h2> <?php }?>
                <?php $bloginfo_check = get_theme_mod( 'avocation_bloginfo' );
    if(!empty($bloginfo_check)) {?>
                <p class="description"><?php  echo esc_attr( get_theme_mod('avocation_bloginfo', '') ); ?></p>
             <?php } ?>

        </div>

        <div class="row ">
            <div class="blog-slider" id="blog_slide">
		
	
                <?php
                $avocation_blogcategory=get_theme_mod('avocation_blogcategory');
                
                $avocation_args = array(
                    'ignore_sticky_posts' => '1',
                    
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                );
                if(!empty($avocation_blogcategory))
					$avocation_args['cat']=$avocation_blogcategory;
                $avocation_query = new WP_Query($avocation_args);
                if ($avocation_query->have_posts()) : while ($avocation_query->have_posts()) : $avocation_query->the_post();
                        ?>
                        <div class="blog-box item">


                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-box-img">
                                    <?php the_post_thumbnail('avocation-latest-post-homepage', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="blog-title"><?php echo esc_attr(the_title()); ?></a>
                            <div class="blog-meta">  
                                <ul>
                                    <li> <i class="fa fa-calendar"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>">  <?php the_time(get_option('date_format')); ?> </a></li>
                                    <li> <i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">  <?php the_author(); ?>  </a></li>    
                                </ul>
                            </div>

                            <div class="our-blog-details">
                                <?php the_excerpt(); ?>
                            </div>
                        </div> 

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div> 

<!--Our-Blog End-->

</section>
<!--==============================Section end=================================-->

<?php get_footer(); ?>

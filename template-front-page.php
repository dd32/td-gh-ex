<?php
/*
 * Template Name: Front Page
 *
 *
 * The template for displaying the front page
 *
 *
 * @package Bfront
 */
?>
<?php get_header(); ?>

  <?php 
    $first_slider_image = esc_url( get_theme_mod('first_slider_image') );
    $first_slider_title = esc_attr( get_theme_mod('first_slider_title') ); 
    $first_slider_des = esc_attr( get_theme_mod('first_slider_des') );
    $first_slider_first_button_text = esc_attr( get_theme_mod('first_slider_first_button_text') );
    $first_slider_first_button_link = esc_url( get_theme_mod('first_slider_first_button_link') );
    $first_slider_second_button_text = esc_attr( get_theme_mod('first_slider_second_button_text') );
    $first_slider_second_button_link = esc_url( get_theme_mod('first_slider_second_button_link') );
  ?>

<!-- slider start here --> 
<div class="slider slider-wrapper">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <?php if ( isset($first_slider_image) && $first_slider_image != '') { ?>
                    <img src="<?php echo esc_url($first_slider_image); ?>" />
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/slider.jpg" alt="" title="" />
                <?php } ?>
                <div class="awe-overlay"></div>

                <div class="flex-caption">
                    <div class="container">
                    <!-- ***Slide 1 Text start *** -->
                    <?php if ( isset($first_slider_title) && $first_slider_title != '') { ?>
                        <h1 class="wow fadeInLeft" data-wow-duration="2s"><?php echo $first_slider_title; ?><div class="heading_border"></div></h1>
                    <?php } else { ?> 
                        <h1 class="wow fadeInLeft" data-wow-duration="2s">
                            <?php _e( 'Elegant & Stylish Theme','bfront'); ?>
                            <div class="heading_border"></div>
                        </h1>
                    <?php } ?>
                        
                    <?php if ( isset($first_slider_des) && $first_slider_des != '') { ?>
                        <h3 class="wow fadeInLeft" data-wow-duration="2s"><?php echo $first_slider_des; ?></h3>
                    <?php } else { ?>
                        <h3 class="wow fadeInLeft" data-wow-duration="2s">
                            <?php _e( 'Bfront Theme is based on Bootstrap and it is fully functional and Responsive for all screens.','bfront'); ?>
                        </h3>
                    <?php } ?> 

                    <p class="slider_buttons">
                        <?php if ( isset($first_slider_first_button_text) && $first_slider_first_button_text != '') { ?>
                            <a href="<?php echo $first_slider_first_button_link; ?>" class="btn btn-sm animated-button victoria-four grey">  <?php echo $first_slider_first_button_text; ?> </a>
                        <?php } else { ?> 
                            <a href="#" class="btn btn-sm animated-button victoria-four grey">
                                <?php _e( 'Demo Here','bfront'); ?>
                            </a>
                        <?php } ?>
                            
                        <?php if ( isset($first_slider_first_button_text) && $first_slider_first_button_text != '') { ?>
                            <a href="<?php echo $first_slider_second_button_link; ?>" class="btn btn-sm animated-button victoria-four orange not-first">  <?php echo $first_slider_second_button_text; ?> </a>
                        <?php } else { ?> 
                            <a href="#" class="btn btn-sm animated-button victoria-four orange not-first">
                                <?php _e( 'Download','bfront'); ?> 
                            </a>
                        <?php } ?>
                    </p>
                    <!-- ***Slide 1 Text end *** -->
                    </div> 
                </div>
            </li>

              <?php 
                $second_slider_image = esc_url( get_theme_mod('second_slider_image') );
                $second_slider_title = esc_attr( get_theme_mod('second_slider_title') ); 
                $second_slider_des = esc_attr( get_theme_mod('second_slider_des') );
                $second_slider_first_button_text = esc_attr( get_theme_mod('second_slider_first_button_text') );
                $second_slider_first_button_link = esc_url( get_theme_mod('second_slider_first_button_link') );
                $second_slider_second_button_text = esc_attr( get_theme_mod('second_slider_second_button_text') );
                $second_slider_second_button_link = esc_url( get_theme_mod('second_slider_second_button_link') );
              ?>

            <?php if( $second_slider_image != '' || $second_slider_title != '' || $second_slider_des != '' ){ ?>
                <li>
                    <?php if ( isset($second_slider_image) && $second_slider_image != '') { ?>
                        <img src="<?php echo esc_url($second_slider_image); ?>" />
                    <?php } ?>
                    <div class="awe-overlay"></div>
                    
                    <div class="flex-caption">
                        <div class="container">
                        <!-- ***Slide 2 Text start *** -->
                        <?php if ( isset($second_slider_title) && $second_slider_title != '') { ?>
                            <h1 class="wow fadeInLeft" data-wow-duration="2s"><?php echo $second_slider_title; ?><div class="heading_border"></div></h1>
                        <?php } ?>
                            
                        <?php if ( isset($second_slider_des) && $second_slider_des != '') { ?>
                            <h3 class="wow fadeInLeft" data-wow-duration="2s"><?php echo $second_slider_des; ?></h3>
                        <?php } ?>
                        
                        <p class="slider_buttons">
                            <?php if ( isset($second_slider_first_button_text) && $second_slider_first_button_text != '') { ?>
                                <a href="<?php echo $second_slider_first_button_link; ?>" class="btn btn-sm animated-button victoria-four grey">  <?php echo $second_slider_first_button_text; ?> </a>
                            <?php } ?>
                                
                            <?php if ( isset($second_slider_second_button_text) && $second_slider_second_button_text != '') { ?>
                                <a href="<?php echo $second_slider_secoond_button_link; ?>" class="btn btn-sm animated-button victoria-four orange not-first">  <?php echo $second_slider_second_button_text; ?> </a>
                            <?php } ?>
                        </p>

                        <div class="clearfix"></div>
                        </div>
                        <!-- ***Slide 2 Text end *** -->
                    </div>
                </li> 
            <?php } ?>
        </ul>
    </div>    
</div>
<!-- slider end here --> 

<?php 
    $parallax_section_title = esc_attr( get_theme_mod('parallax_section_title') ); 
    $parallax_section_desc = esc_attr( get_theme_mod('parallax_section_desc') );
?>
<!-- slider Description start here --> 
<section id="slidescrip">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class='slider-content'>
					<?php if ( isset($parallax_section_title) && $parallax_section_title != '') { ?>
						<h2 class="wow pulse"><?php echo $parallax_section_title; ?></h2>
					<?php } else { ?>
						<h2 class="wow pulse">
						<?php _e( 'Build Your Clean & Optimized Website Within Few Clicks','bfront'); ?>
						</h2> 
					<?php } ?>

					<?php if ( isset($parallax_section_desc) && $parallax_section_desc != '') { ?>
						<p class="wow pulse"><?php echo $parallax_section_desc; ?></p>
					<?php } else { ?>
						<p class="wow pulse">
							<?php _e( 'Creating your website with bfront is completely easy. You just need to perform few tweaks in the theme option panel and your website will be ready to use. You can showcase all important aspects of your business here on home page.','bfront'); ?>
						</p> 
					<?php } ?>
				</div>

			</div>
		</div>
   </div>
</section>
<!-- slider Description end here --> 


<!--latest blog start here -->
<?php 
    $blog_heading = esc_attr( get_theme_mod('blog_heading') );
?> 

<div class="blog-wrapper">
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                <div class="team-heading">
                    <?php if( isset($blog_heading) && $blog_heading != '' ){ ?>
                        <h2><?php echo $blog_heading; ?></h2>
                    <?php }else{ ?>
                        <h2><?php _e( 'Recent Blogs','bfront'); ?></h2>
                    <?php } ?>
                </div>
            </div>
            <!-- Start the Loop. -->

            <div class="blog-outer">
            <?php
              $args = array('showposts' => get_option('posts_per_page'));
              $the_query = new WP_Query( $args ); 
              if ( $the_query->have_posts() ) : 
              while ( $the_query->have_posts() ) : $the_query->the_post(); 
            ?>

                <div class="col-md-4 col-sm-4">
                    <div id="blog-<?php the_ID(); ?>" class="blog_post wow zoomIn">
                        
                        <div class="thumb_meta">
                            <div class="thumb clear">
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 360, 200); ?></a>
                                <?php  }else {  ?>
                                    <a href="<?php the_permalink(); ?>"><img src='<?php echo get_template_directory_uri(); ?>/images/journey-compress.jpg' alt='feature3' width='360px' height="210px !important" ></a>
                                <?php } ?>
                                
                                <a href="<?php the_permalink(); ?>"><div class="member-image-hover"><span></span><i class="fa fa-plus-circle"></i></div></a>
                                
                            </div>
                            
                            <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                            
                            <div class="post-meta">
                                <ul>
                                    <li class="meta-date"><?php
                                        $archive_year = get_the_time('Y');
                                        $archive_month = get_the_time('m');
                                        $archive_day = get_the_time('d');
                                        ?>
                                    <i class="fa fa-clock-o"></i> <a href="<?php the_permalink() ?>"> <?php echo esc_html( get_the_date('j M Y') ) ?></a></li>
                                    <li class="meta-admin"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></li>
                                    <li class="meta-comm"><i class="fa fa-comment"></i> <?php comments_popup_link(__( 'Leave a comment', 'bfront' ), __( '1 Comment', 'bfront' ), __( '% Comments', 'bfront' )); ?> </li>
                                </ul>                                
                            </div>
                            
                            <div class="post-content clear">
                                <?php the_excerpt(); ?>
                                <p class="readmore">
                                    <a href="<?php the_permalink() ?>" class="wpanch">
                                        <?php echo sprintf( esc_html__( 'Read More %s', 'bfront' ), the_title( '<span class="screen-reader-text">', '</span>', false ) ) ; ?>
                                    </a>
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- latest three blog end here --> 

<?php get_footer(); ?>
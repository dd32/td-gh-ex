<?php 
/**
 * The template for displaying index page
 *
 * @version    0.0.07
 * @package    axis-magazine
 * @author     Zidithemes
 * @copyright  Copyright (C) 2020 zidithemes.tumblr.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * 
 */
?>

<?php get_header(); ?>

	


<?php

$axis_magazine_index_cn = esc_html(get_theme_mod('axis_magazine_index_class_name_settings'));

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );


if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'index' ) ) {

?>

<div id="content" class="page-content">

	<div class="flowid  
			<?php if ( !empty( $axis_magazine_index_cn )): ?>
				<?php echo esc_html($axis_magazine_index_cn); ?>
				<?php else: ?> 
				<?php echo 'axis-magazine-index'; ?>
			<?php endif; ?> ">

            <!-- BEGIN SHOW -->
        <div class="mg-auto wid-90 mobwid-90">
            <div class="axis-magazine-feature">
                <div class="axis-magazine-show axis-magazine-show-mob-no dsply-fl fl-wrap">

                    <div class="left-side wid-50 mobwid-100">
                    <?php $axis_magazine_index_blog_posts = new WP_Query( array( 'posts_per_page' => 1, 'paged' => $paged ) );

                                if ( $axis_magazine_index_blog_posts->have_posts() ) : while ( $axis_magazine_index_blog_posts->have_posts() ) : $axis_magazine_index_blog_posts->the_post(); ?>

                                <div class="wid-100 mobwid-100 axis-magazine-show-items relative">
                                        <?php if ( has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>"  >
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php the_permalink(); ?>"  >
                                                <div class="user-no-img-items">
                                                    <div class="user-no-img-items-inner text-center">
                                                        <div class=""><?php esc_html_e( 'No Image', 'axis-magazine' ); ?></div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                        <div class="axis-magazine-show-items-content text-center">
                                            <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                            <h5>
                                                <a href="<?php the_permalink(); ?>"  >
                                                    <?php the_title(); ?>
                                                </a>
                                            </h5>
                                            <p>
                                                <a class="excerpt" href="<?php the_permalink(); ?>">
                                                    <?php the_excerpt(__('Read more &raquo;', 'axis-magazine')); ?>
                                                </a>
                                            </p>
                                        </div>
                                    
                                </div>

                        <?php endwhile; else : ?>
                            <h2><?php esc_html__('No posts Found!', 'axis-magazine'); ?></h2>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?> 

                    </div>
                    <div class="right-side wid-50 dsply-fl fl-wrap jc-sp-btw mobwid-100">
                        <?php $axis_magazine_index_right_side_blog_posts = new WP_Query( array( 'posts_per_page' => 4, 'paged' => $paged ) );

                                if ( $axis_magazine_index_right_side_blog_posts->have_posts() ) : while ( $axis_magazine_index_right_side_blog_posts->have_posts() ) : $axis_magazine_index_right_side_blog_posts->the_post(); ?>

                                <div class="wid-49 dsply-fl mobwid-100 axis-magazine-show-items relative">
                                        <div class="wid-100 relative axis-magazine-show-items-link">
                                            <?php if ( has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>"  >
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                            <?php else: ?>
                                                <a href="<?php the_permalink(); ?>"  >
                                                    <div class="user-no-img-items">
                                                        <div class="user-no-img-items-inner text-center">
                                                            <div class=""><?php esc_html_e( 'No Image', 'axis-magazine' ); ?></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wid-100 jc-center ai-center dsply-fl axis-magazine-show-items-content text-center">
                                            <div class="axis-magazine-show-items-content-inner">
                                                <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>"  >
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h5>
                                                <p class="para">
                                                    <a class="excerpt" href="<?php the_permalink(); ?>">
                                                        <?php the_excerpt(__('Read more &raquo;', 'axis-magazine')); ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    
                                </div>

                        <?php endwhile; else : ?>
                        <h2><?php esc_html__('No posts Found!', 'axis-magazine'); ?></h2>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
        <!-- END SHOW -->

	    <div class="mg-auto wid-90 mobwid-90">
	        
	        <div class="inner dsply-fl fl-wrap">
	            
	            <div class="wid-70 mobwid-100 blog-2-col-inner">


                    
                    <!-- BEGIN AXIS MAGAZINE DIFF-->


                    <div class="axis-magazine-diff ">
                        
                        <div class="dsply-fl fl-wrap">

                            <div class="left-side wid-50 mobwid-100">
                            <?php $axis_magazine_diff_blog_posts = new WP_Query( array( 'posts_per_page' => 5, 'paged' => $paged ) );

                                        if ( $axis_magazine_diff_blog_posts->have_posts() ) : while ( $axis_magazine_diff_blog_posts->have_posts() ) : $axis_magazine_diff_blog_posts->the_post(); ?>

                                        <div class="wid-100 mobwid-100 axis-magazine-diff-items relative">
                                                <?php if ( has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>"  >
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                                <?php else: ?>
                                                    <a href="<?php the_permalink(); ?>"  >
                                                        <div class="user-no-img-items">
                                                            <div class="user-no-img-items-inner text-center">
                                                                <div class=""><?php esc_html_e( 'No Image', 'axis-magazine' ); ?></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php endif; ?>
                                                <div class="axis-magazine-diff-items-content text-left">
                                                    <h5><a href="<?php the_permalink(); ?>"  >
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h5>
                                                    <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                                    <p><a class="excerpt" href="<?php the_permalink(); ?>"><?php the_excerpt(__('Read more &raquo;', 'axis-magazine')); ?></a></p>
                                                </div>
                                            
                                        </div>

                                <?php endwhile; else : ?>
                                <h2><?php esc_html__('No posts Found!', 'axis-magazine'); ?></h2>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?> 

                            </div>
                            <div class="right-side wid-50 mobwid-100">
                                <?php $axis_magazine_right_diff_side_blog_posts = new WP_Query( array( 'posts_per_page' => 8, 'paged' => $paged ) );

                                        if ( $axis_magazine_right_diff_side_blog_posts->have_posts() ) : while ( $axis_magazine_right_diff_side_blog_posts->have_posts() ) : $axis_magazine_right_diff_side_blog_posts->the_post(); ?>

                                        <div class="wid-100  mobwid-100 axis-magazine-diff-items relative">
                                            <div class="axis-magazine-diff-items-inner dsply-fl jc-sp-btw">
                                                <div class="wid-34 relative axis-magazine-diff-items-link">
                                                    <?php if ( has_post_thumbnail()) : ?>
                                                    <a href="<?php the_permalink(); ?>"  >
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <?php else: ?>
                                                        <a href="<?php the_permalink(); ?>"  >
                                                            <div class="user-no-img-items">
                                                                <div class="user-no-img-items-inner text-center">
                                                                    <div class=""><?php esc_html_e( 'No Image', 'axis-magazine' ); ?></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="wid-65 axis-magazine-diff-items-content text-left">
                                                    <div class="axis-magazine-diff-items-content-inner">
                                                        <h5><a href="<?php the_permalink(); ?>"  >
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h5>
                                                        <div class="date"><?php the_time(get_option('date_format')); ?></div>
                                                        <p class="para">
                                                            <a class="excerpt" href="<?php the_permalink(); ?>">
                                                                <?php the_excerpt(__('Read more &raquo;', 'axis-magazine')); ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php endwhile; else : ?>
                                    <h2><?php esc_html__('No posts Found!', 'axis-magazine'); ?></h2>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>


                    <!-- END AXIS MAGAZINE DIFF -->
                    
	            	
	                <div class="mg-tp dsply-fl fl-wrap">
	                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

	                	<?php get_template_part('content', get_post_format());  ?>
	                	 
	                	
	                    <?php endwhile; else : ?>
						  <h2><?php esc_html__('No posts Found!', 'axis-magazine'); ?></h2>
	                    <?php endif; ?>

	                </div>
	                <ul class="pagination flowid">
					   <?php the_posts_pagination(); ?>
					</ul>
	            </div>
	            <?php get_sidebar(); ?>

	        </div>
	    </div>
	</div>
</div>

<?php } ?>


<?php get_footer(); ?>
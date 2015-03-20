<?php
/**
 * Template Name: Latest review page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Accesspress Mag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
                <section class="test">
                <div class="sidebar-latest-reivew">
        <h1 class="sidebar-title"><span><?php _e( 'Latest Review', 'accesspress-mage' );?></span></h1>
        <div class="latest-review-wrapper">
        <?php $args = array(
                    	'posts_per_page'   => 3,
                    	'offset'           => 0,
                    	'category'         => '',
                    	'category_name'    => '',
                    	'orderby'          => 'post_date',
                    	'order'            => 'DESC',
                    	'include'          => '',
                    	'exclude'          => '',
                    	'meta_key'         => 'product_review_option',
                    	'meta_value'       => 'rate_stars',
                    	'post_type'        => 'post',
                    	'post_mime_type'   => '',
                    	'post_parent'      => '',
                    	'post_status'      => 'publish',
                    	'suppress_filters' => true 
                    );
                    $posts_array = get_posts( $args );
                    $p_count = 0;
                    foreach ( $posts_array as $post ) : setup_postdata( $post ); 
                    $p_count++;
                    $review_image_id = get_post_thumbnail_id();
                    $review_big_image_path = wp_get_attachment_image_src($review_image_id,'block-big-thumb',true);
                    $review_small_image_path = wp_get_attachment_image_src($review_image_id,'block-small-thumb',true);
                    $review_image_alt = get_post_meta($review_image_id,'_wp_attachment_image_alt',true);                    
                   // $product_rating = get_post_meta($post->ID, 'product_rating', true);
//                   //   var_dump($product_rating);
//                    foreach ($product_rating as $key => $value) {                    
//                        $featured_name = $value['feature_name'];
//                        }
                    if($p_count==1):
                    ?>
                        <div class="single-review top-post clearfix">
                            <?php if(has_post_thumbnail()):?>
                                <div class="post-image"><img src="<?php echo $review_big_image_path[0];?>" alt="<?php echo esc_attr($review_image_alt);?>" /></div>
                            <?php endif ;?>
                                <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <div class="stars-ratings"><?php do_action('accesspress_mag_post_review');?></div>
                                <div class="block-poston"><?php do_action('accesspress_mag_home_posted_on');?></div>
                                <div class="post-content"><?php the_excerpt();?></div>
                        </div>
                    <?php else:?>
                        <div class="single-review clearfix">
                            <?php if(has_post_thumbnail()):?>
                                <div class="post-image"><img src="<?php echo $review_small_image_path[0];?>" alt="<?php echo esc_attr($review_image_alt);?>" /></div>
                            <?php endif ;?>
                                <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <div class="stars-ratings"><?php do_action('accesspress_mag_post_review');?></div>
                        </div>
                    <?php endif;?>
                <?php endforeach; 
                wp_reset_postdata();?>
                </div>
                </div>
              </section>

				

			<?php endwhile; // end of the loop. ?>
            
            

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>

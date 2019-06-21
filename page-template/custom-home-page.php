<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'akhada_fitness_gym_above_product_page' ); ?>

<section id="slider">
  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
	    <?php $pages = array();
	      	for ( $count = 1; $count <= 4; $count++ ) {
		        $mod = intval( get_theme_mod( 'akhada_fitness_gym_slider' . $count ));
		        if ( 'page-none-selected' != $mod ) {
		          $pages[] = $mod;
		        }
	      	}
	      	if( !empty($pages) ) :
	        $args = array(
	          	'post_type' => 'page',
	          	'post__in' => $pages,
	          	'orderby' => 'post__in'
	        );
	        $query = new WP_Query( $args );
	        if ( $query->have_posts() ) :
	          $i = 1;
	    ?>     
	    <div class="carousel-inner" role="listbox">
	      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
	        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
	          	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
	          	<div class="carousel-caption">
		            <div class="inner_carousel">
		              	<h2><?php the_title(); ?></h2>
		              	<p><?php the_excerpt(); ?></p>
		              	<div class="more-btn">
		                	<a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','akhada-fitness-gym'); ?></a>
		              	</div>
		            </div>
	          	</div>
	        </div>
	      	<?php $i++; endwhile; 
	      	wp_reset_postdata();?>
	    </div>
	    <?php else : ?>
	    <div class="no-postfound"></div>
	      <?php endif;
	    endif;?>
	    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
	    </a>
  	</div>  
  	<div class="clearfix"></div>
</section> 

<?php do_action('akhada_fitness_gym_befor_service_section'); ?>

<?php /*--OUR SERVICES--*/?>
<section id="our-services">
	<?php if( get_theme_mod('akhada_fitness_gym_service_title') != ''){ ?>
      	<h3 class="subtitle"><?php echo esc_html(get_theme_mod('akhada_fitness_gym_service_title',__('OUR SERVICES','akhada-fitness-gym'))); ?></h3>
    <?php }?>
 	<div class="container">
      	<div class="row">
	      	<?php $pages = array();
	        for ( $count = 0; $count <= 3; $count++ ) {
	          $mod = intval( get_theme_mod( 'akhada_fitness_gym_service' . $count ));
	          if ( 'page-none-selected' != $mod ) {
	            $pages[] = $mod;
	          }
	        }
        	if( !empty($pages) ) :
	          	$args = array(
		            'post_type' => 'page',
		            'post__in' => $pages,
		            'orderby' => 'post__in'
	          	);
      		$query = new WP_Query( $args );
          	if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
            	<div class="col-md-3">
	                <div class="service-main-box">
	                	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
                      	<h4><?php the_title(); ?></h4>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( akhada_fitness_gym_string_limit_words( $excerpt,30 ) ); ?></p>
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','akhada-fitness-gym'); ?></a>
	                </div>
	            </div>
            <?php $count++; endwhile; 
            wp_reset_postdata();?>
          	<?php else : ?>
            <div class="no-postfound"></div>
        	<?php endif;
      		endif;?>
        	<div class="clearfix"></div>
      	</div>
  	</div> 
</section>

<?php do_action('akhada_fitness_gym_after_about_section'); ?>

<div class="container">
  	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>
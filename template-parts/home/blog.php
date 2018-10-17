<?php
/**
 * Template part for displaying blog section
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.2
 */

?>

<section id="static-blog">
  <div class="container">
    <?php if( get_theme_mod('adventure_travelling_blog_tittle') != ''){ ?>     
      <h3><?php echo esc_html(get_theme_mod('adventure_travelling_blog_tittle','')); ?></h3>
    <?php }?>
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <?php
          $args = array( 'name' => get_theme_mod('adventure_travelling_static_blog_1',''));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
              	<div class="blog-info">
	               <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
	               <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
           		</div>
              	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              	<p><?php $excerpt = get_the_excerpt();echo esc_html( adventure_travelling_string_limit_words( $excerpt,10 ) ); ?></p>
            <?php endwhile; 
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; ?>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="row">
          <?php
            $args = array( 'name' => get_theme_mod('adventure_travelling_static_blog_2',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-5 col-md-5">
                  	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  	<div class="blog-info">
		               <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
		               <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
	           		</div>
                </div>
                <div class="col-lg-7 col-md-7">
                  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  	<p><?php $excerpt = get_the_excerpt();echo esc_html( adventure_travelling_string_limit_words( $excerpt,15 ) ); ?></p>
                  	<div class="read-more-btn">
                    	<a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','adventure-travelling'); ?></a>
                  	</div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; ?>
        </div>
        <div class="row">
          <?php
            $args = array( 'name' => get_theme_mod('adventure_travelling_static_blog_3',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-5 col-md-5">
                  	<img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  	<div class="blog-info">
		               <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
		               <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
	           		</div>
                </div>
                <div class="col-lg-7 col-md-7">
                  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  	<p><?php $excerpt = get_the_excerpt();echo esc_html( adventure_travelling_string_limit_words( $excerpt,15 ) ); ?></p>
                  	<div class="read-more-btn">
                    	<a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','adventure-travelling'); ?></a>
                  	</div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; ?>
        </div>
      </div>
    </div>    
  </div>
</section> 
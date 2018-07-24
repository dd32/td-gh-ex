<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php /** banner section **/ ?>

<?php do_action( 'advance_portfolio_above_banner' ); ?>

<section id="banner">
  <?php $pages = array();
  for ( $count = 0; $count <= 2; $count++ ) {
    $mod = absint( get_theme_mod( 'advance_portfolio_page_settings' . $count ));
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
            <div class="box-image">
              <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
            </div>
            <div class="box-content">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>                  
              <div class="social-media">
                <?php if( get_theme_mod( 'advance_portfolio_facebook_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_portfolio_twitter_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_portfolio_linkedin_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
                <?php } ?>                    
                <?php if( get_theme_mod( 'advance_portfolio_insta_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
                <?php } ?>
                <?php if( get_theme_mod( 'advance_portfolio_youtube_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
                <?php } ?>                                         
                <?php if( get_theme_mod( 'advance_portfolio_behance_url','' ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'advance_portfolio_behance_url','' ) ); ?>"><i class="fab fa-behance"></i></a>
                <?php } ?>
              </div>
              <div class="clearfix"></div>
            </div>                            
        <?php $count++; endwhile; ?>
      <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
  endif; wp_reset_postdata();?>
</section>

<?php do_action( 'advance_portfolio_below_banner' ); ?>

<section id="Portfolio-Section">
  <div class="container">
    <div class="portfolio-title">
      <?php if( get_theme_mod('advance_portfolio_title') != ''){ ?>     
        <h3><?php echo esc_html(get_theme_mod('advance_portfolio_title',__('Awesome Portfolio','advance-portfolio'))); ?></h3>
      <?php }?>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <?php
             $args = array( 'name' => get_theme_mod('advance_portfolio_awesome_setting',''));
             $query = new WP_Query( $args );
             if ( $query->have_posts() ) :
               while ( $query->have_posts() ) : $query->the_post(); ?>
                   <div class="box-image text-center">
                      <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
                   </div>
               <?php endwhile; 
               wp_reset_postdata();?>
               <?php else : ?>
                 <div class="no-postfound"></div>
               <?php
           endif; ?>
          </div>
          <div class="col-md-6">
            <?php
             $args = array( 'name' => get_theme_mod('advance_portfolio_awesome_setting1',''));
             $query = new WP_Query( $args );
             if ( $query->have_posts() ) :
               while ( $query->have_posts() ) : $query->the_post(); ?>
                   <div class="box-image text-center">
                      <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
                   </div>                
               <?php endwhile; 
               wp_reset_postdata();?>
               <?php else : ?>
                 <div class="no-postfound"></div>
               <?php
           endif; ?>
          </div>
        </div>
        <?php
             $args = array( 'name' => get_theme_mod('advance_portfolio_awesome_setting2',''));
             $query = new WP_Query( $args );
             if ( $query->have_posts() ) :
               while ( $query->have_posts() ) : $query->the_post(); ?>
                   <div class="image-box">
                    <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
                   </div>
               <?php endwhile; 
               wp_reset_postdata();?>
               <?php else : ?>
                 <div class="no-postfound"></div>
               <?php
           endif; ?>
      </div>
      <div class="col-md-6">
        <?php
         $args = array( 'name' => get_theme_mod('advance_portfolio_awesome_setting3',''));
         $query = new WP_Query( $args );
         if ( $query->have_posts() ) :
           while ( $query->have_posts() ) : $query->the_post(); ?>
               <div class="box-image text-center">
                <a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
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
</section>

<?php do_action( 'advance_portfolio_below_portfolio_section' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>
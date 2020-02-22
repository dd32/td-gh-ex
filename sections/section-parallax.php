<?php
/**
* section-paralax.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.5
*
*/
?>

<!-- Section Parallax -->
<section class="mb-5 at-about-parallax <?php if ( false == esc_attr(get_theme_mod('atomy_enable_full_width_parallax', false) )):?>container-fluid pl-0 pr-0<?php endif;?> <?php if ( true == esc_attr(get_theme_mod('atomy_enable_full_width_parallax', true) )):?><?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
  <?php 
         $atomy_post_name_parallax = esc_attr(get_theme_mod('at_post_parallax'));
         $atomy_args_parallax = array(
             'post_type'      => 'post',
             'order'          => 'ASC',
             'posts_per_page' => '-1',
             'post__in' => array($atomy_post_name_parallax));
         $atomy_query_parallax = new WP_Query( $atomy_args_parallax);
         // The Loop
     if  ($atomy_query_parallax->have_posts() ) {
     while  ($atomy_query_parallax->have_posts() ) {
         $atomy_query_parallax->the_post();  
       } 
      } 
    ?>
    <div class="at-box-parallax" style="background-image:url('<?php if (has_post_thumbnail()) : the_post_thumbnail();else : echo esc_url(get_template_directory_uri()).'/images/atomy-default-image.jpg';endif; ?>'); ">
       <div class="at-second-img-parallax"></div>
          <div class="at-text-parallax">
	        <div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	           <div class="row at-button-action-general">
	              <div class="col-md-12 <?php echo esc_html(get_theme_mod('at_text_align_parallax','text-left'));?>">
		              <h1>
                    <?php the_title_attribute(); ?>
                  </h1>
		          </div>
		          <!-- Button General Action -->
			     <?php if ( false == esc_attr(get_theme_mod('atomy_enable_button_action_parallax', false) )):?>
	             <div class="col-md-12 at-parallax-a pt-4 <?php echo esc_html(get_theme_mod('at_text_align_parallax','text-left'));?>">
                  <a href="<?php the_permalink();?>" class="checkout-button button alt wc-forward">
		                  <?php echo esc_html(get_theme_mod( 'at_title_action_parallax',__('SHOP NOW','atomy')));?>
                  </a>
		        </div>
		        <?php endif;?>
	          </div>
	        </div>
         </div>
    </div>
    <?php
   wp_reset_postdata(); ?>
</section>
<?php wp_enqueue_script('at-parallax-js', get_template_directory_uri() . '/js/at-parallax.js', array(), 'v1.0.5', true );?>







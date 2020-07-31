<?php
/**
* section-paralax.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- Section Parallax -->
<section class="mb-5 at-about-parallax <?php if ( false == get_theme_mod('atomy_enable_full_width_parallax', false) ):?>container-fluid pl-0 pr-0<?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_width_parallax', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
    <div class="at-box-parallax">
       <div class="at-second-img-parallax"></div>
          <div class="at-text-parallax">
	        <div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	           <div class="row at-button-action-general">
	              <div class="col-md-12 <?php echo esc_attr(get_theme_mod('at_text_align_parallax','text-left'));?>">
		              <h1>
                  <?php echo esc_html(get_theme_mod( 'at_title_parallax',__('Parallax','atomy')));?>
                  </h1>
		          </div>
		          <!-- Button General Action -->
			     <?php if ( false == get_theme_mod('atomy_enable_button_action_parallax', false) ):?>
	             <div class="col-md-12 at-parallax-a pt-4 <?php echo esc_attr(get_theme_mod('at_text_align_parallax','text-left'));?>">
                  <a href="<?php the_permalink();?>" class="checkout-button button alt wc-forward">
		                  <?php echo esc_html(get_theme_mod( 'at_title_action_parallax',__('SHOP NOW','atomy')));?>
                  </a>
		        </div>
		        <?php endif;?>
	          </div>
	        </div>
         </div>
    </div>
</section>
<?php wp_enqueue_script('at-parallax-js', get_template_directory_uri() . '/js/at-parallax.js', array(), 'v1.0.5', true );?>







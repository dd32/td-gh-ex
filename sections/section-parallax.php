<?php
/**
* section-paralax.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.3
*
*/
?>

<!-- Section Parallax -->
<section class="mb-5 at-about-parallax <?php if ( false == esc_attr(get_theme_mod('atomy_enable_full_width_parallax', true) )):?>container-fluid pl-0 pr-0<?php endif;?> <?php if ( true == esc_attr(get_theme_mod('atomy_enable_full_width_parallax', true) )):?><?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
    <div class="at-box-parallax">
       <div class="at-second-img-parallax"></div>
          <div class="at-text-parallax">
	        <div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	           <div class="row at-button-action-general">
	              <div class="col-md-12 <?php echo esc_html(get_theme_mod('at_text_align_parallax','text-left'));?>">
		            <h1>
                     <?php echo esc_html(get_theme_mod( 'at_title_parallax',__('Parallax','atomy')));?>
                    </h1>
		          </div>
		          <!-- Button General Action -->
			     <?php if ( false == esc_attr(get_theme_mod('atomy_enable_button_action_parallax', true) )):?>
	             <div class="col-md-12 at-parallax-a pt-4 <?php echo esc_html(get_theme_mod('at_text_align_parallax','text-left'));?>">
               <a href="<?php echo esc_url( get_theme_mod( 'atomy_link_action_parallax' ));?>" class="checkout-button button alt wc-forward">
		                  <?php echo esc_html(get_theme_mod( 'at_title_action_parallax',__('SHOP NOW','atomy')));?>
                    </a>
		        </div>
		        <?php endif;?>
	          </div>
	        </div>
         </div>
    </div>
</section>
<script>
	jQuery(function($){
	var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;
function moveBackground() {
  x += (lFollowX - x) * friction;
  y += (lFollowY - y) * friction;
  translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';
  $('.at-second-img-parallax').css({
    '-webit-transform': translate,
    '-moz-transform': translate,
    'transform': translate
  });
  window.requestAnimationFrame(moveBackground);
}
$(window).on('mousemove click', function(e) {
  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
  lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
  lFollowY = (10 * lMouseY) / 100;
});
moveBackground();
});
</script>






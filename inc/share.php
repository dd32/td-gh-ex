<?php
/**
 * share.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */
?>

        <h3 class="title-share"><?php echo esc_html( get_theme_mod( 'avik_title_share','SHARE THIS')); ?></h3>
        <ul class="social-share">
         <!--fb-->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_facebook_share', false) )) :?>
          <li class="facebook"><?php $facebookimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
           <a class="popup" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>">
              <i class="fab fa-facebook-f"></i>		
            </a></li>
          <?php endif; ?>
           <!--Twitter-->
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_twitter_share', false) )) :?>
          <li class="twitter"><?php $twitterimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
           <a class="popup" href="http://twitter.com/home?status=<?php echo urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>:<?php the_permalink(); ?>">
                <i class="fab fa-twitter"></i>
             </a></li>
          <?php endif; ?>
           <!--G+-->
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_google_plus_share', false) )) :?>
          <li class="google-plus"><?php $googleimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
            <a class="popup" href=" https://plus.google.com/share?url=<?php the_permalink(); ?>">
                 <i class="fab fa-google-plus-g"></i>
              </a></li>
          <?php endif; ?>
          <!--Linkedin-->
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_linkedin_share', false) )) :?>
          <li class="linkedin"><?php $linkedinimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
          <a class="popup" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')); ?>&source=LinkedIn">
               <i class="fab fa-linkedin-in"></i>
             </a></li>
          <?php endif; ?>
          <!--Pinterest-->
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_pinterest_share', false) )) :?>
          <li class="pinterest"><?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
		      <a class="popup" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pinterestimage[0];?>">
		         <i class="fab fa-pinterest-p"></i>
		      </a></li>
          <?php endif; ?>
           <!--Whatsapp-->
          <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_whatsapp_share', false) )) :?>
          <li class="whatsapp"><?php $whatsappimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' );?>
           <a class="popup" href="whatsapp://send?text=<?php the_permalink();?>">
		      <i class="fab fa-whatsapp"></i>
		      </a></li>
          <?php endif; ?>
        </ul>
<?php
//Custom Post Title
if(!function_exists('backyard_post_title')) : 
function backyard_post_title()
{
  if ( is_single() ) :
 ?>
     <?php the_title(); ?>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; 
}

endif;

//Social Links

if(!function_exists('backyard_social_media_link')) :
function backyard_social_media_link() { 
  if(get_theme_mod('facebook_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('facebook_url')).'" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>';
  }
  if(get_theme_mod('twitter_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('twitter_url')).'" target="_blank" class="tw"><i class="fa fa-twitter"></i></a>';
  }
  if(get_theme_mod('google_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('google_url')).'" target="_blank" class="google"><i class="fa fa-google-plus"></i></a>';
  }
  if(get_theme_mod('instagram_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('instagram_url')).'"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>';
  }
  if(get_theme_mod('youtube_channel_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('youtube_channel_link')).'" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>';
  }
  if(get_theme_mod('linkedin_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('linkedin_link')).'"   target="_blank" class="linkdin"><i class="fa fa-linkedin"></i></a>';
  }
  if(get_theme_mod('pinterest_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('pinterest_link')).'"  target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>';
  }
}   
endif;
?>
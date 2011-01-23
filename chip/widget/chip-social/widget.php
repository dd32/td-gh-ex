<?php global $chip_life_global; ?>
<div>
  
  <?php if( $chip_life_global['theme_options']['chip_life_rss'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_rss_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>rss.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_rss_url']; ?>" /></a>
  <?php endif; ?>
  
  <?php if( $chip_life_global['theme_options']['chip_life_delicious'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_delicious_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>delicious.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_delicious_url']; ?>" /></a>
  <?php endif; ?>
  
  <?php if( $chip_life_global['theme_options']['chip_life_facebook'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_facebook_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>facebook.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_facebook_url']; ?>" /></a>
  <?php endif; ?>
  
  <?php if( $chip_life_global['theme_options']['chip_life_stumble'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_stumble_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>digg.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_stumble_url']; ?>" /></a>
  <?php endif; ?>
  
  <?php if( $chip_life_global['theme_options']['chip_life_digg'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_digg_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>stumbleupon.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_digg_url']; ?>" /></a>
  <?php endif; ?>
  
  <?php if( $chip_life_global['theme_options']['chip_life_twitter'] == "yes" ): ?>
  <a href="<?php echo $chip_life_global['theme_options']['chip_life_twitter_url']; ?>"><img src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>twitter.png" width="32" height="32" alt="<?php echo $chip_life_global['theme_options']['chip_life_twitter_url']; ?>" /></a>
  <?php endif; ?>
  
</div>
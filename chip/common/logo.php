<?php
global $chip_life_global;
if( $chip_life_global['theme_options']['chip_life_logo'] == "yes"):
?>
<a href="<?php echo CHIP_LIFE_HOME; ?>"><img src="<?php echo $chip_life_global['theme_options']['chip_life_logo_url']; ?>" width="215" height="125" alt="" border="0" /></a>
<?php
else:
?>
<div class="textlogobox">
  <div class="blogname">
    <a href="<?php echo CHIP_LIFE_HOME; ?>" title="<?php bloginfo('name'); ?>" class="white"><?php bloginfo('name'); ?></a>
  </div>
  <div class="blogdesc">
    <?php bloginfo('description'); ?>
  </div>
</div>
<?php
endif;
?>
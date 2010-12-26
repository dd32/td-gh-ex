<?php
if( get_option($theme_options['c2']['id']) == "yes" ):
	if( get_option($theme_options['c3']['id']) == "na" ):
?>
        <a href="<?php echo BLOG_WSROOT; ?>"><img src="<?php echo IMAGES_WSROOT; ?>logo.gif" width="215" height="120" alt="" border="0" /></a>
<?php 
else:
?>
		<a href="<?php echo BLOG_WSROOT; ?>"><img src="<?php echo get_option($theme_options['c3']['id']); ?>" width="215" height="120" alt="" border="0" /></a>
<?php
	endif;
else:
?>
		<div class="textlogobox">
          <div class="blogname">
            <a href="<?php echo BLOG_WSROOT; ?>" title="<?php bloginfo('name'); ?>" class="white"><?php bloginfo('name'); ?></a>
          </div>
          <div class="blogdesc">
            <?php bloginfo('description'); ?>
          </div>
        </div>
<?php
endif;
?>
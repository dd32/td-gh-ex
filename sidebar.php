<?php global $options; foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
		}
?>
<div id="sidebar"> <?php if ($bxx_show_advert_two == "yes") {?> <div align="center"> <?php if ( $bxx_advert_two == "" ) { echo
'<div class="advert-two" > </div>'; } else { include (TEMPLATEPATH . '/scripts/advert-two.php'); } ?> </div> <?php }?>
<?php if ($bxx_sidebar_meta == "yes") {?> <h3 class="widget">Meta</h3>
<?php wp_register(); ?> <?php wp_loginout(); ?> <?php wp_meta(); ?>
<?php }?> <?php if ($bxx_sidebar_links == "yes") {?> <h3 class="widget">Links</h3><ul> <?php
wp_list_bookmarks('title_li=&categorize=0'); ?> </ul> <?php }?> <?php if ($bxx_sidebar_catz == "yes") {?> <h3
class="widget">Categories</h3> <ul><?php wp_list_categories('orderby=name&show_count=0&title_li='); ?></ul> <?php }?> <?php if (
!function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?> <?php endif;?>	
</div>
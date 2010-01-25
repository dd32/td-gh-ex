</div><?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<?php if ($bxx_footer_tags == "yes") {?><div id="tagcon"><div id="tagcloud"><?php wp_tag_cloud('smallest=8&largest=22'); ?></div></div><?php }?><div id="footer">	
<div class="footcon">
<div class="footer-widget">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 1") ) : ?>
<?php factory_feat; ?><?php endif; ?></div>
<div class="footer-widget"> 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 2") ) : ?><?php endif; ?></div>
<div class="footer-widget"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 3") ) : ?>
<?php endif; ?></div></div>
<?php wp_footer(); ?>
<div class="footer-base">
<p class="basement"> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.<a href="http://wordpress.org/extend/themes/42k" title="42k Free Wordpress Theme.">42k Theme</a>
Designed by: <a href="http://www.factory42.co.uk/" title="Factory42 Wordpress themes and website design.">Factory42</a>  
<a href="http://wordpress.org" title="Powered by Wordpress"><img class="wordpress-logo" alt="Wordpress" src="<?php bloginfo("template_directory"); ?>/images/wordpress.png"  /></a></p></div>
</div>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/scripts/showhide.js"></script>
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.png" />
<?php  echo stripslashes ($bxx_goo_an);?></body>
</html>
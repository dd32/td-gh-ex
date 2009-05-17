
<?
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
</td>

<?php if ($artsavius_sidebar_position == "both sidebars on the right") { ?>
    <td id="sidebar_1" align="left" valign="top"><?php get_sidebar(); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_1.jpg" />
</td>
    <td id="sidebar_2" align="left" valign="top"><?php get_sidebar('right'); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } elseif ($artsavius_sidebar_position == "content between two sidebars") { ?>
<td id="sidebar_2" align="left" valign="top" style="border-left:10px solid #CC6F96 !important;"><?php get_sidebar('right'); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } elseif ($artsavius_sidebar_position == "one sidebar on the right") { ?>
<td id="sidebar_2" align="left" valign="top" style="border-left:10px solid #CC6F96 !important;"><?php get_sidebar(); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } else {} ?>
  </tr>
  <tr>
    <td colspan="<?php if ($artsavius_sidebar_position == "both sidebars on the right") { ?>3<?php } elseif ($artsavius_sidebar_position == "both sidebars on the left") { ?>3<?php } elseif ($artsavius_sidebar_position == "content between two sidebars") { ?>3<?php } elseif ($artsavius_sidebar_position == "one sidebar on the right") { ?>2<?php } elseif ($artsavius_sidebar_position == "one sidebar on the left") { ?>2<?php } else { ?>3<?php } ?>" id="bottom">
	<div class="copy">&copy; <? if ($artsavius_footer_copytext) { if($artsavius_footer_copyurl) { ?><a href="<?php echo $artsavius_footer_copyurl; ?>"><?php echo $artsavius_footer_copytext; ?></a><?php } else {echo $artsavius_footer_copytext;} } elseif ($artsavius_header_title) { if (is_home()) { echo $artsavius_header_title; } else { ?><a href="<?php bloginfo('url'); ?>/"><?php echo $artsavius_header_title; ?></a><?php } } else { if (is_home()) { ?><?php bloginfo('name'); ?><?php } else { ?><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a><?php } } ?></div>
	<?php if ($artsavius_footer_showpowered == "Yes, I am clever and I respect Wordpress and Art Saveliev because they have worked hard to make me happier") { ?>
	<div class="powered"><?php printf(__('Powered by %1$s and %2$s', 'artsavius'),'<a href="http://wordpress.org/">WordPress</a>','<a href="http://artsaveliev.ru/">Artsavius Theme</a>'); ?></div><?php } ?><div class="rss">
	<a href="<?php if ($artsavius_footer_rssentries) { echo $artsavius_footer_rssentries;} else { bloginfo('rss2_url');} ?>"><?php _e('Entries (RSS)','artsavius'); ?></a> / <a href="<?php if ($artsavius_footer_rsscomments) { echo $artsavius_footer_rsscomments;} else { bloginfo('comments_rss2_url');} ?>"><?php _e('Comments (RSS)','artsavius'); ?></a>
	</div>
	</td>
  </tr>
</table>

<?php wp_footer(); ?>
</body>
</html>
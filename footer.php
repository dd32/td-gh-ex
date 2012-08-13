
<div class="divider"></div>




<div id="footer">

<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			

<h2><?php _e('Pages','appliance');?></h2>
<div class="content">
<ul>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
</div>


<h2><?php _e('Categories','appliance');?></h2>
<div class="content">
<ul>
<?php wp_list_categories('title_li=&show_count=0'); ?>
</ul>
</div>
  
<h2><?php _e('Archives','appliance');?></h2>
<div class="content">
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>
  
  
<h2><?php _e('Links','appliance');?></h2>
<div class="content">
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>
</div>
  
<?php endif; // end sidebar widget area ?>

<h2><?php _e('Info','appliance');?></h2>
<div class="content"><p>
<?php _e('Copyright','appliance');?> &copy; <?php echo date('Y')?> <a title="<?php bloginfo('title')?>" href="<?php echo site_url()?>"><?php bloginfo('title')?></a>
<br/><br/>
<?php printf( __( 'Powered by <a href="http://wordpress.org" title="%1$s">%2$s</a> and <a href="http://www.applianceuk.com" title="%3$s">%4$s</a>', 'appliance' ), esc_attr('WordPress'), esc_attr( 'WordPress'), esc_attr('Appliance'), esc_attr( 'Appliance' )); ?>
</p>
</div>




</div>


</div>

<?php wp_footer()?>
</body>
</html>
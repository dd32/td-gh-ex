<?php get_header(); ?>
<?php global $options; foreach ($options as $value) {if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
} ?>
<div id="main"><h2><?php echo  $bxx_404_title;?></h2><p><?php echo  $bxx_404_text;?></p>
<br style="clear:both" />&nbsp; </div>
<?php get_sidebar(); ?></div>
<?php get_footer(); ?>
<?php get_header(); ?>

<div class="contentbox">
  <?php /* Show author profile */ $obj_author = $wp_query->get_queried_object(); ?>
  <div class="authorinfo">
    <h2 class="title"><?php Echo SPrintF(__('About %s', 'theme'), $obj_author->display_name); ?></h2>
    
    <?php Echo get_avatar($obj_author->ID, 150); ?>
    
    <?php If (IsSet ($obj_author->description)) : ?>
      <p class="description"><?php echo nl2br($obj_author->description) ?></p>
    <?php EndIf; ?>
    
    <?php If ($obj_author->user_url != '') : ?>
      <span class="authormeta website"><?php PrintF (__('Website: <a href="%1$s">%1$s</a>', 'theme'), $obj_author->user_url) ?></span>
    <?php EndIf; ?>
    
    <?php If (IsSet ($obj_author->jabber)) : ?>
      <span class="authormeta jabber"><?php PrintF (__('Jabber: %s', 'theme'), $obj_author->jabber) ?></span>
    <?php EndIf; ?>
  
    <?php If (IsSet ($obj_author->aim)) : ?>
      <span class="authormeta aim"><?php PrintF (__('AIM: %s', 'theme'), $obj_author->aim) ?></span>
    <?php EndIf; ?>
    
    <?php If (IsSet ($obj_author->yim)) : ?>
      <span class="authormeta yim"><?php PrintF (__('Yahoo: %s', 'theme'), $obj_author->yim) ?></span>
    <?php EndIf; ?>
    
    <div class="clear"></div>
  </div>
  
  <?php Include get_query_template('the-loop'); ?>
</div>

<?php get_footer();
/* End of File */
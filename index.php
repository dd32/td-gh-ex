<?php get_header(); ?>

<div class="contentbox">
  <?php if (have_posts()) : ?>
  
    <?php Include get_query_template('the-loop') ?>
  
  <?php Else : ?>
  
    <div class="page">
      <h2 class="title"><?php _e('Not Found', 'theme'); ?></h2>
      <p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'theme'); ?></p>
      <?php get_search_form(); ?>
    </div>
  
  <?php EndIf; ?>
</div>

<?php get_footer();
/* End of File */
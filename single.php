<?php get_header(); ?>
<div id="archive-title"></div>
<div id="content" class="clear" > <!-- begin content -->		
  <div id="left-column"> <!-- begin left-column -->
    <div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
      <?php if (have_posts()) :
        while (have_posts()) : the_post();
          ?>
          <div <?php post_class(); ?>>
            <div class="entry">
              <h2><?php the_title(); ?></h2>
    <?php the_content(); ?> 
              <div class="clear"></div>
            </div>
            <div class="info-bar-top"></div>
            <div class="clear"></div>
            <div class="info-bar">
              <div class="info-bar-left">
                <p class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>&nbsp;|&nbsp;</p>
                <?php autoshow_the_category(); ?>
                <?php autoshow_the_tags(); ?>
                <p class="edit-link"><?php edit_post_link('Edit','&nbsp;|&nbsp;',''); ?></p>
                <?php if(function_exists('the_ratings')) { ?><div class="rating"><?php the_ratings();?> </div> <?php } ?>
              </div>
              <div class="info-bar-right"><p class="date"><?php the_time(get_option('date_format')) ?></p></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="info-bar-bottom"></div>
          </div>
          <?php wp_link_pages(); ?>
          <p>Trackback URL for this post: <?php trackback_url(); ?></p>
          <?php comments_template(); ?>
  <?php endwhile; ?>
        <div id="navigation">
          <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
          <div class="alignright"><?php next_post_link(' %link &raquo;') ?></div>
        </div>
      <?php else : ?>            
        <p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>       	
    </div> <!-- end left-column-inner -->
  </div> <!-- end left-column -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
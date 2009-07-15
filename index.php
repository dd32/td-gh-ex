<?php get_header()?>
<div id="content">      
  <?php if(have_posts()):while(have_posts()):the_post(); ?>            
  <div class="post">                  
    <h2 class="post-title">
      <a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>">
        <?php the_title()?></a></h2>                  
    <div class="post-body">                        
      <div class="date-header">
        <?php the_time('m/j/Y G:i')?>
      </div>                        
      <?php the_content('(more...)')?><br />                        
      <div class="byline-author"> Posted by 
        <?php the_author() ?>
      </div>                        
      <?php the_tags(__('Tags:'),', ','<br />' ); _e('Categories:');the_category(', ') ?><br />                        
      <div class="post-footer">                            
        <?php include(TEMPLATEPATH.'/sharethis.js') ?>                            
        <?php if('open'==$post->comment_status){?> |                                   
        <?php if(get_comments_number()>0){?>                                         
        <?php comments_popup_link(__(''),__('1 Comment'), __('% Comments') );?>  | 
        <?php }?>                                   
        <a href="<?php the_permalink()?>/#comment" title="<?php _e('Leave a comment') ?>">
          <?php _e('Leave a comment') ?></a>                                 
        <?php }?> |                                  
        <a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>">Permalink</a>                                 
        <?php edit_post_link(__('Edit'),__(' | ') )?>                                
      </div>                  
    </div>            
  </div>      
  <?php endwhile; else:?>
  <p>
    <?php _e('Sory, no posts matched your criteria.')?>
  </p>
  <?php endif?>      
  <div class="navi">
    <?php posts_nav_link(' | ', __('&laquo; Previous Page'), __('Next Page &raquo;') )?>
  </div>      
</div>
<!-- content -->
<?php get_sidebar();get_footer()?>
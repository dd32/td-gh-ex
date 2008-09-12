<?php get_header()?>
<div id="content">      
  <?php if(have_posts()):while(have_posts()):the_post(); ?>            
  <div class="post">                  
    <h2 class="post-title">
      <a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>">
        <?php the_title()?></a></h2>                  
    <div class="post-body">                        
      <div class="date-header"><?php the_time('m/j/Y G:i')?></div>                        
      <?php the_excerpt()?><br />                        
      <div class="byline-author"> Posted by 
        <?php the_author() ?>
      </div>                        
      <div class="post-footer">                            
        <a href="<?php the_permalink()?>" ><?php the_permalink()?></a>                                 
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
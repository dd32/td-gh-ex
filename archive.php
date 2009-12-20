<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
 get_header()?>
<div id="content">  
  <div class="widgettitle">    
    <?php if(have_posts()) :$post=$posts[0]; ?>    
    <?php if (is_category()){?><h2>Archive for the        
      <?php single_cat_title()?>  Category</h2>    
    <?php } elseif(is_tag()){?><h2>Posts Tagged        
      <?php single_tag_title()?></h2>    
    <?php } elseif(is_day()){?><h2>Archive for        
      <?php the_time('F jS, Y')?></h2>    
    <?php } elseif(is_month()){?><h2>Archive for        
      <?php the_time('F, Y')?></h2>    
    <?php } elseif(is_year()){?><h2>Archive for        
      <?php the_time('Y')?></h2>    
    <?php } elseif(is_author()){?><h2>Author Archive</h2>    
    <?php } elseif(is_search()){?><h2>Search Results</h2>    
    <?php } elseif(isset($_GET['paged'])&& !empty($_GET['paged'])){?><h2>Blog Archives</h2>    
    <?php }?>  
  </div>  
  <?php while (have_posts()):the_post();?>  
  <div class="post">    
    <h2 class="post-title">      
      <a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>">         
        <?php the_title()?></a></h2>    
    <div class="post-body">      
      <span class="date-header">        
        <?php the_time('m/j/Y G:i')?>      
      </span>      
      <?php the_content('(more)')?><br />      
      <span class="byline-author">Posted by          
        <?php the_author()?><br />       
      </span>        
      <?php the_tags(__('Tags:'),', ','.<br />')?>        
      <?php _e('Categories:'); the_category(', ')?>   
    </div>   <br />
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
  <?php endwhile?>  
  <div class="navi">    
    <?php posts_nav_link(' | ',__('&laquo; Previous Page'),__('Next Page &raquo;'))?>  
  </div>  
  <?php else:?>  
  <p>    
    <?php _e('Sory, no posts matched your criteria.');?>  
  </p>  
  <?php endif?>
</div>
<!--cnotent-->
<?php get_sidebar();get_footer()?>

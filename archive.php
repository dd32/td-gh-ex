
<?php get_header(); ?>


	 <!-- head select -->   
	
        <?php get_template_part('headers/part','headsingle'); ?>
<!-- / head select --> 

<div class="row">
   


<div id="content" >

<div class="lagre-9 columns <?php if ( !is_active_sidebar( 'sidebar' ) ){ ?> nosid <?php }?>">



     

   
       
      
<?php
	 $args = array(
				   				   'post_type' => 'post',
				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				   );

	new WP_Query($args);

while (have_posts()) : the_post();?>
                   
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> </div>
               
<div id="content" class="content_blog blog_style_b1" role="main">
			<div class="b1_pic_wrapper ">
							<?php the_post_thumbnail('large'); ?>
						</div>
                        
					<article class="post_format_standard odd">
						
                        
						<div class="title_area">
							<h1 class="post_title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						</div>
                        
						<div class="post_info post_info_2">
                        							<span class="post_author">Posted by: <a class="post_author"><?php the_author(); ?></a></span>
							<span class="post_info_delimiter"></span>
                                                       <?php if( has_category() ) { ?>
							<span class="post_categories">
								<span class="cats_label">Categories:</span>
								<a class="cat_link"><?php the_category(' '); ?></a>
							
							</span>
							
							<?php } ?>
                          <div class="post_comments"><a><span class="comments_number"> <?php comments_popup_link( __( 'No comments', 'safreen' ), __( '1 Comment', 'safreen' ), __( '% Comments', 'safreen' )); ?> </span><span class="icon-comment"></span></a></div>  
                            
						</div>
                        
						
						<div class="post_content">
							<p><?php the_excerpt(); ?></p>
							<div class="readmore"><a href="<?php the_permalink();?>" class="more-link">Read more</a></div>
						</div>
						<div class="post_info post_info_3 clearboth">
                        
							<span class="post_tags">
								<?php if( has_tag() ) { ?><span class="tags_label">Tags:</span><?php } ?>
								<?php if( has_tag() ) { ?><a class="tag_link"><?php the_tags('','  '); ?></a>
								
							</span><?php } ?>
						</div>
					</article>
                    <div class="share">
					<?php get_template_part('share_this');?></div>
                    <div class="sep-20"><img  src="<?php echo get_template_directory_uri(); ?>/images/sep-shadow.png" /></div>
                    </div>
  <?php endwhile ?>
  <?php get_template_part('pagination'); ?> 
</div>


          
   
   <div class=" wow fadeIn large-3 columns"> 
<?php get_sidebar();?>

</div>

</div> 
</div>

<?php get_footer(); ?>

<?php get_header(); ?>


	 <!-- head select -->   
	
        <?php get_template_part('headers/part','headsingle'); ?>
<!-- / head select --> 

<div class="row">
   


<div id="content" >

<div class="large-9 columns <?php if ( !is_active_sidebar( 'sidebar' ) ){ ?> nosid <?php }?>">


<!--Content-->
   <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">  </div>
               
                       
               
<div id="content" class=" content_blog blog_style_b1" role="main">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'safreen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
					                        
						<div class="title_area">
							<h1 class="wow fadeInup post_title"><?php the_title(); ?></h1>
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
                        
                        
						<div class="post_content wow fadeIn">
							<p><?php the_content(); ?></p>
						 <div class="post_wrap_n"><?php wp_link_pages('<p class="pages"><strong>'.printf(__('Pages:','safreen')).'</strong> ', '</p>', 'number'); ?></div>	
						</div>
						<div class="post_info post_info_3 clearboth">
                        							<span class="post_tags">
								<?php if( has_tag() ) { ?><span class="tags_label">Tags:</span><?php } ?>
								<?php if( has_tag() ) { ?><a class="tag_link"><?php the_tags('','  '); ?></a>
								
							</span><?php } ?>
						</div>
					</article>
                 <div class="wp-pagenavi">
                    <?php previous_post_link( '<div class="alignleft">%link</div>', '&laquo; %title' ); ?>
                    <?php next_post_link( '<div class="alignright">%link</div>', '%title &raquo; ' ); ?>
                    
                </div> 

                    <div class="sep-20"><img  src="<?php echo get_template_directory_uri(); ?>/images/sep-shadow.png" /></div>			
                    </div>
  <?php endwhile ?>
    
    <!--POST END--> 
    <a class="comments_template"><?php if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?></a>
            <?php endif ?></div>
            
           
   
   <div class=" wow fadeIn large-3 columns"> 
<?php get_sidebar();?>

</div>

</div> 
</div>
</div>
</div>
<?php get_footer(); ?>
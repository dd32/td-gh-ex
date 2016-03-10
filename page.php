<?php 
//post page

get_header(); ?>  




	<div class="blog-content">
        <div class="wrap">
            <div class="main">
                <!--article-->
                <ul class="blog-article-list">
                	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                
                    <li id="post-1176">
                        <a href="<?php the_permalink(); ?>"  class="images newsflash">
						<?php if(has_post_thumbnail()){
                                $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
                        ?>
                                <img width="185" height="135"  src="<?php echo $img_src[0];?>"  class="attachment-post-thumbnail wp-post-image" alt="" />
                        <?php }?>
                        </a>
                        
                		<div class="info">
                    		<h3><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h3>
                    		<div class="author">
                        		<!--a href="/author/" class="author-pic"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" width="22" height="22" alt="" class="avatar avatar-22 wp-user-avatar wp-user-avatar-22 photo avatar-default" /></a-->
                        		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> . 
                        		<time><?php the_time('M d , Y');?></time> . 
                                <?php
									foreach((get_the_category()) as $category) {
										$category->cat_ID;
										$category->cat_name;
									}
									$cat_links=get_category_link($category->cat_ID );
								?> 
                                
                                <a href="<?php echo $cat_links; ?>" title="<?php echo $category->cat_name; ?>">#<?php echo $category->cat_name;?></a>                               
                         	</div>
                    		<div class="quote">
                            	<p><?php the_excerpt(); ?></p>
							</div>
                		</div>
            		</li>
                    
                    
                    
                    <?php endwhile;endif; ?>                
                    
            	</ul><!--ul class="blog-article-list"-->
                
                
                
                
				<article class="blog-article">
                	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                    <?php
						foreach((get_the_category()) as $category) {
								$category->cat_ID;
								$category->cat_name;
							}
						$cat_links=get_category_link($category->cat_ID );
					?> 
                    <a href="<?php echo $cat_links; ?>" class="newsflash">#<?php echo $category->cat_name;?></a>
                    <h2><?php the_title(); ?></h2>
                    <div class="author-share">
                        <div class="author">
                            <img src="<?php echo get_template_directory_uri();?>/images/default-avatars.png" width="48" height="48" alt="" class="avatar avatar-48 wp-user-avatar wp-user-avatar-48 photo avatar-default" />
                            <p>Ascreen Theme</p>
                            <time><?php the_time('M d , Y');?></time>
                        </div>
                        <div class="share">
                            <a target="_blank" href="twitter" class="share-qq cbutton cbutton--effect-jagoda"><i class="icon-twitter"></i></a>
                            <a target="_blank" href="google +" class="share-google-plus cbutton cbutton--effect-jagoda"><i class="icon-google-plus"></i></a>
                            <a target="_blank" href="facebook" class="share-facebook cbutton cbutton--effect-jagoda"><i class="icon-facebook"></i></a>
                        </div>
                    </div>
                    <div class="blog-article-content">
                      	<?php the_content(); ?>
    
                    </div>
                    <?php endwhile;endif; ?> 
					<?php if(has_tag()){?>
                        <div id="article-tag">
                            <?php the_tags('<strong>Tags:</strong> ', ' , ' , ''); ?>
                        </div> 
                    <?php }?>                       
                </article>
            
             	<?php
                	$withcomments = "1";
                	comments_template();
            	?>
            </div><!--div class="main"-->               

            <!--siedbar-->
            <?php get_sidebar(); ?>
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->


<?php get_footer(); ?>
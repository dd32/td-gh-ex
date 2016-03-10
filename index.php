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
						<?php 
							if(has_post_thumbnail())
							{
								the_post_thumbnail( array(185, 135) );
                             }
						?>
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
 
 
 				<?php ascreen_paging_nav(); ?>
 
            </div><!--div class="main"-->

            <!--siedbar-->
            <?php get_sidebar(); ?>
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->

	<!--Home  post list-->
    <!--section class="resources-content">
    	<div class="resources-content-main">
        	<ul class="resources-item">
            	<li>
              		<a href="/" class="pic resourcesTag1" style="background-image: url(<?php echo get_template_directory_uri();?>/images/1.png)">
                        <span>Cat Name</span>
                    </a>
                    <div class="info">
                        <h3>
                            <a href="/">Article title 1</a>
                        </h3>
                        <p>Article Cont ent Art icle Cont ent Artic le Cont ent Article Cont ent Arti cle Cont ent Article Content Article Cont  cle Cont ent Article Content Article Cont  cle Cont ent Article Content Article Cont </p>
                    </div>
                </li>

            	<li>
              		<a href="/" class="pic resourcesTag1" style="background-image: url(<?php echo get_template_directory_uri();?>/images/2.jpg)">
                        <span>Cat Name</span>
                    </a>
                    <div class="info">
                        <h3>
                            <a href="/">Article title 1</a>
                        </h3>
                        <p>Article Content Article Content Article Content Article Content Article Content</p>
                    </div>
                </li>
            	<li>
              		<a href="/" class="pic resourcesTag1" style="background-image: url(<?php echo get_template_directory_uri();?>/images/1.png)">
                        <span>Cat Name</span>
                    </a>
                    <div class="info">
                        <h3>
                            <a href="/">Article title 1</a>
                        </h3>
                        <p>Article Content Article Content Article Content Article Content Article Content</p>
                    </div>
                </li>
            	<li>
              		<a href="/" class="pic resourcesTag1" style="background-image: url(<?php echo get_template_directory_uri();?>/images/2.jpg)">
                        <span>Cat Name</span>
                    </a>
                    <div class="info">
                        <h3>
                            <a href="/">Article title 1</a>
                        </h3>
                        <p>Article Content Article Content Article Content Article Content Article Content</p>
                    </div>
                </li>                
             </ul>
    	</div>
	</section-->



<?php get_footer(); ?>
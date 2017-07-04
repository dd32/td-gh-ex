<?php get_header(); ?>  

	<div class="blog-content">
    
   
        <div class="wrap">
        
			<?php
                if ( is_active_sidebar( 'sidebar-6' ) ) :
                    dynamic_sidebar( 'sidebar-6' );
					echo '<br>';
                endif;
            ?>  
                    
			<?php if(get_theme_mod( 'enable_breadcrumb_check',1 )){ ?> 
            <div itemscope itemtype="http://schema.org/WebPage" id="crumbs" class="breadcrumb">
        		<?php ascreen_breadcrumb_trail(); ?> 
			</div>
            <?php } ?> 
            
            <div class="main">
            
  
                <!--article--> 
				<article class="blog-article">
                	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php
							ascreen_get_the_category();
                        ?>
                        
                        <h2><?php the_title(); ?></h2>
                        <div class="author-share">
                            <div class="author">
                            	<?php echo get_avatar( the_author_meta('user_nicename'), 48,'','',false ); ?>
                                
                                <p><time><?php the_date();?></time></p>
                            </div>

                            <?php ascreen_get_share_url();?>
                            
                        </div>
                        <div class="blog-article-content">
                            <?php the_content(); ?>
   
						<?php
                        
                        
                            $defaults = array(
                                'before'           => '<p>' . __( 'Pages:','ascreen' ),
                                'after'            => '</p>',
                                'link_before'      => '',
                                'link_after'       => '',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __( 'Next page','ascreen' ),
                                'previouspagelink' => __( 'Previous page','ascreen' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                            );
                         
                            wp_link_pages( $defaults );
                    
                        ?>
                        </div>
                    </div>
                    

                    
                    <?php endwhile;endif; ?> 
					<?php if(has_tag()){?>
                        <div id="article-tag">
                            <?php the_tags('<strong>'.__( 'Tags:','ascreen' ).'</strong> ', ' , ' , ''); ?>
                        </div> 
                    <?php }?> 
                    
                    
                                          
                </article>

			
				<?php

					if ( get_theme_mod( 'post_previous_next','') != 'no-display' )
					{
						ascreen_previous_next($post->ID);
					}
                ?>            
            
            
             	<?php
					if(comments_open()){comments_template();}
            	?>
            </div><!--div class="main"-->   
            
            
                       

            <!--siedbar-->
            <?php get_sidebar(); ?>
            

                            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->


<?php get_footer(); ?>
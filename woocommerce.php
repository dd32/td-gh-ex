<?php get_header(); ?>  

	<div class="blog-content blog-page">
        <div class="wrap">

            <div class="main <?php if( get_theme_mod( 'enable_woocommerce_siderbar',0) ){echo 'woo-page';}?>">
                <!--article--> 
				<article class="blog-article">
                	<?php if(have_posts()) : ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                        <div class="blog-article-content">
                            <?php woocommerce_content(); ?>
                            
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
                    
                    <?php endif; ?> 
					<?php if(has_tag()){?>
                        <div id="article-tag">
                            <?php the_tags('<strong>'.__( 'Tags:','ascreen' ).'</strong> ', ' , ' , ''); ?>
                        </div> 
                    <?php }?>                       
                </article>
            
             	<?php
					if(comments_open()){comments_template();}
            	?>
            </div><!--div class="main"-->               

            <!--siedbar-->
   			<?php if(  get_theme_mod( 'enable_woocommerce_siderbar',0) ){get_sidebar();}?>   
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->


<?php get_footer(); ?>
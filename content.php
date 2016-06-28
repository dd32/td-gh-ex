<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Advance
 */

?>

	<div  class="content_blog blog_style_b1" role="main">
		<article class="post_format_standard odd">
						                        
			<div class="title_area">
				 <?php the_title( sprintf( '<h1 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			</div>
                        
				<div class="post_info post_info_2">
 					<span class="post_author"> <i class="fa fa-calendar"></i>
       					 <a class="post_date"><?php the_time( get_option('date_format') ); ?></a>
        			</span>
                      <span class="post_info_delimiter"></span>
					<span class="post_author"><i class="fa fa-user"></i> 
                   		 <a class="post_author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?>
                    	 </a>
                    </span>
					<span class="post_info_delimiter"></span>
                           
						   <?php if( has_category() ) { ?>
							<span class="post_categories">
								<span class="cats_label"><i class="fa fa-th-list"></i></span>
								  <a class="cat_link"><?php the_category(' '); ?></a>
							</span>
						 <?php } ?>
                         
                       	 <div class="post_comments">
                         	<a><i class="fa fa-comments"></i><span class="comments_number"> 
						 		<?php comments_popup_link( __('0 Comment', 'advance'), __('1 Comment', 'advance'), __('% Comments', 'advance'), '', __('Off' , 'advance')); ?> </span>
                                <span class="icon-comment"></span>
                             </a>
                        </div>  
                            
				</div>
                        
						
				<div class="post_content">
					<p><?php the_excerpt(); ?></p>
							
				</div>
				<div class="readmore">
					<a href="<?php echo esc_url(get_permalink());?>" rel="bookmark" class="more-link">
						<?php echo esc_attr__('Read more','advance');?>
     				</a>
				</div>
         </article>
	</div>
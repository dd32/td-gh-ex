<?php get_header(); ?>

	
        
        <div id="content" class="container">
            <div id="content" class="content">
                <div  class="row">           		
                    <div class="col-md-9">
                    	 
                         <div id="inner_content">
                         	
                            <div id="post" class="row">                                    
								<?php
                                //query posts
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									query_posts($query_string .'&posts_per_page=10&paged=' . $paged);
                                ?>
                                <?php if (have_posts()) : ?>
                                	
										<div class="col-md-12"><h1 class="post_title"><?php _e( 'Search Results For: ', 'wp-fanzone' ); ?><?php the_search_query(); ?></h1></div>
                                            
                                	<?php while (have_posts()) : the_post(); ?>  
                                        <div class="col-md-12"> 
                                        	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                                 
                                                <div class="post_box">
                                                    <h4 class="post_title"><?php the_title(); ?></h4> 
                                                    <div class="row">                                                    
                                                    <?php if (has_post_thumbnail()) { ?>	
                                                        <div class="col-md-6">
                                                            <a href="<?php the_permalink('') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                                                            <div class="meta-info row">
                                                                <div class="col-md-6"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></div>
                                                                <div class="col-md-6"><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></div> 
                                                            </div> 
                                                        </div>                               
                                                        <div class="col-md-6">                                                           
                                                            <p class="post_desc"><?php echo excerpt(80); ?></p>
                                                            <div class="clearfix"></div>
                                                        </div> 
                                                     <?php } else { ?>
                                                        <div class="col-md-12">                                                           
                                                            <p class="post_desc"><?php echo excerpt(80); ?></p>
                                                        </div>
                                                         <div class="meta-info row">
                                                            <div class="col-md-6"> 
                                                                <div class="col-md-6"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></div>
                                                                <div class="col-md-6"><a href="<?php comments_link(); ?>" class="meta-comment"><i class="fa fa-comments"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></a></div> 
                                                            </div>                                 
                                                            
                                                        </div> 
                                                     <?php } ?> 
                                                     <div class="clearfix"></div>                                 
                                                    </div>
                                                    <a href="<?php the_permalink('') ?>" class="btn btn-info read_more"><?php _e( 'Read More >>', 'wp-fanzone' ); ?></a>
                                                </div>
                                            </div>
                                         </div> 
                                         <div class="clearfix"></div>    
                                    <?php endwhile; ?>
                              <?php else : ?>
        
                                    
                                    <div class="col-md-12"><h1 class="post_title"><?php _e( 'Search Results For: ', 'wp-fanzone' ); ?>"<?php the_search_query(); ?>"</h1></div>
                                    
                                    <!-- END page-heading -->
                                    
                                    <div id="post" class="post clearfix">
                                    <div class="col-md-12"><h3><?php _e('No results found for that query.', 'wp-fanzone'); ?></h3></div>
                                    </div>
                                    <!-- END post  -->
                                     
								<?php endif; ?> 		 
                                <?php wp_reset_query(); ?> 
                               
                             </div> <!--end class="row"-->
                              
                             <div class="clearfix"></div>
                             <?php if (function_exists("wp_fanzone_pagination")) {
									wp_fanzone_pagination(); 
								
								}
								?>
                        </div> <!--end id="inner_content"-->
                       
                        
                    </div> <!--end class="col-md-9"-->
                    <div class="col-md-3">
                         <aside id="widget">
                         	<?php get_sidebar(); ?>
                        </aside>
                    </div>
                </div> <!--end <div class="row"> -->
            </div> <!--end <div id="content" class="content">-->
        </div>
	</div>

<?php get_footer(' '); ?>

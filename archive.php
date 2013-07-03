<?php 
/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/archive.php
 */


?>



<?php get_header();?>
  <div class="inner_top_mn">
		<div class="page_wi">			
			<h2>
				<?php bloginfo('title');?><br>
				<span><?php bloginfo('description');?></span>	
			</h2>
			<div class="search_box">			 
               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text"  name="s"  placeholder="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
		        <input type="submit" class="search_btn" name="submit"  value="" />
			   </form>          
		   </div>
		</div>
	</div>
    </header>
     <section>
		<div class="page_wi">
			<div class="blog_right_bg_mn_con">
			
			<div class="blog_left">
			
             
                  
                  <div class="page_blog_row_mn"> <h2>
                          
							<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: %s', 'appointment' ), '<span>' . get_the_date() . '</span>' ); ?>
							<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: %s', 'appointment' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
							<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: %s', 'appointment' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
							<?php else : ?>
								<?php _e( 'Blog Archives', 'appointment' ); ?>
                            </h2>
			      <?php endif; ?>
                </div><!--page_blog_row_mn-->
                 
                   <?php    while(have_posts()): the_post();?>
                       <div class="blog_row_mn">
                      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					    <div class="blog_link_mn">	
                         <span><img src="<?php echo get_template_directory_uri();?>/images/blog_ic.png" alt="Icon" /> 
						<?php the_date('M j,Y');?></span> 
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog_ic2.png" alt="Icon" /> </a>
                 <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( '% Comments', 'appointment' ),'name' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic3.png" alt="Icon" />
                          <?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?>
						<?php the_category(); ?>
					  </div><!--blog_link_mn-->	
                      
                      					<?php if(has_post_thumbnail()):?>					
					<div class="blog_img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail('large',array('class' => 'fleft'));?>
						</a>
					</div>
					<?php endif;?>					
					<p class="blog_con_mn"><?php  the_excerpt(); ?></p>
					<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul>
                     </div><!--pagination_blog-->
					 <?php endif;?>
					<div class="blog_bot_mn">
						
						<span> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </span>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','appointment'); ?></a>
					</div><!--blog_bot_mn-->
				</div><!--blog_row_mn-->
				
				<?php endwhile;?>		 
				 <?php 
				global $wp_query;
				// post pagination
				$args = array(
	'base'         => add_query_arg( 'paged', '%#%' ),
	'format'       => '',
	'total'		   => $wp_query->max_num_pages,
	'current'      => 0,
	'show_all'     => true,
	'end_size'     => 1,
	'mid_size'     => 1,
	'prev_next'    => True,
	//'prev_text'    => __('« Previous'),
	//'next_text'    => __('Next »'),
	'type'         => 'list',
	'add_args'     => False,
	'add_fragment' => ''
); ?>
<?php if($wp_query->max_num_pages != 1 ):?>
   <div class="pagination_blog"><?php _e("Scroll More Posts:",'appointment') ?><?php echo paginate_links( $args ); ?> </div>
   <?php endif;?>
			
            	
				</div><!--blog_left-->
			
			<div class="blog_right_mn"><?php get_sidebar();?></div>
			</div><!--blog_right_bg_mn_con-->
        </div><!--page_wi-->
    </section>
    <?php get_footer();?>
    
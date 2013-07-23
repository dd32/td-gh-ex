<?php
/**
 * Single Template
 *
 @file            single.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/single.php
*/ 
?>
 


 <?php get_header(); ?>
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
               <?php  the_post(); ?>
			     <?php if('gallery'==get_post_format()):?>
				 
				   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> </div>
		           <div class="blog_row_mn">
					 <h2> <?php the_title(); ?></h2>
					  <?php if(has_post_thumbnail()):?>    
                              <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
                             <?php endif;?>
                       <div class="blog_con_mn"> <?php the_content(); ?> </div>
				   

                      </div><!--  blog_row_mn -->
					 <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>
				  <?php else:?>
                  <?php get_template_part( 'content-single', get_post_format() );   ?>
                 <?php endif;?>
			<?php comments_template( '', true );?>

    </div><!-- closing of the blog_right_bg_mn_con -->  

    <div class="blog_right_mn">
				  
		<?php get_sidebar();?>   		
                
                
    </div> <!-- blog_right_mn -->     
   </div><!-- closing of the page_wi -->
   </section>
 <?php get_footer();?>    
         
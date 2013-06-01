
<?php 
/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/index.php
 */


?>

<?php get_header(); ?>

 <div class="inner_top_mn">
		<div class="page_wi">			
			<h2>
				<?php bloginfo('title')?><br>
				<span><?php bloginfo('description')?></span>	
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
		         <div class="page_blog_row_mn">
	<?php if (have_posts()) : 
          ?>
		<?php while (have_posts()) : the_post(); ?>
        
	
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php //appointment_entry_top(); ?>

				<h2><?php the_title();?><?php get_template_part( 'post-meta-page' ); ?></h2>
				
				
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<div class="blog_con_mn"><?php the_content(); ?></div>
                   
					<?php if(wp_link_pages(array('echo'=>0))):?>
                    <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>
					 <?php endif; ?>
					
           </div><!--  the blog_row_mn -->
			 <?php comments_template( '', true );?>
    </div><!--  blog_left -->  
<?php
endwhile;
 endif;?>
 </div>
    <div class="blog_right_mn">
		  
		<?php get_sidebar();?>   		
                
                
    </div>      
  
  </div>
  </div>
    </section>
 <?php get_footer();?>    
         
				
				<?php //get_template_part( 'post-data' ); ?>
				               
			


           
                                   
    
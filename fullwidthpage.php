 <?php
/*
 * Full Content Template
 * Template Name:Full width page
 * @file           fullwidthpage.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointpress
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/fullwidthpage.php
				
								
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
			   <?php  the_post(); ?>
			<div class="about_top_mn">
			
				<div class="about_top_mn_cols1">
                 
				<h2><?php the_title(); ?> </h2>
                      <?php the_content()?>
                    
                       <!-- page pagination-->
                      <?php if(wp_link_pages(array('echo'=>0))):?>
                      <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>
					 <?php endif; ?>
				</div>
			</div>	
			<div class="about_border_row"></div>
			<?php comments_template( '', true );?>
     </div>
    </section>
    <?php get_footer();?>


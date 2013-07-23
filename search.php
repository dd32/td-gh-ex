<?php
/**
 * Search Template
 *
 @file             search.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/search.php
*/ 

get_header(); ?>

		 <div class="inner_top_mn">
		<div class="page_wi">			
			<h2>
				<?php bloginfo('title');?><br>
				<span><?php bloginfo('description');?></span>	
			</h2>
			<div class="search_box">			 
               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text"  name="s"  placeholder="<?php _e( 'Search', 'appointment' ); ?>" />
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
		      <div class="blog_row_mn">
			<?php if ( have_posts() ) : ?>

			
                
					<h2><?php printf( __( 'Search Results for:%s', 'appointment' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			
                  <?php if(wp_link_pages(array('echo'=>0))):?>
                    <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>
					 <?php endif; ?>
		

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			
      
			<?php else : ?>

		<!--<article id="post-0" class="post no-results not-found">-->
			     
						<h2><?php _e( 'Nothing Found', 'appointment' ); ?></h2>
			

			          <div class="blog_con_mn">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'appointment' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .blog_con_mn -->
			
              
			<?php endif; ?>
             <div class="about_border_row"></div>
			</div><!-- #content -->
			</div>
		
			<div class="blog_right_mn"><?php get_sidebar();?></div>
			</div>
			
		</section><!-- #primary -->

    	<?php get_footer();?>
    

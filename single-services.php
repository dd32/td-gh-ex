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
             <?php the_post(); ?>
		         <div class="blog_row_mn">
					
					<h2> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></h2>
                   
                    <p class="blog_con_mn"><?php the_content(); ?></p>
           </div><!-- closing of the blog_row_mn -->
               <div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div> 
    </div><!-- closing of the blog_left -->  

    <div class="blog_right_mn">
				  
		<?php get_sidebar();?>   		
                
                
    </div>      
   </div>
   </section>
 <?php get_footer();?>    
         
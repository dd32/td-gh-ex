<?php get_header(); ?>   

<div class="ct_single">
	<div class="container"><div class="row">
		<?php if(function_exists('ct_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) ct_breadcrumbs();?> 
        <div class="col-md-9 ct_single_content">    
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    
            <h1 class="ct_title_h1">404 Page!</h1>

			<?php 
				$page_404_content = of_get_option('page_404_content');
				if($page_404_content)
				{
					echo esc_html($page_404_content) ;
				
				}else{
			?>		
				  <div class="text-center">404 Error! Page Not Found!<a href="<?php echo home_url();?>"><i class="fa fa-home"></i> Please, return to homepage!</a></div>	
			<?php	
				}
			?>
 
 

            
        <?php endwhile;endif; ?> 
        </div>
        
        
        
        <?php get_sidebar(); ?> 
          
    
	</div></div> 		      
</div>


<?php get_footer(); ?>
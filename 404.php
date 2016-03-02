<?php get_header(); ?>   

<div class="ct_single">

	<div class="container"><div class="row">
    
 		<div style="margin-left:15px; padding:0;"><?php if(function_exists('acool_breadcrumbs') && of_get_option("show_breadcrumb") =='yes' ) acool_breadcrumbs();?></div>  
    
        <div class="col-md-9 ct_single_content" >     


            <h1 class="ct_title_h1">404 Page!</h1>

			<?php 
				$page_404_content = of_get_option('page_404_content');
				if($page_404_content)
				{
					echo $page_404_content;
				
				}else{
			?>		
				  <div class="text-center">404 Error! Page Not Found!<a href="<?php echo home_url();?>"><i class="fa fa-home"></i> Please, return to homepage!</a></div>	
			<?php	
				}
			?>
 
		</div>
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div> 		      
</div>

<?php get_footer(); ?>
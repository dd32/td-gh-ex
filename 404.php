<?php get_header(); ?>   

<div class="ct_single">

	<div class="container"><div class="row">
    
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb','1' ) ){ acool_breadcrumbs();} ?>  
    
        <div class="col-md-9 ct_single_content" >     

            <h1 class="ct_title_h1">404 Page!</h1>

            <div class="text-center">
            	<img class="img-404" src="<?php echo get_stylesheet_directory_uri();?>/images/404.png" alt="404 not found" />
                <br/> <br/>
            	<a href="<?php echo esc_url(home_url());?>"><i class="fa fa-home"></i> Please, return to homepage!</a>
            </div>

		</div>
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div> 		      
</div>

<?php get_footer(); ?>
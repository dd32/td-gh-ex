<?php get_header(); ?>   

<div class="ct_single">

	<div class="container"><div class="row">
    
    	<?php get_sidebar( 'content' ); ?>
    
 		<?php if(function_exists('acool_breadcrumbs') && acool_get_option( 'ct_acool','show_breadcrumb','1' ) ){ acool_breadcrumbs();} ?>
    
        <div class="col-md-8 ct_single_content" > 
            <div class="ct_border">
                <h1 class="ct_title_h1">404 Page!</h1>
    
                <?php
					$acool_404_display = 0;
					if( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED )
					{
						if(acool_404_content()){echo acool_404_content();}else{ $acool_404_display = 1;}
					}
					else{ $acool_404_display = 1;}
					
					if($acool_404_display){
                ?>
    
                    <div class="text-center">
                        <img class="img-404" src="<?php echo get_stylesheet_directory_uri();?>/images/404.png" alt="404 not found" />
                        <br/> <br/>
                        <a href="<?php echo esc_url(home_url());?>"><i class="fa fa-home"></i> Please, return to homepage!</a>
                    </div>
                <?php	
                    }
                ?>
            </div><!--div class="ct_border"-->
        </div><!--div class="col-md-8 ct_single_content" --> 
    
        <?php get_sidebar( 'acool' ); ?>
             
	</div></div><!--div class="container"><div class="row"--> 		      
</div><!--div class="ct_single"-->

<?php get_footer(); ?>
<?php 
/**
 * The Tag template file
**/
get_header(); 
?>
<section>
	 <!--Breadcrumb Start-->
            <div class="breadcrumb-bg">
                <div class="royals-container container">
                    <div class="site-breadcumb">
                        <h1><?php printf( __( 'Tag Archives : %s', 'avocation' ), single_tag_title( '', false ) ); ?></h1>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <?php if (function_exists('avocation_custom_breadcrumbs')) avocation_custom_breadcrumbs(); ?>                             
                        </ol>
                    </div>  
                </div>
            </div>
            <!--Breadcrumb End-->  
			<!--Our-Blog  Start-->
            <div class="avocation-container  container"> 
                <div class="blog-wrap">
                    <div class="row">
                        <div class="blog-page col-md-8 col-sm-8">                        
                          
                           <?php get_template_part( 'content', get_post_format() ); ?>
                          
                
                            <div class="site-pagination">
                                <?php avocation_pagination();?>			
                            </div>
                        </div>
                        <?php get_sidebar();?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--Our-Blog End-->
            
        </section>
       
<?php get_footer(); ?>


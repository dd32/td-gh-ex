<?php 
/**
 * The category template file
**/
get_header(); ?>
<section>
	  <!--Breadcrumb Start-->
            <div class="breadcrumb-bg">
                <div class="royals-container container">
                    <div class="site-breadcumb">
                        <h1><?php printf(/* translators: %s is single category name.*/ esc_html__( 'Category : %s', 'avocation' ), single_cat_title( '', false ) ); ?></h1>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <?php if (function_exists('avocation_custom_breadcrumbs')) avocation_custom_breadcrumbs(); ?>                             
                        </ol>
                    </div>  
                </div>
            </div>
        <div class="avocation-container  container"> 
                <div class="blog-wrap">
                    <div class="row">
                        <div class="blog-page col-md-8 col-sm-8">                        
                           <?php get_template_part( 'content'); ?>
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
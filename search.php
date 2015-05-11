<?php 
/**
 * The Search template file
**/
get_header(); ?>
<section>
	
            <!--Breadcrumb Start-->
            <div class="breadcrumb-bg">
                <div class="royals-container container">
                    <div class="site-breadcumb">
                       <h1><?php printf( __( 'Search Results for: %s', 'avocation' ), get_search_query() ); ?></h1>
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
				<?php if ( have_posts() ) : ?>   	 
				<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php else : ?>
		<div class="blog-box">
			<?php echo	'<h3>' . __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','avocation') . '</h3>';
			 get_search_form(); ?>
		</div>	 
	<?php endif; ?>
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


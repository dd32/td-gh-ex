<?php
/**
 * 404 pages (not found)
*/
get_header(); ?>
<section>
	  <!--Breadcrumb Start-->
        <div class="breadcrumb-bg">
            <div class="royals-container container">
                <div class="site-breadcumb">
                  <h1 class="page-title-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'avocation' ); ?></h1>
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
			<div class="blog-box">
				 <h1 class="page-title-404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'avocation' ); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'avocation' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
			 </div>
             <?php get_sidebar();?>
                    </div>
                </div>
            </div>
            </div>
            <!--Our-Blog End-->
        </section>
<?php get_footer(); ?>
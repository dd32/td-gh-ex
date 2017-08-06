<?php
get_header(); ?>

 <!--Main Area-->
        
        <section class="page-title-bar page-title-bar-archive title-left">
<div class="container">
  <div class="row">
    <div class="col-md-12">
  <h4 class="text-uppercase"><?php 
				if( is_archive() )
					the_archive_title();
				else
					single_cat_title(); 
				
				?></h4>
    <div class="breadcrumb-nav">
      <?php avata_breadcrumbs();?>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
  </div>
        </section>
        <div class="page-wrap">
            <div class="container">
                <div class="page-inner row right-aside">
                    <div class="col-main">
                        <section class="page-main" role="main" id="content">
                            <div class="page-content">
                                <!--blog list begin-->
                                
                                <div class="post-list">
                                
                          <?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'post' );

				endwhile;

				the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'avata' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'avata' ) . '</span><i class="fa fa-arrow-right"></i>' ,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'avata' ) . ' </span>',
				) );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>         
                                    
                                    
                                </div>
                                <!--blog list end-->
                 
                            </div>
                            <div class="post-attributes"></div>
                        </section>
                    </div>
                    <div class="col-aside-left"></div>
                    <div class="col-aside-right">
                        <aside class="blog-side left text-left">
                            <div class="widget-area">
                                
                                <?php get_sidebar();?>
                                
                            </div>
                        </aside>
                    </div>
                </div>
            </div>  
        </div>

<?php get_footer();

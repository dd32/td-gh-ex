<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header(); ?>
<div class="smallhead">
</div>
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
 <div class="col-md-12  col-sm-12 ">
        <ol class="breadcrumb ">
          <?php aron_breadcrumbs(); ?>
        </ol>
      </div>
</div>
				</div>
			</div>
<div class="mainblogwrapper clearfix">
    <div class="container">
        <div class="row">
        
            <div class="mainblogcontent">
             
             <div class="col-md-9">
            
            
          <h1><?php printf( __( 'Search Results for: %s', 'aron' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        
      <?php get_template_part('loop', 'search'); ?>
          
       <div class="clearfix"></div>
                    <!-- *** Post1 Starts Ends *** -->
                   
        
        <!--end / article--> 
        <nav id="nav-single"> <span class="nav-previous">
                           <?php next_posts_link(__( 'Next Post', 'aron' )); ?>
                        </span> <span class="nav-next">
 <?php previous_posts_link(__( 'Previous Post', 'aron' )); ?>
                        </span> </nav>
      </div>
      
      <!--end / main-->
      
     <div class="col-md-3">
        <?php get_sidebar(); ?>
     </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

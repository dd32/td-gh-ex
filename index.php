<?php 
/*
** Template Name : Right Sidebar
*/
get_header(); ?>
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
 <div class="col-md-12  col-sm-12 ">
        <ol class="breadcrumb ">
          <?php avnii_breadcrumbs(); ?>
        </ol>
      </div>
</div>
				</div>
			</div>
<!--end / page-title-->
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
            <div class="mainblogcontent">
              
                <div class="col-md-9">
                    <!-- *** Post loop starts *** -->

                    <!-- *** Post1 Starts *** -->
                    <?php get_template_part('loop', 'index'); ?>
                    <div class="clearfix"></div>
<nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link('Next Post <i class="fa fa-long-arrow-right"></i>'); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link('<i class="fa fa-long-arrow-left"></i> Previous Post '); ?>
                        </span> </nav>
                    <!-- *** Post1 Starts Ends *** -->
                    <!-- *** Post loop ends*** -->
                  
                    <!-- ***Comment Template *** -->
                    <?php comments_template(); ?>
                    <!-- ***Comment Template *** -->   <div class="clearfix"></div>
                </div>
                <div class="col-md-3">
                    <!-- *** Sidebar Starts *** -->
                    <?php get_sidebar(); ?>
                    <!-- *** Sidebar Ends *** -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

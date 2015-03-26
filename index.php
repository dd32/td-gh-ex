<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Market
 */
get_header(); ?>
<div class="smallhead">
</div>
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
                            <?php next_posts_link(__( 'Next Post <i class="fa fa-long-arrow-right"></i>', 'avnii' )); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link(__( '<i class="fa fa-long-arrow-left"></i> Previous Post', 'avnii' )); ?>
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

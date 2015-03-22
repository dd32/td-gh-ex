<?php
/**
 * The Template for displaying all single posts.
 *
 */
get_header();
?>
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
<!--Start Content Grid-->
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
        
            <div class="mainblogcontent">
            
             
            
                <div class="col-md-9">
                    <!-- *** Post loop starts *** -->

                    <!-- *** Post1 Starts *** -->
                      <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="article-page">
               <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
             <?php
 	             the_post_thumbnail();
             ?>
 	                <?php } else { ?>
                     <?php
 	                     the_post_thumbnail();
 	                    ?> 
 	                    <?php
 	                }
 	                ?>
                <h1 class="article-page-head"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <ul class="meta">
                    <li><i class="fa fa-clock-o blogin-color"></i> <?php
                        $archive_year = get_the_time('Y');
                        $archive_month = get_the_time('m');
                        $archive_day = get_the_time('d');
                        ?>
                        <a href="<?php
                        echo get_day_link($archive_year,
                                $archive_month,
                                $archive_day);
                        ?>"><?php echo get_the_time('m, d, Y') ?></a></li>
                    <li><i class="fa fa-user blogin-color"></i>&nbsp;<?php the_author_posts_link(); ?></li>
                    <li><i class="fa fa-folder-open blogin-color"></i>&nbsp;<?php the_category(', '); ?></li>
                    <li class="comments"><i class="fa fa-comment blogin-color"></i> <?php comments_popup_link( __( 'No Comments.', 'avnii' ),
                                 __( 'Comment: 1', 'avnii' ),
                                __( 'Comments: %', 'avnii' )); ?></li>
                </ul>
       <?php the_content(); ?>
                 
            </div>
        </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <div>
                            <p>
                        <?php _e('Sorry no post matched your criteria',
                                'avnii'); ?>
                            </p>
                        </div>
<?php endif; ?>
                           
                            
                    <!-- *** Post1 Starts Ends *** -->
                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
                    <!-- ***Comment Template *** -->
<?php comments_template(); ?>
          <div class="clearfix"></div>           <!-- ***Comment Template *** -->
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

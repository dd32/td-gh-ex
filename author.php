<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>
<div class="smallhead">
</div>
<div class="page-intro" style="margin-top: 0px;">
				<div class="container">
					<div class="row">
 <div class="col-md-12  col-sm-12 ">
        <ol class="breadcrumb ">
        <i class="fa fa-home pr-10"></i>  <?php aripop_breadcrumbs(); ?>
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
                    <div class="article-page">
                <?php
                 
                if (have_posts())
                    the_post();
                ?>
                 <h1><?php printf(__('Author Archives: %s', 'aripop'), "<a class='url fn n' href='" . get_author_posts_url(get_the_author_meta('ID')) . "' title='" . esc_attr(get_the_author()) . "' rel='me'>" . get_the_author() . "</a>"); ?></h1>
                <?php
                // If a user has filled out their description, show a bio on their entries.
                if (get_the_author_meta('description')) :
                    ?>
                    <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('aripop_author_bio_avatar_size', 60)); ?>
                    <h2><?php printf('About %s' . get_the_author()); ?></h2>
                    <?php the_author_meta('description'); ?>
                <?php endif; ?>
                </div>
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the author archive page to output the authors posts
                 * If you want to overload this in a child theme then include a file
                 * called loop-author.php and that will be used instead.
                 */
                  get_template_part('loop', 'author'); 
                ?>
               
                
           <div class="clearfix"></div>
                           <?php wp_reset_query();?>
      <div class="pagecount">
        <?php if (function_exists("aripop_paginate"))
   		 aripop_paginate($query->max_num_pages); ?>		
      </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3">
 
<?php get_sidebar(); ?>
</div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

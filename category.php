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
          <?php aron_breadcrumbs(); ?>
        </ol>
      </div>
</div>
				</div>
			</div>
<!--Start Content Grid-->

<div class="mainblogwrapper clearfix">
    <div class="container">
        <div class="row">
            <div class="mainblogcontent">
              
                <div class="col-md-9">
                <div class="article-page">
            
                <h2>
                    <?php
                    printf(__('Category Archives: %s', 'aron'), '' . single_cat_title('', false) . '');
                    ?>
                </h2>
                <?php
                $category_description = category_description();
                if (!empty($category_description))
                    echo '' . $category_description . '';
                /* Run the loop for the category page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-category.php and that will be used instead.
                 */
                ?> </div>
                <?php get_template_part('loop', 'category');
                ?>
            
            
            
            
            <div class="clearfix"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                   <?php next_posts_link(__( 'Next Post', 'aron' )); ?>
                            </span> <span class="nav-next">
                        <?php previous_posts_link(__( 'Previous Post', 'aron' )); ?>
                            </span> </nav>
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

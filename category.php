<?php 
/*
 * Category Template File.
 */
get_header(); ?>
<section>
    	<!--website-breadcrumbs-->
        <div class="col-md-12 bread-row">
            <div class="container jobile-container">
            	<div class="col-md-6 no-padding-lr bread-left">
                   <h2><?php printf( __( 'Category Archives: %s', 'jobile' ), single_cat_title( '', false ) ); ?></h2>
                </div>
                <div class="col-md-6 no-padding-lr">
               		<ol class="breadcrumb site-breadcumb">
                      <li><?php if(function_exists('jobile_custom_breadcrumbs')) { jobile_custom_breadcrumbs(); } ?></li>
                	</ol>
                </div>    
            </div>
        </div>
        <!--breadcrumbs end-->
    	<div class="container jobile-container">    
            <div class="col-md-12 no-padding-lr margin-top-50">
            	<div class="row">
                    <?php get_sidebar(); ?>
                    <div class="col-md-8">
                        <article class="clearfix">
						<?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-md-12 no-padding-lr sear-result-column">
                                <div class="latest-job article-row1">
                                    <div class="col-md-2 no-padding-lr resp-grid1 box-sadow">
                                         <?php if(get_post_thumbnail_id(get_the_ID())) { echo wp_get_attachment_link( get_post_thumbnail_id(get_the_ID()), 'jobile-blog-image' ); } else { ?>
											<img src="<?php echo get_template_directory_uri() ?>/images/no-image.jpg" width="100" height="86" />
										 <?php } ?>	
                                    </div>
                                    <div class="col-md-10 no-padding-lr">
                                   		<div class="col-md-8 col-sm-8 col-xs-8 no-padding-lr job-status resp-grid1 job-status-3">
                                        <span class="per-name grey-color"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></span>
                                    </div>
                                    	<div class="col-md-4 col-sm-4 col-xs-4 job-status resp-grid1 job-status-3">
                                        <p class="grey-color"><?php echo get_the_time('j F, Y'); ?></p>
                                    </div>
                                    	<div class="col-md-12 no-padding-lr">    
                                        <div class="job-btn-group late-job-btn clearfix">
                                            <?php echo get_the_category_list(', ','jobile'); ?>
                                            <span class="jobile-tag-list"><?php echo get_the_tag_list(' ',' '); ?></span>
                                        </div>
                                     </div>
                                        <div class="col-md-12 no-padding-lr">
                                    <p class="result-btm-text"><?php echo get_the_excerpt(); ?> <a href="<?php echo get_permalink(); ?>" class="color-068587">Read More</a></p>
                                    </div>
                                    </div>
                                </div>
                               </div> 
                           <?php endwhile; ?>
                            <div class="col-md-12 no-padding-lr avilab-row2 padding-0">
                            <?php if(function_exists('faster_pagination')) { faster_pagination('',1); } else { ?>
                                <div class="col-md-12 no-padding-lr right-pagination">
                                	<ul>
                                      <li><?php previous_posts_link(); ?></li>
                                      <li><?php next_posts_link(); ?></li>
                                    </ul>
                                </div>
                           <?php } ?>     
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

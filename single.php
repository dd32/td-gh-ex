<?php 
/*
 * Single Post Template File.
 */
get_header(); ?>
    <section>
    	<!--website-breadcrumbs-->
        <div class="col-md-12 bread-row">
            <div class="container jobile-container">
            	<div class="col-md-6 no-padding-lr bread-left">
                    <h2><?php echo get_the_title(); ?></h2>
                </div>
                <div class="col-md-6 no-padding-lr font-14 breadcrumb site-breadcumb">
               		<?php if(function_exists('jobile_custom_breadcrumbs')) { jobile_custom_breadcrumbs(); } ?>
                </div>    
            </div>
        </div>
        <!--breadcrumbs end-->
    	<div class="container jobile-container">    
            <div class="col-md-12 no-padding-lr margin-top-50">
            	<div class="row">
                    <?php get_sidebar(); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class("col-md-8"); ?>> 
                        <article class="clearfix">
                        	<div class="col-md-12 top-pagination no-padding-lr clearfix">
                            	<div class="col-md-6 col-xs-6 no-padding-lr">
									<?php if(get_option('page_for_posts')) { $jobile_blog = get_option('page_for_posts'); ?>
                            		<a href="<?php echo  esc_url(get_permalink($jobile_blog)); ?>">Back to Listings</a>
                            		<?php } else { ?>
                            		<a href="<?php echo  esc_url(site_url()); ?>">Back to Listings</a>
									<?php } ?>
                                </div>
                                <div class="col-md-6 col-xs-6 no-padding-lr prev-next-btn">
                            		<?php previous_post_link('%link', 'Previous', TRUE); ?>
                                    <?php next_post_link('%link', 'Next', TRUE); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12 no-padding-lr article-content">
                            	<div class="latest-job article-row1">
                                    <div class="col-md-2 no-padding-lr resp-grid1 box-sadow">
                                         <?php if(get_post_thumbnail_id(get_the_ID())) { echo wp_get_attachment_link( get_post_thumbnail_id(get_the_ID()), 'jobile-blog-image' ); } else { ?>
											<img src="<?php echo get_template_directory_uri() ?>/images/no-image.jpg" width="100" height="86" />
										 <?php } ?>	
                                    </div>
                                    <div class="col-md-10 no-padding-lr">
                                   		<div class="col-md-8 col-sm-8 col-xs-8 no-padding-lr job-status resp-grid1 job-status-3">
                                        <span class="per-name grey-color"><?php the_title(); ?></span>
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
                                </div>
                                <div class="article-row2 profile-title">
                                    <?php the_content();
                                     wp_link_pages( array(
										'before'      => '<div class="col-md-6 col-xs-6 no-padding-lr prev-next-btn">' . __( 'Pages:', 'jobile' ) . '',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) ); ?>
                                </div>
                               </div>
                        </article>
                        <?php if( comments_open( $post->ID ) ) { ?>
                        <div class="col-md-12 no-padding-lr article-content">
							<?php comments_template(); ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

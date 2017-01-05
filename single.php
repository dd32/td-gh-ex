<?php 
/**
 * The Single template file
**/
get_header(); ?>
<section>
            <!--Breadcrumb Start-->
            <div class="breadcrumb-bg">
                <div class="royals-container container">
                    <div class="site-breadcumb">
                        <h1><?php the_title();?></h1>
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
                          <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-box">
                           <?php if ( has_post_thumbnail() ) : ?>
						 <div class="blog-box-img">
						 <?php the_post_thumbnail( 'avocation-latest-post', array( 'alt' => esc_attr(get_the_title()), 'class' => 'img-responsive') ); ?>
					</div>
				<?php endif; ?> 
                              <span class="blog-title"><?php echo esc_attr(get_the_title()); ?></span>  
                                <?php avocation_entry_meta(); ?> 
                                <div class="our-blog-details">
                                    <?php the_content(); 
                                    wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'avocation' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) ); ?> 
                                </div>
                            </div> 
                              <?php endwhile; ?>
							<div class="site-pagination">
                                <?php avocation_pagination(); ?>
                            </div>
                            <div class="comments-article">
							<?php comments_template( '', true ); ?>
							</div>
                        </div>
							<?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            <!--Our-Blog End-->
        </section>
<?php get_footer(); ?>
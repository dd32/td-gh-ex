<?php 
/*
 * Page Template File.
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
                    <div class="col-md-8">
                        <article class="clearfix">
                            <div class="col-md-12 no-padding-lr article-content jobile-page-content">
                            	<div class="latest-job article-row1">
                                    <h4 class="jobile-page-title"><?php the_title(); ?></h4>
                                </div>
                                <div class="article-row2 profile-title">
                                    <?php the_content();
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'besty' ),
											'after' => '</div>',
										) );
									?>
			<?php $jobile_feature_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
										 if($jobile_feature_image) { ?>
										 <img src="<?php echo esc_url($jobile_feature_image); ?>" class="img-responsive" />
									<?php } ?>
                                </div>
                               </div>
                        </article>
                        <?php if( comments_open( $post->ID ) ) { ?>
                        <div class="col-md-12 no-padding-lr article-content">
							<?php comments_template(); ?>
						</div>
						<?php } endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>

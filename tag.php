<?php global $backyard; ?>
<section id="content">

 <section class="container paddingtop">

        <div class="row">
        <?php if(isset($backyard['show_bread_crumb_id']) && $backyard['show_bread_crumb_id']==1){ ?>
         <div class="col-lg-12"> <div class="breadcrumbs"><?php the_breadcrumbs(); ?></div></div>
         <?php } ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

            <?php

		// Start the loop.

		while ( have_posts() ) : the_post(); ?>

          <main id="main" class="site-main wow fadeInUp">

           <?php global $backyard; ?>

<article class="post text-center wow fadeInUp">

              <div class="entry-header">
              <?php if(isset($backyard['display_categories']) && $backyard['display_categories']==1){ ?> 
              
<div class="small-title"> <?php the_category(); ?></div>
<?php } ?>
<!--entry-text-->
<h3 class="entry-title"><span class="center-block"><?php the_title(); ?></span></h3>
<div class="entry-meta font-italic textcolor"><span class="text-uppercase"><?php the_author_posts_link() ?></span> -  <?php echo get_the_date(get_option( 'date_format' )); ?>  - <span><i class="fa fa-comment-o"></i><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></span></div>
<!--entry-meta--> 

              </div>

              <!--entry-header-->

              <div class="post-media">
              <?php
			  if (has_post_thumbnail( $post->ID ) ) {
										$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
										$thumbnailURL = $image_url[0]; 
										$image = aq_resize($thumbnailURL, 750, 387, true);
										if(empty($image)) { $image = $thumbnailURL; }
							 		} else {
								 		$thumbnailURL = backyard_post_default_placeholder();
										$image = aq_resize($thumbnailURL, 750, 387, true);
										if(empty($image)) { $image = $thumbnailURL; }
							 		}
				
			  ?>
              <a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
                                            <img src="<?php echo esc_url($image); ?>" class="img-responsive" alt="<?php echo esc_attr(get_the_title()); ?>" itemprop="image">
                                        </a> 
              
              </div>

              <!--post-media-->

              <div class="entry-content"> <?php if ( is_single() ) : else: ?><a href="<?php the_permalink();?>" class="btn fillbg">READ MORE</a><?php endif; ?>
           <?php if(isset($backyard['social_media_sharing_buttons']) && $backyard['social_media_sharing_buttons']==1){ ?>  
<div class="social-share"> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" class="fb"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="tw"><i class="fa fa-twitter"></i></a> <a href="#" class="instagram"><i class="fa fa-instagram"></i></a> <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="google"><i class="fa fa-google-plus"></i></a> </div>
<!--social-share-->
<?php } if ( is_single() ) : ?>
  <?php the_content(); $author_id=$post->post_author; $get_user_meta=get_user_meta($author_id); ?>
  <?php if(isset($backyard['display_tags']) && $backyard['display_tags']==1){ ?>
  <div class="the_tags"><?php the_tags(); ?></div>
  <?php } ?>
  
  
 
<!--audio-row-->

   <?php else: ?>
  <?php the_excerpt(); ?>
  <?php endif; ?>

              </div>

              <!--entry-content--> 

            </article>

              

          </main>

        
            <?php endwhile; ?>

      

        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">

            <div class="sidebar wow fadeInUp">

                

                <?php include backyard_sidebar_path(); ?>

            </div>

        </div>

      </div>

    </section>

  </section>
<?php $classes = array(
		'post',
		'hentry'
	); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
                <div class="post-thumb">
                   <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="img-responsive" alt=""></a>
                </div><!--post-thumb-->
                <div class="entry-header">
                   <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="entry-meta">
                     <ul>
                       <li>
                        <?php _e('Posted On', 'abaya' ); ?>
                        <?php the_tags(); ?>
                        <?php the_time('F j, Y') ?> ,
                        <?php _e('Written by', 'abaya' ); ?> 
					  </li>
                     <li><a href="#"> <?php the_author_posts_link() ?></a> / </li>
                     <li><a href="#"><?php comments_number(__('No Comments','abaya'), __('One Comment', 'abaya'), __('% Comments', 'abaya') );?></a></li>
                     </ul>
                   </div><!--entry-meta-->
                </div><!--entry-header-->
                <div class="entry-content">
                     <?php the_excerpt();?>
                  <a href="<?php the_permalink(); ?>" class="btn" id="blog-btn"><?php _e('Read More','abaya'); ?></a>
                </div><!--entry-content-->
              </div>
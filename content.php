<?php 
/**
 * Content Template
 *
 *
 * @file           category.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/content.php
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog_row_mn">
  <?php if ( is_sticky() ) : ?>
			
					<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title();
    if (strlen($title) == 0)  _e('no title','appointment'); 
	else  _e($title,'appointment'); ?></a></h2>
					
				
			<?php else : ?>
				
		<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
            <?php endif;?>         
							 
						<div class="blog_link_mn">	
						<span><img src="<?php echo get_template_directory_uri();?>/images/blog_ic.png" alt="Icon" /> 
						<?php the_time('M j,Y');?></span> 
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog_ic2.png" alt="Icon" /> </a>
                 <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( '% Comments', 'appointment' ),'name' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic3.png" alt="Icon" />
                          <?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic4a.png" alt="Icon" />
						<?php the_category(); ?>
					</div>
					<?php if(has_post_thumbnail()):?>					
					<div class="blog_img">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
						<?php the_post_thumbnail('large',array('class' => 'fleft'));?>
						</a>
					</div>
					<?php endif;?>	
                       	<?php if ( post_password_required() ) : ?>
						  <p class="blog_con_mn"><?php  the_content(); ?></p>
						   <div class="blog_bot_mn">
						<span> <?php the_tags('<b>Tags:</b>','');?> </span>
						 </div>
					<?php else:?>
					<div class="blog_con_mn"><?php  the_excerpt(); ?></div>
					<?php if(wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul class="page-numbers"><?php 
					 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
					 wp_link_pages($args); ?></ul></div>
					 <?php endif;?>
		
					<div class="blog_bot_mn">
						
						<span> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </span>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','appointment'); ?></a>
						<?php endif;?>
					</div><!--blog_bot_mn-->	
				
	</article><!-- #post-<?php the_ID(); ?> -->	
	
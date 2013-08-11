<?php 
/**
 * Content-Quote  Template
 *
 *
 * @file           content-quote.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/content-quote.php
 */


?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog_row_mn ">
	<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title();
    if (strlen($title) == 0)  _e('no title','appointment'); 
	else  echo $title; ?></a></h2>
	  <div class="blog_link_mn">
					  						<span><img src="<?php echo get_template_directory_uri();?>/images/blog_ic.png" alt="Icon" /> 
						<?php the_date('M j,Y');?></span> 
						<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/blog_ic2.png" alt="Icon" /> </a>
                 <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( '% Comments', 'appointment' ),'name' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic3.png" alt="Icon" />
                          <?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?>
						<img src="<?php echo get_template_directory_uri();?>/images/blog_ic4a.png" alt="Icon" />  
						<?php the_category(); ?>
					</div>
		 <div class="blog_con_mn">
		
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'appointment' ) ); ?>
		
		</div>
  <footer class="entry-meta">
	
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'appointment' ) . '</span>', __( '1 Reply', 'appointment' ), __( '% Replies', 'appointment' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		 <div class="blog_bot_mn">
						
						<span> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </span>
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','appointment'); ?></a>
					</div><!--blog_bot_mn-->

</div>
	</article><!-- #post -->
<?php
/**
* The template for displaying all single posts
*
* @package abaya
* @since abaya 1.0
*/
get_header();?> 
<section class="inner-page-bg">
 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <div class="inner-page-title">
         <h1 class="title"><?php the_title(); ?></h1>
       </div><!--header-->
     </div><!--col-->
   </div><!--row-->
 </div><!--container-->
</section><!--inner-page-bg-->
<section id="content" class="site-content">
 <section class="container">
   <div class="blog-content single_blog" id="blog-content">
     <div class="row">
       <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
         <div class="content-area" id="primary">
           <div id="main" class="site-main">
             <div class="post hentry" id="post" >
               <div class="post-thumb">
                 <?php abaya_post_thumbnail(); ?>
               </div><!--post-thumb-->
               <div class="entry-header">
                  <h3 class="entry-title"><?php the_title(); ?></h3>
                  <div class="entry-meta">
                    <ul>
                      <li>
                       <?php _e('Posted On', 'abaya' ); ?>
                       <?php the_time( get_option( 'date_format' ) );?>
                       <?php _e('|', 'abaya' ); ?> , <?php _e('Written by', 'abaya' ); ?> 
					  </li>
                    <li><?php the_author_posts_link() ?> / </li>
                    <li><?php comments_number(__('No Comments','abaya'), __('One Comment', 'abaya'), __('% Comments', 'abaya') );?></li>
                    </ul>
                  </div><!--entry-meta-->
               </div><!--entry-header-->
               <div class="entry-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php
                wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">'.__( 'Pages:', 'abaya').'</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
				?>
               </div><!--entry-content-->
             </div><!--post-->
             <div class="commentsection">
             <?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '&raquo', 'abaya' ) . '</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '&laquo', 'abaya' ) . '</span> ',
			) );
		// End the loop.
		endwhile;  else: ?>
                <?php endif; ?>
              </div><!--comment_section-->
           </div><!--main-->
         </div><!--primary-->
       </div><!--col-->
       <?php get_sidebar('blog');?><!--col--><!--col-->
     </div><!--row-->
   </div><!--main-->
 </section><!--container-->
</section><!--content-->
<?php get_footer();?>
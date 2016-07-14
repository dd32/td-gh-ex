<?php get_header();
if(is_home() && get_option('page_for_posts')): $blog_page_id = get_option('page_for_posts'); $post_page_title=get_page($blog_page_id)->post_title; else : $blog_page_id=get_option('page_on_front'); $post_page_title=''.__('Blog', 'abaya'); endif;
?> 
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php echo $post_page_title;  ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
           <?php woocommerce_breadcrumb(); ?><!--crumbs-->
        </div><!--breadcrumbs-->
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
                  <img src="<?php the_post_thumbnail_url();?>" class="img-responsive" alt="">
                </div><!--post-thumb-->
                <div class="entry-header">
                   <h3 class="entry-title"><?php the_title(); ?></h3>
                   <div class="entry-meta">
                     <ul>
                       <li>
                        <?php _e('Posted On', 'abaya' ); ?>
                        <?php the_time('F j, Y') ?>
                        <?php _e('|', 'abaya' ); ?> , <?php _e('Written by', 'abaya' ); ?> 
					  </li>
                     <li><a href="#"> <?php the_author_posts_link() ?></a> / </li>
                     <li><a href="#"><?php comments_number(__('No Comments','abaya'), __('One Comment', 'abaya'), __('% Comments', 'abaya') );?></a></li>
                     </ul>
                   </div><!--entry-meta-->
                </div><!--entry-header-->
                <div class="entry-content">
                 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                 <?php the_content(); ?>
                </div><!--entry-content-->
              </div><!--post-->
              <div class="commentsection">
              <?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav alignright" aria-hidden="true">' . __( '', 'abaya' ) . '</span> ' .

					'<span class="screen-reader-text alignright">' . __( 'Next post:', 'abaya' ) . '</span> ' .

					'<span class="post-title alignright">' . __( 'Next &raquo;', 'abaya' ) . '</span>',

				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '', 'abaya' ) . '</span> ' .

					'<span class="screen-reader-text alignleft">' . __( 'Previous post:', 'abaya' ) . '</span> ' .

					'<span class="post-title alignleft">' . __('&laquo; Previous', 'abaya') . '</span>',

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
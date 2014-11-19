<?php 
/*
 * Single Post Template File.
 */
get_header(); ?>

<!--section part start-->
<section class="section-main">
  <div class="col-md-12 a1-breadcrumb">
    <div class="container a1-container">
      <div class="col-md-6 col-sm-6 no-padding-lr left-part">
        <h3><?php a1_title() ?></h3>
      </div>
      <div class="col-md-6 col-sm-6 no-padding-lr right-part">
         <?php if(function_exists('a1_custom_breadcrumbs')) a1_custom_breadcrumbs(); ?>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="container a1-container">
    <div class="row">
      <div class="col-md-8 col-sm-8 blog-article">
       <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         <div class="blog-post single-blog"> <h3 class="blog-title"><?php echo get_the_title();  ?></h3>
           <div class="blog-info"> 
          	<ul>
            	<?php a1_entry_meta();  ?>
          	</ul>
          </div>
          <div class="blog-inner"> 
             <?php $a1_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); 
              if(!empty($a1_image)) :?>
            <img src="<?php echo esc_url( $a1_image ); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
             <?php endif; ?>
            <div class="blog-content">
             <?php the_content(); 
                    wp_link_pages( array(
                    'before'      => '<div class="col-md-6 col-xs-6 no-padding-lr prev-next-btn">' . __( 'Pages:', 'a1' ) . '',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    ) );             
             ?>
            </div>
          </div>
        </div>
        <div class="col-md-12 a1-post-comment no-padding">
         <?php comments_template('', true); ?>
        </div>        
      </div>
         <?php endwhile; endif; ?>
        <div class="col-md-12 a1-pagination no-padding">
          <ul>
            <li class="prev"><?php previous_post_link('<strong>%link</strong>'); ?></li>
            <li class="next"><?php next_post_link('<strong>%link</strong>'); ?></li>
        </ul>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<!--section part end-->


<?php get_footer(); ?>

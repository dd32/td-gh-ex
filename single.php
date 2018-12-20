<?php 
/**
 * Single Post template file
**/
get_header(); ?>
<div class="medics-single-blog section-main header-blog">
  <div class=" container-medics container">
    <div class="col-md-12"> <h1> <span> <?php echo get_the_title(); ?> </span> </h1></div>
  </div>
</div>
<div class="container container-medics">
  <div class="col-md-12 no-padding">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php while ( have_posts() ) : the_post();
        $custom_class = (get_theme_mod('single_post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('single_post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
        if ( get_theme_mod( 'single_post_sidebar_layout','right'  ) == "left" ) { ?>
        <div class="left-side-cls">
           <?php get_sidebar(); ?>
        </div>
        <?php } ?>
      <div class="col-md-<?php echo esc_attr($custom_class); ?> clearfix">
        <div class="single-blog">
          <div class="blog-date-col-1">
            <h2><?php echo get_the_date("M j, Y "); ?> </h2>
            <div class="blog-comment"> <i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?> </div>
          </div>
          <div class="blog-contan-col-2">
            <?php 
              if ( get_theme_mod( 'hide_single_post_image' ) == "" ) { 
               if ( has_post_thumbnail() ) { ?>
                  <?php the_post_thumbnail('',array( 'class' => 'img-responsive medics-featured-image' )); ?>
            <?php } } ?>
            <h1>
              <?php the_title(); ?>
            </h1>
            <?php if ( get_theme_mod( 'hide_single_post_meta_tag' ) == "" ) {  ?>
            <div class="dr-name-icon">
              <?php medics_entry_meta(); ?>
            </div>
            <?php } ?>
            <div class="medics-contant">
              <?php the_content(); 
              wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'medics' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) ); ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <div class="col-md-12 medics-default-pagination"> <span class="medics-previous-link">
          <?php previous_post_link(); ?>
          </span> <span class="medics-next-link">
          <?php next_post_link(); ?>
          </span></div>
        <?php if ( get_theme_mod( 'hide_single_post_comment_form' ) == "" ){
          comments_template( '', true ); } ?>
      </div>
      <?php if ( get_theme_mod( 'single_post_sidebar_layout','right'  ) == "right" ) {
        get_sidebar();
      } ?>
    </div>
  </div>
</div>
<?php get_footer();